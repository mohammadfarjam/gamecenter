@extends('Admin.layout.index')

{{--@section('style_dropzone')--}}
{{--    <link href="{{asset('/admin/css/dropzone.min.css')}}" rel="stylesheet">--}}
{{--@endsection--}}

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"> ویرایش کاربر  </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <form action="/administrator/access/{{$user->id}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">

                        <div class="form-group">
                            <labe for="name">تصویر کاربر :</labe>
                            @if($user->photo_id)
                                <img width="25%" src="{{$user->photo->path}}">

                            @else
                                <img src="http://www.placehold.it/90">
                            @endif
                        </div>

                        <div class="form-group">
                            <labe for="name"> ایمیل کاربر :</labe>
                            <input type="text" value="{{$user->email}}" name="email" class="form-control" readonly>
                        </div>{{--form-control--}}

                        <div class="form-group">
                            <labe for="name"> نام کاربر :</labe>
                            <input type="text" value="{{$user->name}}" name="email" class="form-control" readonly>
                        </div>{{--form-control--}}

                        <div class="form-group">
                            <labe for="name"> نقش کاربر :</labe>
                            <select name="role[]" class="form-control " multiple>

                                @foreach($roles as $role)

                                    <option value="{{$role->id}}"

                                            @foreach($user->roles as $ro)
                                            @if($role->id==$ro->id) selected @endif
                                        @endforeach
                                    >{{$role->title}}</option>--}}
                                @endforeach


                                {{--                                @foreach($user->roles as $role)--}}
                                {{--                                    <option value="{{$role->id}}"--}}
                                {{--                                            @foreach($user->roles as $ro)--}}

                                {{--                                            @if($role->id==$ro->id) selected @endif--}}
                                {{--                                        @endforeach--}}
                                {{--                                    >{{$role->title}}</option>--}}
                                {{--                                @endforeach--}}


                            </select>

                        </div>{{--form-control--}}

                        {{--                        <div class="form-group">--}}
                        {{--                            <labe for="photo"> تصویر :</labe>--}}
                        {{--                            <div id="photo" class="dropzone"></div>--}}
                        {{--                            <input type="hidden" name="photo_id" id="user_photo" value="{{$user->id}}">--}}
                        {{--                        </div>--}}

                        <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                    </form>


                </div>{{--col-md-8--}}

            </div>{{--row--}}

        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
    </div>
@endsection

{{--@section('js_dropzone')--}}
{{--    <script type="text/javascript" src="{{asset('/admin/js/dropzone.min.js')}}"></script>--}}
{{--    <script>--}}
{{--        $("#photo").dropzone({--}}
{{--            url: "{{route('photos.upload')}}",--}}
{{--            addRemoveLinks: true,--}}
{{--            maxFiles: 1,--}}
{{--            sending: function (file, xhr, formData) {--}}
{{--                formData.append("_token", "{{csrf_token()}}")--}}
{{--            },--}}
{{--            success: function (file, response) {--}}
{{--                document.getElementById('user_photo').value = response.photo_id--}}
{{--            }--}}
{{--        });--}}

{{--    </script>--}}

{{--@endsection--}}

