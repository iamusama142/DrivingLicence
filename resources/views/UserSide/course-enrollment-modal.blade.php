<div class="modal fade" id="staticBackdrop{{ $course_details->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{route('student.enroll')}}" method="POST" id="course-enrollment-form">
            @csrf
            <input type="hidden" value="{{ $course_details->id }}" name="id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Course Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        @php
                            $hours = json_decode($course_details->hours);
                            $price = json_decode($course_details->price);
                        @endphp
                        <div class="container container-field-edit">
                            @foreach ($hours as $index => $hour)
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Hours<span class="text-danger">*</span></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="selected_hour"
                                                    id="hour{{ $index }}" value="{{ $hour }}">
                                                <label class="form-check-label" for="hour{{ $index }}">
                                                    {{ $hour }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Price<span class="text-danger">*</span></label>
                                            <input type="number" name="price" value="{{ $price[$index] }}"
                                                placeholder="Enter Course Hour Price" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Quantity Of Purchase<span class="text-danger">*</span></label>
                                        <input type="number" name="quantity" value="1"
                                            placeholder="Enter the Quantity of purchasing" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Enroll Now</button>
                    </div>
                </div>


            </div>
        </form>

    </div>
