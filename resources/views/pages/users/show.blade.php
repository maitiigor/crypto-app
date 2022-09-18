@extends('layouts.app')

@section('title')
    View User
@endsection

@section('content')
    <div class="bg-light pt-5 px-3" style="width: 100%;">
        <div class="row justify-content-center">
         
            <div class="col-sm-8 text-dark">
                Name : &nbsp; {{ optional($user)->name }}
            </div>
            <br>
        </div>

        <div class="row justify-content-center">
           
            <div class="col-sm-8 text-dark">
              User Name : &nbsp;  {{ optional($user)->user_name }}
            </div>
            <br>
        </div>

        <div class="row justify-content-center">
           
            <div class="col-sm-8 text-dark">
             Email : &nbsp;   {{ optional($user)->email }}
            </div>
            <br>
        </div>

        <div class="row justify-content-center">
           
            <div class="col-sm-8 text-dark">
              Status : &nbsp;  {{ optional($user)->is_disabled ? "Disabled" : "Active" }}
            </div>
            <br>

        </div>
    </div>
@endsection
