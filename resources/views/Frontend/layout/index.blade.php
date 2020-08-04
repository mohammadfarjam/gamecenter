<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>بازی سنتر دریچه ای به دنیا بازی ها</title>
    <link rel="stylesheet" href="/style.css" type="text/css">

    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css"/>
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <script src="/js/fontawesome-all.js"></script>
    <script src="{{asset('/js/jquery-3.5.1.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@yield('meta')
</head>
<body class="body" style="margin-top: 56px;">
<!-- start navbar -->
@php
    $value='بررسی بازی ها';
$id_category=\App\category::where('title',$value)->pluck('id');
$review_games=\App\Post::with('photos','user')->where('category_parent',$id_category)->orderBy('created_at','desc')->take(7)->get();
@endphp

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: #1F2024">

    <div class="child_menu position-absolute rounded-bottom shadoww col-xl-11 col-lg-11 col-md-10 col-sm-10 col-sx-5">

        <div class="review_games">
            <div class="img col-4 float-right">
                <a href="/details/{{$review_games[0]->slug}}">
                    <img src="{{$review_games[0]->photos->path}}" class="img-responsive mt-4 mb-2 mr-2 mx-auto"
                         width="100%">
                </a>
                <span class="w-100 mb-3 d-block">
                        <i class="fas fa-user fontawesome" style="font-size: 10pt;margin-top: 5px"></i>
                        <p class="p pr-2">{{$review_games[0]->user->name}}</p>
                    <i class="far fa-clock fontawesome mr-5" style="font-size: 10pt;margin-top: 4px"></i>
                        <p class="p pr-2 mt-1" style="font-size: 9pt;font-family: IRANSans">{{$v=verta($review_games[0]->created_at)->format('Y/n/j')}}</p>
                    </span>
                <br>
                <a class="text-decoration-none" href="/details/{{$review_games[0]->slug}}">
                    <h4 class="title ">{{$review_games[0]->title}}</h4>
                </a>
            </div><!-- img -->


            <div class="col-4 p-0 float-right">
                @for($i=1;$i<=3;$i++)
                    <ul class="float-right">
                        <a class="a" href="/details/{{$review_games[$i]->slug}}">
                            <li class="mt-4"><img class="float-right" width="30%"
                                                  src="{{$review_games[$i]->photos->path}}" alt="">
                                <div class="d-flex">
                                    <p class="p_title float-right mr-3">{{$review_games[$i]->title}}</p>
                                </div>
                                <span class="d-block mt-2 h-25">
 <i class="far fa-clock fontawesome mr-3" style="font-size: 10pt;margin-top: 1px"></i>
                      <p style="font-family: IRANSans;font-size: 9pt;"
                         class="p pr-2">{{$v=verta($review_games[$i]->created_at)->format('Y/n/j')}}</p>
                      </span>
                            </li>
                        </a>
                    </ul>
                @endfor
            </div>

            @if(count($review_games)>4)
                <div class="col-4 p-0 float-left">
                    @for($x=4;$x<(count($review_games));$x++)
                        <ul class="float-left">
                            <a class="a" href="/details/{{$review_games[$x]->slug}}">
                                <li class="mt-4"><img class="float-right" width="30%"
                                                      src="{{$review_games[$x]->photos->path}}" alt="">
                                    <div class="d-flex">
                                        <p class="p_title float-right mr-3">{{$review_games[$x]->title}}</p>
                                    </div>
                                    <span class="d-block mt-2 h-25">
 <i class="far fa-clock fontawesome mr-3 float-right" style="font-size: 10pt;margin-top: 1px"></i>
                      <p style="font-family: IRANSans;font-size: 9pt;"
                         class="p pr-2 float-right">{{$v=verta($review_games[$x]->created_at)->format('Y/n/j')}}</p>
                      </span>
                                </li>
                            </a>
                        </ul>
                    @endfor
                </div>
            @endif


        </div>
    </div>

    <div class="child_menu position-absolute rounded-bottom shadoww col-xl-11 col-lg-11 col-md-10 col-sm-10 col-sx-5">
        <div class="essay">
            <div class="col-2 float-right p-0" style="background-color:#1F2024!important;height: 357px">
                <ul>
                    <li class="mt-5"><a class="a pr-3" href="#">همه</a></li>
                    <li><a class="a pr-3" href="#">بیو گرافی بازی ساز ها</a></li>
                    <li><a class="a pr-3" href="#">تاریخچه ی کنسول های بازی</a></li>
                    <li><a class="a pr-3" href="#">راهنمای بازی ها</a></li>
                    <li><a class="a pr-3" href="#">مصاحبه</a></li>
                </ul>
            </div><!--col-2-->

            <div class="col-10 img">
                <div class="row">
                    <ul class="mt-4">
                        <li class="mr-3"><a class=" mx-auto" href="#">
                                <img src="/images/huawei-wallpaper-390x220.jpg" width="100%">
                                <p class="m-0">عملکرد هوآوی و تاثیر آن بر روی دنیای فناوری</p>
                            </a>
                            <span>
                                <i class="far fa-clock fontawesome float-right align-middle mt-1"></i>
                      <p class="p pr-2 float-right align-middle">2020/10/03</p>
                            </span>
                        </li>
                        <li class="mr-3"><a class="mx-auto" href="#">
                                <img src="/images/huawei-wallpaper-390x220.jpg" width="100%">
                                <p class="m-0">عملکرد هوآوی و تاثیر آن بر روی دنیای فناوری</p>
                            </a>
                            <span>
                                <i class="far fa-clock fontawesome float-right align-middle mt-1"></i>
                      <p class="p pr-2 float-right align-middle">2020/10/03</p>
                            </span>
                        </li>
                        <li class="mr-3"><a class="mx-auto" href="#">
                                <img src="/images/huawei-wallpaper-390x220.jpg" width="100%">
                                <p class="m-0">عملکرد هوآوی و تاثیر آن بر روی دنیای فناوری</p>
                            </a>
                            <span>
                                <i class="far fa-clock fontawesome float-right align-middle mt-1"></i>
                      <p class="p pr-2 float-right align-middle">2020/10/03</p>
                            </span>
                        </li>
                        <li class="mr-3"><a class="mx-auto" href="#">
                                <img src="/images/huawei-wallpaper-390x220.jpg" width="100%">
                                <p class="m-0">عملکرد هوآوی و تاثیر آن بر روی دنیای فناوری</p>
                            </a>
                            <span>
                                <i class="far fa-clock fontawesome float-right align-middle mt-1"></i>
                      <p class="p pr-2 float-right align-middle">2020/10/03</p>
                            </span>
                        </li>

                    </ul>

                </div>

            </div><!--col-9-->
        </div><!--essay-->
    </div>





    <div class="child_menu position-absolute rounded-bottom shadoww col-xl-11 col-lg-11 col-md-10 col-sm-10 col-sx-5">
        <div class="Video_programs">
            <div class="col-2 float-right p-0" style="background-color:#1F2024!important;height: 357px">
                <ul>
                    @php
                        use Illuminate\Support\Facades\DB;
    $value_video_program='بررسی ویدیویی';
    $id_cat_video_program=DB::table('categories')->where('title',$value_video_program)->pluck('id');
    $sub_cat_video_program=DB::table('categories')->where('parent_id',$id_cat_video_program)->take(6)->get();



                    @endphp
                    <br>
                    <br>
                    <br>
                    @foreach($sub_cat_video_program as $sub_cat_video)
                        <li class="get_data_sub"><a class="a pr-3" style="cursor: pointer" attr_id_sub_under_cat="{{$sub_cat_video->id}}">{{$sub_cat_video->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </div><!--col-2-->


            <div class="col-10 img">
                <div class="row">
                    <ul class="mt-5 append_data_sub_cat">

                    </ul>

                </div>

            </div><!--col-9-->
        </div><!--Video_programs-->

    </div>


    <div class="container direction">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- col-auto start-->
        <div class="col-auto">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="search_box">
                    <i class="fas fa-search search text-warning"></i>
                    <input type="text" name="search" placeholder="جستجو ...">
                </div><!--search_box-->

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">

                    </li>

                    <li class="nav-item active">
                        <a class="nav-link null" href="#">صفحه اصلی <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link null" href="#">اخبار بازی ها</a>
                    </li>
                    <li class="nav-item dropdown" id="Video_programs">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            برنامه های ویدیویی
                        </a>
                        <div class="" aria-labelledby="navbarDropdown">

                        </div>
                    </li>

                    <li class="nav-item dropdown" id="Review_games">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            بررسی بازی ها
                        </a>

                    </li>

                    <li class="nav-item dropdown" id="essay">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            مقالات
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link null" href="#"> انجمن </a>
                    </li>


                    <li class="nav-item dropdown font text-right direction">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fas fa-user mr-5"></i>
                            @if(Auth::check())
                                {{Auth::user()->name }}
                            @else
                                پنل کاربری
                            @endif
                        </a>
                        <style>
                            .dropdown-menu a {
                                color: white;
                            }
                        </style>
                        <div class="dropdown-menu" style="background: #1F2024" aria-labelledby="navbarDropdown">


                            @if(Auth::check())
                                <a class="dropdown-item text-right d-none" href="{{route('login')}}">ورود</a>
                                <a class="dropdown-item text-right d-none" href="{{route('register')}}">ثبت نام </a>
                                <a class="dropdown-item text-right" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('خروج') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <a class="dropdown-item text-right" href="{{route('login')}}">ورود</a>
                                <a class="dropdown-item text-right" href="{{route('register')}}">ثبت نام </a>
                            @endif

                        </div>
                    </li>
                </ul>
            </div>
        </div><!--col-auto End -->
    </div><!--end container-->
</nav>
<!-- End navbar -->

@yield('content')

<!-- Footer -->
<footer class="page-footer font-small indigo">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">
        <div class="row">
            <div class="footer_custom">
                <div class="s-m col-lg-4 col-md-12 col-sm-12 mt-4">
                    <a href="#"><i class="fab fa-facebook-f deg"></i></a>
                    <a href="#"><i class="fab fa-twitter deg"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g deg"></i></a>
                    <a href="#"><i class="fab fa-youtube deg"></i></a>
                    <a href="http://instagram.com/mohammad.farjamm" target="-_blank"><i class="fab fa-instagram deg"></i></a>
                    <a href="https://t.me/mohammadfarr" target="-_blank"><i class="fab fa-telegram-plane deg"></i></a>
                </div><!-- s-m-->
                <p class="font col-lg-8 col-md-12 col-sm-12 mb-5">بازی سنتر یک وب سایت ایرانی با موضوعیت و محوریت بازی
                    های
                    ویدیویی
                    است که در این زمینه به تولید محتوای فارسی متنی و تصویری می پردازد. </p>

                <div class="content_custom col-lg-10 m-auto">
                    <div class="col-lg-3 col-md-5 col-sm-5 float-right font_sans mr-5">
                        <p class="p-0 mb-2" style="font-size: 13pt">راه های ارتباطی</p>
                        <span class="line"></span>
                        <ul class="p-0 m-0">
                            <li class="font_sans"><a class="a" href="#">صفحه اصلی</a></li>
                            <li class="font_sans"><a class="a" href="#"> درباره‌ بازی سنتر</a></li>
                            <li class="font_sans"><a class="a" href="#">تبلیغات در بازی ‌سنتر</a></li>
                            <li class="font_sans"><a class="a" href="#">تماس با ما</a></li>
                        </ul>
                    </div><!-- col-3-->

                    <div class="col-lg-3 col-md-5 col-sm-5 float-right font_sans mr-5">
                        <p class="p-0 mb-2" style="font-size: 13pt">پر مخاطب</p>
                        <span class="line"></span>
                        <ul class="p-0 m-0">
                            <li class="font_sans"><a class="a" href="#">اخبار بازی ها</a></li>
                            <li class="font_sans"><a class="a" href="#">بررسی ویدیویی بازی ها</a></li>
                            <li class="font_sans"><a class="a" href="#">معرفی بازی‌ها</a></li>
                            <li class="font_sans"><a class="a" href="#">تاریخچه کنسول های بازی</a></li>
                            <li class="font_sans"><a class="a" href="#"> تاریخچه و داستان بازی ها</a></li>
                            <li class="font_sans"><a class="a" href="#">راهنمای بازی ها</a></li>
                        </ul>
                    </div><!-- col-3-->
                </div><!-- content-->
            </div><!--footer_custom-->
        </div><!--row-->
    </div><!-- container-fluid -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:

    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->


<script>
    $('.search_box').click(function () {

        $(this).find('input[name=search]').addClass('w_search');
    });


    //for menu
    $('.navbar ul li .null').hover(function () {
        $('.child_menu').css('display', 'none');
    });

    $('#Video_programs').hover(function () {
        $('.review_games').parent('.child_menu').css('display', 'none');
        $('.essay').parent('.child_menu').css('display', 'none');
        var first_name_video = $('.Video_programs ul').find('.get_data_sub:first').text();
        $('.Video_programs').parent('.child_menu').css('display', 'block');
        $('.Video_programs').css('display', 'block');








//ajax get first time show review video
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },


            type: 'POST',
            url: '{{route('get_first_time_video')}}',
            dataType: 'json',
            data: {first_name_video: first_name_video},
            success: function (get_first_time_video) {
                console.log(get_first_time_video)
                if (get_first_time_video.length > 0) {
                    $('.append_data_sub_cat').html('');
                    $.each(get_first_time_video, function (index, element) {
                        var data_ajax = '<li class="mr-2"><a class=" mx-auto" href="/details/' + element.slug + '"><img src="' + element.photos.path + '" style="height: 170px;width: 240px;"><p class="m-0">' + element.title + '</p></a><span> <i class="far fa-clock fontawesome float-right align-middle" style="font-size: 9pt;margin-top:4px "></i><p class="p pr-2 float-right align-middle">' + moment(element.created_at).format('jYYYY/jM/jD') + '</p></span></li>';
                        $('.append_data_sub_cat').append(data_ajax);
                    });
                } else {
                    $('.append_data_sub_cat').html('');
                }
            },
            error: function (getdata_sub_cat) {
                alert("خطا در دریافت اطلاعات بررسی ویدیویی");
            }
        });
    });










    $('#Review_games').hover(function () {
        $('.Video_programs').parent('.child_menu').css('display', 'none');
        $('.essay').parent('.child_menu').css('display', 'none');
        $('.review_games').parent('.child_menu').css('display', 'block');
        $('.review_games').css('display', 'block');
    });

    $('#essay').hover(function () {
        $('.Video_programs').parent('.child_menu').css('display', 'none');
        $('.review_games').parent('.child_menu').css('display', 'none');

        $('.essay').parent('.child_menu').css('display', 'block');
        $('.essay').css('display', 'block');
    });


    $('.child_menu').mouseleave(function () {
        $('.child_menu').css('display', 'none');
    });


    $('.more_menu').mouseleave(function () {
        $('.more_menu').css('display', 'none');
    });

    $('.container').click(function () {
        $('.more_menu').css('display', 'none');
    });


</script>




<script src="{{asset('js/moment.js')}}"></script>
<script src="{{asset('js/moment-jalaali.js')}}"></script>

<script>
    $('.get_data_sub').click(function () {
        var attr_id = $('a', this).attr('attr_id_sub_under_cat');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            type: 'POST',
            url: '{{route('get_data_sub_cat')}}',
            dataType: 'json',
            data: {attr_id: attr_id},
            success: function (getdata_sub_cat) {
                console.log(getdata_sub_cat)
                if (getdata_sub_cat.length > 0) {
                    $('.append_data_sub_cat').html('');
                    $.each(getdata_sub_cat, function (index, element) {
                        var data_ajax = '<li class="mr-2"><a class=" mx-auto" href="/details/' + element.slug + '"><img src="' + element.photos.path + '" style="height: 170px;width: 240px;"><p class="m-0">' + element.title + '</p></a><span> <i class="far fa-clock fontawesome float-right align-middle" style="font-size: 9pt;margin-top:4px "></i><p class="p pr-2 float-right align-middle">' + moment(element.created_at).format('jYYYY/jM/jD') + '</p></span></li>';
                        $('.append_data_sub_cat').append(data_ajax);
                    });
                } else {
                    $('.append_data_sub_cat').html('');
                }
            },
            error: function (getdata_sub_cat) {
                alert("خطا در ارسال  زیر دسته بررسی ویدیویی");
            }
        });
    })
</script>
</body>

</html>
