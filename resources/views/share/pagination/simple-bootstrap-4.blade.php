<div class="d-flex flex-column flex-sm-row mt-4 d-print-none align-items-center justify-content-between">
    <input type="hidden" name="current_page" value="{{ $paginator->currentPage() }}" />

    <div class="flex-wrap form-group">
        @if ($paginator->total() > 0)
            <span class="ml-2">Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }}</span>
        @else
            <span class="ml-2">Showing 0 of {{ $paginator->total() }}</span>
        @endif
    </div>

    <div class="col-12 col-md-auto d-flex justify-content-center mt-1">
        @if ($paginator->hasPages())
            <nav>
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">@lang('pagination.previous')</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                        </li>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link">@lang('pagination.next')</span>
                        </li>
                    @endif
                </ul>
            </nav>
        @endif
    </div>
</div>
