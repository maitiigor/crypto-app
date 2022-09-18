@extends('layouts.app')

@section('title')
    Edit User
@endsection

@section('content')
{{ Form::open(array('route' =>  array('users.update', optional($user)->id), 'method' => 'put')) }}
    <input type="hidden" name="id" name="id" value="{{optional($user)->id}}">
    @include('pages.users.fields') 
{{ Form::close() }}
@endsection

