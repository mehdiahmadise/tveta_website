@if ($paginator->hasPages())
<ul>

{{-- Previous Page Link --}}
{{-- @if ($paginator->onFirstPage()) --}}
    <li>
        <a href="{{ $paginator->previousPageUrl() }}"><i class="ion-ios-arrow-left"></i></a>
    </li>
{{-- @endif --}}

{{-- Pagination Elements --}}
@foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
        <li class="is-active">
            {{ $element }}
        </li>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
        @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
                <li class="is-active"><a href="{{ $url }}">{{ $page }}</a></li>
            @else
                <li><a href="{{ $url }}">{{ $page }}</a></li>
            @endif
        @endforeach
    @endif
@endforeach

{{-- Next Page Link --}}
{{-- @if ($paginator->hasMorePages()) --}}
    <li>
        <a  href="{{ $paginator->nextPageUrl() }}"><i class="ion-ios-arrow-right"></i></a>
    </li>
{{-- @endif --}}
</ul>
@endif