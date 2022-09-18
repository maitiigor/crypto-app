@extends('layouts.app')

@section('title')
    Edit Payment Methods
@endsection

@section('content')
{{ Form::open(array('route' =>  array('payment_methods.update', optional($paymentMethod)->id), 'method' => 'put')) }}
    <input type="hidden" name="id" name="id" value="{{optional($paymentMethod)->id}}">
        @include('pages.payment_methods.fields')
    {!! Form::close() !!}
@endsection

