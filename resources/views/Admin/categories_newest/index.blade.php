@extends('Admin.layout.index')

@section('content')


    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">دسته بندی جدید ترین محتوا</h3>
            <a class="btn btn-app pull-left" href="{{route('categories_newest.create')}}">
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

            @if(Session::has('update_category_newest'))
                <div class="alert alert-success">
                    <div>{{Session('update_category_newest')}}</div>
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
                        <th class="text-center">عنوان دسته بندی</th>
                        <th class="text-center">ویرایش</th>
                        <th class="text-center">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category_newest as $category_new )
                    <tr>
                        <td class="text-center">{{$category_new->id}}</td>
                        <td class="text-center">{{$category_new->title}}</td>
                        <td class="text-center"><a href="{{route('categories_newest.edit',$category_new->id)}}">
                                <span class="label label-warning">ویرایش</span>
                            </a>
                        </td>

                        <td class="text-center ">
                            <form method="post" id="form" action="/administrator/categories_newest/{{$category_new->id}}"
                                  class="">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit"
                                        style="width: 25px;height: 25px; background: none;border: none">
                                    <img src="/images/original/interface.png" width="250%"
                                         style="cursor: pointer" alt="">
                                </button>
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
@endsection


