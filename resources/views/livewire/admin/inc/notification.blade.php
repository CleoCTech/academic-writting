<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
    <div x-data="{ dropdownOpen: false }">
       <a @click="dropdownOpen = !dropdownOpen" class="px-4 py-2 mt-2 text-lg text-gray-900 bg-gray-200 rounded-lg sm:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-300"
            href="#">
            <span
                class="badge mb-3 bg-red-800 rounded-full px-2 py-1 text-center object-right-top text-white text-sm mr-1">{{ $counts }}</span>
            <i class="bi bi-bell-fill fs-3"></i>
        </a>

        <div x-cloak x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

        <div x-cloak x-show="dropdownOpen" class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20"
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
                                    href="#">{{ $item->order_no }}</span> . {{ $item->created_at->diffForHumans() }}
                        </p>
                    </a>
                    @elseif($item->title == "Access Client")
                    <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">

                        <p  class="text-gray-600 text-sm mx-2">
                            <span class="font-bold" href="#">Writer
                            <span class="font-bold text-blue-500">{{ $this->getWriter( $item->fromable_id ) }}</span>
                            with  <span class="font-bold text-blue-500"> {{ $item->order_no }}</span> asking permission to chat with the client
                            <span  x-data="{}" x-on:click="$dispatch('dlg-modal');$wire.giveAccess('{{ $item->fromable_id }}', {{ $item->id }})"
                            class="font-extrabold text-blue-500 hover:underline" href="#">Give Access</span> . {{ $item->created_at->diffForHumans() }}
                        </p>
                        <div x-data="{isDlgModal:false}" :class="{ 'block': isDlgModal, 'hidden': !isDlgModal }"
                                    class="hidden" x-on:dlg-modal.window="isDlgModal = !isDlgModal"
                                    @click.away="isDlgModal = false">

                            @include('livewire.general.global-modal')
                        </div>
                    </a>
                    @endif
                    @endforeach

                    @foreach ($generalNotifications as $item)
                        @if ($item->title == 'Bid Created')
                        <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                            <p  class="text-gray-600 text-sm mx-2">
                                <span class="font-bold" href="#">You have new bid for
                                <span class="font-bold text-blue-500"> {{ $item->description }}</span>
                                <span  x-on:click="$wire.markAsReadGeneral('{{ $item->id }}')"
                                class="font-extrabold text-blue-500 hover:underline" href="#">Mark As Read</span> . {{ $item->created_at->diffForHumans() }}
                            </p>
                        </a>
                        @endif
                        @if ($item->title == 'Order Created')
                        <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                            <p  class="text-gray-600 text-sm mx-2">
                                <span class="font-bold" href="#">You have new
                                <span class="font-bold text-blue-500"> {{ $item->description }}</span>
                                <span  x-on:click="$wire.goToNewOrder('{{ $item->description }}', '{{ $item->id }}')"
                                class="font-extrabold text-blue-500 hover:underline" href="#">Go To Order</span> . {{ $item->created_at->diffForHumans() }}
                            </p>
                        </a>
                        @endif
                        @if ($item->title == 'Invoice Confirmed')
                        <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                            <p  class="text-gray-600 text-sm mx-2">
                                <span class="font-bold" href="#">Invoice for
                                <span class="font-bold text-blue-500"> {{ $item->description }} </span>
                                <span class="font-bold"> was </span>
                                <span class="font-bold text-green-500 mr-1"> accepted </span>
                                <span  x-on:click="$wire.markAsReadGeneral('{{ $item->id }}')"
                                class="font-extrabold text-blue-500 hover:underline" href="#">Mark As Read</span> . {{ $item->created_at->diffForHumans() }}
                            </p>
                        </a>
                        @endif
                        @if ($item->title == 'Invoice Rejected')
                        <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                            <p  class="text-gray-600 text-sm mx-2">
                                <span class="font-bold" href="#">Invoice for
                                <span class="font-bold text-blue-500"> {{ $item->description }} </span>
                                <span class="font-bold"> was </span>
                                <span class="font-bold text-red-500 mr-1"> rejected </span>
                                <span  x-on:click="$wire.markAsReadGeneral('{{ $item->id }}')"
                                class="font-extrabold text-blue-500 hover:underline" href="#">Mark As Read</span> . {{ $item->created_at->diffForHumans() }}
                            </p>
                        </a>
                        @endif
                    @endforeach

                @elseif(session()->get('AuthWriter') != null)
                    @foreach ($notifications as $item)
                        @if ($item->title == "Access Granted")
                        <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                            <p  class="text-gray-600 text-sm mx-2">
                                <span class="font-bold" href="#">Access Granted. You can now chat with client of
                                <span class="font-bold text-blue-500"> {{ $item->order_no }}</span>
                                <span  x-on:click="$wire.markAsRead('{{ $item->id }}')"
                                class="font-extrabold text-blue-500 hover:underline" href="#">Mark As Read</span> . {{ $item->created_at->diffForHumans() }}
                            </p>
                        </a>
                        @elseif($item->title == "Access Denied")
                        <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                            <p  class="text-gray-600 text-sm mx-2">
                                <span class="font-bold" href="#">Your request to chat with client of
                                <span class="font-bold text-blue-500"> {{ $item->order_no }}</span> has been denied.
                                <span  x-on:click="$wire.markAsRead('{{ $item->id }}')"
                                class="font-extrabold text-blue-500 hover:underline" href="#">Mark As Read</span> . {{ $item->created_at->diffForHumans() }}
                            </p>
                        </a>
                        @elseif($item->title == "Order Award")
                        <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                            <p  class="text-gray-600 text-sm mx-2">
                                <span class="font-bold" href="#">Your have been awarded
                                <span class="font-bold text-blue-500"> {{ $item->order_no }}</span> with a bid of<span class="font-bold text-blue-500"> {{ $item->value }} per page</span>.
                                <span  x-on:click="$wire.markAsRead('{{ $item->id }}')"
                                class="font-extrabold text-blue-500 hover:underline" href="#">Mark As Read</span> . {{ $item->created_at->diffForHumans() }}
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
<style>
    [x-cloak] { display: none !important; }
</style>
<script>
    window.addEventListener('open-order-from-notification', event => {
        // window.livewire.emit('open-order-from-notification', event.detail.order_no);
        // window.livewire.emit('open_eye');
        // alert('Order No: ' + event.detail.order_no);
    })
</script>
