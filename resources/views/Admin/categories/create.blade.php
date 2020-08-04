@extends('admin.layout.index')
@section('content')

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"> ایجاد دسته بندی جدید</h3>

        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <form action="/administrator/categories" method="post">
                        @csrf
                        <div class="form-group">
                            <labe for="name">نام :</labe>
                            <input type="text" value="" name="title" class="form-control"
                                   placeholder="نام دسته بندی خود را وارد نمایید">
                        </div>{{--form-control--}}
                        <div class="form-group">
                            <labe for="name">دسته والد :</labe>
                            <select name="category_parent" id="" class="form-control">
                                <option value="">بدون والد</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @if(count($category->childrenRecursive)>0)
                                        @include('Admin.partials.category_list',['categories'=>$category->childrenRecursive,'level'=>1])
                                    @endif
                                @endforeach
                            </select>
                        </div>{{--form-control--}}
                        <div class="form-group">
                            <labe for="title_seo">عنوان سئو :</labe>
                            <input type="text" value="" name="meta_title" class="form-control"
                                   placeholder="عنوان سئو خود را وارد نمایید">
                        </div>{{--form-control--}}
                        <div class="form-group">
                            <labe for="name">توضیحات سئو :</labe>
                            <textarea type="text" value="" name="meta_desc" class="form-control"></textarea>
                        </div>{{--form-control--}}
                        <div class="form-group">
                            <labe for="name">کلمات کلیدی :</labe>
                            <input type="text" value="" name="meta_keywords" class="form-control"
                                   placeholder="کلمات کلیدی خود را وارد نمایید">
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
