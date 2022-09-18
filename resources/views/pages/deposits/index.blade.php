@extends('layouts.app')

@section('title')

@endsection

@section('content')
<div>
    <div class="text-end py-2 px-2">
        <button class="btn btn-primary">
            <i class="fa fa-plus"></i> Add Deposit
        </button>
    </div>
    <div class="bg-light pt-5 px-3" style="width: 100%;">
    @include('pages.deposits.table')
    </div>
</div>
@endsection

