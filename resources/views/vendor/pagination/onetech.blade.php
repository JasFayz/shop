@if ($paginator->hasPages())
    <div class="shop_page_nav d-flex flex-row">
        @if ($paginator->onFirstPage())
            <div class="page_prev disabled d-flex flex-column align-items-center justify-content-center"><i
                    class="fas fa-chevron-left"></i></div>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
               class="page_prev cursor d-flex flex-column align-items-center justify-content-center"><i
                    class="fas fa-chevron-left"></i></a>
        @endif
        <ul class="page_nav d-flex flex-row">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li ><a href="#" class="disabled">1</a></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><span>{{ $page }}</span>
                            </li>
                        @else
                            <li><a  href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
               class="page_next cursor d-flex flex-column align-items-center justify-content-center"><i
                    class="fas fa-chevron-right"></i></a>
        @else
            <div class="page_next disabled d-flex flex-column align-items-center justify-content-center"><i
                    class="fas fa-chevron-right"></i></div>
        @endif
    </div>
@endif
