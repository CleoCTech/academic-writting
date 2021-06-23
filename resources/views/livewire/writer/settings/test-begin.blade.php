<div>
    {{-- Stop trying to control. --}}
    <div class="py-12" wire:poll>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <span class="">
                            <p class="text-sm text-gray-700 font-semibold hover:text-gray-600" >
                                Topic
                            </p>
                            <p class="text-lg text-gray-700 font-bold hover:text-gray-600" >
                                Should teenagers work?
                            </p>
                            <p class="text-sm text-gray-700 font-semibold hover:text-gray-600" >
                                Requirements: 275-300 words, no-plagiarism, no specific formatting
                            </p>
                        </span>
                        <p class="text-blue-400 text-2xl">Timer</p>
                    </div>
                    <div class="text-right md:space-x-3 md:block flex flex-col-reverse">
                        <time class="text-blue-400 text-2xl">00:20:00</time>
                    </div>
                    <form method="POST" action="">
                        <div class="mb-4">


                        </div>

                        <div class="mb-8" wire:ignore> </br>
                            <textarea name="content" class="border-2 border-gray-500">

                            </textarea>
                        </div>

                        <div class="flex p-1 text-right md:space-x-3 md:block flex flex-col-reverse">
                            <button role="submit" class="p-3 btn btn-primary text-white " required>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace( 'content' );
    </script>
</div>
