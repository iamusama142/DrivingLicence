@extends('Backend.Layouts.master')

@section('std_gallery_li', 'active')
@section('std_gallery_1', 'active')
@section('title', 'Student Gallery')
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Student Gallery</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
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
                                    <h3 class="page-title">Gallery Details</h3>
                                </div>
                                <button type="button" data-bs-toggle="modal" style="width: 14%!important;"
                                    data-bs-target="#add-modal-gallery" class="btn btn-primary btn-sm">Add Student
                                    Gallery</button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>#</th>
                                        <th>Text</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gallery as $key => $gallery_details)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            <td>
                                                <h2>
                                                    <a>{{ $gallery_details->name }}</a>
                                                </h2>
                                            </td>
                                            <td>
                                                <img @if ($gallery_details->image == null) width="24" height="24" @endif
                                                    class="avatar-img rounded-circle img-fluid" width="70"
                                                    height="70"
                                                    src="@if ($gallery_details->image != null) {{ asset('uploads/all/' . $gallery_details->image) }} @else https://img.icons8.com/plumpy/24/user.png @endif"
                                                    alt="User Image">
                                            </td>

                                            <td>{{ formatDate($gallery_details->created_at) }}</td>
                                            <td>
                                                <div class="actions text-start">
                                                    <form method="POST"
                                                        action="{{ route('student-gallery.destroy', $gallery_details->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm bg-danger-light me-2"><i
                                                                class="far fa-trash-alt text-danger"></i></button>
                                                    </form>
                                                    <button type="button" class="btn btn-sm bg-danger-light"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#edit-modal-gallery{{ $gallery_details->id }}">
                                                        <i class="feather-edit"></i>
                                                    </button>
                                                </div>
                                                @include('Backend.Gallery.edit-modal-gallery')

                                            </td>
                                        </tr>
                                    @endforeach
                                    @include('Backend.Gallery.add-modal-gallery')

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
