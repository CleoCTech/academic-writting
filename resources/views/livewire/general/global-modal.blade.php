<div>
    <x-jet-dialog-modal :id="'xxxx'">
        <x-slot name="title">{{isset($pageTitle) ? $pageTitle:''}}</x-slot>
        <x-slot name="content">
            @if($modal == null)
            <div class="w-full">
                <div class="w-full flex align-items justify-center"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-90"
                >
                    <img src="/storage/general/loading-black.gif" class="max-w-16 max-h-16">
                </div>
            </div>
            @else
                @include($modal)

            @endif
        </x-slot>
        <x-slot name="footer">
        </x-slot>
    </x-jet-dialog-modal>

    <style>
        .duration-300 {
            transition-duration: 300ms;
        }

        .ease-in {
            transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
        }

        .ease-out {
            transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
        }

        .scale-90 {
            transform: scale(.9);
        }

        .scale-100 {
            transform: scale(1);
        }
    </style>
</div>
