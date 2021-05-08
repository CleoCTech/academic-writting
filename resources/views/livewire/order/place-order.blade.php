<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <h4>Paper Details</h4>
    <form class="proposal-form">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Number of Pages</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Deadline</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Date</span>
                        </div>
                        <input type="date" class="form-control" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Select your Subject</label>
                    <select class="form-control">
                        <option>Select Category</option>
                        <option>Engineering</option>
                        <option>Music</option>
                        <option>Agriculture</option>
                        <option>Accounting</option>
                        <option>etc</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>What is your topic?</label>
                    <input type="text" class="form-control" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Paper Instructions</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
            </div>
        </div>

        <p>Add Files</p>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="uploadResume" />
                    <label class="custom-file-label" for="uploadResume"><i class="ti-link mr-1"></i>Drop File here or
                        Click to upload</label>
                </div>
            </div>
        </div>
        <hr>
        <div class="btn-group text-center" role="group" aria-label="Basic example" style='display: block;'>
            {{-- <button type="button" class="btn mr-2"><a class="btn btn-themex dark mr-2">Previous</a></button> --}}
            <button type="button" class="btn mr-2"><a class="btn btn-themex dark mr-2" wire:click='store'>Next</a></button>
        </div>
    </form>
</div>
