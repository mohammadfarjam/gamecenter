{{--@extends('layouts.app')--}}
@extends('Frontend.layout.index')
@section('content')
    <link rel="stylesheet" href="/style.css" type="text/css">
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success mt-5 font_sans direction text-right" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card mt-5">


                    <div class="card-body bg-success font_sans text-right direction">
                        کاربر گرامی خوش آمدید!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
