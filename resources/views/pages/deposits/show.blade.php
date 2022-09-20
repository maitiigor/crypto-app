@extends('layouts.app')

@section('title')
    View Deposit
@endsection

@section('content')

<div class="mb-3">
    <a href="{{route('deposits.index')}}" style="color: #021f30; font-weight: 700 ; margin:">
        << back to deposit list
     </a>
</div>
<div class="bg-light pt-5 pb-3 px-3 rounded" style="width: 100%;">
    <div class="row justify-content-center px-5">

        <div class="col-sm-12 text-dark">
            Name : {{ optional($deposit)->user->name }}
        </div>
    </div>

    <div class="row justify-content-center px-5">

        <div class="col-sm-12 text-dark">
            User Name : {{ optional($deposit)->user->email }}
        </div>
    </div>

    <div class="row justify-content-center px-5">

        <div class="col-sm-12 text-dark">
            Amount : {{ optional($deposit)->amount }}
        </div>
    </div>
    <div class="row justify-content-center px-5">

        <div class="col-sm-12 text-dark">
            Status : {{ optional($deposit)->is_verified ? 'Paid' : 'Pending' }}
        </div>
    </div>
   
    <div class="row px-5">
        @if ($deposit->is_verified == false)
            <div class="col-sm-3 text-dark py-2">
                <a href="{{ route('deposit.confirm', $deposit->id) }}" class="btn btn-primary">
                    Confirm Payment
                </a>
            </div>
        @endif

    </div>
</div>
@endsection

