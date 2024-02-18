<div class="modal fade" id="staticBackdrop{{ $blogCategory_details->id }}" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Quiz Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('blog-categories.update', $blogCategory_details->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">


                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Category Name<span class="text-danger">*</span></label>
                                <input type="text" name="title" value="{{ $blogCategory_details->name }}"
                                    placeholder="Enter Category Name" class="form-control" required>
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
