@extends('UserSide.layouts.app')
@section('s_exam', 'active')
@section('s_result_2', 'active')
@section('title', 'Inqery Results')
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Inqery Result</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('student.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Inqery Reporting</li>
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
                                    <h3 class="page-title">All Results</h3>
                                </div>

                            </div>
                        </div>

                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>Participate ID</th>
                                        <th>Exam Name</th>
                                        <th>Total Marks</th>
                                        <th>Obtaib Marks</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($results as $key => $result_details)
                                    <tr>
                                        <td>{{ $result_details->participate_id }}</td>

                                        <td>{{ $result_details->title }}</td>

                                        <td>{{ $result_details->total_marks }}</td>
                                        <td>{{ $result_details->get_marks }}</td>
                                        <td>
                                            @if ($result_details->status == 'Fail')
                                                <span class="badge bg-danger">Fail</span>
                                            @else
                                                <span class="badge bg-success">Pass</span>
                                            @endif
                                        </td>
                                        <td>{{ date('d M, Y', strtotime($result_details->created_at)) }}</td>

                                        <td class="text-center">
                                          
                                                <a href="{{route('check.answers',['id'=> encrypt($result_details->participate_id)])}}" class="btn btn-sm btn-dark text-white">Check Answers</a>
                                       
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
