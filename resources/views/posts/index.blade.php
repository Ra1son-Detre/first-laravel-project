<div>
<p> Hello world!! {{$sum}}</p>
</div>
<ul>
    @foreach($posts as $post)
    <li>{{$post['id']}}</li>
    @endforeach
</ul>