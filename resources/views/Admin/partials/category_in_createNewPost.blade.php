@if(isset($categories))
    @foreach($categories as $sub_category)
        <option value="{{$sub_category->id}}">{{str_repeat('--',$level)}}{{$sub_category->title}}</option>
    @endforeach
@endif
