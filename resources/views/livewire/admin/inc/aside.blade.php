<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div id="kt_aside" class="aside aside-default bg-white aside-hoverable" data-kt-drawer="true"
                    data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
                    <!--begin::Brand-->
                    <div class="aside-logo flex-column-auto pt-9 pb-5" id="kt_aside_logo">
                        <!--begin::Logo-->
                        <a href="#">
                            <img alt="Logo" src="{{ asset('dash-assets/img/logo_full.svg')}}" class="max-h-50px logo-default" />
                            <img alt="Logo" src="{{ asset('dash-assets/img/logo_short.svg')}}" class="max-h-50px logo-minimize" />
                        </a>
                        <!--end::Logo-->
                    </div>
                    <!--end::Brand-->
                    <!--begin::Aside menu-->
                    <div class="aside-menu flex-column-fluid">
                        <!--begin::Aside Menu-->
                        <!--begin::Menu-->
                        <div class="menu menu-column menu-fit menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5 my-5 mt-lg-2 mb-lg-0"
                            id="kt_aside_menu" data-kt-menu="true">
                            <div class="menu-fit hover-scroll-y me-lg-n5 pe-lg-5" id="kt_aside_menu_wrapper"
                                data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_menu"
                                data-kt-scroll-offset="20px"
                                data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer">
                                <div class="menu-item">
                                    <div class="menu-content">
                                        <span class="fw-bold text-muted text-uppercase fs-7">Super Admin</span>
                                    </div>
                                </div>

                                <div class="menu-item">
                                    <a class="menu-link active" href="#">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/stockholm/Layout/Layout-arrange.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <i class="bi bi-grid"></i>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title">Dashboard</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="#">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/stockholm/Home/Library.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <i class="bi bi-journals"></i>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title">Jobs</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="users.html">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <i class="bi bi-people"></i>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title">Users</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="chat.html">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/stockholm/Files/File.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <i class="bi bi-chat-dots"></i>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title">Chat</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="invoices.html">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <i class="bi bi-receipt"></i>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title">Invoices</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="#">
                                        <span class="menu-icon">
                                            <!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <i class="bi bi-inboxes"></i>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="menu-title">Emails</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <div class="menu-content">
                                        <div class="separator mx-1 my-4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Aside menu-->
                    <!--begin::Footer-->
                    <div class="aside-footer flex-column-auto" id="kt_aside_footer"></div>
                    <!--end::Footer-->
                </div>
</div>
