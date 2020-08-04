@extends('admin.layout.index')
@section('content')

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"> ایجاد دسته بندی جدید محتوا</h3>

        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <form action="/administrator/categories_newest" method="post">
                        @csrf
{{--                        <div class="form-group">--}}
{{--                            <labe for="name">نام :</labe>--}}
{{--                            <input type="text" value="" name="title" class="form-control"--}}
{{--                                   placeholder="نام دسته بندی خود را وارد نمایید">--}}
{{--                        </div>--}}{{--form-control--}}
                        <div class="form-group">
                            <labe for="name">انتخاب دسته بندی:</labe>
                            <select name="category_newest" id="" class="form-control">
                                <option value="">بدون دسته بندی</option>
                                @foreach($categories as $category)
                                    <option name="" value="{{$category->id}}">{{$category->title}}</option>
                                    @if(count($category->childrenRecursive)>0)
                                        @include('Admin.partials.category_list',['categories'=>$category->childrenRecursive])
                                    @endif
                                @endforeach
                            </select>
                        </div>{{--form-control--}}
                        <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                    </form>


                </div>{{--col-md-8--}}

            </div>{{--row--}}

        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
    </div>
@endsection
