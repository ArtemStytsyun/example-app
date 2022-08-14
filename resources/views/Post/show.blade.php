@extends('layouts.main')
@section('content')
    @csrf
   <div class="post">
        @foreach($post->getAttributes() as $key => $value)
            <div class="post__paragraph row"> 
                <div class="post__key col"> {{$key}} </div>
                <div class="post__value col"> {{$value}}</div>
            </div>
        @endforeach
    
        <div class="post__paragraph"> 
            <a href="/posts/{{ $post->id}}edit" class="btn btn-dark">Edit</a>
            <a href="{{route('post.show', $post->id)}}" class="btn btn-dark">Delete</a>
        </div>


   </div>
@endsection('content')