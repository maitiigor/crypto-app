@extends('layouts.app')

@section('title')

@endsection

@section('content')
<div>
    <div class="pt-5 px-3 rounded" style="width: 100%; background-color: #a8ecec">
    @include('dashboard.customer.tables.deposit_table')
    </div>
</div>
@endsection
