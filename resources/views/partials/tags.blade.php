@foreach($taglist as $index => $tags)
    <a href="{{url('/tag', $tags->tag)}}">{{$tags->tag}}</a>
@endforeach