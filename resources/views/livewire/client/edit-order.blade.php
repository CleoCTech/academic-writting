<div>
    {{-- The Master doesn't talk, he acts. --}}

<div  class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">  
     <!--begin::Toolbar-->
     <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">
                    Paper Details
                    <small class="text-muted fs-6 fw-normal ms-1"></small>
                </h1>

                <!--end::Title-->
            </div>
            <!--end::Info-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center flex-nowrap text-nowrap py-1">
                <a class="btn btn-primary" id="kt_toolbar_primary_button" wire:click='back'><span
                        class="svg-icon svg-icon-2 rotate-180"> <i class="bi bi-arrow-bar-left"></i> </span>Back</a>
            </div>
            <!--end::Actions-->
        </div>
    </div>
    <div>
        @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @elseif(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <div class="container">
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
                                <input type="number" class="form-control" wire:model.defer="pages" value=''/>@error('pages') <span
                                    class="error" style="color:red">{{ $message }}</span> @enderror
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
                                <input type="date" class="form-control" wire:model.defer='deadline_date' />@error('deadline_date')
                                <span class="error" style="color:red">{{ $message }}</span> @enderror
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
                                <input type="time" class="form-control" wire:model.defer='deadline_time' />@error('deadline_time')
                                <span class="error" style="color:red">{{ $message }}</span> @enderror
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
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->subject}}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="error" style="color:red">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>What is your topic?</label>
                            <input type="text" class="form-control" wire:model.defer="topic" />@error('topic') <span class="error"
                                style="color:red">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            {{-- <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script> --}}
                            <label>Paper Instructions</label>
                            <textarea class="form-control" rows="3" id="body"
                                wire:model.defer="instructions"></textarea>@error('instructions') <span class="error"
                                style="color:red">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @foreach ($clientFiles as $clientFile)
                {{-- @php
                    $path = $clientFile->folder.'/'.$clientFile->filename;
                    // getDownload( {{$clientFile->folder'/'$clientFile->filename}} )
                // dd($path);
                @endphp --}}
                <div class="row">
                    
                    <div class="col-md-4">
                        <a class="text-gray-600 text-hover-primary fw-bold fs-6 mb-3 ">{{$clientFile->filename}} 
                            <span>
                                <a  wire:click="dropFile('{{$clientFile->folder}}')"
                                    type="button" class="btn-floating btn-small "> <span
                                        class="svg-icon svg-icon-3">
                                        <a href="#" wire:click="dropFile('{{$clientFile->folder}}', '{{$clientFile->filename}}')" class="text-gray-600 text-hover-danger fw-bold fs-6 mb-3" ><i class="bi bi-x-circle"></i></a>
                                        
                                </span></a>
                            </span>
                        </a>
                    </div>
                </div>
                @endforeach
                <p>Add Files</p>
                <div class="row">
            
                    
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <input type="file" name="paperFile" id="test" multiple>
                        {{-- <div class="custom-file">
                                <input type="file" name="paperFile" class="custom-file-input" id="uploadfiles" />
                            </div> --}}
                    </div>
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
                </div>
                <hr>
                <br>
                <div class="btn-group text-center" role="group" aria-label="Basic example" style='display: block;'>
                    <a class="btn btn-primary" id="kt_toolbar_primary_button" wire:click='store'><span
                        class="svg-icon svg-icon-2 rotate-180"> </span>Submit <i class="bi bi-arrow-bar-right"></i></a>
            
                </div>
            </fieldset>
        </div>
    </div>
    
</div>
</div>
<style>
   

    .btn-floating i:hover{
       color: #84a8f0;
       size: 2rem;
        /* color: #fff; */
    }

</style>
