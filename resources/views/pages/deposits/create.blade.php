@extends('layouts.app')

@section('title')
 Create Deposit
@endsection

@section('content')
<div>
   {!! Form::open(array('url' => 'deposits','method' => 'post')) !!}
        @include('pages.deposits.fields')  
    {!! Form::close() !!}
</div>

@endsection

