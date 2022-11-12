@if ($paginator->hasPages())


<ul class="pagination mb-0">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li class="page-item disabled"><a class="page-link" style="display: inherit" href="javascript:void(0)" aria-label="@lang('pagination.previous')"><i class="uil uil-angle-right-b"></i></a></li>
    @else
    <li class="page-item"><a class="page-link" style="display: inherit" href="{{ $paginator->previousPageUrl() }}" aria-label="@lang('pagination.previous')"><i class="uil uil-angle-right-b"></i></a></li>

    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <!-- <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>-->
    <li class="page-item"><a class="page-link" href="{{$url}}">{{ $element }}</a></li>

    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="page-item active"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
    @else

    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li class="page-item"><a class="page-link" style="display: inherit" href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')"><i class="uil uil-angle-left-b"></i></a></li>

    @else

    <li class="page-item disabled"><a class="page-link" style="display: inherit" href="javascript:void(0)" aria-label="@lang('pagination.next')"><i class="uil uil-angle-left-b"></i></a></li>

    @endif
</ul>
</nav>
@endif