<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    
    <section>
        <div class="hero bg-purple-800 text-white py-20" style="margin-top: -5rem;">
            <div class="left-col container mx-auto flex flex-col md:flex-row my-6 md:my-15">
                <div class="flex flex-col w-full lg:w-1/3 p-8">
                    <p class=" text-yellow-300 text-lg uppercase tracking-loose">REVIEW</p>
                    <p class="text-3xl md:text-5xl my-4 leading-relaxed md:leading-snug">Hire Expert & Get Your Essay Done</p>
                    <p class="text-sm md:text-base leading-snug text-gray-50 text-opacity-100">
                        Please provide your valuable feedback and something something ...
                    </p>
                </div>
                <div class="quick-card flex flex-col w-full lg:w-2/3 justify-center">
                    <div class="container w-full px-4">
                        <div class="flex flex-wrap justify-end">
                            <div class="w-full lg:w-8/12 px-4">
                                <div
                                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white">
                                    <div class="flex-auto p-5 lg:p-10">
                                        <h4 class="text-2xl mb-4 text-black font-semibold">Start Here...</h4>

                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                                    for="email">Email</label><input  type="email" wire:model.defer='email' id="email" class="border-0 px-3 py-3 rounded text-sm shadow w-full
                                                    bg-gray-300 placeholder-black text-gray-800 outline-none focus:bg-gray-400" placeholder=" "
                                                    style="transition: all 0.15s ease 0s;" required />
                                                    @error('email') <p class="error" style="color:red">{{ $message }}</p> @enderror
                                            </div>
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                                    for="type">Type of paper</label>
                                                    <select wire:model.defer='categoryId' name="" id="" class="border-0 px-3 py-3 rounded text-sm shadow w-full
                                                    bg-gray-300 placeholder-black text-gray-800 outline-none focus:bg-gray-400" style="transition: all 0.15s ease 0s;" required>
                                                        @if (count($categories)>0)
                                                        <option disabled selected>Select Category</option>
                                                        @foreach ($categories  as $category)
                                                        <option value="{{$category->id}}">{{$category->subject}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                    @error('categoryId') <p class="error" style="color:red">{{ $message }}</p> @enderror
                                            </div>
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="pages">Pages</label>
                                                <div class="flex" >
                                                    <button class="text-base   rounded-r-none  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer
                                                        hover:bg-gray-400 hover:text-gray-900
                                                        bg-gray-300
                                                        text-gray-800
                                                        border duration-200 ease-in-out
                                                        border-teal-600 transition" onClick="decrement()">
                                                        <div class="flex leading-5"> -</div>
                                                    </button>
                                                    <input wire:model.defer='pages' type="text" class="text-base   rounded-r-none  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer
                                                        hover:bg-gray-400 hover:text-gray-100
                                                        bg-gray-100
                                                        text-gray-700
                                                        border duration-200 ease-in-out
                                                        border-teal-600 transition" style="width: 100px;" min="1" id="Nopages">

                                                    <button class="text-base   rounded-r-none  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer
                                                        hover:bg-gray-400 hover:text-gray-900
                                                        bg-gray-300
                                                        text-gray-800
                                                        border duration-200 ease-in-out
                                                        border-teal-600 transition" onClick="increment()">
                                                        <div class="flex leading-5">+</div>
                                                    </button>
                                                </div>
                                                <p id="pNo" class="text-danger hidden">Pages can only be a number</p>

                                            </div>
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                                    for="deadline">Deadline</label>
                                                    <div class="dates flex">
                                                    <input wire:model.defer='dDate' type="date" class="text-base   rounded-r-none  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer
                                                        hover:bg-gray-400 hover:text-gray-900
                                                        bg-gray-300
                                                        text-gray-800
                                                        border duration-200 ease-in-out
                                                        border-teal-600 transition" style="width: 180px">

                                                    <input wire:model.defer='dTime' type="time" class="text-base   rounded-r-none  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer
                                                        hover:bg-gray-400 hover:text-gray-900
                                                        bg-gray-300
                                                        text-gray-800
                                                        border duration-200 ease-in-out
                                                        border-teal-600 transition" style="width: 150px">

                                                    </div>
                                            </div>
                                            @error('dDate') <p class="error" style="color:red">{{ $message }}</p> @enderror
                                            @error('dTime') <p class="error" style="color:red">{{ $message }}</p> @enderror

                                            <div class="text-center mt-6 d-flex">
                                                <button id="feedbackBtn"
                                                 wire:click='store'
                                                 wire:loading.class.remove="bg-purple-900"
                                                 wire:loading.class="bg-gray-300"
                                                 class="bg-purple-900 text-white text-center  active:bg-purple-400 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                                                 style="transition: all 0.15s ease 0s;">Continue
                                                 <i class="fas fa-arrow-right"></i>
                                                </button>
                                            </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div wire:loading>
            @livewire('general.loader')
        </div>
    </section>
    <!-- ============================ Hero Banner End ================================== -->

    <style>
         /*responsiveness*/
        @media(max-width :800px){
            .quick-card {
                margin-left: -2rem;
                width: 120%;
                display: inline-flex;
                transform: scale(1.0);
            }
            .dates{
                display:block !important;
            }
            .hero{
                margin-top: -10rem !important;
            }
            .left-col{
                margin-top: -6rem;
            }
        }
    </style>
    <script>
        window.number = 1;
        window.pageNumber =  document.getElementById('pNo');
        window.onload = function() {
            var event = new Event('input');
            document.getElementById('Nopages').value = number;
            document.getElementById('Nopages').dispatchEvent(event);
        }
        var increment = function() {
            var event = new Event('input');
            document.getElementById('Nopages').value =  window.number++;
            document.getElementById('Nopages').dispatchEvent(event);
        }
        var decrement = function() {
            if (window.number == 1) {
                var event = new Event('input');
                window.number =1;
                document.getElementById('Nopages').value =  window.number;
                document.getElementById('Nopages').dispatchEvent(event);
            }else{
                document.getElementById('Nopages').value =  window.number--;
                document.getElementById('Nopages').dispatchEvent(event);
            }

        }

        document.getElementById("Nopages").addEventListener("input",pressHandler);

        let input =document.getElementById("Nopages");

        input.onchange = pressHandler;

        function pressHandler(e) {
            if (! Number.isInteger(this.value)) {
                document.getElementById('Nopages').value = number;
                window.pageNumber.classList.remove("hidden");
                setTimeout(function(){
                    window.pageNumber.classList.add("hidden");
                    },3000);
            }

            console.log(this.value);
        }
    </script>
</div>
