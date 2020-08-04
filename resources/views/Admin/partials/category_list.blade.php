


@if(isset($categories))
    @foreach($categories as $sub_category)
        <span  class="child_category">{{$sub_category->title}}</span>
    @endforeach

@endif


