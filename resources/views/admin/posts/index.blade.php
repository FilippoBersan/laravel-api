@extends('layouts.admin')



@section('content')
<div class="container text-center">
<a href="{{route('admin.posts.create')}}" role="button" class="btn btn-success">Crea nuovo portfolio</a>


@if (session('message'))






<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
   
    <strong class="me-auto">Nuova Notifica</strong>
    
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
{{session('message')}}
  </div>
</div>
@endif
</div>


<br>
  <ul>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">slug</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
@foreach ($posts as $post)
    

    <tr>
  
      <td>{{$post->id}}</td>
      <td>{{$post->title}}</td>
      <td>{{$post->slug}}</td>
      <td>
        <a rel="stylesheet" href="{{route('admin.posts.edit', $post )}}" role="button" class="btn btn-warning btn-sm">edit</a>

         <a rel="stylesheet" href="{{route('admin.posts.show', $post )}}" role="button" class="btn btn-primary btn-sm">show</a>

          <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                     @csrf
                                     @method('DELETE')
                                     <button class="btn btn-danger btn-sm">delete</button>
                                 </form>



   
      </td>
    </tr>
    @endforeach  
  </tbody>
</table>

@endsection