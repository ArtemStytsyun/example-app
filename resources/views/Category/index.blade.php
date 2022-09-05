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
                  <form action="{{route('admin.category.edit', $category->id)}}" method="category" class="col">
                    <button type="submit" class="btn btn-dark" id="editCategory" if="edit" data-bs-toggle="modal" data-bs-target="#editModal">
                        Edit
                    </button>
                  </form>   

                  <form action="{{route('admin.category.delete', $category->id)}}" method="post" class="col">
                    <button type="submit"  class="btn btn-dark" id='deleteCategory' data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete
                    </button>
                  </form>   
                </td>
            </tr>
        @endforeach
    <tbody>
</table>

<a class="btn btn-dark" href="{{route('admin.category.create')}}">Create</a>

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
      <form action="" method="patch" class="modal-content" id="updateModal">
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

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" id="updateCategory" data-bs-dismiss="modal">Save changes</button>
        </div>
      </form>
    </div>
  </div>
@endsection('content')