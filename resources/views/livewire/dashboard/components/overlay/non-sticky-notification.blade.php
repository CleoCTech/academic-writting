<div>
    {{-- The whole world belongs to you --}}
    <div x-cloak x-data="{ show: @entangle('showNotification') }" :aria-expanded="show ? 'true' : 'false'" :class="{ 'hidden': !show }" class="toastify on  toastify-right toastify-top" style="transform: translate(0px, 0px); top: 15px;">
        <div id="basic-non-sticky-notification-content" class="toastify-content  flex">
            <div class="font-medium">{{ $message }}</div> <a class="font-medium text-theme-1 dark:text-gray-500 mt-1 sm:mt-0 sm:ml-40" href="#"></a>
        </div>
        <span  @click="show = !show" class="toast-close">✖</span>
    </div>

    <style>
        [x-cloak] { display: none }
    </style>
</div>
