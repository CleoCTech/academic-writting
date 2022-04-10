<div>
    {{-- Do your work, then step back. --}}
    <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
        <!--begin::Container-->
        <div class="container-fluid d-flex flex-column flex-md-row flex-stack">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted fw-bold me-2">© {{now()->year}}</span>
                <a href="{{ config('app.company.website') }}" target="_blank" class="text-gray-800 text-hover-primary">{{config('app.company.name')}}</a>
            </div>
            <!--end::Copyright-->
            <!--begin::Menu-->
            <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                <li class="menu-item">
                    <a href="#" target="_blank" class="menu-link px-2">About</a>
                </li>
                <li class="menu-item">
                    <a href="#" target="_blank" class="menu-link px-2">FAQ</a>
                </li>
                <li class="menu-item">
                    <a href="#" target="_blank" class="menu-link px-2">Terms</a>
                </li>
                <li class="menu-item">
                    <a href="{{config('app.developer.website')}}" target="_blank" class="menu-link underline hover:color-primary px-2">By {{config('app.developer.name')}}</a>
                </li>
            </ul>
            <!--end::Menu-->
        </div>
        <!--end::Container-->
    </div>
</div>
