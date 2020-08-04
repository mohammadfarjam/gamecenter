@if(isset($categoriess))
@foreach($categoriess as $sub_category)
    <option value="{{$sub_category->id}}" @if($sub_category->id==$post->category_parent) selected @endif>{{str_repeat('--',$level)}}{{$sub_category->title}}</option>
@endforeach
@endif



