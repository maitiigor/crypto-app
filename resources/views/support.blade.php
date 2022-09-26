@extends('layouts.frontend-app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                <div class="faq-title-conatiner px-5 py-5">
                    <h1>
                        Contact Us
                    </h1>
                </div>

            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center px-2">
                <h2>
                    Contact Support@tradefunds-investment.com
                </h2>
                <p class="px-5" style="font-size: 18px">
                    You have questions in your mind? Contact us right now so we can figure out what problem you are having. We will love to help you.
                </p>
               
            </div>

        </div>
    </div>

    <div class="container-fluid">

        {!! Form::open(array('route' => 'support.save','method' => 'post' )) !!}
        <div class="row px-4">
            @include('layouts.errors')
            <div class="col-md-12 mb-3">
                {!! Form::text('name', null, ['placeholder' => 'Your Name', 'class' => 'form-control contact-form-bg']) !!}
            </div>

            <div class="col-md-12 mb-3">
                {!! Form::text('email', null, ['placeholder' => 'Your Email', 'class' => 'form-control contact-form-bg']) !!}
            </div>

            <div class="col-md-12 mb-3">
                {!! Form::text('subject', null, ['placeholder' => 'Subject of message', 'class' => 'form-control contact-form-bg']) !!}
            </div>

            <div class="col-md-12 mb-3">
                {!! Form::textarea('message', null, ['placeholder' => 'Start typing', 'class' => 'form-control contact-form-bg',  'rows'=>'5']) !!}
            </div>
            <div class="col-sm-4">
              
                <button type="submit" href="" class="custom-button">
                   <i class="fa fa-envelope"></i> &nbsp; Send Your Message
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
