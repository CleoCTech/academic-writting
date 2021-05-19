<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->

    <head>
        <meta charset="utf-8" />
        <title>Writer Craft | Essay Writing</title>
        <meta name="description" content="#1 Essay writing site" />
        <meta name="keywords" content="Essay, writing, blog, academic writing" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="img/favicon.ico" />

        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
        <!--end::Fonts-->

        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href="{{ asset('dash-assets/"plugins/leaflet/leaflet.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Page Vendor Stylesheets-->

        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="{{ asset('dash-assets/plugins/quill/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dash-assets/css/main.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <!--end::Global Stylesheets Bundle-->

        {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script> --}}
    </head>
    <!--end::Head-->

    <!--begin::Body-->

    <body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-fixed aside-default-enabled">
        <!--begin::Main-->
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
                <!--begin::Aside-->
                @livewire('admin.inc.aside')
                <!--end::Aside-->
                <!--begin::Wrapper-->
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    <!--begin::Header-->
                    @livewire('admin.inc.header')
                   
                    <!--end::Header-->
                    <!--begin::Content-->
                    <main>
                        {{ $slot }}
                    </main>
                    <!--end::Content-->
                    <!--begin::Footer-->
                    @livewire('admin.inc.footer')
                    <!--end::Footer-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Root-->
        @livewire('admin.inc.scroll-top')
        <!--end::Main-->
        <!-- begin:: Add Writers -->
        <div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-modal="true" role="dialog">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content rounded">
                    <!--begin::Modal header-->
                    <div class="modal-header pb-0 border-0 justify-content-between">
                        <h3 class="fw-boldest text-dark fs-1 mb-0 text-start">
                            Add New Writer
                        </h3>
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotone/Interface/Close-Square.svg-->
                            <span class="svg-icon svg-icon-2x">
                                <i class="bi bi-x-circle"></i>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--begin::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17" data-select2-id="select2-data-379-zk9h">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_new_address_header"
                            data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px"
                            style="max-height: 795px">
                            <!--begin::Input group-->
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-bold mb-2">First name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                        name="first-name" />
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--end::Label-->
                                    <label class="required fs-5 fw-bold mb-2">Last name</label>
                                    <!--end::Label-->
                                    <!--end::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                        name="last-name" />
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-5">
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-bold mb-2">Email</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                        name="email" />
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-bold mb-2">Phone Number</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                        name="phone" />
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="fs-5 fw-bold mb-2">Town</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-solid" placeholder="" name="city" />
                                <!--end::Input-->
                                <div class="fv-plugins-message-container"></div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row g-9 mb-5">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold mb-2">State / Province</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="" name="state" />
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold mb-2">Post Code</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="" name="postcode" />
                                    <!--end::Input-->
                                    <div class="fv-plugins-message-container"></div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-5">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Label-->
                                    <div class="me-5">
                                        <!--begin::Label-->
                                        <label class="fs-5 fw-bold">Use as a billing adderess?</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div class="fs-7 fw-bold text-gray-400">
                                            If you need more info, please check budget planning
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Label-->
                                    <!--begin::Switch-->
                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input" name="billing" type="checkbox" value="1"
                                            checked="checked" />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <span class="form-check-label fw-bold text-gray-400">Yes</span>
                                        <!--end::Label-->
                                    </label>
                                    <!--end::Switch-->
                                </div>
                                <!--begin::Wrapper-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_new_address_cancel" class="btn btn-white me-3">
                            Discard
                        </button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!-- end:: Add Writers -->

        @stack('modals')
        <!--begin::Javascript-->

        @livewireScripts



        <script src="{{ asset('js/app.js') }}" defer></script>
        <!--begin::Global Javascript Bundle(used by all pages)-->
        <script src="{{ asset('dash-assets/js/main.bundles.js') }}" ></script>
        <!--end::Global Javascript Bundle-->

        <!--begin::Page Vendors Javascript(used by this page)-->
        <script src="{{ asset('dash-assets/plugins/leaflet/leaflet.bundle.js') }}" ></script>
        <script src="{{ asset('dash-assets/plugins/quill/plugins.bundle.js') }}" ></script>
        <!--end::Page Vendors Javascript-->

        <!--begin::Page Custom Javascript(used by this page)-->
        <script src="{{ asset('dash-assets/js/custom/modals/create-app.js') }}" ></script>
        <script src="{{ asset('dash-assets/js/custom/modals/select-location.js') }}" ></script>
        <script src="{{ asset('dash-assets/js/custom/modals/create-project.bundle.js') }}" ></script>
        <script src="{{ asset('dash-assets/js/custom/modals/upgrade-plan.js') }}" ></script>
        <script src="{{ asset('dash-assets/js/custom/intro.js') }}" ></script>
        <script src="{{ asset('dash-assets/js/custom/widgets.js') }}" ></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
        <!--end::Page Custom Javascript-->

        <!--end::Javascript-->
    </body>
    <!--end::Body-->

</html>
