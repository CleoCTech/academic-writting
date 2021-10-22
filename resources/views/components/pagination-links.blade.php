@if ($paginator->hasPages())
<ul class="flex items-center my-6">
    @if ($paginator->onFirstPage())
    @else   
        <li dusk="previousPage"  wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="mx-1 px-3 py-2 bg-gray-200 text-gray-500 rounded-lg">
            <a class="flex items-center font-bold" href="#">
                <span class="mx-1">Previous</span>
            </a>
        </li>
    @endif
    
    @foreach ($elements as $element)
        @if (is_string($element))
            <li class="mx-1 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-gray-700 hover:text-gray-200 rounded-lg">
                <a class="font-bold" href="#">{{ $element }}</a>
            </li>   
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li wire:key="paginator-page-{{ $page }}" aria-current="page" class="mx-1 px-3 py-2 bg-gray-700 text-gray-200  rounded-lg">
                    <a class="font-bold" href="#">{{ $page }}</a>
                </li>
                @else 
                <li wire:click='gotoPage({{ $page }})' class="mx-1 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-gray-700 hover:text-gray-200 rounded-lg">
                    <a class="font-bold" href="#">{{ $page }}</a>
                </li>
                @endif
            @endforeach
        @endif
    
    @endforeach
    

    @if ($paginator->hasMorePages())
    <li wire:click="nextPage" wire:loading.attr="disabled" class="mx-1 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-gray-700 hover:text-gray-200 rounded-lg">
        <a class="flex items-center font-bold" href="#">
            <span class="mx-1">Next</span>
        </a>
    </li>
    @else
    @endif
    
</ul>
@endif