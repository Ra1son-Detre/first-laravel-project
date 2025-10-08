<div>
<p> Hello world!! {{$sum}}</p>
</div>
<a href="/posts/create">Create post</a>
<ul>
    @foreach($posts as $post)
    <li>id:{{$post->id}}, title: <strong>{{$post->title}}</strong> <div> {{$post->content}}</div></li> 
    @endforeach
</ul>