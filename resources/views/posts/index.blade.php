<div>
<p> Hello world!!</p>
</div>
<a href="/posts/create">Create post</a>
<ul>
    @foreach($posts as $post)
    <li>id:{{$post->id}}, title: <strong>{{$post->title}}</strong> <div> {{$post->content}}</div>
    <a href="/posts/{{$post->id}}/edit"> Edit </a> |
    <a href="{{ route('posts.show', [ $post->id,])}}"> Read more </a> 
    </li> 
    @endforeach
</ul>