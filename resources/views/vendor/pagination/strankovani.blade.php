@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="disabled" aria-disabled="true">&laquo;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="text-blue-600 hover:text-blue-900">&laquo;</a>
        @endif

        {{-- Pagination Elements --}}
        <div class="flex items-center">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="disabled" aria-disabled="true">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="text-blue-600 font-bold px-2">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="text-blue-600 hover:text-blue-900">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="text-blue-600 hover:text-blue-900">&raquo;</a>
        @else
            <span class="disabled" aria-disabled="true">&raquo;</span>
        @endif
    </nav>
@endif
