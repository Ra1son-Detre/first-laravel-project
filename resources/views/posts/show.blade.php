<a href="{{route('posts.showAll',[$post->id] )}}">Main</a>
<div>
<p> {{$post->title}}</p>
</div>
{{$post->content}}
</ul>