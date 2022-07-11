@if ($paginator->hasPages())
<nav class="blog-pagination justify-content-start d-flex">
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true">
            <a aria-hidden="true" class="page-link" aria-label="Previous"><span aria-hidden="true">
                    <span class="lnr lnr-chevron-left"></span>
                </span></a>
        </li>
        @else
        <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" class="page-link"><span>
                    <span class="lnr lnr-chevron-left"></span>
                </span></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="page-item disabled" aria-disabled="true">{{ $element }}</li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item"> <a href="{{ $url }}" class="page-link active">{{ $page }}</a></li>
        @else
        <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" class="page-link" aria-label="Next"><span>
                    <span class="lnr lnr-chevron-right"></span>
                </span></a></li>
        @else
        <li class="page-item disabled" aria-disabled="true">
            <a aria-hidden="true" class="page-link" aria-label="Next"><span aria-hidden="true">
                    <span class="lnr lnr-chevron-right"></span>
                </span></a>
        </li>
        @endif
    </ul>
</nav>
@endif