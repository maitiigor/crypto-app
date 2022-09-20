@extends('layouts.app')

@section('title')

@endsection

@section('content')
<div>
    <div class="bg-light pt-5 px-3" style="width: 100%;">
    @include('dashboard.customer.tables.deposit_table')
    </div>
</div>
@endsection
