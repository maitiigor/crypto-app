@extends('layouts.app')

@section('title')
    View Role
@endsection

@section('content')
    <div class="bg-light pt-5 px-3" style="width: 100%;">
        <div class="row text-dark pb-3">
            <div class="cols-sm-12">
                Name : {{ $role->name }}
            </div>
        </div>
    </div>
@endsection
