<div class="modal fade" id="add-modal-course" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
 
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Course Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" placeholder="Enter Course Title"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Area Covered<span class="text-danger">*</span></label>
                                <input type="text" name="area_covered"
                                    placeholder="Enter Course Area Covered" class="form-control" required>
                            </div>
                        </div>
                        <div class="row text-end">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-sm btn-dark add-course-field-btn">Add New
                                    Row</button>

                            </div>
                        </div>
                        <div class="container container-field">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hours<span class="text-danger">*</span></label>
                                        <input type="number" name="hours[]" placeholder="Enter Course Hours"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price<span class="text-danger">*</span></label>
                                        <input type="number" name="price[]"
                                            placeholder="Enter Course Hour Price" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Course Description</label>
                                <textarea id="summernote_blog" name="description"></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Course</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
