@extends('layouts.app')

@section('title')
    Edit Investment Plan
@endsection

@section('content')
    {{ Form::open(['route' => ['investment_plans.update', optional($investmentPlan)->id], 'method' => 'put']) }}
    @include('pages.investment_plans.fields')
    {!! Form::close() !!}
@endsection
