@extends('Backend.Layouts.master')
@section('title', 'All Quiz')
@section('quiz_li', 'active')
@section('quiz_a2', 'active')
@section('content')

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Quizzez</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('quizzez.index') }}">Quizz</a></li>
                            <li class="breadcrumb-item active">All Quizzez</li>
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
                                    <h3 class="page-title">Courses</h3>
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
                                        <th>Question</th>
                                        <th>Correct Option</th>
                                        
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($quiz as $key => $quiz_details)
                                    <tr>
                                        <td>
                                           {{$key + 1}}
                                        </td>
                                        <td>{{ $quiz_details->title }}</td>
                                        <td>{{ $quiz_details->questions }}</td>
                                        <td>{{ $quiz_details->correct_options }}</td>
                                     
                                        <td>
                                            @if ($quiz_details->status == '0')
                                                <span class="badge bg-danger">In-Active</span>
                                            @else
                                                <span class="badge bg-success">Active</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="actions">
                                                <form method="POST"
                                                    action="{{ route('quizzez.destroy', $quiz_details->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm bg-danger-light me-2"><i
                                                            class="far fa-trash-alt text-danger"></i></button>
                                                </form>
                                                <button type="button" class="btn btn-sm bg-danger-light"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop{{ $quiz_details->id }}">
                                                    <i class="feather-edit"></i>
                                                </button>
                                                @include('Backend.Quiz.edit-modal')

                                            </div>
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
