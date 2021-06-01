<div>

    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <h4>Paper Details</h4>
    <fieldset class="proposal-form">
        <div>
            @if (session()->has('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Number of Pages</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="number" class="form-control" wire:model.defer="pages"/>@error('pages') <span class="error" style="color:red">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Deadline</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Date</span>
                        </div>
                        <input type="date" class="form-control" wire:model.defer='deadline_date'/>@error('deadline_date') <span class="error" style="color:red">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Time</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Time</span>
                        </div>
                        <input type="time" class="form-control" wire:model.defer='deadline_time'/>@error('deadline_time') <span class="error" style="color:red">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Select your Subject</label>
                    <select class="form-control" wire:model.defer="category_id">
                        <option disabled selected>Select Category</option>
                        @foreach ($categories  as $category)
                        <option value="{{$category->id}}">{{$category->subject}}</option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="error" style="color:red">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <label>What is your topic?</label>
                    <input type="text" class="form-control" wire:model.defer="topic"/>@error('topic') <span class="error" style="color:red">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script> --}}
                    <label>Paper Instructions</label>
                    <textarea class="form-control" rows="3" id="body" wire:model.defer="instructions"></textarea>@error('instructions') <span class="error" style="color:red">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <p>Add Files</p>
        <div wire:ignore class="row">

            <div class="col-lg-6 col-md-12 col-sm-12">
                <input type="file" name="paperFile"  id="test" multiple>
                {{-- <div class="custom-file">
                    <input type="file" name="paperFile" class="custom-file-input" id="uploadfiles" />
                </div> --}}
            </div>
        </div>
        <hr>
        <div class="btn-group text-center" role="group" aria-label="Basic example" style='display: block;'>
            {{-- <button type="button" class="btn mr-2"><a class="btn btn-themex dark mr-2">Previous</a></button> --}}
            @guest
                <button type="button" class="btn mr-2"><a class="btn btn-themex dark mr-2" wire:click='store'>Next</a></button>

            @endguest
            @auth
                <button type="button" class="btn mr-2"><a class="btn btn-themex dark mr-2" wire:click='store'>Submit</a></button>
            @endauth

        </div>
</fieldset>
</div>



@section('scripts')
<script type="text/javascript">
    const inputElement = document.querySelector('input[id="test"]');
    const pond = FilePond.create( inputElement );
    FilePond.setOptions({
        server:{
            url: '/upload',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }
    });
</script>
@endsection
