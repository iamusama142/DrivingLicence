@extends('Backend.Layouts.master')
@section('title', 'All Blog Categories')
@section('blog_li', 'active')
@section('blog_a', 'active')
@section('content')

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Blog Categories</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('blog-categories.index') }}">Categories</a></li>
                            <li class="breadcrumb-item active">All Blog Categories</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form action="{{ route('blog-categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="bank-inner-details">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Category Name<span class="text-danger">*</span></label>
                                            <input type="text" name="title" placeholder="Enter Category Name"
                                                class="form-control" required>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class=" blog-categories-btn pt-0">
                            <div class="bank-details-btn ">

                                <button type="submit" class="btn bank-cancel-btn me-2 btn-block">Add Category</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card card-table comman-shadow">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Blog Categories</h3>
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
                                        <th>Category Name</th>
                                       
                                        <th>Created At</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($blogCategory as $key => $blogCategory_details)
                                    <tr>
                                        <td>
                                           {{$key + 1}}
                                        </td>
                                        <td>{{ $blogCategory_details->name }}</td>

                                        <td>{{ $blogCategory_details->created_at->format('M j, Y') }}</td>
                                        <td>
                                            <div class="actions">
                                                <form method="POST"
                                                    action="{{ route('blog-categories.destroy', $blogCategory_details->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm bg-danger-light me-2"><i
                                                            class="far fa-trash-alt text-danger"></i></button>
                                                </form>
                                                <button type="button" class="btn btn-sm bg-danger-light"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop{{ $blogCategory_details->id }}">
                                                    <i class="feather-edit"></i>
                                                </button>
                                                @include('Backend.Blogs.edit-category-modal')

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
