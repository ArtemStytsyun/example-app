@extends('layouts.main')
@section('content')
<form  action="{{route('post.store')}}" method="post">
    @csrf
    <div class="input-group mb-3">
        <label for="title" class="col-sm-2 input-group-text">title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="title">
        <div id="emailHelp" class="form-text"></div>
    </div>

    <div class="input-group mb-3">
        <label for="content" class="col-sm-2 input-group-text">content</label>
        <textarea name="content"class="form-control" id="content" placeholder="content"> </textarea>
        <div id="content" class="form-text"></div>
    </div>

    <div class="input-group mb-3">
        <label for="image" class=" col-sm-2 input-group-text">image</label>
        <input name="image" type="text" class="form-control" id="image" placeholder="image">
        <div id="image" class="form-text"></div>
    </div>

    <div class="input-group mb-3">
    <label class=" col-sm-2 input-group-text " for="editCategory" >Category</label>
    <select class="form-select" id="editCategory" name="category" >
        @foreach($categories as $category)
        <option value="{{$category->title}}"> {{$category->title}} </option>
        @endforeach
    </select>
    </div>

    <div class="form-check">
    <input class="form-check-input " type="checkbox" id="is_published" name="is_published">
    <label class="form-check-label" for="is_published">
        published
    </label>
    </div>
    
    <button type="submit" class="btn btn-dark">Create</button>
</form>
@endsection('content')