@if ($paginator->hasPages())
    
        <div class="paginacion">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <!-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li> -->
                <button disabled  aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <i class='fas fa-chevron-left'></i>
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"> 
                    <button>
                        <i class='fas fa-chevron-left'></i>  
                    </button>
                </a>
             
            @endif
            <div class="paginas">
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <!-- <li class="active" aria-current="page"><span>{{ $page }}</span></li> -->
                                <button class="pagina-actual">{{ $page }}</button>
                            @else
                                <!-- <li><a href="{{ $url }}">{{ $page }}</a></li> -->
                                <a href="{{ $url }}">
                                    <button>{{ $page }}</button>
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())   
                <!-- <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a> -->
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    <button class="ant-sig">
                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                    </button>
                </a>      
            @else
                <!-- <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li> -->
                <button disabled class="ant-sig">
                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                    </button>
            @endif
        </div>
@endif
