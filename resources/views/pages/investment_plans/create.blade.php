@extends('layouts.app')

@section('title')
    Create Investment Plan
@endsection

@section('content')
<div>
    {{ Form::open(array('url' => 'investment_plans', 'method' => 'post')) }}
        @include('pages.investment_plans.fields') 
    {!! Form::close() !!} 
</div>

@endsection

