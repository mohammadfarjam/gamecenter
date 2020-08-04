@extends('Frontend.layout.index')

@section('content')
    <style>
        .btn_send_reset {
            background: #FFC312;
            border: none;
            height: 35px;
            border-radius: 5px;
        }
    </style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            @if (session('status'))
                <div class="alert alert-success text-right direction font_sans" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">

                <div class="card-header font_sans text-right bg-warning">{{ __('بازیابی رمز عبور') }}</div>

                <div class="card-body">


                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row direction">
                            <label for="email" class="col-md-3 col-form-label text-right font_sans ">{{ __('آدرس ایمیل') }}</label>

                            <div class="col-6 direction">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-6 direction mx-auto">
                                <button type="submit" class=" font_sans btn_send_reset">
                                    {{ __('ارسال لینک بازیابی رمز عبور') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
