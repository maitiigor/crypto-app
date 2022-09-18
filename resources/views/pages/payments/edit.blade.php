@extends('layouts.app')

@section('title')
 Create Payment
@endsection

@section('content')
<div>
    <form>
        @include('pages.payments.fields') 
    <form>   
</div>
@endsection

