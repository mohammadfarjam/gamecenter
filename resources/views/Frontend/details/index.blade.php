@extends('Frontend.layout.index')
@section('meta')
    <meta property="og:locale" content="fa_IR"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{$detail_post[0]->title}}">
    <meta property="og:description" content="{{str_limit($detail_post[0]->meta_desc,100)}} ">
    <meta property="og:url" content="gamecenter.me/details/{{$detail_post[0]->slug}}"/>
    <meta property="og:site_name" content="بازی سنتر"/>
    <meta property="og:image" content="gamecenter.me/details/{{$detail_post[0]->photos->path}}">
    <meta property="og:image:width" content="1280"/>
    <meta property="og:image:height" content="720"/>
@endsection


@section('content')

    <div class="container-fluid p-0 img_orginal_post ">
        <img id="image" src="{{$detail_post[0]->photos->path}}"
             class="p-0 col-lg-12 col-md-12 col-sm-12">
        <p class="p">{{$detail_post[0]->title}}</p>
    </div>

    <div class="container-fluid" style="background: white">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-4 mb-4 mt-5">
                    <div class="tab_widget col-12 p-0 mb-5">
                        <div class="contacts p-0 col-lg-5 col-md-5 col-sm-6">
                            <img class="img" src="/images/original/advertising.png">
                            <span class="contacts_widget">
                                <p>پر مخاطب</p>
                                 <img src="/images/original/group.png">
                            </span>
                        </div><!--contacts-->

                        <div class="fresh p-0 float-right col-lg-5 col-md-5 col-sm-6">
                            <img class="img" src="/images/original/commerce-and-shopping.png">
                            <div class="widget_new ">
                                <img src="/images/original/signs.png">
                                <p class="p">تازه ها</p>
                            </div><!--widget_new-->
                        </div><!--fresh-->
                        <div class="row">
                            <div class="content">

                                <div class="content_into">
                                    <ul>
                                        <li><a>
                                                <img src="/images/Steam-220x150.jpg">
                                                <div class=" col-lg-8 col-md-10 col-sm-12 p-0 ">
                                                    <p>تعداد کاربران فعال هدست‌های VR در Steam کمتر از 2 درصد است تعداد
                                                        کاربران فعال هدست‌های VR در Steam کمتر از 2 درصد استتعداد
                                                        کاربران فعال هدست‌های VR در Steam کمتر از 2 درصد است</p>
                                                    <span class="date_parent">
                                                     <i class="far fa-clock fontawesome i" style="font-size: 9pt"></i>
                                                <span class="date">2020/10/03</span>
                                                </span>
                                                </div>

                                            </a></li>

                                        <li><a>
                                                <img src="/images/Steam-220x150.jpg">
                                                <div class=" col-lg-8 col-md-10 col-sm-12 p-0 ">
                                                    <p>تعداد کاربران فعال هدست‌های VR در Steam کمتر از 2 درصد است تعداد
                                                        کاربرانست‌های Steam کمتر از 2 درصد است</p>
                                                    <span class="date_parent">
                                                     <i class="far fa-clock fontawesome i" style="font-size: 9pt"></i>
                                                <span class="date">2020/10/03</span>
                                                </span>
                                                </div>

                                            </a></li>

                                        <li><a>
                                                <img src="/images/Steam-220x150.jpg">
                                                <div class=" col-lg-8 col-md-10 col-sm-12 p-0 ">
                                                    <p>تعداد کاربران فعال هدست‌های VR در Steam کمتر از 2 درصد است </p>
                                                    <span class="date_parent">
                                                     <i class="far fa-clock fontawesome i" style="font-size: 9pt"></i>
                                                <span class="date">2020/10/03</span>
                                                </span>
                                                </div>

                                            </a></li>

                                    </ul>
                                </div><!--content_into-->

                            </div><!--content-->
                        </div><!--row-->
                    </div><!--tab_widget-->

                    <div class="share">
                        <div class="social_media ml-2 so_media">
                            <a class="btn mr-0" href="#"><i class="fab fa-facebook-f i"></i></a>
                            <a class="btn mr-0" href="#"><i class="fab fa-google-plus-g i"></i></a>
                            <a class="btn mr-0" href="#"><i class="fab fa-youtube i"></i></a>
                            <a class="btn mr-0" href="#"><i class="fab fa-instagram i "></i></a>
                            <a class="btn mr-0" href="#"><i class="fab fa-telegram-plane i"></i></a>
                            <a class="btn mr-0" href="#"><i class="fab fa-linkedin-in i"></i></a>
                        </div><!-- social_media-->

                    </div><!--share-->
                </div><!--col-lg-4-->


                <div class="col-lg-8 col-md-12 mt-5">

                    <div class="details p-2">

                        <div class="description">
                            {!!$detail_post[0]->description!!}

                            @if($detail_post[0]->video)
                                <video class="w-100" id="player" playsinline controls
                                       data-poster="{{$detail_post[0]->photos->path}}">
                                    <source src="{{$detail_post[0]->video->path}}" type="video/mp4" size="720">
                                    <source src="{{$detail_post[0]->video->path}}" type="video/mp4" size="480">
                                    <source src="{{$detail_post[0]->video->path}}" type="video/mp4" size="360">

                                    <track kind="captions" label="English captions" src="/path/to/captions.vtt"
                                           srclang="en" default/>
                                </video>
                            @endif


                            <div class="tag">
                                <span><i class="fas fa-tags i"
                                         style="font-size: 9pt!important;"></i><p>برچسب ها</p></span>
                                <ul>
                                    @foreach($detail_post[0]->meta_keywords as $meta_keyword)
                                        <li><a>{{$meta_keyword}}</a></li>
                                    @endforeach
                                </ul>
                            </div><!--tag-->
                        </div><!--description-->
                    </div><!-- details-->
                    <div class="share">
                        <span class="c"> <i class="fas fa-share-alt i"></i><p>اشتراک گذاری</p></span>
                        <div class="social_media">

                            <a class="btn" href="#"><i class="fab fa-facebook-f i"></i></a>
                            <a class="btn" href="#"><i class="fab fa-google-plus-g i"></i></a>
                            <a class="btn" href="#"><i class="fab fa-youtube i"></i></a>
                            <a class="btn" href="#"><i class="fab fa-instagram i "></i></a>
                            <a class="btn"
                               href="https://t.me/share/url?url=gamecenter.me/details/{{$detail_post[0]->slug}}&text={{str_limit($detail_post[0]->meta_desc,100)}}"><i
                                    class="fab fa-telegram-plane i"></i></a>
                            <a class="btn" href="#"><i class="fab fa-linkedin-in i"></i></a>
                        </div><!-- social_media-->

                    </div><!--share-->

                    <div class="related_posts">
                        <h3>نوشته های مشابه</h3>
                        <div class="posts">
                            <ul>
                                @foreach($related_posts as $related_post)
                                    <li><a href="/details/{{$related_post->slug}}">
                                            <img src="{{$related_post->photos->path}}">
                                            <p>{{$related_post->title}}</p>
                                        </a></li>
                                @endforeach
                            </ul>
                        </div><!--posts-->
                    </div><!--related_posts-->
                    @if(\Illuminate\Support\Facades\Auth::user())
                    @else
                        <div class="comment_into">
                            <p>برای نوشتن دیدگاه ابتدا باید <a href="/login"> وارد شوید.</a></p>
                        </div><!--comment_into-->
                    @endif

                    <div class="comment">
                        <h3 class="">نوشتن دیدگاه</h3>
                        @if(\Illuminate\Support\Facades\Auth::user())
                            <button type="button" data-toggle="modal" data-target="#exampleModal"
                                    class="send_comment btn-info "> ارسال دیدگاه
                            </button>
                        @endif



                        @foreach($comments as $comment)

                                <div class="body_comment">
{{--                                <input type="text" value="{{$comment->id}}" name="comment_id">--}}
                                                    <span class="">
                                                        <img src="/images/original/user.png" alt="" width="70px"
                                                             height="70px">
                                                    <div class="col-lg-7 col-md-7 p-0 col-sm-5">
                                                        <p class="name">{{$comment->user->name}}</p>
                                                        <p class="date">{{\Hekmatinasser\Verta\Facades\Verta::instance($comment->created_at)->formatdifference(Hekmatinasser\Verta\Verta::today('Asia/Tehran')) }}</p>
                                                    </div>
                                                         @if(\Illuminate\Support\Facades\Auth::user())
                                                            <button comment_id="{{$comment->id}}" type="button" class="btn-info answer_to_question" data-toggle="modal" data-target="#exampleModal">پاسخ به دیدگاه</button>
                                                        @endif
                                                    </span>
                                <p class="comment_desc">{{$comment->comment}}</p>
                                    @if(count($comment->childrenRecursive)>0)
                                        @include('admin.partials.child_comment',['comments'=>$comment->childrenRecursive])

                                    @endif
                            </div><!--body_comment-->
                        @endforeach
                            <form action="/comment" method="post">
                                @csrf

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-dark">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="" style="color: white;position: absolute;left: 15px;top: 10px;">&times;</span>
                                                </button>
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-family: IRANSans;font-size: 13pt;color: white;
                            ">ارسال دیدگاه</h5>
                                            </div>



                                            <div class="modal-body">
                                                <input type="hidden" value="" name="comment_id">
                                                <textarea name="comment" placeholder="متن دیدگاه شما" class="col-lg-12"
                                                          style="min-height: 250px;direction: rtl;font-size: 13pt;font-family: Yekan;padding: 10px;font-weight: 400"></textarea>
                                                <input type="hidden" value="{{$detail_post[0]->id}}" name="post_id">
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="submit" class="mx-auto btn_save_comment btn-success">ثبت دیدگاه</button>
                                            </div>
                                            <div class="modal-footer border-0 bg-warning ">
                                                <h5 class="modal-title mx-auto" id="exampleModalLabel" style="direction:rtl;font-family: IRANSans;font-size: 10pt;
                            ">دیدگاه شما پس از تایید در قسمت نظرات نمایش داده خواهد شد.</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>


                    </div><!--comment-->
                </div><!--col-lg-8-->

            </div><!--row-->
        </div><!-- container-->
    </div>





    <script src="https://cdn.plyr.io/3.6.2/plyr.js"></script>
{{--    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>--}}
    <script src="{{ asset('js/share.js') }}"></script>

    {{--    for image orginal top--}}
    <script>
        var ypos, image;

        function parallex() {
            ypos = window.pageYOffset;
            image = document.getElementById('image');
            image.style.top = ypos * .4 + 'px';
        }

        window.addEventListener('scroll', parallex);
        $('.fresh').click(function () {
            $(this).find('.img').css('display', 'none');
            $('.contacts_widget').css('display', 'none');
            $('.contacts .img').css('display', 'block');
            $(this).find('.widget_new').css('display', 'block');
        });

        $('.contacts').click(function () {
            $(this).find('.img').css('display', 'none');
            $('.widget_new').css('display', 'none');
            $('.fresh .img').css('display', 'block');
            $(this).find('.contacts_widget').css('display', 'block');
        });


        document.addEventListener('DOMContentLoaded', () => {
            // This is the bare minimum JavaScript. You can opt to pass no arguments to setup.
            const player = new Plyr('#player');

            // Expose
            window.player = player;

            // Bind event listener
            function on(selector, type, callback) {
                document.querySelector(selector).addEventListener(type, callback, false);
            }

            // Play
            on('.js-play', 'click', () => {
                player.play();
            });

            // Pause
            on('.js-pause', 'click', () => {
                player.pause();
            });

            // Stop
            on('.js-stop', 'click', () => {
                player.stop();
            });

            // Rewind
            on('.js-rewind', 'click', () => {
                player.rewind();
            });

            // Forward
            on('.js-forward', 'click', () => {
                player.forward();
            });
        });



        $('.answer_to_question').click(function () {
var comment_id=$(this).attr('comment_id');
            $('.modal-body input[name=comment_id]').val(comment_id);
        })
    </script>


@endsection
