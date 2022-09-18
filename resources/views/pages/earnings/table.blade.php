<div class="table-wrap block">
    <div class="table-responsive">
        {!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}
    </div>
</div>

@push('app_js')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endpush