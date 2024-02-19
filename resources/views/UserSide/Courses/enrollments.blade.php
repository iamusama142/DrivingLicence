@extends('UserSide.layouts.app')
@section('s_enrollment', 'active')
@section('s_enrollment_history', 'active')
@section('title', 'Course Enrollments History')
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Enrollments</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Course Enrollments</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Enrollments History</h3>
                                </div>

                            </div>
                        </div>

                        <div class="table-responsive">
                            <table
                            class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                  <th>Enrtollment #</th>
                                    <th>Course</th>
                                    <th>Price</th>

                                    <th>Quantity</th>
                                    <th>Hours</th>
                                    <th>Payment</th>

                                    <th>Enroll At</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enrollment as $enrollment_details)
                                    <tr>
                                        <td>{{$enrollment_details->enrollment_id}}</td>
                                        <td>
                                            <h2>
                                                <a>{{ $enrollment_details->title }}</a>
                                            </h2>
                                        </td>
                                        <td>$ {{ number_format($enrollment_details->price) }}</td>

                                        <td>{{ $enrollment_details->quantity }}</td>
                                        <td>{{ $enrollment_details->hours }}</td>
                                        <td>$ {{ number_format($enrollment_details->total_payment) }}</td>

                                        <td>{{ date('d M, Y', strtotime($enrollment_details->created_at)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
