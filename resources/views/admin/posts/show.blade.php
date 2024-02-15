
 @extends('layouts.admin')

 @section('page-header')
     <h1>{{ $post->title }}</h1>
     <a href="{{ route('admin.posts.index') }}" role="button" class="btn btn-info btn-sm">Back to posts</a>
 @endsection

 @section('content')
     <h1>{{ $post->title }}</h1>
     <p>{{ $post->content }}</p>
     <div>
  <h1>Categoria: {{$post->type?->title}}</h1>

  <div>
    Tecnologie:
    <ul>
        @foreach ($post->technologies as $technology)
        <li>{{$technology->title}}</li>
        @endforeach
        <li>

        </li>
    </ul>
  </div>
  <hr>
</div>
     <a href="{{ route('admin.posts.index') }}" class="btn btn-primary btn-sm" role="button">Torna alla lista</a>
     <a rel="stylesheet" href="{{ route('admin.posts.edit', $post) }}" role="button" class="btn btn-primary btn-sm">edit</a>
 @endsection

