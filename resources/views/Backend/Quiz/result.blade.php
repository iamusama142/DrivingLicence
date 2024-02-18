@extends('Backend.Layouts.master')
@section('title', 'All Quiz Results')
@section('quiz_li', 'active')
@section('quiz_a3', 'active')
@section('content')

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Quizz Results</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('quizzez.index') }}">Results</a></li>
                            <li class="breadcrumb-item active">All Results</li>
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
                                    <h3 class="page-title">Results</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">

                                    <a href="{{ route('export-data', ['provider' => 'pdf', 'source' => 'result']) }}"
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
                                            #
                                        </th>
                                        <th>Exam Name</th>
                                        <th>Student</th>
                                        <th>Participate ID</th>
                                        <th>Total Marks</th>
                                        <th>Obtain Marks</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($result as $key => $result_details)
                                    <tr>
                                        <td>
                                           {{$key + 1}}
                                        </td>
                                        <td>{{ $result_details->title }}</td>
                                        <td>{{ $result_details->name }}</td>
                                        <td>{{ $result_details->participate_id }}</td>
                                        <td>{{ $result_details->total_marks }}</td>
                                        <td>{{ $result_details->get_marks }}</td>

                                        <td>
                                            @if ($result_details->status == 'Fail')
                                                <span class="badge bg-danger">Fail</span>
                                            @else
                                                <span class="badge bg-success">Pass</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                 
                                                <a href="{{route('check.answers.admin',['id'=> encrypt($result_details->participate_id)])}}" class="btn btn-sm btn-dark text-white">Check Answers</a>



                                           
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
