<div>
<div wire:loading wire:target='pendingOrders, progress, completed, revisions'>
    @livewire('general.loader')
</div>

<nav wire:ignore class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Logo" src="{{ asset('dash-assets/img/logo_full.svg')}}" class="w-6 max-h-50px logo-default" />
        <img alt="Logo" src="{{ asset('dash-assets/img/logo_short.svg')}}" class="w-6 max-h-50px logo-minimize" />
        <span class="hidden xl:block text-white text-lg ml-3"> <span class="font-medium">{{ config('app.name') }}</span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{ route('dash-test') }}" class="side-menu side-menu--active">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title">
                    Dashboard
                    <div class="side-menu__sub-icon transform rotate-180"> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                <div class="side-menu__title">
                    Orders
                    <div class="side-menu__sub-icon "> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a wire:click='pendingOrders' href="#" class="side-menu md:no-underline md:hover:underline">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Pending Orders </div>
                    </a>
                </li>
                <li>
                    <a wire:click='progress' href="#" class="side-menu md:no-underline md:hover:underline">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Orders In Progress </div>
                    </a>
                </li>
                <li>
                    <a  wire:click='completed' href="#" class="side-menu md:no-underline md:hover:underline">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Completed Orders </div>
                    </a>
                </li>
                <li>
                    <a  wire:click='revisions' href="#" class="side-menu md:no-underline md:hover:underline">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Revisions </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('c-invoice') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Invoices </div>
            </a>
        </li>
        <li>
            <a href="{{ route('c-chat') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="message-square"></i> </div>
                <div class="side-menu__title"> Chat </div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>

    </ul>
</nav>
</div>

