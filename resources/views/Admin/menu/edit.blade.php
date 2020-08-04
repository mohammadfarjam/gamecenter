@extends('admin.layout.index')
@section('content')

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"> ویرایش منو </h3>

        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <form action="/administrator/menu" method="post">
                        @csrf

                        <div class="form-group">
                            <labe for="name">انتخاب دسته بندی:</labe>
                            <select name="category_id" id="" class="form-control">
                                <option value="">بدون دسته بندی</option>

                                @foreach($categories as $category)

                                    <option name="" value="{{$category->id}}" @if($category->id==$new_menu->id_value) selected @endif>{{$category->title}}</option>

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
