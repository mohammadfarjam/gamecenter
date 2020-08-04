@extends('Admin.layout.index')


@section('content')

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">نمایش نظرات</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class=" col-lg-6 col-lg-offset-2">
                    <form action="/administrator/comments/{{$view_comment->id}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="form-group">
                            <label for="name">نام کاربر :</label>
                            <input type="text" value="{{$view_comment->user->name}}" name="name" class="form-control"
                                   readonly>
                        </div>{{--form-control--}}

                        <div class="form-group">
                            <label for="email">ایمیل کاربر :</label>
                            <input type="text" value="{{$view_comment->user->email}}" name="email" class="form-control"
                                   readonly>
                        </div>{{--form-control--}}

                        <div class="form-group">
                            <label for="description"> توضیحات نظر :</label>
                            <textarea type="text" name="description"
                                      class="form-control">{{$view_comment->comment}}</textarea>
                        </div>{{--form-control--}}

                        <div class="form-group">
                            <label for="status">وضعیت نشر :</label>
                            <input type="radio" value="0" name="status"
                                   style="vertical-align: middle;margin-right: 35px;margin-left: 8px; "
                                   @if($view_comment->status==0) checked @endif><span>منتشر نشده</span>
                            <input type="radio" value="1" name="status"
                                   style="vertical-align: middle;margin-right: 35px;margin-left: 8px;  "
                                   @if($view_comment->status==1) checked @endif ><span>منتشر شده</span>
                        </div>{{--form-control--}}

                        <button type="submit" class="btn btn-success pull-left" style="margin-top: 50px;width: 100px">
                            انتشار
                        </button>

                    </form>
                </div><!--col-lg-6-->

            </div>{{--row--}}
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
    </div>





@endsection





























































