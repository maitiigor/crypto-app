@extends('layouts.app')

@section('title')
@endsection

@section('content')
    <div>
        <div class="text-end py-2 px-2">
            <a class="btn btn-primary" href="{{ route('investment_plans.create') }}">
                <i class="fa fa-plus"></i> Add Investment Plan
            </a>
        </div>
        <div class="pt-5 px-3 rounded" style="width: 100%; background-color: #a8ecec">
            @include('pages.investment_plans.table')
        </div>
    </div>
@endsection
