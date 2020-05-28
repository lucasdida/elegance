@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" style="background-color:#fff; color:#b1b0b0" aria-hidden="true">Anterior</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" style="background-color:#212121; color:#fff" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">Anterior</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link" style="background-color:#9a9898; border-color:#9a9898">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" style="background-color:#212121; color:#fff" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" style="background-color:#212121; color:#fff"  href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Próxima</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" style="background-color:#fff; color:#b1b0b0" aria-hidden="true">Próximo</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
