@extends('admin.layout.index')
@section('content')

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"> ویرایش دسته بندی</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <form action="/administrator/categories/{{$category->id}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="form-group">
                            <labe for="name">نام :</labe>
                            <input type="text" value="{{$category->title}}" name="title" class="form-control"
                                   placeholder="نام دسته بندی خود را وارد نمایید">
                        </div>{{--form-control--}}
                        <div class="form-group">
                            <labe for="name">دسته والد :</labe>
                            <select name="category_parent" id="" class="form-control">
                                <option value="">بدون والد</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>{{--form-control--}}


                        <div class="form-group">
                            <labe for="name"> زیر دسته ها :</labe>
                            <select name="subcategories[]" id="" class="form-control" multiple>
                                @if(count($subcategories)>0)
                                <option>بدون زیر دسته</option>
                                @foreach($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}" selected>{{$subcategory->title}}</option>
                                @endforeach
                                    @else
                                    <option selected>بدون زیر دسته</option>
                                    @endif
                            </select>
                        </div>{{--form-control--}}



                        <div class="form-group">
                            <labe for="title_seo">عنوان سئو :</labe>
                            <input type="text" value="{{$category->meta_title}}" name="meta_title" class="form-control"
                                   placeholder="عنوان سئو خود را وارد نمایید">
                        </div>{{--form-control--}}
                        <div class="form-group">
                            <labe for="name">توضیحات سئو :</labe>
                            <textarea type="text" value="" name="meta_desc" class="form-control">{{$category->meta_desc}}</textarea>
                        </div>{{--form-control--}}
                        <div class="form-group">
                            <labe for="name">کلمات کلیدی :</labe>
                            <input type="text" value="{{$category->meta_keywords}}" name="meta_keywords" class="form-control"
                                   placeholder="کلمات کلیدی خود را وارد نمایید">
                        </div>{{--form-control--}}
                        <button type="submit" class="btn btn-success pull-left">ویرایش</button>
                    </form>


                </div>{{--col-md-8--}}

            </div>{{--row--}}

        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
    </div>
@endsection
