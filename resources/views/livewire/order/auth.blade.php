<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item waves-effect waves-light">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#NewUser" role="tab" aria-controls="New" aria-selected="true" wire:click='option1'>New User</a>
        </li>
        <li class="nav-item waves-effect waves-light">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#existingUser" role="tab" aria-controls="Existing" aria-selected="false" wire:click='option2'>Existing User</a>
        </li>
    </ul>
    <br>
    <div class="tab-content" id="myTabContent">
        @if ($option1)
        <div class="row">
            <div>
                @if (session()->has('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
                @endif
            </div>
            <section class="gray-light min-sec">
                <div class="container">
                    <div class="row form-submit">
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <!-- row -->
                            <div class="row m-0">
                                <div class="billing_page mb-4">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <h3>Personal Details</h3>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Full Name<i class="req">*</i></label>
                                                <input type="text" class="form-control with-light" wire:model.defer='full_name'/>
                                                @error('full_name') <span class="error" style="color:red">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Email<i class="req">*</i></label>
                                                <input type="email" class="form-control with-light" wire:model.defer='email' />
                                                @error('email') <span class="error" style="color:red">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Password<i class="req">*</i></label>
                                                <div class="input-group">
                                                    <input type="password" id="password" class="form-control with-light" wire:model.defer="password" />
                                                    @error('password') <span class="error" style="color:red">{{ $message }}</span> @enderror
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary custom-btn" type="button"  onclick="showPass(this)"> Show</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label>Confirm Password<i class="req">*</i></label>
                                                <div class="input-group">
                                                    <input type="password" id="confirm_password" class="form-control with-light" wire:model.defer='confirm_password' />
                                                    @error('confirm_password') <span class="error" style="color:red">{{ $message }}</span> @enderror
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary custom-btn" type="button"  onclick="showConfirmPass(this)"> Show</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input id="a-2" class="checkbox-custom" name="a-2" type="checkbox" />
                                                <label for="a-2" class="checkbox-custom-label">Create An Account</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row -->
                        </div>

                        <!-- Col-lg 4 -->
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="product-wrap">
                                        <h5>Summary</h5>
                                        <ul>
                                            <li><strong>Total</strong>$319</li>
                                            <li><strong>Subtotal</strong>$319</li>
                                            <li><strong>Tax</strong>$10</li>
                                            <li><strong>Total</strong>$329</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /col-lg-4 -->
                    </div>
                </div>
            </section>
        </div>
        @endif
        @if ($option2)
        <div class="row">
            <div>
                @if (session()->has('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
                @endif
            </div>
            <section class="gray-light min-sec">
                <div class="container">
                    <div class="row form-submit">
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <!-- row -->
                            <div class="row m-0">
                                <div class="billing_page mb-4">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <h3>Login</h3>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Email<i class="req">*</i></label>
                                                <input type="email" class="form-control with-light" wire:model.defer='auth_email'/>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group" >
                                                <label>Password<i class="req">*</i></label>
                                                <div class="input-group">
                                                    <input type="password" id="auth_pass" class="form-control with-light" wire:model.defer='auth_pass' />
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary custom-btn" type="button"  onclick="showAuthPass(this)"> Show</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row -->
                        </div>

                        <!-- Col-lg 4 -->
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="product-wrap">
                                        <h5>Summary</h5>
                                        <ul>
                                            <li><strong>Total</strong>$319</li>
                                            <li><strong>Subtotal</strong>$319</li>
                                            <li><strong>Tax</strong>$10</li>
                                            <li><strong>Total</strong>$329</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /col-lg-4 -->
                    </div>
                </div>
            </section>
        </div>
        @endif

    </div>
    <div class="btn-group text-center" role="group" aria-label="Basic example" style='display: block;'>
        <button type="button" class="btn mr-2"><a class="btn btn-themex dark mr-2"
                wire:click='previousStep'>Previous</a></button>
        <button type="button" class="btn mr-2"><a class="btn btn-themex dark mr-2"
                wire:click='store'>Submit</a></button>
    </div>
</div>
<style scoped>
    .custom-checkbox {
        margin-top: 3rem !important;
        margin-left: -8.25rem !important;
    }

    .custom-a {
        text-decoration: underline !important;
    }

    .custom-a:hover {
        color: #013da5 !important;
        font-weight: bold !important;
    }

    .custom-label {
        margin-top: 0.5rem !important;
        margin-left: 1rem !important;
    }

    .custom-btn {
        /* color: black !important;
        background-color: #eaecf3 !important; */
        /* height: 50px !important; */
        line-height: 50px !important;
        padding: 0px 5px 0px 5px !important;
    }

    .custom-btn:hover {
        /* color: #fff !important;
        background-color: #013da5 !important; */
        /* height: 50px !important; */
        line-height: 50px !important;
        padding: 0px 5px 0px 5px !important;
    }
</style>
<script>
    function showAuthPass(element) {
        var x = document.getElementById("auth_pass");
        if (x.type === "password") {
            element.innerHTML= 'Hide';
            x.type = "text";
        } else {
            element.innerHTML= 'Show';
            x.type = "password";
        }
    }
    function showPass(element) {
        var x = document.getElementById("password");
        if (x.type === "password") {
            element.innerHTML= 'Hide';
            x.type = "text";
        } else {
            element.innerHTML= 'Show';
            x.type = "password";
        }
    }
    function showConfirmPass(element) {
        var x = document.getElementById("confirm_password");
        if (x.type === "password") {
            element.innerHTML= 'Hide';
            x.type = "text";
        } else {
            element.innerHTML= 'Show';
            x.type = "password";
        }
    }
</script>
