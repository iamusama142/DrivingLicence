<div class="modal fade" id="staticBackdrop{{ $course_details->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Course Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('courses.update', $course_details->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Course Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" value="{{ $course_details->title }}"
                                    placeholder="Enter Course Title" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Area Covered<span class="text-danger">*</span></label>
                                <input type="text" name="area_covered" placeholder="Enter Course Area Covered"
                                    value="{{ $course_details->area_covered }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="row text-end">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-sm btn-dark add-course-field-edit">Add New
                                    Row</button>

                            </div>
                        </div>
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
                                            <input type="number" name="hours[]" value="{{ $hour }}"
                                                placeholder="Enter Course Hours" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Price<span class="text-danger">*</span></label>
                                            <input type="number" name="price[]" value="{{ $price[$index] }}"
                                                placeholder="Enter Course Hour Price" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-sm btn-danger remove-course-field-edit">Remove</button>
                                          </div>
                                    </div>
                                  
                                </div>
                            @endforeach
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Course Description</label>
                                <textarea class="summernote_blog_edit" name="description">{!! $course_details->description !!}</textarea>
                            </div>
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
