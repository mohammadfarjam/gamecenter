@extends('Admin.layout.index')

@section('content')
{{--    @include('sweetalert::alert')--}}


    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">کاربران</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {{--            @include('admin.partials.form_errors')--}}

            @if(Session::has('delete_user'))
                <div class="alert alert-danger">
                    <div>{{Session('delete_user')}}</div>
                </div>
            @endif

            @if(Session::has('success_edit'))
                <div class="alert alert-success">
                    <div>{{Session('success_edit')}}</div>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr style="background: #5fff93">
                        <th class="text-center">ردیف</th>
                        <th class="text-center">تصویر کاربر</th>
                        <th class="text-center">نام کاربر</th>
                        <th class="text-center">ایمیل کاربر</th>
                        <th class="text-center">نقش کاربر</th>
                        <th class="text-center">ویرایش</th>
                        <th class="text-center">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)

                        <tr>
                            <td class="text-center">{{$user->id}}</td>
                            <td class="text-center">
                                @if($user->photo_id)
                                    <img width="25%" src="{{$user->photo->path}}">
                                @else
                                    <img src="http://www.placehold.it/90">
                                @endif

                            </td>
                            <td class="text-center">{{$user->name}}</td>
                            <td class="text-center">{{$user->email}}</td>
                            <td class="text-center">
                                <ul style="list-style-type: none;padding: 0">
                                    @foreach($user->roles as $role)
                                        <li class="p-0 m-0">
                                            {{$role->title}}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="text-center">

                                <a href="{{route('access.edit',$user->id)}}">
                                    <img src="/images/original/tools-and-utensils.png" width="16%" alt="">
                                </a>
                            </td>

                            <td class="text-center ">
                                <form method="post" id="form" action="/administrator/access/{{$user->id}}"
                                      class="">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" style="width: 25px;height: 25px; background: none;border: none">
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
