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

                <div class="card card-table comman-shadow">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Courses</h3>
                                </div>
                                <button type="button" data-bs-toggle="modal" style="width: 8%!important;"
                                    data-bs-target="#add-modal-course" class="btn btn-primary btn-sm">Add Course</button>
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
                                        <th>Area Covered</th>
                                        <th>Status</th>

                                        <th>Created At</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($course as $key => $course_details)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>{{ $course_details->title }}</td>
                                        <td>{{ $course_details->area_covered }}</td>

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
                                @include('Backend.Course.add-modal')

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            $(document).on("click", ".add-course-field-btn", function() {
                var newfield = '<div class="row">' +
                    '<div class="col-md-5">' +
                    '<div class="form-group">' +
                    '<label>Hours<span class="text-danger">*</span></label>' +
                    '<input type="number" name="hours[]" placeholder="Enter Course Hours" class="form-control" required>' +
                    '</div>' +
                    '</div>' +

                    '<div class="col-md-5">' +
                    '<div class="form-group">' +
                    '<label>Price<span class="text-danger">*</span></label>' +
                    '<input type="number" name="price[]" placeholder="Enter Course Hour Price"  class="form-control" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2">' +
                    '<div class="form-group">' +

                    '   <button type="button" class="btn btn-sm btn-danger remove-course-field-btn">Remove</button>' +
                    '</div>' +

                    '</div>'

                '</div>'
                $(".container-field").append(newfield);
                return false;


                return false;
            });
            $(".container-field").on('click', '.remove-course-field-btn', function() {
                $(this).closest('.row').remove();
                return false;
            });


            $(document).on("click", ".add-course-field-edit", function() {
                var newfield = '<div class="row">' +
                    '<div class="col-md-5">' +
                    '<div class="form-group">' +
                    '<label>Hours<span class="text-danger">*</span></label>' +
                    '<input type="number" name="hours[]" placeholder="Enter Course Hours" class="form-control" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-5">' +
                    '<div class="form-group">' +
                    '<label>Price<span class="text-danger">*</span></label>' +
                    '<input type="number" name="price[]" placeholder="Enter Course Hour Price"  class="form-control" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2">' +
                    '<div class="form-group">' +
                    '   <button type="button" class="btn btn-sm btn-danger remove-course-field-edit">Remove</button>' +
                    '</div>' +
                    '</div>'
                '</div>'
                $(".container-field-edit").append(newfield);
                return false;


                $(".container-field-edit").on('click', '.remove-course-field-edit', function() {
                    $(this).closest('.row').remove();
                    return false;
                });
            });

        });
    </script>
@endsection
