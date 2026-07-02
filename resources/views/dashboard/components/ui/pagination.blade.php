@if (isset($paginator) && $paginator->hasPages())
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            <p class="small text-muted mb-0">
                Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} results
            </p>
        </div>
        <div>
            {!! $paginator->links('pagination::bootstrap-4') !!}
        </div>
    </div>
@endif
