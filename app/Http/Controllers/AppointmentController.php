<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Notification;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointment=Appointment::orderBy('created_at','DESC')->get();
        return view('Backend.Appointment.appointment')->with(compact('appointment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $appointment=new Appointment();
        $appointment->date=$request->date;
        $appointment->time=$request->time;
        $appointment->first_name=$request->first_name;
        $appointment->last_name=$request->last_name;
        $appointment->phone_no=$request->phone_no;
        $appointment->email=$request->email;
        $appointment->address=$request->address;
        $appointment->city=$request->city;
        $appointment->state=$request->state;
        $appointment->zip_code=$request->zip_code;
        $appointment->permit_no=$request->permit_no;
        $appointment->packages_locations=$request->packages_locations;
        $appointment->send_txt_msgs_to=$request->send_txt_msgs_to;
        $appointment->save();

        $notification = new Notification();
        $notification->title = 'Appointement Request Received From: ' . $request->first_name;
        $notification->description = 'Appointement Request Received From: ' .$request->first_name  . $request->last_name;
        $notification->student_id = 'NULL';
        $notification->type = 'appointments';
        $notification->url = '/appointments-requests';
        $notification->save();

        
        return response()->json(['message' => 'Appointment created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
