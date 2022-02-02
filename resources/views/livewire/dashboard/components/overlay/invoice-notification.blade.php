<div>
    {{-- The whole world belongs to you --}}
    <div x-cloak x-data="{ show: @entangle('showNotification') }" :aria-expanded="show ? 'true' : 'false'" :class="{ 'hidden': show }" class="toastify on  toastify-right toastify-top" style="transform: translate(0px, 0px); top: 15px;">
        <div id="notification-with-buttons-below-content" class="toastify-content flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
            <div class="ml-4 mr-5 sm:mr-20">
                <div class="font-medium">Invoice</div>
                @if ($notification !=null)
                <div class="text-gray-600 mt-1">Confirm Invoice of ${{$notification->value}} per page for this task.</div>
                @endif
                <div class="mt-2.5">
                    <a  @click="show = !show" class="btn btn-primary py-1 px-2 mr-2" wire:click="confirmInvoice">Confirm</a>
                    <a  @click="show = !show" class="btn btn-outline-secondary py-1 px-2" wire:click="rejectInvoice">Reject</a>
                </div>
            </div>
        </div>
        <span  @click="show = !show" class="toast-close">✖</span>
    </div>

    <style>
        [x-cloak] { display: none }
    </style>
</div>
