<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Stripe\StripeClient;
use App\Models\Enrollment;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\quickbook_credential;
use Illuminate\Support\Facades\Artisan;
use QuickBooksOnline\API\Facades\Customer;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Exception\ServiceException;


class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {

        $this->quickbook_credentials = new quickbook_credential();
    }


    public function enroll_now(Request $request, $id)
    {



        // Sanitize input
        $id = decrypt($id);

        // Retrieve the course
        $course = Course::findOrFail($id);
        // Get authenticated user's ID
        $student_id = auth()->user()->id;
        $stripe = new StripeClient('sk_test_51MivEEEN0QKqQRGXK690L7KvRBI1uKAkiA5U1woqkLO1i1c3o2WnJ8sqDTESlIp7CPqNOhxaj7U7OTIa7LVXGiKz00xQHSq1Zb');
        $redirectUrl = route('stripe.checkout.success') . '?session_id=' . '{CHECKOUT_SESSION_ID}' . '&price=' .  $course->price . '&course_id=' . $course->id . '&student_id=' . $student_id;

        // Create checkout session
        // Calculate service fee
        $serviceFee = 0.029 * $course->price;
        // 2.9% of the price

        // Calculate total amount including service fee
        $totalAmount = $course->price + $serviceFee + 0.10;

        try {

            $response = $stripe->checkout->sessions->create([
                'success_url' => $redirectUrl,
                'customer_email' => auth()->user()->email,
                'payment_method_types' => ['link', 'card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'product_data' => [
                                'name' => 'Course Enrollement Payment',
                            ],
                            'unit_amount' => 100 * $totalAmount,
                            'currency' => 'usd',
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'allow_promotion_codes' => true,
            ]);
            return redirect($response['url']);
        } catch (\Exception $e) {
            return back()->with('error', 'Payment initialization failed. Please try again.');
        }
    }

    public function stripeCheckoutSuccess(Request $request)
    {
        $stripe = new \Stripe\StripeClient('sk_test_51MivEEEN0QKqQRGXK690L7KvRBI1uKAkiA5U1woqkLO1i1c3o2WnJ8sqDTESlIp7CPqNOhxaj7U7OTIa7LVXGiKz00xQHSq1Zb');
        $response = $stripe->checkout->sessions->retrieve($request->session_id);
        // Generate unique enrollment ID
        $enrollmentId = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 6)), 0, 6);
        // Create new enrollment
        $enrollment = new Enrollment();
        $enrollment->enrollment_id = $enrollmentId;
        $enrollment->student_id = $request->student_id;
        $enrollment->course_id = $request->course_id;
        $enrollment->save();

        $course = Course::where('id', $request->course_id)->first();
        $notification = new Notification();
        $notification->title = 'New Course Enrollment By: ' . auth()->user()->name;
        $notification->description = 'Student Enroll in Course: ' . $course->title . 'with price of' . $course->price;
        $notification->student_id = auth()->user()->id;
        $notification->type = 'enrollments';
        $notification->url = '/student/courses/enrollments';
        $notification->save();

        $user = User::where('id', auth()->user()->id)->first();
        $qb_credentials = $this->updated_access_token();
        $config = config('quickbook');

        $dataService = DataService::Configure([
            'auth_mode' => 'oauth2',
            'ClientID' => $config['client_id'],
            'ClientSecret' => $config['client_secret'],
            'RedirectURI' => $config['redirect_uri'],
            'accessTokenKey' => $qb_credentials['access_token'],
            'refreshTokenKey' => $qb_credentials['refresh_token'],
            'QBORealmID' => $config['realm_id'],
            'baseUrl' => $config['base_url'],
        ]);

        $customer = Customer::create([
            "GivenName" => $user->name . ' ' . 'Enrollment ID ' . $enrollmentId,
            "DisplayName" =>  $user->name . ' ' . 'Enrollment ID ' . $enrollmentId,
            'Notes' => 'Course Enrollment Billing, Course Name is' . ' ' . $course->title . 'and the price is $' . $course->price,
            "PrimaryEmailAddr" => [
                "Address" => $user->email,
            ],
            "BillAddr" => [
                "Line1" => $user->student_detail->address ?? 'NULL',
                "City" => $user->student_detail->city ?? 'NULL',
                "Country" => $user->student_detail->country ?? 'NULL',
            ],
            "PrimaryPhone" => [
                "FreeFormNumber" => $user->student_detail->phone
            ]
        ]);
        try {
            $result = $dataService->Add($customer);

            if ($result == Null) {
                Log::info('Student Not Saved');
            } else {
                Log::info('Student Saved');
            }
            return redirect()->route('student.dashboard')->with('success', 'Payment successful.');
        } catch (ServiceException $ex) {
            echo  "Error message: " . $ex->getMessage();
        }


        return redirect()->route('student.dashboard')->with('success', 'Payment successful.');
    }

    public function updated_access_token()
    {
        $config = config('quickbook');
        $quickbook_credentials = $this->quickbook_credentials->where('status', 1)->first();
        if ($quickbook_credentials) {
            $access_token = $this->quickbook_credentials->access_token;
            $refres_access_token = $this->quickbook_credentials->refresh_token;
        } else {
            $access_token = $config['access_token'];
            $refres_access_token = $config['refresh_token'];
        }
        $dataService = DataService::Configure([
            'auth_mode' => 'oauth2',
            'ClientID' => $config['client_id'],
            'ClientSecret' => $config['client_secret'],
            'RedirectURI' => $config['redirect_uri'],
            'accessTokenKey' => $access_token,
            'refreshTokenKey' => $refres_access_token,
            'QBORealmID' => $config['realm_id'],
            'baseUrl' => $config['base_url'],
        ]);
        $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();

        $accessTokenObj = $OAuth2LoginHelper->refreshAccessTokenWithRefreshToken($config['refresh_token']);
        $accessTokenValue = $accessTokenObj->getAccessToken();
        $refreshTokenValue = $accessTokenObj->getRefreshToken();
        $dataArr['client_id'] = $config['client_id'];
        $dataArr['client_secret'] = $config['client_secret'];
        $dataArr['redirect_url'] = $config['redirect_uri'];
        $dataArr['realm_id'] = $config['realm_id'];
        $dataArr['base_url'] = $config['base_url'];
        $dataArr['status'] = 1;
        $dataArr['access_token'] = $accessTokenValue;
        $dataArr['refresh_token'] = $refreshTokenValue;
        $this->quickbook_credentials->where('id', 1)->update($dataArr);
        return ['access_token' => $accessTokenValue, 'refresh_token' => $refreshTokenValue];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function history_student()
    {
        $enrollment = Enrollment::where('student_id', auth()->user()->id)->join('courses', 'courses.id', '=', 'enrollments.course_id')->select('enrollments.*', 'courses.title', 'courses.price')->get();
        return view('UserSide.Courses.enrollments')->with(compact('enrollment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }
}
