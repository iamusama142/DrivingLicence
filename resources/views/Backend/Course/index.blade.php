@extends('Backend.Layouts.master')
@section('title', 'All Courses')
@section('course_li', 'active')
@section('course_a', 'active')
@section('content')

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Courses</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Course</a></li>
                            <li class="breadcrumb-item active">All Courses</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="bank-inner-details">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Course Title<span class="text-danger">*</span></label>
                                            <input type="text" name="title" placeholder="Enter Course Title"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Course Price<span class="text-danger">*</span></label>
                                            <input type="number" name="price" placeholder="Enter Course Price"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Course Description</label>
                                            <textarea id="summernote_blog" name="description"></textarea>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" blog-categories-btn pt-0">
                            <div class="bank-details-btn ">

                                <button type="submit" class="btn bank-cancel-btn me-2 btn-block">Add Course</button>
                            </div>
                        </div>
                    </div>
                </form>
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
                                        <th>Course Name</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($course as $key => $course_details)
                                    <tr>
                                        <td>
                                           {{$key + 1}}
                                        </td>
                                        <td>{{ $course_details->title }}</td>
                                        <td>$ {{ number_format($course_details->price) }}</td>

                                        <td>
                                            @if ($course_details->status == '0')
                                                <span class="badge bg-danger">In-Active</span>
                                            @else
                                                <span class="badge bg-success">Active</span>
                                            @endif
                                        </td>
                                        <td>{{ $course_details->created_at->format('M j, Y') }}</td>
                                        <td>
                                            <div class="actions">
                                                <form method="POST"
                                                    action="{{ route('courses.destroy', $course_details->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm bg-danger-light me-2"><i
                                                            class="far fa-trash-alt text-danger"></i></button>
                                                </form>
                                                <button type="button" class="btn btn-sm bg-danger-light"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop{{ $course_details->id }}">
                                                    <i class="feather-edit"></i>
                                                </button>
                                            </div>
                                        </td>
                                        @include('Backend.Course.edit-modal')
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
