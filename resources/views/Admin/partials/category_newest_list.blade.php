@if(isset($categories))
    @foreach($categories as $sub_category)
        <option value="{{$sub_category->id}}" @if($sub_category->id==$category_newest->id_value) selected @endif>{{$sub_category->title}}</option>
    @endforeach
@endif



