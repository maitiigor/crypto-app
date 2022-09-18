@extends('layouts.app')

@section('title')
@endsection
@php
    $user = auth()->user() ;  
@endphp
@section('content')
    <div>
        <div class="bg-light pt-5 px-3" style="height: 100%; width: 100%;">
            {!! Form::open(array('url' => 'profile','method' => 'put')) !!}
            <div class="row py-2">
               
                <div class="mb-3">
                    <label for="user_name" class="form-label text-dark">Account Name</label>
                    <input type="text" class="form-control" value="{{$user->user_name}}" id="user_name" name="user_name" disabled>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label for="Registration Date" class="form-label text-dark">Registration date:</label>
                    </div>
                    
                    <div class="col-lg-10 text-dark">
                        {{$user->created_at}}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label text-dark">Name</label>
                   <input type="text" id="name" value="{{$user->name}}" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label text-dark">Email</label>
                    <input type="email" class="form-control" value="{{$user->email}}" name="email" disabled>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-dark">New Password</label>
                    <input type="password" class="form-control" value="" name="password" autocomplete="false">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label text-dark">Retype Password</label>
                    <input type="password" class="form-control" name="password_confirmation" >
                </div>

                <div class="mb-3">
                    <label for="bitcoin_account_id" class="form-label text-dark">BITCOIN Account ID</label>
                    <input type="text" class="form-control" value="{{$user->bitcoin_account_id}}" name="bitcoin_account_id" >
                </div>

                <div class="mb-3">
                    <label for="ethereum_account_id" class="form-label text-dark">ETHEREUM Account ID</label>
                    <input type="text" class="form-control" value="{{$user->ethereum_account_id}}" name="ethereum_account_id" >
                </div>

                <div class="mb-3">
                    <label for="litecoin_account_id" class="form-label text-dark">LITECOIN Account ID</label>
                    <input type="text" class="form-control" value="{{$user->litecoin_account_id}}" name="litecoin_account_id" >
                </div>

                <div class="mb-3">
                    <label for="dogecoin_account_id" class="form-label text-dark">DOGE Account ID</label>
                    <input type="text" class="form-control" value="{{$user->doge_account_id}}" name="dogecoin_account_id" >
                </div>

                <div class="mb-3">
                    <label for="tron_account_id" class="form-label text-dark">TRON Account ID</label>
                    <input type="text" class="form-control" value="{{$user->tron_account_id}}" name="tron_account_id" >
                </div>
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>
        {!! Form::close() !!}
        </div>
    </div>
@endsection
