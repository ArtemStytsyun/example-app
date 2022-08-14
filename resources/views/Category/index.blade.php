@extends('layouts.main')
@section('content')
<table class="table">
    @csrf
    <thead>
        <tr>
            <td scope="col">numer</td>
            <td scope="col">id</td>
            <td scope="col">title</td>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $num=>$category)
            <tr>
                <th><?=$num+1?></th>
                <td class="">{{ $category->id}}</td>
                <td class="">{{ $category->title}}</td>
                <td class="row"> 
                  <!-- Button trigger modal -->
                  <form action="{{route('category.edit', $category->id)}}" method="category" class="col">
                    <button type="submit"  class="btn btn-dark edit" data-bs-toggle="modal" data-bs-target="#editModal">
                        Edit
                    </button>
                  </form>   

                  <form action="{{route('category.delete', $category->id)}}" method="category" class="col">
                    <button type="submit"  class="btn btn-dark delete" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete
                    </button>
                  </form>   
                </td>
            </tr>
        @endforeach
    <tbody>
</table>

<a class="btn btn-dark" href="{{route('category.create')}}">Create</a>

<!-- DeleteModal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="" method="post" class="modal-content" id="destroyModal">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">delete category with id &nbsp</h5>
        <h5 class="modal-title" id="deleteModalLabelId"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger destroy" data-bs-dismiss="modal">Delete</button>
      </div>
    </form>
  </div>
</div>





  <!-- EditModal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="" method="post" class="modal-content" id="updateModal">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">edit category with id</h5>
          <h5 class="modal-title" id="exampleModalLabelId"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="input-group mb-3">
              <label for="title" class="col-sm-2 col-form-label input-group-text">Title</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" value="">
              </div>
            </div>
            
            <div class="input-group mb-3">
              <label for="content" class="col-sm-2 col-form-label input-group-text">Content</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="content" name="content">

                </textarea>
              </div>
            </div>

            <div class="input-group mb-3">
              <label for="image" class="col-sm-2 col-form-label input-group-text">Image</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="image" name="image" value="">
              </div>
            </div>

            <div class="input-group mb-3">
              <label class=" col-sm-2 input-group-text " for="editCategory" >Category</label>
              <select class="form-select" id="editCategory" >
                <option value="1">1</option>
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

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success update" data-bs-dismiss="modal">Save changes</button>
        </div>
      </form>
    </div>
  </div>
@endsection('content')