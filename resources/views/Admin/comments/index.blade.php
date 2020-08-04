@extends('Admin.layout.index')

@section('content')


    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">لیست نظرات</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">

            @if(Session::has('publish_comment'))
                <div class="alert alert-success">
                    <div>{{Session('publish_comment')}}</div>
                </div>
            @endif

            @if(Session::has('delete_comment'))
                <div class="alert alert-danger">
                    <div>{{Session('delete_comment')}}</div>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr style="background: #5fff93">
                        <th class="text-center">ردیف</th>
                        <th class="text-center">عنوان نظر</th>
                        <th class="text-center">نام نظر دهنده</th>
                        <th class="text-center">تاریخ نظر دهی</th>
                        <th class="text-center">وضعیت</th>
                        <th class="text-center">ویرایش</th>
                        <th class="text-center">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td class="text-center">{{$comment->id}}</td>
                            <td class="text-center">{{str_limit($comment->comment,35)}}</td>
                            <td class="text-center">{{$comment->user->name}}</td>
                            <td class="text-center">{{$v=verta($comment->created_at)->format('Y/n/j')}}</td>
                            <td class="text-center">
                                @if($comment->status==0)
                                    <span class=" label label-danger">منتشر نشده</span>
                                @else
                                    <span class=" label label-success">منتشر شده</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{route('comments.edit',$comment->id)}}">
                                    <span class=" label label-warning">نمایش</span>
                                </a>
                            </td>

                            <td class="text-center comment_id">
                                <form method="post" id="form_delete" action=""
                                      class="form_delete">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="zx" style="width:30px;height: 30px;padding:0;border: none;background: none;" type="button" comment_id="{{$comment->id}}" data-toggle="modal" data-target="#exampleModalCenter">
                                        <img src="/images/original/interface.png" width="25px" height="25px"
                                             style="cursor: pointer" alt="">

                                    </button>

                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered "
                                             style="width: 400px!important; " role="document">
                                            <div class="modal-content" style="border-radius: 8px">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>


                                                <div class="modal-body" style="border-top: none!important;">
                                                    <p style="margin-right: 90px">آیا میخواهید نظر را حذف کنید؟</p>
                                                </div>

                                                <div class="modal-footer" style="border: none!important;">
                                                    <button type="button" class="btn btn-danger"
                                                            style="margin-right: 105px" data-dismiss="modal">لغو
                                                    </button>
                                                    <button type="button" onclick="submit_form()"
                                                            class="btn btn-success">بله حذف شود!
                                                    </button>
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
                    {{ $comments->links() }}
                </div>
</span>

            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->

    </div>
    <script>
        $('.comment_id button').click(function () {
            $('#form_delete').attr('action', '/administrator/comments/' + comment_id);
        })

        function submit_form() {
            $('#form_delete').submit();
        }
    </script>
@endsection
