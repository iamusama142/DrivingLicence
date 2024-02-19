@extends('UserSide.layouts.app')
@section('dashboard_li', 'active')
@section('dashboard_a', 'active')

@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Welcome {{ auth()->user()->name }}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Student</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Active Courses</h6>
                                <h3>{{ number_format(count($course)) }}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ asset('Backend/assets/img/icons/teacher-icon-01.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Course Enrollments</h6>
                                <h3>{{ number_format($enrollment) }}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ asset('Backend/assets/img/icons/teacher-icon-02.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Exams Attended</h6>
                                <h3>{{ number_format($exams_attempt) }}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ asset('Backend/assets/img/icons/student-icon-01.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Test Passed</h6>
                                <h3>{{ number_format($pass_exams) }}</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ asset('Backend/assets/img/icons/student-icon-02.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <h3 class="page-title">Available Courses</h3>

        <div class="row">
            @if (!$course)
                <div class="col-12 col-lg-12 col-xl-8">
                    <div class="card flex-fill comman-shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h5 class="card-title">No Course Found</h5>
                                </div>
                                <div class="col-6">
                                    <ul class="chart-list-out">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @foreach ($course as $course_details)
                    <div class="col-12 col-lg-12 col-xl-6">
                        <div class="card flex-fill comman-shadow">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h5 class="card-title">{{ $course_details->title }}</h5>
                                    </div>
                                    <div class="col-6">
                                        <ul class="chart-list-out">
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-3 dash-widget1">
                                    <img width="80" height="80"
                                        src="https://img.icons8.com/officel/80/knowledge-sharing.png"
                                        alt="knowledge-sharing" />

                                </div>
                                <div class="col-lg-5 col-md-3">
                                    <div class="dash-details">
                                        <div class="lesson-activity">
                                            <div class="lesson-imgs">
                                                <img src="assets/img/icons/lesson-icon-01.svg" alt="">
                                            </div>
                                            <div class="views-lesson">
                                                <h5>Exams</h5>
                                                @php
                                                    $exams = \App\Models\Exam::where('course_id', $course_details->id)->count();
                                                @endphp
                                                <h4>{{ $exams }}</h4>
                                            </div>
                                        </div>
                                        <div class="lesson-activity">
                                            <div class="lesson-imgs">
                                                <img src="assets/img/icons/lesson-icon-06.svg" alt="">
                                            </div>
                                            <div class="views-lesson">
                                                <h5>Area Covered</h5>
                                                <h4>{{ $course_details->area_covered }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-3 d-flex align-items-center" style="justify-content: end">
                                    <div class="skip-group">
                                        <style>
                                            .enroll_now_btn:hover {
                                                background-color: rgb(72, 72, 72);
                                                color: white;
                                            }
                                        </style>
                                        @php
                                            $checkEnrollment = \App\Models\Enrollment::where('course_id', $course_details->id)
                                                ->where('status', '1')
                                                ->first();

                                        @endphp
                                        @if ($checkEnrollment)
                                            <button type="submit" class="btn btn-transparent pt-1 pb-1"> <a
                                                    href="{{ route('students.quizzez', ['course_id' => encrypt($checkEnrollment->course_id)]) }}"
                                                    class="btn btn-success enroll_now_btn text-white fs-20"
                                                    style="font-size: 10px;">Check Available Exam</a></button>
                                        @else
                                            <button type="button" class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop{{ $course_details->id }}">
                                                Enroll Now
                                            </button>
                                        @endif
                                        @include('UserSide.course-enrollment-modal')
                                        <button type="submit" class="btn btn-transparent"> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#course-enrollment-form').submit(function(event) {
                // Prevent the form from submitting
                event.preventDefault();

                // Check if at least one hour is selected
                if ($('input[name="selected_hour"]:checked').length === 0) {
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                    }
                    toastr.error("Please Select Hour")
                    return;
                }

                this.submit();
            });
        });
    </script>
@endsection
