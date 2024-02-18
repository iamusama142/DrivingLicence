@extends('Backend.Layouts.master')
@section('title', 'All Blogs')
@section('blog_li', 'active')
@section('blog_a_1', 'active')
@section('content')
    <div class="content container-fluid">

        <div class="row">
            <div class="col-md-9">

            </div>
            <div class="col-md-3 text-md-end">
                <a href="{{ route('blogs.create') }}" class="btn btn-primary btn-blog mb-3"><i
                        class="feather-plus-circle me-1"></i> Add
                    New</a>
            </div>
        </div>
        <div class="row">
            @foreach ($blog as $blog_details)
                <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                    <div class="blog grid-blog flex-fill">
                        <div class="blog-image">
                            <a href="blog-details.html"><img class="img-fluid" src="{{ $blog_details->banner }}"
                                    alt="Post Image"></a>
                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="#">
                                            <img src="{{ asset('logo.png') }}"
                                                alt="Post Author">
                                            <span>
                                                <span class="post-title">{{ $blog_details->name }}</span>
                                                <span class="post-date"><i class="far fa-clock"></i>
                                                    {{ $blog_details->created_at->format('d M, Y') }}</span>
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="blog-title"><a href="blog-details.html">{{ $blog_details->title }}</a></h3>
                            <p>{{ $blog_details->short_description }}
                            </p>
                        </div>
                        <div class="row">
                            <div class="edit-options">
                                <div class="edit-delete-btn">
                                    <a href="{{ route('blogs.edit', $blog_details->id) }}" class="text-success"><i
                                            class="feather-edit-3 me-1"></i>Edit</a>

                                    <a href="#" class="text-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $blog_details->id }}"><i
                                            class="feather-trash-2 me-1"></i>
                                        Delete</a>
                                    <div class="modal fade contentmodal" id="deleteModal{{ $blog_details->id }}"
                                        tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content doctor-profile">
                                                <div class="modal-header pb-0 border-bottom-0  justify-content-end">
                                                    <button type="button" class="close-btn" data-bs-dismiss="modal"
                                                        aria-label="Close"><i class="feather-x-circle"></i></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="delete-wrap text-center">
                                                        <div class="del-icon"><i class="feather-x-circle"></i></div>
                                                        <h2>Sure you want to delete</h2>
                                                        <div class="submit-section">
                                                            <form method="POST"
                                                                action="{{ route('blogs.destroy', $blog_details->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-success me-2">Yes</button>
                                                            </form>

                                                            <a href="#" class="btn btn-danger"
                                                                data-bs-dismiss="modal">No</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
