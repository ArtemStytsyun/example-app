@extends('layouts.main')
@section('content')
<form  action="{{route('category.store')}}" method="post">
    @csrf
    <div class="input-group mb-3">
        <label for="title" class="col-sm-2 input-group-text">title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="title">
        <div id="emailHelp" class="form-text"></div>
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