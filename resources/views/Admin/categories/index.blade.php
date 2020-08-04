@extends('Admin.layout.index')

@section('content')
    {{--    @include('sweetalert::alert')--}}
    <style>
        .child_category {
            display: inline-block;
            width: 60%;
            margin-bottom: 8px;
        }
    </style>

    <div class="box box-info">

        <div class="box-header with-border">
            <h3 class="box-title">دسته بندی</h3>
            <a class="btn btn-app pull-left" href="{{route('categories.create')}}">
                <i class="fa fa-plus"></i> جدید
            </a>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            {{--            @include('admin.partials.form_errors')--}}

            @if(Session::has('deleted'))
                <div class="alert alert-danger">
                    <div>{{Session('deleted')}}</div>
                </div>
            @endif

            @if(Session::has('edited'))
                <div class="alert alert-success">
                    <div>{{Session('edited')}}</div>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr style="background: #5fff93">
                        <th class="text-center">ردیف</th>
                        <th class="text-center">عنوان دسته بندی</th>
                        <th class="text-center"> زیر دسته ها</th>
                        <th class="text-center">ویرایش</th>
                        <th class="text-center">حذف</th>
                    </tr>
                    </thead>
                    <tbody class="cc">
                    @foreach($categories as $category)
                        <tr class="id_td" parent_id_td="{{$category->id}}">
                                <td class="text-center ">{{$category->id}}</td>
                                <td class="text-center">{{$category->title}}</td>
                                <td class="text-center add_agian_child">
                                    @if(count($category->childrenRecursive)>0)
                                        @include('admin.partials.category_list',['categories'=>$category->childrenRecursive])
                                    @endif


                                </td>
                                <td class="text-center">

                                    <a href="{{route('categories.edit',$category->id)}}">
                                        <span class=" label label-warning">ویرایش</span>
                                    </a>
                                </td>

                                <td class="text-center cat_id">
                                    <form method="post" id="form_delete" action=""
                                          class="form_delete">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="button" cat_id="{{$category->id}}" data-toggle="modal"
                                                data-target="#exampleModalCenter"
                                                style="width: 25px;height: 25px; background: none;border: none">
                                            <img src="/images/original/interface.png" width="250%"
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
                                                        <p style="margin-right: 90px">آیا میخواهید دسته بندی را حذف
                                                            کنید؟</p>
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
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->

        <style>
            .pagination .page-item.active .page-link {
                background: #5fff93 !important;
                color: black;
                border: 1px solid #cccccc;
            }
        </style>

        <span class="w-100" style=" display: flex;">
                    <div class="" style="margin-left: 0;margin-right: 0;margin: auto">
                    {{ $categories->links() }}
                </div>
</span>
    </div>
    <script>
        $('.cat_id button').click(function () {
            var cat_id = $(this).attr('cat_id');
            // console.log(cat_id)
            $('#form_delete').attr('action', '/administrator/categories/' + cat_id);
        });

        function submit_form() {
            $('#form_delete').submit();
        }



           //    $('[parent_id_td='+parent_id+']').find('.add_agian_child').append(Again_data_ajax);


        {{--$(document).on('click', '.del', function () {--}}

        {{--})--}}
    </script>

@endsection
