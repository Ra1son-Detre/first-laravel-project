<h2>Create post</h2>
<form method="post" action="{{route('posts.store')}}">
    @csrf
    <x-posts.input label="Post title" name="title"/>
    <x-posts.input label="Content" name="content" />
    <button>Send</button>
</form>