<div class="modal fade" id="staticBackdrop{{ $quiz_details->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Quiz Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('quizzez.update', $quiz_details->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                  
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

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="add-row">
                                        <div class="row">
                                            <div class="col-xl-4 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label>Exam Name<span class="text-danger">*</span></label>
                                                    <select name="exam_id" class="form-control form-select" id=""
                                                        required>
                                                        <option>Select Exam</option>
                                                        @foreach ($exam as $exam_details)
                                                            <option value="{{ $exam_details->id }}" @if($quiz_details->exam_id == $exam_details->id) selected @endif>{{ $exam_details->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
        
                                                </div>
                                            </div>
                                           
        
                                        </div>
                                        <td>
                                            <input type="text" class="form-control" name="questions"
                                                value="{{ $quiz_details->questions }}" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="options_a"
                                                value="{{ $quiz_details->options_a }}" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="options_b"
                                                value="{{ $quiz_details->options_b }}" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="options_c"
                                                value="{{ $quiz_details->options_c }}" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="options_d"
                                                value="{{ $quiz_details->options_d }}" required>
                                        </td>
                                        <td>
                                            <select name="correct_options" class="form-select form-control"
                                                id="" required>
                                                <option value="A"
                                                    @if ($quiz_details->correct_options == 'A') selected @endif>Option A</option>
                                                <option value="B"
                                                    @if ($quiz_details->correct_options == 'B') selected @endif>Option B</option>
                                                <option value="C"
                                                    @if ($quiz_details->correct_options == 'C') selected @endif>Option C</option>
                                                <option value="D"
                                                    @if ($quiz_details->correct_options == 'D') selected @endif>Option D</option>

                                            </select>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
