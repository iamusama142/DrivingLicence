@extends('UserSide.layouts.app')
@section('exam_li', 'active')
@section('exam_a', 'active')
@section('title', 'Exam Lists')
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Exam</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Exam</li>
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
                                    <h3 class="page-title">Exam</h3>
                                </div>

                            </div>
                        </div>

                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>Exam Name</th>
                                        <th>Course</th>
                                        <th>Total Time</th>
                                        <th>Total Marks</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exam as $exam_details)
                                        <tr>
                                            <td>
                                                <h2>
                                                    <a>{{ $exam_details->title }}</a>
                                                </h2>
                                            </td>
                                            @php
                                                $course = \App\Models\Course::where('id', $exam_details->course_id)->first();

                                            @endphp
                                            <td>
                                                @if ($course)
                                                    {{ $course->title }}
                                                @endif
                                            </td>
                                            <td>{{ $exam_details->timer }} Mins</td>
                                            <td>
                                                @php
                                                    $quiz = \App\Models\Quiz::where('exam_id', $exam_details->id)->count();

                                                @endphp
                                                {{ $exam_details->per_q_mark * $quiz }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="javascript:;" data-bs-toggle="modal"
                                                        data-bs-target="#start_quiz_modal{{ $exam_details->id }}"
                                                        data-toggle="tooltip" data-placement="top" title="Start Exam"
                                                        class="btn btn-sm bg-success-light me-2">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                              
                                                
                                                </div>
                                            </td>
                                            @include('UserSide.Exams.modal')
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
