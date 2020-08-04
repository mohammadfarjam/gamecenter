@if(isset($comments))
    @foreach($comments as $sub_comment)
        <div class=" child_comment">
            <span class="">
             <img src="/images/original/user.png" alt="" width="70px" height="70px">
               <div class="col-lg-10 col-md-7 p-0 col-sm-5">
                   <p class="name">{{$sub_comment->user->name}}</p>
                    <p class="date">{{\Hekmatinasser\Verta\Facades\Verta::instance($sub_comment->created_at)->formatdifference(Hekmatinasser\Verta\Verta::today('Asia/Tehran')) }}</p>
                     </div>
                </span>
            <p class="comment_desc" style="padding-bottom: 30px!important;">{{$sub_comment->comment}}</p>
        </div><!--child_comment-->
    @endforeach
@endif
