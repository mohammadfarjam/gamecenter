@extends('Admin.layout.index')

@section('style_dropzone')
    <link href="{{asset('/admin/css/dropzone.min.css')}}" rel="stylesheet">




@endsection

@section('content')
    @if(count($errors)>0)
        <div class="alert alert-danger ">
            <ul style="list-style-type: none">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"> ایجاد مطلب جدید</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">

                <form action="/administrator/posts" method="post">
                    @csrf
                    <div class="col-md-6 col-lg-offset-2">



                        <div class="form-group ">
                            <label for="name">عنوان مطلب :</label>
                            <input type="text" value="{{old('title')}}" name="title" class="form-control"
                                   placeholder="عنوان مطلب خود را وارد نمایید">
                        </div>{{--form-control--}}

                        <div class="form-group">
                            <label for="slug">نام مستعار :</label>
                            <input type="text" value="{{old('slug')}}" name="slug" class="form-control"
                                   placeholder="نام مستعار را وارد نمایید">
                        </div>{{--form-control--}}

                        <div class="form-group">
                            <label for="name"> تصویر اصلی :</label>
                            <div id="photo" class="dropzone"></div>
                            {{--                            <input type="hidden" name="photo_id" id="photo_original">--}}
                            <input type="hidden" name="photo_name" id="photo_name">
                            <input type="hidden" name="photo_name_original" id="photo_name_original">
                        </div>

                        <div class="form-group">
                            <label for="categories">دسته بندی :</label>
                            <select name="category_parent" id="" class="form-control">
                                <option value="">بدون والد</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @if(count($category->childrenRecursive)>0)
                                        @include('Admin.partials.category_in_createNewPost',['categories'=>$category->childrenRecursive,'level'=>1])
                                    @endif
                                @endforeach
                            </select>
                        </div><!--form-group-->
                        <div class="form-group">
                            <label for="status">وضعیت نشر :</label>
                            <input type="radio" value="0" name="status"
                                   style="vertical-align: middle;margin-right: 35px;margin-left: 8px; "><span>منتشر نشده</span>
                            <input type="radio" value="1" name="status"
                                   style="vertical-align: middle;margin-right: 35px;margin-left: 8px;  " checked><span>منتشر شده</span>
                        </div>
                        <div class="form-group">
                            <label for="name">بارگذاری ویدیو :</label>
                            <div id="video" class="dropzone"></div>
                            <input type="hidden" name="video_path" id="video_path" value="">
                            <input type="hidden" name="video_name" id="video_name" value="">
                        </div>


                        <div class="form-group">
                            <label for="slug_title"> عنوان سئو :</label>
                            <input type="text" value="{{old('meta_title')}}" name="meta_title" class="form-control"
                                   placeholder="عنوان سئو را وارد نمایید">
                        </div>{{--form-control--}}

                        <div class="form-group">
                            <label for=""> توضیحات سئو :</label>
                            <textarea type="text" name="meta_desc" class="form-control"
                                      placeholder="توضیحات سئو را وارد نمایید">{{old('meta_desc')}}</textarea>
                        </div>{{--form-control--}}

                        <div class="form-group ">
                            <label for=""> کلمات کلیدی سئو :</label>
                            <input type="text" value="{{old('meta_keywords')}}"
                                   name="meta_keywords"
                                   id='meta_keywords' class="form-control"
                                   placeholder="کلمات کلیدی سئو را وارد نمایید">
                        </div>{{--form-control--}}

                    </div>{{--col-md-6--}}


                    <div class="form-group col-lg-9 col-lg-offset-2">
                        <label for="name">توضیحات مطلب :</label>
                        <textarea type="text" id="basic-example" name="description"
                                  class="form-control my-editor col-lg-12"
                                  value="">
                             </textarea>
                        <button type="submit" class="btn btn-success pull-left" style="margin-top: 50px;width: 100px">
                            ذخیره
                        </button>
                    </div>{{--form-control--}}
                </form>
            </div>{{--row--}}
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
    </div>





@section('js_dropzone')

    <script type="text/javascript" src="{{asset('/admin/js/dropzone.min.js')}}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script type="text/javascript" src="{{asset('/admin/js/tinymce/fa_IR.js')}}"></script>
    <script type="text/javascript" src="{{asset('/admin/js/tinymce/fa.js')}}"></script>


    <script>
        tinymce.init({
            selector: '.my-editor',
            height: 500,
            language: 'fa',
            image_title: true,
            automatic_uploads: true,
            relative_urls : false,
            remove_script_host : true,
            convert_urls: false,
            file_picker_types: 'file image media',
            plugins: 'fullscreen media image code print preview fullpage  searchreplace autolink directionality  visualblocks visualchars fullscreen link    table charmap hr pagebreak nonbreaking  toc insertdatetime advlist lists textcolor wordcount   imagetools    contextmenu colorpicker textpattern media ',
            toolbar: ' insertfile fullscreen formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat |undo redo |media image code| link fontsizeselect  | ',


            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '{{route('photos_desc.upload')}}');
                var token = '{{ csrf_token() }}';
                xhr.setRequestHeader("X-CSRF-Token", token);

                xhr.onload = function () {

                    var json;
                    if (xhr.status != 200) {
                        ;
                        failure('HTTP Error: ' + xhr.status);
                        return
                    }
                    json = JSON.parse(xhr.responseText);
                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
                    success(json.location);
                };
                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);

            }


        });


        //for upload picture by dropzone
        $("#photo").dropzone({
            url: "{{route('photos.upload')}}",
            addRemoveLinks: true,
            maxFiles: 50,
            width:300,
            height:200,
            maxFilesize: 1, // MB
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            sending: function (file, xhr, formData) {
                formData.append("_token", "{{csrf_token()}}")
            },
            success: function (file, response) {
                // document.getElementById('photo_original').value = response.photo_id
                document.getElementById('photo_name').value = response.photo_name
                document.getElementById('photo_name_original').value = response.photo_original_name
            }
        });


        //for upload video by dropzone
        $("#video").dropzone({
            url: "{{route('video.upload')}}",
            addRemoveLinks: true,
            maxFiles: 4,
            maxFilesize: 200, // MB
            acceptedFiles: ".mp4,.avi,.mkv",
            sending: function (file, xhr, formData) {
                formData.append("_token", "{{csrf_token()}}")
            },
            success: function (file, response) {
                document.getElementById('video_path').value = response.video_path
                document.getElementById('video_name').value = response.video_name
            }
        });
    </script>
@endsection

@endsection
