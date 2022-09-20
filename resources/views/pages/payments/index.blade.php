@extends('layouts.app')

@section('title')
@endsection

@section('content')
    <div>
        <div class="text-end py-2 px-2">
            <button class="btn btn-primary">
                <i class="fa fa-plus"></i> Add Payment
            </button>
        </div>
        <div class="pt-5 px-3" style="width: 100%; background-color: #a8ecec">
            @include('pages.payments.table')
        </div>
    </div>
@endsection
