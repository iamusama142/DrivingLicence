@extends('UserSide.layouts.app')
@section('title', 'Profile')


@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="#">
                                <img class="rounded-circle" alt="User Image"
                                    src="@if ($user->avatar != null) {{asset('uploads/all/'. auth()->user()->avatar)}} @else https://img.icons8.com/pastel-glyph/64/person-male--v1.png @endif">
                            </a>
                        </div>
                        <div class="col ms-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">{{ auth()->user()->name }}</h4>
                            <div class="user-Location"><i class="fas fa-map-marker-alt"></i>
                                {{ $userDetail->address ?? 'NULL' }}
                            </div>
                            <div class="about-text">{{ $userDetail->country ?? '' }} {{ $userDetail->state ?? '' }}
                                {{ $userDetail->city ?? '' }}</div>
                        </div>
                        <div class="col-auto profile-btn">

                        </div>
                    </div>
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">About</a>
                        </li>

                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <div class="tab-pane fade show active" id="per_details_tab">

                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Personal Details</span>
                                            <a class="edit-link" data-bs-toggle="modal" href="#edit_personal_details"><i
                                                    class="far fa-edit me-1"></i>Edit</a>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Name</p>
                                            <p class="col-sm-9">{{ auth()->user()->name }}</p>
                                        </div>

                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Email ID</p>
                                            <p class="col-sm-9"><a href="mailto:{{ auth()->user()->email }} "
                                                    class="__cf_email__"
                                                    data-cfemail="{{ auth()->user()->email }}">[email&nbsp;protected]</a>
                                            </p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Mobile</p>
                                            <p class="col-sm-9">{{ $userDetail->phone ?? 'Null' }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0">Address</p>
                                            <p class="col-sm-9 mb-0"> {{ $userDetail->address ?? 'NULL' }} <br>
                                                {{ $userDetail->country ?? '' }} {{ $userDetail->state ?? '' }}
                                                {{ $userDetail->city ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Account Status</span>

                                        </h5>
                                        <button class="btn btn-success" type="button"><i class="fe fe-check-verified"></i>
                                            Active</button>
                                    </div>
                                </div>




                            </div>
                        </div>

                    </div>


                    @include('UserSide.Profile.editmodal')

                </div>
            </div>
        </div>
    </div>
@endsection
