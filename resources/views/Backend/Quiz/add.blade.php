@extends('Backend.Layouts.master')
@section('title', 'All Courses')
@section('quiz_li', 'active')
@section('quiz_a1', 'active')
@section('content')

    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Quizzez</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('quizzez.create') }}">Quiz</a></li>
                            <li class="breadcrumb-item active">Add Quiz</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card invoices-add-card">
                    <div class="card-body">
                        <form action="{{ route('quizzez.store') }}" method="POST" class="invoices-form">
                            @csrf
                            @foreach ($errors->all() as $error)
                                <li class="bg-danger text-dark">{{ $error }}</li>
                            @endforeach
                            <div class="invoices-main-form">
                                <div class="row">
                                    <div class="col-xl-4 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Exam Name<span class="text-danger">*</span></label>
                                            <select name="exam_id" class="form-control form-select" id=""
                                                required>
                                                <option>Select Exam</option>
                                                @foreach ($exam as $exam_details)
                                                    <option value="{{ $exam_details->id }}">{{ $exam_details->title }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                   

                                </div>
                            </div>

                            <div class="invoice-add-table">
                                <h4>Add Question & Answers</h4>
                                <div class="table-responsive">
                                    <table class="table table-center add-table-items">
                                        <thead>
                                            <tr>
                                                <th>Question</th>
                                                <th>Option A</th>
                                                <th>Option B</th>
                                                <th>Option C</th>
                                                <th>Option D</th>
                                                <th>Correct Option</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="add-row">
                                                <td>
                                                    <input type="text" class="form-control" name="questions[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="options_a[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="options_b[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="options_c[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="options_d[]" required>
                                                </td>
                                                <td>
                                                    <select name="correct_options[]" class="form-select form-control"
                                                        id="" required>
                                                        <option value="A">Option A</option>
                                                        <option value="B">Option B</option>
                                                        <option value="C">Option C</option>
                                                        <option value="D">Option D</option>

                                                    </select>
                                                </td>

                                                <td class="add-remove text-end">
                                                    <a href="javascript:void(0);" class="add-btn-quiz me-2"><i
                                                            class="fas fa-plus-circle"></i></a>
                                                    <a href="javascript:void(0);" class="remove-btn-quiz"><i
                                                            class="far fa-trash-alt text-danger"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2 btn-block">Add Quiz</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            $(document).on("click", ".add-btn-quiz", function() {

                var experiencecontent = '<tr class="add-row">' +
                    '<td>' +
                    '<input type="text" class="form-control" name="questions[]">' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" class="form-control" name="options_a[]">' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" class="form-control" name="options_b[]">' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" class="form-control" name="options_c[]">' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" class="form-control" name="options_d[]">' +
                    '</td>' +
                    '<td>' +
                    '<select class="form-select form-control" name="correct_options[]"> <option value="A">Option A</option> <option value="B">Option B</option> <option value="C">Option C</option> <option value="D">Option D</option> </select>' +
                    '</td>' +
                    '<td class="add-remove text-end">' +
                    '<a href="javascript:void(0);" class="add-btn-quiz me-2"><i class="fas fa-plus-circle"></i></a> ' +
                    '<a href="javascript:void(0);" class="remove-btn-quiz"><i class="far fa-trash-alt text-danger"></i></a>' +
                    '</td>' +
                    '</tr>';
                $(".add-table-items").append(experiencecontent);
                return false;
            });
            $(".add-table-items").on('click', '.remove-btn-quiz', function() {
                $(this).closest('.add-row').remove();
                return false;
            });

        });
    </script>
@endsection
