{{--@extends('layouts.app')--}}
@extends('Frontend.layout.index')
@section('content')

    <div class="container-fluid login p-0">

        <div class="container">
            <div class="cont col-lg-9 col-md-12 col-sm-12">
                <div class="form col-sm-10 ">
                    <h2>ورود </h2>
                    <form method="POST" action="{{ route('login') }}">
                      @csrf
                    <label>
                        <span>آدرس ایمیل</span>
                        <input type="email" id="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                    </label>

                    <label>
                        <span>رمز عبور</span>
                        <input type="password" id="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                 <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                     </span>
                      @enderror
                    </label>
                        <div class="remember_forget d-flex mx-auto col-10">

                            @if (Route::has('password.request'))
                                <a class="text-decoration-none" href="{{ route('password.request') }}">  <p class="forget_pass">فراموشی رمز عبور</p>  </a>
                            @endif

                            <div class="d-flex flex-row c">
                                <p class="remember_me">مرا به خاطر بسپار</p>
                                <input style="width: 0px;" class="ml-1 mt-0" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            </div>

                        </div><!--remember_forget-->
                    <button type="submit" class="submit">ورود</button>




                    <div class="social_media">
                        <ul>
                            <li><img src="images/original/youtube.png" alt=""></li>
                            <li><img src="images/original/twiter.png" alt=""></li>
                            <li><img src="images/original/face.png" alt=""></li>
                            <li><img src="images/original/instagram.png" alt=""></li>
                        </ul>
                    </div><!--social_media-->

                        <a class="text-decoration-none mb-5 text-center" href="{{ route('register') }}">  <p class="forget_pass">ایجاد حساب کاربری</p>  </a>
                 </form>
                </div><!--form-->

                <div class="img_side">
                    <img src="images/original/undraw_dev_productivity_umsq.png" alt="" class="mr-3">
                </div><!--img_side-->

            </div><!--cont-->

        </div><!--container-->

    </div><!--container-fluid-->

@endsection


            {{--            <div class="card">--}}
            {{--                <div class="card-header">{{ __('Login') }}</div>--}}

            {{--                <div class="card-body">--}}
            {{--                    <form method="POST" action="{{ route('login') }}">--}}
            {{--                        @csrf--}}

            {{--                        <div class="form-group row">--}}
            {{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

            {{--                            <div class="col-md-6">--}}
            {{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

            {{--                                @error('email')--}}
            {{--                                    <span class="invalid-feedback" role="alert">--}}
            {{--                                        <strong>{{ $message }}</strong>--}}
            {{--                                    </span>--}}
            {{--                                @enderror--}}
            {{--                            </div>--}}
            {{--                        </div>--}}

            {{--                        <div class="form-group row">--}}
            {{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

            {{--                            <div class="col-md-6">--}}
            {{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

            {{--                                @error('password')--}}
            {{--                                    <span class="invalid-feedback" role="alert">--}}
            {{--                                        <strong>{{ $message }}</strong>--}}
            {{--                                    </span>--}}
            {{--                                @enderror--}}
            {{--                            </div>--}}
            {{--                        </div>--}}

            {{--                        <div class="form-group row">--}}
            {{--                            <div class="col-md-6 offset-md-4">--}}
            {{--                                <div class="form-check">--}}
            {{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

            {{--                                    <label class="form-check-label" for="remember">--}}
            {{--                                        {{ __('Remember Me') }}--}}
            {{--                                    </label>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}

            {{--                        <div class="form-group row mb-0">--}}
            {{--                            <div class="col-md-8 offset-md-4">--}}
            {{--                                <button type="submit" class="btn btn-primary">--}}
            {{--                                    {{ __('Login') }}--}}
            {{--                                </button>--}}

            {{--                                @if (Route::has('password.request'))--}}
            {{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
            {{--                                        {{ __('Forgot Your Password?') }}--}}
            {{--                                    </a>--}}
            {{--                                @endif--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </form>--}}
            {{--                </div>--}}
            {{--            </div>--}}

