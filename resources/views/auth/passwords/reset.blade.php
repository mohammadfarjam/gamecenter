@extends('Frontend.layout.index')

@section('content')
    <div class="container">
        <style>
            .btn_reset {
                background: #12CBC4;
                border: none;
                height: 35px;
                border-radius: 5px;
                min-width: 130px;
                text-align: center;
            }
        </style>
        <div class="row justify-content-center">
            <div class="col-md-8 direction">
                <div class="card mt-5">
                    <div
                        class="card-header text-right direction font_sans badge-info">{{ __('بازیابی رمز عبور') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-3 col-form-label text-right font_sans">{{ __('آدرس ایمیل') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-3 col-form-label text-right font_sans">{{ __('رمز عبور') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-3 col-form-label text-right font_sans">{{ __(' تکرار رمز عبور') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0 font_sans  ">
                                <div class="mx-auto">
                                    <button type="submit" class="btn_reset align-content-center">
                                        {{ __('بازیابی رمز عبور') }}
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
