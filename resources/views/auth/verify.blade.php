@extends('Frontend.layout.index')

@section('content')
    <style>
        .btn_again {
            background: #78e08f;
            border: none;
            width: 130px;
            height: 35px;
            border-radius: 5px;
        }
    </style>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    @if (session('resent'))
                        <div class="alert alert-success text-right font_sans direction" role="alert">
                            {{ __('ایمیل جدید برای آدرس ایمیل شما ارسال شد.') }}
                        </div>
                    @endif
                    <div class="card-header text-right font_sans badge-success">{{ __('تایید حساب کاربری') }}</div>

                    <div class="card-body text-right font_sans direction">


                        {{ __('لطفا به آدرس ایمیل خود مراجعه نمایید و حساب کاربری خود را فعال نمایید.') }}
                        {{ __('اگر ایمیلی برای شما ارسال نشده است دکمه ارسال مجدد ایمیل را کلیک کنید. ') }}
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                    class="btn_again p-0 m-0 align-baseline">{{ __('ارسال مجدد ایمیل') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
