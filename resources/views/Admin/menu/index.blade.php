@extends('Admin.layout.index')

@section('content')


    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">منوی اصلی</h3>
            <a class="btn btn-app pull-left" href="{{route('menu.create')}}">
                <i class="fa fa-plus"></i> جدید
            </a>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            {{--            @include('admin.partials.form_errors')--}}

            @if(Session::has('delete_category_newest'))
                <div class="alert alert-danger">
                    <div>{{Session('delete_category_newest')}}</div>
                </div>
            @endif

            @if(Session::has('store_new_menu'))
                <div class="alert alert-success">
                    <div>{{Session('store_new_menu')}}</div>
                </div>
            @endif

            @if(Session::has('create_category_newest'))
                <div class="alert alert-success">
                    <div>{{Session('create_category_newest')}}</div>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>

                    <tr style="background: #5fff93">
                        <th class="text-center">ردیف</th>
                        <th class="text-center">عنوان منو</th>
                        <th class="text-center">ویرایش</th>
                        <th class="text-center">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
@foreach($new_menus as $new_menu)
                    <tr>
                        <td class="text-center">{{$new_menu->id}}</td>
                        <td class="text-center">{{$new_menu->title}}</td>
                        <td class="text-center"><a href="{{route('menu.edit',$new_menu->id)}}">
                                <span class="label label-warning">ویرایش</span>
                            </a>
                        </td>

                        <td class="text-center menu_id">
                            <form method="post" id="form_delete" action=""
                                  class="form_delete">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="button"  menu_id="{{$new_menu->id}}" data-toggle="modal" data-target="#exampleModalCenter"
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
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
    </div>


    <script>
        $('.menu_id button').click(function () {
            var menu_id=  $(this).attr('menu_id');
            $('#form_delete').attr('action','/administrator/menu/'+menu_id);
        })
        function submit_form() {
            $('#form_delete').submit();
        }
    </script>
@endsection


