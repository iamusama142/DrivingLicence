<div id="edit_personal_details" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form action="{{ route('student.profile.edit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Your Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ auth()->user()->name }}" id="field-1" placeholder="John">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Profile Image</label>
                                <input type="file" class="form-control" name="image" id="field-1"
                                    placeholder="John">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="field-3" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone"
                                    @if ($userDetail->phone != null) value="{{ $userDetail->phone }}" @endif
                                    id="field-3" placeholder="+62-9182652-2716">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="field-3" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address"
                                    @if ($userDetail->address != null) value="{{ $userDetail->address }}" @endif
                                    id="field-3" placeholder="Address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="field-4" class="form-label">City</label>

                                <input type="text" class="form-control" name="city"
                                    @if ($userDetail->city != null) value="{{ $userDetail->city }}" @endif
                                    id="field-4" placeholder="Boston">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="field-6" class="form-label">State</label>

                                <input type="text" class="form-control" name="state"
                                    @if ($userDetail->state != null) value="{{ $userDetail->state }}" @endif
                                    id="field-6" placeholder="123456">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="field-5" class="form-label">Country</label>

                                <input type="text" class="form-control" name="country"
                                    @if ($userDetail->country != null) value="{{ $userDetail->country }}" @endif
                                    id="field-5" placeholder="United States">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                                <label for="field-7" class="form-label">About
                                    Info</label>
                                <textarea class="form-control" id="field-7" name="about" placeholder="Write something about yourself">
                                    @if ($userDetail->about != null)
{{ $userDetail->about }}
@endif
    
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Save
                        changes</button>
                </div>
            </div>
        </form>

    </div>
</div>
