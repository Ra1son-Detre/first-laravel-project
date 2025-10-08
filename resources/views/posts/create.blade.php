<h2>Create post</h2>
<form method="post" action="/posts">
    @csrf
    <div>Title: <input name="title" value="{{ old('title') }}"></div>
    <div>Content: <textarea name="content">{{ old('content') }}</textarea></div>
    <hr>
    @if ($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
         </ul>
        </div>
    <hr>
    @endif
    <button>Send</button>
</form>