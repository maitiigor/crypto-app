@extends('layouts.app')

@section('title')
 Create Users
@endsection

@section('content')
<div>
    {{ Form::open(array('url' => 'users')) }}
        @include('pages.users.fields') 
    {{ Form::close() }}
</div>
@endsection

