@extends('Backend.Layouts.master')
@section('title', 'Appointments Requests')
@section('contact_li', 'active')
@section('contact_a', 'active')
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Appointments</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('appointments.request')}}">Request</a></li>
                            <li class="breadcrumb-item active">All Appointments</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

      
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">All Appointments</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">

                                    <a href="{{ route('export-data', ['provider' => 'pdf', 'source' => 'appointment']) }}"
                                        class="btn btn-outline-primary btn-sm me-2"><i class="fas fa-download"></i>
                                        Download PDF</a>

                                
                                    
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Contact No</th>
                                        <th>Address</th>
                                        <th>Zip Code</th>
                                        <th>Permit No</th>
                                        <th>Packages Locations</th>
                                        <th>Send Text Messages To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointment as $key => $appointment_details)
                                        <tr>
                                            <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </td>
                                            <td>{{$appointment_details->date}}</td>
                                           
                                            <td>{{$appointment_details->time}}</td>
                                            <td>{{$appointment_details->first_name}}</td>
                                            <td>{{$appointment_details->last_name}}</td>
                                            <td>{{$appointment_details->email}}</td>
                                            <td>{{$appointment_details->phone_no}}</td>
                                            <td>{{$appointment_details->address}}, {{$appointment_details->city}}, {{$appointment_details->state}}</td>
                                            <td>{{$appointment_details->zip_code}}</td>
                                            <td>{{$appointment_details->permit_no}}</td>
                                            <td>{{$appointment_details->packages_locations}}</td>
                                            <td>{{$appointment_details->send_txt_msgs_to}}</td>

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
