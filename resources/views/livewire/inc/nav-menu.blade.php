<div>
    <div wire:loading>
        @livewire('general.loader')
    </div>
    <!-- Start Navigation -->
    <div class="header header-transparent dark-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <nav id="navigation" class="navigation navigation-landscape">
                        <div class="nav-header">
                            <a class="nav-brand" href="{{ route('home') }}">
                                <img src="assets/img/logo.png" class="logo" alt="" />
                            </a>
                            <div class="nav-toggle"></div>
                        </div>
                        <div class="nav-menus-wrapper">
                            <ul class="nav-menu">
                                <li class="active"><a href="#">How it works</a></li>
                                <li class="active"><a href="#">Blog</a></li>
                                <li class="active"><a href="#">About Us</a></li>
                                <li class="active"><a href="#">Contact Us</a></li>
                            </ul>

                            <ul class="nav-menu nav-menu-social align-to-right">
                                @if (session()->get('LoggedClient') != null)
                                <li class="add-listing dark-bg">
                                    <a href="{{route('dashboard')}}" >
                                        <i class="ti-user mr-1"></i> Dashboard
                                    </a>
                                </li>
                                <li class="order add-listing dark-bg">
                                    <a href="{{route('create-order')}}" >
                                        <i class="ti-user mr-1"></i> Order Now
                                    </a>
                                </li>
                                @elseif(session()->get('AuthWriter') != null)
                                <li class="add-listing dark-bg">
                                    <a href="{{route('writer-dashboard')}}" >
                                        <i class="ti-user mr-1"></i> Dashboard
                                    </a>
                                </li>
                                <li class="order add-listing dark-bg">
                                    <a href="{{route('create-order')}}" >
                                        <i class="ti-user mr-1"></i> Order Now
                                    </a>
                                </li>
                                @elseif(auth()->user() != null)
                                @if (session()->has('InactiveAccount'))
                                    @if (session()->get('InactiveAccount'))
                                    <li class="add-listing dark-bg">
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                                <i class="ti-user mr-1"></i> Logout
                                            </a>
                                        </form>
                                    </li>
                                    @else
                                    <li class="add-listing dark-bg">
                                        <a href="{{route('admin-dashboard')}}" >
                                            <i class="ti-user mr-1"></i> Dashboard
                                        </a>
                                    </li>
                                    @endif
                                @else

                                @endif

                                @else
                                <li>
                                    <a href="{{route('writer-login')}}" style="color: black !important;">
                                        <i class="fa fa-upload mr-1"></i>For Writers
                                    </a>
                                </li>
                                <li class="add-listing dark-bg">
                                    <a href="{{route('dashboard')}}" >
                                        <i class="ti-user mr-1"></i> Sign in
                                    </a>
                                </li>
                                <li class="order add-listing dark-bg">
                                    <a href="{{route('create-order')}}" >
                                        <i class="ti-user mr-1"></i> Order Now
                                    </a>
                                </li>
                                @endif

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Navigation -->
    <style>
        @media(max-width :800px){
            .order{
                margin-top: 1rem;
            }
            .add-listing:hover a{
                color:white !important;
            }
        }
    </style>
</div>
