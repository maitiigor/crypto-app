@extends('layouts.app')

@section('title')
    View Payment Method
@endsection

@section('content')
    <div class="bg-light pt-5 pb-4 px-3" style="width: 100%;">
        <div class="row justify-content-center">
            <div class="col text-dark">
                Name : {{ $paymentMethod->account_name }} <br>

                Account : {{ $paymentMethod->account_id }}
            </div>
        </div>
    </div>
@endsection
