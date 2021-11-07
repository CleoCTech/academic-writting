<div>
    {{-- The whole world belongs to you --}}
    <div class="px-2" x-data="{ dropdownOpen: false }">
        <a @click="dropdownOpen = !dropdownOpen"
            class="px-4 py-2 mt-2 text-lg text-gray-900 bg-gray-200 rounded-lg sm:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-300"
            href="#">
            @if ($count > 0)
            <span
                class="badge mb-3 bg-red-800 rounded-full px-2 py-1 text-center object-right-top text-white text-sm mr-1">{{
                $count }}</span>
            @endif
            Messages <i class="bi bi-chat-dots-fill fs-4"></i>
        </a>

        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

        <div x-show="dropdownOpen" class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20"
            style="width:25rem;">
            <div class="py-2">
                @foreach ($receivedMsgs as $item)
                <a wire:click='chatbox("{{ $item->fromable_type }}", "{{ $this->getId($item->fromable_id,
                    $item->fromable_type) }}")' href="#"
                    class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                    <img class="h-8 w-8 rounded-full object-cover mx-1"
                        src="{{ Avatar::create('Avatar')->toBase64() }}"
                        alt="avatar">
                    <p class="text-gray-600 text-sm mx-2">
                        <span class="font-bold" href="#">{{ $this->getUsername($item->fromable_id, $item->fromable_type)
                            }}</span>
                        {{ strlen($item->message) >30? substr($item->message, 0, 30).'...':$item->message }} . {{ $item->created_at->diffForHumans() }}
                    </p>
                    {{--  <span class="badge mb-3 bg-red-800 rounded-full px-2 py-1 text-center object-right-top text-white text-sm mr-1"> 1</span>  --}}
                </a>
                @endforeach
            </div>
            <a href="#" class="block bg-gray-800 text-white text-center font-bold py-2">See all messages</a>
        </div>
    </div>
</div>
