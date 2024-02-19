<div class="modal fade" id="edit-modal-gallery{{$gallery_details->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Gallery Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('student-gallery.update', $gallery_details->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Ttile<span class="text-danger">*</span></label>
                                <input type="text" name="title" value="{{$gallery_details->name}}" placeholder="Enter Course Title"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Image<span class="text-danger">*</span></label>
                                <input type="file" name="image" placeholder="Enter Course Title"
                                    class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Data</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
