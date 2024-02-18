@extends('Backend.Layouts.master')
@section('title', 'Exams List')
@section('exam_li', 'active')
@section('exam_a', 'active')
@section('content')

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Exams</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('exam.index') }}">Exams</a></li>
                            <li class="breadcrumb-item active">All Exams</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form action="{{ route('exam.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="bank-inner-details">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Course Name<span class="text-danger">*</span></label>
                                            <select name="course_id" class="form-control form-select" id=""
                                                required>
                                                <option>Select Course</option>
                                                @foreach ($course as $course_details)
                                                    <option value="{{ $course_details->id }}">{{ $course_details->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Exam Title<span class="text-danger">*</span></label>
                                            <input type="text" name="title" placeholder="Enter Course Title"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">

                                        <div class="form-group">
                                            <label>Mark Per Question<span class="text-danger">*</span></label>
                                            <input class="form-control" value="{{ old('question_marks') }}"
                                                name="question_marks" type="number"
                                                placeholder="Enter The Marks of One Question" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">

                                        <div class="form-group">
                                            <label>Time Duration in Minutes<span class="text-danger">*</span></label>
                                            <input class="form-control" name="time_duration" type="text"
                                                placeholder="20" value="{{old('time_duration')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Exam Description</label>
                                            <textarea id="summernote_blog" name="description"></textarea>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" blog-categories-btn pt-0">
                            <div class="bank-details-btn ">
                                <button type="submit" class="btn bank-cancel-btn me-2 btn-block">Add Exam</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card card-table comman-shadow">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Exams</h3>
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
                                        <th>Exam Title</th>
                                        <th>Mark Per Question</th>
                                        <th>Created At</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($exam as $key => $exam_details)
                                    <tr>
                                        <td>
                                          {{$key + 1}}
                                        </td>
                                        <td>{{ $exam_details->title }}</td>
                                        <td>

                                            <span class="badge bg-success">{{ $exam_details->per_q_mark }}</span>

                                        </td>
                                        <td>{{ $exam_details->created_at->format('M j, Y') }}</td>
                                        <td>
                                            <div class="actions">
                                                <form method="POST"
                                                    action="{{ route('courses.destroy', $exam_details->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm bg-danger-light me-2"><i
                                                            class="far fa-trash-alt text-danger"></i></button>
                                                </form>
                                                <button type="button" class="btn btn-sm bg-danger-light"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop{{ $exam_details->id }}">
                                                    <i class="feather-edit"></i>
                                                </button>
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
