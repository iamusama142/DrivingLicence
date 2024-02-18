@extends('Backend.Layouts.master')
@section('student_li', 'active')
@section('student_a', 'active')
@section('title', 'Students')
@section('content')
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Students</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="students.html">Student</a></li>
                            <li class="breadcrumb-item active">All Students</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="student-group-form">
            <form action="{{ route('student.search') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-3 col-md-6">

                    </div>
                    <div class="col-lg-3 col-md-6">

                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control"
                                @if ($query != null) value="{{ $query }}" @endif name="student_name"
                                required placeholder="Search by Name ...">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="search-student-btn">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Students</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">

                                    <a href="{{ route('export-data', ['provider' => 'pdf', 'source' => 'student']) }}"
                                        class="btn btn-outline-primary btn-sm me-2"><i class="fas fa-download"></i>
                                        Download PDF</a>

                                 
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                       
                                        <th>Std ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Address</th>
                                        <th>Created At</th>
                                        {{-- <th class="text-end">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $students_details)
                                        <tr>
                                         
                                            <td>#{{ $students_details->student_id }}</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="#" class="avatar avatar-sm me-2"><img
                                                            @if ($students_details->avatar == null) width="24" height="24" @endif
                                                            class="avatar-img rounded-circle"
                                                            src="@if ($students_details->avatar != null) {{ asset('uploads/all/' . $students_details->avatar) }} @else https://img.icons8.com/plumpy/24/user.png @endif"
                                                            alt="User Image"></a>
                                                    <a href="#">{{ $students_details->name }}</a>
                                                </h2>
                                            </td>
                                            <td>{{ $students_details->email }}</td>
                                            <td>{{ $students_details->student_detail->phone ?? 'Not Filled' }}</td>
                                            <td>{{ $students_details->student_detail->address ?? 'Not Filled' }}</td>


                                            <td>{{ formatDate($students_details->created_at) }}</td>

                                            {{-- <td class="text-end">
                                                <div class="actions ">
                                                    <a href="javascript:;" class="btn btn-sm bg-success-light me-2 ">
                                                        <i class="feather-eye"></i>
                                                    </a>
                                                    <a href="edit-student.html" class="btn btn-sm bg-danger-light">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                </div>
                                            </td> --}}
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
