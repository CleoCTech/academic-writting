<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
    <div x-data="{ dropdownOpen: false }">
       <a @click="dropdownOpen = !dropdownOpen" class="px-4 py-2 mt-2 text-lg text-gray-900 bg-gray-200 rounded-lg sm:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-300"
            href="#">
            <span
                class="badge mb-3 bg-red-800 rounded-full px-2 py-1 text-center object-right-top text-white text-sm mr-1">{{ $counts }}</span>
            <i class="bi bi-bell-fill fs-3"></i>
        </a>

        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

        <div x-show="dropdownOpen" class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20"
            style="width:25rem;">
            <div class="py-2">
                @if (session()->get('LoggedClient') != null)
                    @foreach ($notifications as $item)
                    @if ($item->title == "Sent Invoice")
                    <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">

                        <p class="text-gray-600 text-sm mx-2">
                            <span class="font-bold" href="#">Confirm Invoice of <span class="font-bold text-blue-500"
                                >${{ $item->value }}</span> </span> created on
                                <span x-on:click="$wire.gotToOrder('{{$item->order_no}}')" class="font-bold text-blue-500"
                                    href="#">{{ $item->order_no }}</span> . 2m
                        </p>
                    </a>
                    @endif
                    @endforeach
                @elseif(auth()->user() != null)
                    @foreach ($notifications as $item)
                    @if ($item->title == "Sent Invoice")
                    <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">

                        <p x-on:click="$wire.gotToOrder('{{$item->order_no}}', '{{ $item->id }}')" class="text-gray-600 text-sm mx-2">
                            <span class="font-bold" href="#">Invoice of <span class="font-bold text-blue-500"
                                >${{ $item->value }}</span> </span> was {{ $item->status }}
                                <span x-on:click="$wire.gotToOrder('{{$item->order_no}}', '{{ $item->id }}')" class="font-bold text-blue-500"
                                    href="#">{{ $item->order_no }}</span> . {{ $item->created_at->diffForHumans() }}</>
                        </p>
                    </a>
                    @endif
                    @endforeach
                @endif
            </div>
            <a href="#" class="block bg-gray-800 text-white text-center font-bold py-2">See all notifications</a>
        </div>
    </div>
</div>
<script>
    window.addEventListener('open-order-from-notification', event => {
        // window.livewire.emit('open-order-from-notification', event.detail.order_no);
        // window.livewire.emit('open_eye');
        // alert('Order No: ' + event.detail.order_no);
    })
</script>
