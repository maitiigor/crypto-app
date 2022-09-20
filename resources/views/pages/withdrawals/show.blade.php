@extends('layouts.app')

@section('title')
    Withdrawal Approval
@endsection

@section('content')
<div class="mb-3">
    <a href="{{route('withdrawals.index')}}" style="color: #021f30; font-weight: 700 ; margin:">
        << back to withdrawals list
     </a>
</div>
 
<div class="bg-light pt-5 pb-3 px-3 rounded" style="width: 100%;">
    <div class="row justify-content-center px-5">

        <div class="col-sm-12 text-dark">
            Name : {{ optional($withdrawal)->user->name }}
        </div>
    </div>

    <div class="row justify-content-center px-5">

        <div class="col-sm-12 text-dark">
            Email : {{ optional($withdrawal)->user->email }}
        </div>
    </div>

    <div class="row justify-content-center px-5">

        <div class="col-sm-12 text-dark">
            Amount : {{ optional($withdrawal)->amount }}
        </div>
    </div>
    <div class="row justify-content-center px-5">

        <div class="col-sm-12 text-dark">
            Status : {{ optional($withdrawal)->is_payed ? 'Yes' : 'Pending' }}
        </div>
    </div>
    <div class="row justify-content-center px-5">

        <div class="col-sm-12 text-dark">
            Address : {{ optional($withdrawal)->address }}
        </div>
    </div>
    <div class="row justify-content-center px-5">

        <div class="col-sm-12 text-dark">
            Address Type : {{ optional($withdrawal)->address_type }}
        </div>
    </div>
    <div class="row px-5">
        @if ($withdrawal->is_payed == false)
            <div class="col-sm-3 text-dark py-2">
                <a href="{{ route('withdrawal.payment', $withdrawal->id) }}" class="btn btn-primary">
                    Approve and Pay
                </a>
            </div>
        @endif

    </div>
</div>
@endsection

