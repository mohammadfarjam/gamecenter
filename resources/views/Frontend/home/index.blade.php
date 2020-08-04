@extends('Frontend.layout.index')
@section('content')

    <!-- start-content -->
    <div class="container-fluid col-lg-12 p-0 m-0">

        <div class="views">

            <div class="col-lg-6 col-md-12 col-sm-12 p-0 float-right border border-white img onload">
                <a href="{{route('detail.post',$posts[0]->slug)}}"> <img class="img_into"
                                                                         src="{{$posts[0]->photos->path}}">
                    <p>
                        {{$posts[0]->title}}
                    </p>
                </a>
                <div class="date_1">
                    <span class="data">{{$v=verta($posts[0]->created_at)->format('Y/n/j')}}</span>
                    <i class="far fa-clock fontawesome i mr-1"></i>
                </div><!--date_1-->


            </div><!-- col-lg-6-->

            @for($i=1;$i<$posts->count();$i++)
                <div class="col-lg-3 col-md-3 col-sm-6 p-0 float-right border border-white overflow-hidden">
                    <a href="{{route('detail.post',$posts[$i]->slug)}}">
                        <img class="side_img" src="{{$posts[$i]->photos->path}}">
                        <p class="p_side_img"> {{$posts[$i]->title}}</p>
                    </a>
                    <div class="date_1">
                        <i class="far fa-clock fontawesome i mr-1"></i>
                        <span class="data">{{$v=verta($posts[$i]->created_at)->format('Y/n/j')}}</span>
                    </div><!--date_1-->
                </div>
            @endfor

        </div><!-- views-->
    </div><!-- container-fluid-->


    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-4 mb-4 ">
                <div class="last_videos">
                    <span>آخرین برنامه‌های ویدیویی</span>
                    <div class="video_content">
                        <ul>
                            @foreach($get_last_video_posts as $get_last_video_post )
                                <li>

                                    <a href="details/{{$get_last_video_post->slug}}">
                                        <img src="{{$get_last_video_post->photos->path}}">
                                        <span class="circle">
              <img class="play" src="/images/original/play-button.png">
         </span>
                                        <p class="p">{{$get_last_video_post->title}}</p>
                                    </a>
                                    <i class="far fa-clock fontawesome i mr-1" style="font-size: 10pt"></i>
                                    <span
                                        class="date">{{$v=verta($get_last_video_post->created_at)->format('Y/n/j')}}</span>
                                </li>
                            @endforeach

                        </ul>
                    </div><!--video_content-->
                </div><!--last_videos-->
            </div><!--col-lg-4-->

            <div class="col-lg-8 col-md-12">
                <div class="newest p-2">

                <span class="span1">

    <p class="p font">جدیدترین ها </p>

   <nav class="navbar navbar-expand-lg navbar-light ">
                        <button class="navbar-toggler  bg-dark" type="button" data-toggle="collapse"
                                data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse mt-3" id="navbarNavAltMarkup">
                            <div class="navbar-nav">


                                @foreach($category_newest as $category_new)
                                    <a class="nav-item nav-link p-0 ml-1 text-right" style="direction: rtl;">
                                        <input type="hidden" value="{{$category_new->id_value}}" name="category_id">
                                        <p>{{$category_new->title}}</p>
                                    </a>
                                @endforeach
   <a class="nav-item nav-link p-0 ml-1 text-right" style="direction: rtl;">
                                        <input type="hidden" value="0" name="category_id">
       <p>همه</p>
                                    </a>
                            </div>
                        </div>
                    </nav>
                </span>


                    <div class="content">
                        <ul>
                            @foreach($all_posts as $all_post)
                                <li attr_id="{{$all_post->id}}"><a href="details/{{$all_post->slug}}">
                                        <img src="{{$all_post->photos->path}}"></a>
                                    <div>
                                        <span class="info"><i class="fas fa-user fontawesome mt-2"></i>
                                            <p class="p">{{$all_post->user->name}}</p>
                                            <i class="far fa-clock fontawesome i mr-1"></i>
                                            <p class="p pr-2">{{$v=verta($all_post->created_at)->format('Y/n/j')}}</p>
                                        </span>
                                        <a href="details/{{$all_post->slug}}"><h1 class="h1">{{$all_post->title}}</h1>
                                            <p class="description"></a>{{ Str::limit($all_post->meta_desc, 200) }}
                                    </div><!--descriptoin--> </li>
                            @endforeach
                        </ul>
                    </div><!-- content-->
                    <div class="load_more h-25 w-100 p-3 text-center font_sans" style="font-size:11.5pt"><a>بارگذاری
                            بیشتر</a>
                        <input type="hidden" value="" name="getLoadMore" id="getLoadMore">
                    </div><!-- load_more-->
                </div><!-- newest-->
            </div><!--col-lg-8-->

        </div><!--row-->
    </div><!-- container-->

    <script src="{{asset('js/moment.js')}}"></script>
    <script src="{{asset('js/moment-jalaali.js')}}"></script>
    <script>
        // $(document).ready(function () {
        //     $(".newest .navbar-nav a :last-child ").trigger("click");
        // });
        $('.newest .navbar-nav a').click(function () {
            $('.newest .navbar-nav a :last-child ').css({color: 'black', background: 'white'});

            $('.newest .navbar-nav a ').removeClass('active_navbar_nav');
            $(this).addClass('active_navbar_nav');


            var id_category_newest = $(this).find('input[name=category_id]').val();
            $('.load_more').find('input[name=getLoadMore]').val(id_category_newest);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },


                type: 'POST',
                url: '{{route('getAttrCategory')}}',
                dataType: 'json',
                data: {id: id_category_newest},
                success: function (getdata) {
                    $('.content ul').html('');
                    $.each(getdata, function (index, element) {
                        var data_ajax = '<li attr_id="' + element.id + '"><a href="details/' + element.slug + '"><img src="' + element.photos.path + '"></a><div><span class="info"><i class="fas fa-user fontawesome mt-2"></i><p class="p">' + element.user.name + '</p><i class="far fa-clock fontawesome i mr-1"></i><p class="p pr-2">' + moment(element.created_at).format('jYYYY/jM/jD') + '</p></span><a href="details/' + element.slug + '"><h1 class="h1">' + element.title + '</h1><p class="description"></a>' + element.meta_desc.substr(0, 200) + '...' + '</div><!--descriptoin--> </li>';
                        $('.content ul').append(data_ajax);
                    });
                },
                error: function (getdata) {
                    alert("خطا در ارسال اطلاعات");
                }
            });

        });


        $('.load_more').click(function () {

            var id_category_newest = $('.load_more').find('input[name=getLoadMore]').val();
            var li_lenght = $('.content ul li').length;
            var attr_idd = [];
            for (var i = 1; i <= li_lenght; i++) {
                var attr_id = $(`.content ul li:nth-child(${i})`).attr('attr_id');
                attr_idd.push(attr_id);
            }


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },


                type: 'POST',
                url: '{{route('getmoreAttrCategory')}}',
                dataType: 'json',
                data: {id: id_category_newest, attr_idd: attr_idd},
                success: function (getmoredata) {
                    console.log(getmoredata)
                    $.each(getmoredata, function (index, element) {
                        moment().format('jYYYY/jM/jD');
                        var data_ajax = ' <li attr_id="' + element.id + '"><a href="details/' + element.slug + '"><img src="' + element.photos.path + '"></a><div><span class="info"><i class="fas fa-user fontawesome mt-2"></i><p class="p">' + element.user.name + '</p><i class="far fa-clock fontawesome i mr-1"></i><p class="p pr-2">' + moment(element.created_at).format('jYYYY/jM/jD') + '</p></span><a href="details/' + element.slug + '"><h1 class="h1">' + element.title + '</h1><p class="description"></a>' + element.meta_desc.substr(0, 200) + '...' + '</div><!--descriptoin--> </li>';
                        $('.content ul').append(data_ajax);
                    });
                }

            });
        });

    </script>

    <div class="container-fluid p-0 ">
        <div class="latest_reviews ">
            <p class="p">آخرین بررسی ها </p>
            <div class="container col-lg-8 col-md-9 col-sm-9">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        @for($x=1;$x<$get_last_Reviews->count();$x++)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$x}}"></li>
                        @endfor
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active ">
                            <a href="details/{{$get_last_Reviews[0]->slug}}">
                                <img class="d-block w-100" src="{{$get_last_Reviews[0]->photos->path}}"
                                     alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <p>{{$get_last_Reviews[0]->title}}</p>
                                </div>
                            </a>
                        </div>
                        @for($i=1;$i<$get_last_Reviews->count();$i++)
                            <div class="carousel-item">
                                <a href="details/{{$get_last_Reviews[$i]->slug}}">
                                    <img class="d-block w-100" src="{{$get_last_Reviews[$i]->photos->path}}"
                                         alt="Second slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <p>{{$get_last_Reviews[$i]->title}}</p>
                                    </div>
                                </a>
                            </div>
                        @endfor
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <br>
                <br>

            </div><!--container-->
        </div><!-- latest_reviews-->
    </div><!--container-fluid-->
    <!-- End-content -->


@endsection
