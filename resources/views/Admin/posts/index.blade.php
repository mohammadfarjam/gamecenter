@extends('Admin.layout.index')

@section('content')


    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">لیست مطالب</h3>

            <a class="btn btn-app pull-left" href="{{route('posts.create')}}">
                <i class="fa fa-plus"></i> جدید
            </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {{--            @include('admin.partials.form_errors')--}}

            @if(Session::has('edit_post'))
                <div class="alert alert-success">
                    <div>{{Session('edit_post')}}</div>
                </div>
            @endif

            @if(Session::has('delete_post'))
                <div class="alert alert-danger">
                    <div>{{Session('delete_post')}}</div>
                </div>
            @endif

            @if(Session::has('new_post'))
                <div class="alert alert-success">
                    <div>{{Session('new_post')}}</div>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr style="background: #5fff93">
                        <th class="text-center">ردیف</th>
                        <th class="text-center">عنوان</th>
                        <th class="text-center">منتشر کننده</th>
                        <th class="text-center">تاریخ انتشار</th>
                        <th class="text-center">وضعیت</th>
                        <th class="text-center">ویرایش</th>
                        <th class="text-center">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td class="text-center">{{$post->id}}</td>
                            <td class="text-center">{{$post->title}}</td>
                            <td class="text-center">{{Auth::user()->name}}</td>
                            <td class="text-center">{{$v=verta($post->created_at)->format('Y/n/j')}}</td>
                            <td class="text-center">
                                @if($post->status==0)
                                    <span class=" label label-danger">منتشر نشده</span>
                                @else
                                    <span class=" label label-success">منتشر شده</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{route('posts.edit',$post->id)}}">
                                    <span class=" label label-warning">ویرایش</span>
                                </a>
                            </td>

                            <td class="text-center post_id">
                                <form method="post" id="form_delete" action=""
                                      class="form_delete">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="button"  post_id="{{$post->id}}" data-toggle="modal" data-target="#exampleModalCenter"
                                            style="width: 25px;height: 25px; background: none;border: none">
                                        <img src="/images/original/interface.png" width="250%"
                                             style="cursor: pointer" alt="">

                                    </button>

                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered " style="width: 400px!important; " role="document">
                                            <div class="modal-content" style="border-radius: 8px">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>


                                                <div class="modal-body" style="border-top: none!important;">
                                                    <p style="margin-right: 90px">آیا میخواهید پست را حذف کنید؟</p>
                                                </div>

                                                <div class="modal-footer" style="border: none!important;">
                                                    <button type="button" class="btn btn-danger" style="margin-right: 105px" data-dismiss="modal">لغو</button>
                                                    <button type="button" onclick="submit_form()" class="btn btn-success">بله حذف شود!</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>




                <style>
                    .pagination .page-item.active .page-link {
                        background: #5fff93 !important;
                        color: black;
                        border: 1px solid #cccccc;
                    }
                </style>

                <span class="w-100" style=" display: flex;">
                    <div class="" style="margin-left: 0;margin-right: 0;margin: auto">
                    {{ $posts->links() }}
                </div>
</span>

            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $('.post_id button').click(function () {
        var post_id=  $(this).attr('post_id');
      $('#form_delete').attr('action','/administrator/posts/'+post_id);
    })
    function submit_form() {
      $('#form_delete').submit();
    }
</script>
@endsection
