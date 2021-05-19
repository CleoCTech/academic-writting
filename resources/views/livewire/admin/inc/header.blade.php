<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header"
        data-kt-sticky-offset="{default: '200px', lg: '300px'}">
        <!--begin::Container-->
        <div class="container-fluid d-flex align-items-stretch justify-content-between">
            <!--begin::Logo bar-->
            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                <!--begin::Logo-->
                <a href="#" class="d-lg-none">
                    <img alt="Logo" src="/dash-assets/img/logo_full.svg" class="mh-40px" />
                </a>
                <!--end::Logo-->
                <!--begin::Aside toggler-->
                <div class="btn btn-icon w-auto ps-0 btn-active-color-primary d-none d-lg-inline-flex me-2 me-lg-5"
                    data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                    data-kt-toggle-name="aside-minimize">
                    <!--begin::Svg Icon | path: icons/stockholm/Navigation/Arrow-to-left.svg-->
                    <span class="svg-icon svg-icon-2 rotate-180">
                        <i class="bi bi-arrow-bar-left"></i>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Aside toggler-->
            </div>
            <!--end::Logo bar-->
            <!--begin::Topbar-->
            <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                <!--begin::Search-->
                <div class="d-flex align-items-stretch">
                    <!--begin::Search-->
                    <div id="kt_header_search" class="d-flex align-items-center w-lg-400px"
                        data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter"
                        data-kt-search-layout="menu" data-kt-search-responsive="lg" data-kt-menu-trigger="auto"
                        data-kt-menu-permanent="true" data-kt-menu-placement="bottom-start" data-kt-menu-flip="bottom">
                        <!--begin::Tablet and mobile search toggle-->
                        <div data-kt-search-element="toggle" class="d-flex d-lg-none align-items-center">
                            <div class="btn btn-icon btn-active-light-primary">
                                <!--begin::Svg Icon | path: icons/stockholm/General/Search.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <i class="bi bi-search"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                        </div>
                        <!--end::Tablet and mobile search toggle-->
                        <!--begin::Form-->
                        <form data-kt-search-element="form"
                            class="d-none d-lg-block w-100 position-relative mb-5 mb-lg-0" autocomplete="off">
                            <!--begin::Hidden input(Added to disable form autocomplete)-->
                            <input type="hidden" />
                            <!--end::Hidden input-->
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/stockholm/General/Search.svg-->
                            <span
                                class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 translate-middle-y ms-0">
                                <i class="bi bi-search"></i>
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-flush ps-10" name="search" value=""
                                placeholder="Search..." data-kt-search-element="input" />
                            <!--end::Input-->
                            <!--begin::Spinner-->
                            <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-1"
                                data-kt-search-element="spinner">
                                <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
                            </span>
                            <!--end::Spinner-->
                            <!--begin::Reset-->
                            <span
                                class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none"
                                data-kt-search-element="clear">
                                <!--begin::Svg Icon | path: icons/stockholm/Navigation/Close.svg-->
                                <span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
                                    <i class="bi bi-x"></i>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Reset-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Search-->
                </div>
                <!--end::Search-->
                <!--begin::Toolbar wrapper-->
                <div class="d-flex align-items-stretch flex-shrink-0">
                    <!--begin::Notifications-->
                    <div class="d-flex align-items-center ms-1 ms-lg-3">
                        <!--begin::Menu-->
                        <div class="btn btn-icon btn-active-light-primary position-relative w-40px h-40px"
                            data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                            data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                            <!--begin::Svg Icon | path: icons/stockholm/Communication/Group-chat.svg-->
                            <span class="svg-icon svg-icon-1">
                                <i class="bi bi-app-indicator"></i>
                            </span>
                            <!--end::Svg Icon-->
                            <span
                                class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50"></span>
                        </div>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column w-350px" data-kt-menu="true"></div>
                        <!--end::Menu-->
                        <!--end::Menu-->
                    </div>
                    <!--end::Notifications-->

                    <!--begin::User-->
                    @if (Auth::user()!=null)
                    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                        <!--begin::Menu-->
                        <div class="cursor-pointer symbol symbol-40px" data-kt-menu-trigger="click"
                            data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                            <img alt="Pic" src="/dash-assets/img/avatar.jpg" />
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>

                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column w-300px" data-kt-menu="true">
                            <!--begin::Heading-->
                            <div class="menu-content fw-bold d-flex align-items-center bgi-no-repeat rounded-top"
                                style="background-image: url('/dash-assets/img/pattern-2.jpg')">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-40px mx-5 py-5">
                                    {{-- <img alt="Logo" src="img/avatar.jpg" /> --}}
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Info-->
                                <div>
                                    <span class="text-white fw-bolder fs-4">Hello, {{ Auth::user()->name }}</span>
                                    <a href="#" class="link-white fw-bold fs-6 d-block opacity-75 opacity-100-hover">
                                        {{ Auth::user()->email }}</a>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Row-->
                            <div class="row row-cols-2 g-0">
                                <!--begin::Col-->
                                <a href="{{ route('profile.show') }}"
                                    class="border-bottom border-end text-center py-10 btn btn-text-dark btn-icon-gray-400 btn-active-color-primary rounded-0">
                                    <!--begin::Svg Icon | path: icons/stockholm/Layout/Layout-4-blocks-2.svg-->
                                    <span class="svg-icon svg-icon-3x me-0">
                                        <i class="bi bi-grid"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="fw-bolder fs-6 d-block pt-3">My Profile</span>
                                </a>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <a href="#"
                                    class="col border-bottom text-center py-10 btn btn-text-dark btn-icon-gray-400 btn-active-color-primary rounded-0">
                                    <!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
                                    <span class="svg-icon svg-icon-3x me-0">
                                        <i class="bi bi-sliders"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="fw-bolder fs-6 d-block pt-3">Settings</span>
                                </a>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col text-center border-end py-10 btn btn-text-dark btn-icon-gray-400 btn-active-color-primary rounded-0"
                                    data-kt-menu-trigger="hover" data-kt-menu-placement="left-start"
                                    data-kt-menu-flip="center, top">
                                    <!--begin::Svg Icon | path: icons/stockholm/Shopping/Euro.svg-->
                                    <span class="svg-icon svg-icon-3x me-0">
                                        <i class="bi bi-cash"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="fw-bolder fs-6 d-block pt-3">Subscriptions...</span>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                       this.closest('form').submit();"
                                        class="col text-center py-10 btn btn-text-dark btn-icon-gray-400 btn-active-color-primary rounded-0">
                                        <!--begin::Svg Icon | path: icons/stockholm/Navigation/Sign-out.svg-->
                                        <span class="svg-icon svg-icon-3x me-0">
                                            <i class="bi bi-box-arrow-right"></i>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <span class="fw-bolder fs-6 d-block pt-3">Sign Out</span>
                                    </a>
                                </form>

                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Menu-->
                        <!--end::Menu-->
                    </div>
                    @elseif(session()->get('LoggedClient') !=null)
                    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                        <!--begin::Menu-->
                        <div class="cursor-pointer symbol symbol-40px" data-kt-menu-trigger="click"
                            data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                            <img alt="Pic" src="/dash-assets/img/avatar.jpg" />
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>

                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column w-300px" data-kt-menu="true">
                            <!--begin::Heading-->
                            <div class="menu-content fw-bold d-flex align-items-center bgi-no-repeat rounded-top"
                                style="background-image: url('/dash-assets/img/pattern-2.jpg')">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-40px mx-5 py-5">
                                    {{-- <img alt="Logo" src="img/avatar.jpg" /> --}}
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="/dash-assets/img/avatar.jpg" alt="Avatar" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Info-->
                                <div>
                                    <span class="text-white fw-bolder fs-4">Hello, {{$client->username}}</span>
                                    <a href="#" class="link-white fw-bold fs-6 d-block opacity-75 opacity-100-hover">
                                        {{$client->email}}</a>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Row-->
                            <div class="row row-cols-2 g-0">
                                <!--begin::Col-->
                                <a href="{{ route('profile.show') }}"
                                    class="border-bottom border-end text-center py-10 btn btn-text-dark btn-icon-gray-400 btn-active-color-primary rounded-0">
                                    <!--begin::Svg Icon | path: icons/stockholm/Layout/Layout-4-blocks-2.svg-->
                                    <span class="svg-icon svg-icon-3x me-0">
                                        <i class="bi bi-grid"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="fw-bolder fs-6 d-block pt-3">My Profile</span>
                                </a>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <a href="#"
                                    class="col border-bottom text-center py-10 btn btn-text-dark btn-icon-gray-400 btn-active-color-primary rounded-0">
                                    <!--begin::Svg Icon | path: icons/duotone/Interface/Settings-02.svg-->
                                    <span class="svg-icon svg-icon-3x me-0">
                                        <i class="bi bi-sliders"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="fw-bolder fs-6 d-block pt-3">Settings</span>
                                </a>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col text-center border-end py-10 btn btn-text-dark btn-icon-gray-400 btn-active-color-primary rounded-0"
                                    data-kt-menu-trigger="hover" data-kt-menu-placement="left-start"
                                    data-kt-menu-flip="center, top">
                                    <!--begin::Svg Icon | path: icons/stockholm/Shopping/Euro.svg-->
                                    <span class="svg-icon svg-icon-3x me-0">
                                        <i class="bi bi-cash"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="fw-bolder fs-6 d-block pt-3">Subscriptions...</span>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <!-- Authentication -->

                                    <a href="{{ route('client-logout') }}"
                                        class="col text-center py-10 btn btn-text-dark btn-icon-gray-400 btn-active-color-primary rounded-0">
                                        <!--begin::Svg Icon | path: icons/stockholm/Navigation/Sign-out.svg-->
                                        <span class="svg-icon svg-icon-3x me-0">
                                            <i class="bi bi-box-arrow-right"></i>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <span class="fw-bolder fs-6 d-block pt-3">Sign Out</span>
                                    </a>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Menu-->
                        <!--end::Menu-->
                    </div>
                    {{-- <a href="{{route('login')}}" rel="noopener noreferrer" class="mt-5">
                        <x-jet-button>Login</x-jet-button>
                    </a> --}}

                    @endif

                    <!--end::User -->
                    <!--begin::Aside Toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-1 ms-lg-3">
                        <div class="btn btn-icon btn-active-light-primary w-40px h-40px" id="kt_aside_toggle">
                            <!--begin::Svg Icon | path: icons/stockholm/Text/Menu.svg-->
                            <span class="svg-icon svg-icon-2x">
                                <i class="bi bi-text-left"></i>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <!--end::Aside Toggle-->
                </div>
                <!--end::Toolbar wrapper-->
            </div>
            <!--end::Topbar-->
        </div>
        {{-- @if(Auth::user()!=null )
    @livewire('navigation-menu')
    @endif --}}
        <!--end::Container-->
    </div>
</div>
