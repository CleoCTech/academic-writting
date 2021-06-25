<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="w-full h-full fixed block top-0 left-0 bg-white opacity-75 z-50">
        <span class="text-gray-800  opacity-75 top-1/2 my-0 mx-auto block relative w-full h-0" style="top: 50%;">
            <div class="p-3  text-center" x-data="{text: 'Please wait...', l: 4}" x-init="() =&gt; {setInterval(() =&gt; {l = (l + 1) % text.length}, 100)}">
                <div class="inline-block relative text-5xl text-blue-600">
                <div class="opacity-25" x-text="text"></div>
                <div class="absolute top-0 flex">
                    <div class="invisible flex flex-shrink-0">
                    <div x-text="text.slice(0, l)"></div>
                    <div x-show="text.slice(l-1, l) === ' '">&nbsp;</div>
                    </div>
                    <div x-text="text.slice(l, l+1)"></div>
                </div>
                </div>
            </div>
        </span>
    </div>
</div>
