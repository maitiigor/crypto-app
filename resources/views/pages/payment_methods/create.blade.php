@extends('layouts.app')

@section('title')
    Create Payment Method
@endsection

@section('content')
<div>
    {!! Form::open(array('url' => 'payment_methods','method' => 'post' )) !!}
        @include('pages.payment_methods.fields') 
    <form>   
</div>
{!! Form::close() !!}
@endsection


