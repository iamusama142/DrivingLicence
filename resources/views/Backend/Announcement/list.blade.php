@extends('Backend.Layouts.master')
@section('title', 'Add Announcement')
@section('announcement_li', 'active')
@section('announcement_a1', 'active')
@section('content')

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Announcement </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('announcement.index') }}">Announcement </a></li>
                            <li class="breadcrumb-item active">Add Announcement </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form action="{{ route('announcement.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="bank-inner-details">
                                <div class="row">

                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Announcement Title<span class="text-danger">*</span></label>
                                            <input type="text" name="title" placeholder="Enter Announcement Title"
                                                class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Announcement Description</label>
                                            <textarea id="summernote_blog" name="description"></textarea>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" blog-categories-btn pt-0">
                            <div class="bank-details-btn ">
                                <button type="submit" class="btn bank-cancel-btn me-2 btn-block">Add Announcement</button>
                            </div>
                        </div>
                    </div>
                </form>
                {{-- <div class="card card-table comman-shadow">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Announcement </h3>
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
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Created At</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($announcement as $key => $announcement_details)
                                    <tr>
                                        <td>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </td>
                                        <td>{{ $announcement_details->title }}</td>
                                        <td>{{ $announcement_details->description }}</td>


                                        <td>{{ $announcement_details->created_at->format('M j, Y') }}</td>
                                        <td>
                                            <div class="actions">
                                                <form method="POST"
                                                    action="{{ route('courses.destroy', $announcement_details->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm bg-danger-light me-2"><i
                                                            class="far fa-trash-alt text-danger"></i></button>
                                                </form>
                                                <button type="button" class="btn btn-sm bg-danger-light"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop{{ $announcement_details->id }}">
                                                    <i class="feather-edit"></i>
                                                </button>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
