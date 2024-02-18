@extends('Backend.Layouts.master')
@section('title', 'Add Blog')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xl-12">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Add Post</h3>
                            @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                        </div>
                    </div>
                </div>
                <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="bank-inner-details">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Blog Title<span class="text-danger">*</span></label>
                                            <input type="text" value="{{old('title')}}" name="title" placeholder="Enter Blog Title"
                                                class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Blog Category<span class="text-danger">*</span></label>
                                            <select name="category_id" value="{{old('category_id')}}" class="form-control form-select" id="">
                                                <option>Select Blog Category</option>
                                                @foreach ($categories as $categories_details)
                                                    <option value="{{ $categories_details->id }}">
                                                        {{ $categories_details->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Short Description<span class="text-danger">*</span></label>
                                            <textarea rows="5" cols="5" value="{{old('short_description')}}" name="short_description" class="form-control" placeholder="Enter text here"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Long Description<span class="text-danger">*</span></label>
                                            <textarea id="summernote_blog" value="{{old('long_description')}}" name="long_description" required></textarea>

                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Banner Image<span class="text-danger">*</span></label>
                                            <input type="file" name="banner" class="form-control" required>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Meta Title</label>
                                            <div class="col-lg-9">
                                                <input type="text" value="{{old('meta_title')}}" name="meta_title" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Meta Desciprion</label>
                                            <div class="col-lg-9">
                                                <textarea rows="5" cols="5" value="{{old('meta_description')}}" name="meta_description" class="form-control" placeholder="Enter text here"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Meta Tags</label>
                                            <div class="col-lg-9">

                                                <input type="text" name="meta_keywords"
                                                    class="form-control p-4 tagsinput"  value="{{old('meta_keywords')}}" data-role="tagsinput" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Meta Image</label>
                                            <div class="col-lg-9">

                                                <input type="file" name="meta_image" class="form-control">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class=" blog-categories-btn pt-0">
                            <div class="bank-details-btn ">

                                <button type="submit" class="btn bank-cancel-btn me-2 btn-block">Add Blog</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
