<div>
    {{-- Stop trying to control. --}}
    <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <span class="">
                            <p class="text-sm text-gray-700 font-semibold hover:text-gray-600" >
                                Topic
                            </p>
                            <p class="text-lg text-gray-700 font-bold hover:text-gray-600" >
                                {{$question}}
                            </p>
                            <p class="text-sm text-gray-700 font-semibold hover:text-gray-600" >
                                {{$instructions}}
                            </p>
                        </span>
                        <p class="text-blue-400 text-2xl">Timer</p>
                    </div>
                    <div class="text-right md:space-x-3 md:block flex flex-col-reverse">
                        <time id="countdown" class="text-blue-400 text-2xl"></time>
                    </div>

                        <div class="mb-6"></div>

                        <div class="mb-8" wire:ignore> </br>
                            <textarea name="content" class="border-2 border-gray-500"  wire:model.debounce.9999999ms="content"></textarea>

                        </div>
                        @error('paper') <span class="error" style="color:red">{{ $message }}</span> @enderror
                        <div class="flex p-1 text-right md:space-x-3 md:block flex flex-col-reverse">
                            <button id="send" wire:click='store' type="button" class="p-3 btn btn-primary text-white">Submit</button>
                        </div>
                </div>
            </div>
        </div>
        <div wire:loading wire:target="store">
            @livewire('general.please-wait')
        </div>
    </div>

    <script>

        CKEDITOR.replace('content').on('change', function(e){
            @this.set('content', e.editor.getData());
        });

        const startingMinutes = 1;
        let time = startingMinutes * 60;

        const countdownEl = document.getElementById('countdown');

        setInterval(() => {
            const minutes = Math.floor(time / 60);
            let seconds  = time % 60;

            seconds = seconds < 10 ? '0' + seconds : seconds;

            countdownEl.innerHTML = `${minutes}:${seconds}`;
            time--;

            if (time == 0) {
                // document.getElementById("myForm").submit();
                let link = document.getElementById('send');
                link.click();
                time = 0;
            }
        }, 1000);


    </script>
</div>
