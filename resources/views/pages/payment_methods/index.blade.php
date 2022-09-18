@extends('layouts.app')

@section('title')
@endsection

@section('content')
    <div>
        <div class="text-end py-2 px-2">
            <a class="btn btn-primary" href="{{ route('payment_methods.create') }}">
                <i class="fa fa-plus"></i> Add Payment Method
            </a>
        </div>
        <div class="bg-light pt-5 px-3" style="width: 100%;">
            @include('pages.payment_methods.table')
        </div>
    </div>
@endsection
