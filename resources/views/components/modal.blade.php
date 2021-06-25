<div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
    <!--Overlay-->
    <div
        x-data = "{
            show: @entangle($attributes->wire('model'))
        }"
        class="overflow-auto absolute inset-0 z-10 flex items-center justify-center" x-show='show' >
    <!--Dialog-->
    <div  x-show='show' class="bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6"  x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90" x-cloak>
        
        {{$slot}}


    </div>
    <!--/Dialog -->
</div>

    <style>
        [x-cloak] {
            display: none;
        }
    </style>
</div>
