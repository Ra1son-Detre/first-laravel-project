<a href="{{route('posts.showAll',[$post->id] )}}">Main</a>
<h2>Edit post #{{$post->id}}</h2>
<form method="post" action="{{route('posts.update', [$post->id])}}">
    @csrf
    @method('PUT')
    <x-posts.input label="Post title" name="title" default-Value="{{$post->title}}"/>
    <x-posts.input label="Content" name="content" default-Value="{{$post->content}}"/>
    <hr>
    <button>Send</button>
</form>