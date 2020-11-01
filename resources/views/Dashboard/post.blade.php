@extends('layouts.master')
@section('title','Post Story')
@section('content')
<div class="panel-header panel-header-sm">
      </div>
<div class="container ">
@if(session()->has('add'))
<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
          {{ session()->get('add')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session()->has('update'))
<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
          {{ session()->get('update')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
    <div class="row mt-5">
    <div class="col-md-4">  
      <button type="button" class="btn btn-success " data-toggle="modal" data-target="#createPost" > <i class="now-ui-icons ui-1_simple-add"></i>
Create Post</button>
<!-- Model -->
      <div class="modal fade" id="createPost"  role="dialog" aria-labelledby="createPost" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPost"><i class="now-ui-icons ui-1_simple-add mx-2 mt-1"></i>Create Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ action('PostsController@store') }}" method="post" enctype="multipart/form-data">
      <div class="modal-body">
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        @csrf
          <div class="form-group">
            <label for="recipient-name"  class="col-form-label ">Title:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control @error('editor1') is-invalid @enderror" id="editor1" name="editor1"></textarea>
          </div>
<div class="input-group my-3 ">
  <div class="input-group-prepend mr-2 mb-3">
    <label class="input-group-text" for="inputGroupSelect01">Category</label>
  </div>
  <select class="custom-select mt-2" name="category_id" id="inputGroupSelect01">
    <option selected>Choose...</option>
    @foreach($category as $categorys)
    <option value="{{ $categorys->id }}" > {{ $categorys->title }}</option>
    @endforeach
  </select>
</div>
<hr>
<div class="custom-file">
  <input type="file" class="custom-file-input" name="img" id="customFile">
  <label class="custom-file-label" for="customFile">Choose file</label>
</div>
 </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Save" class="btn btn-primary ">
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- end Modal First of search  --> 
<div class="col-md-4  ">
    <button class="btn btn-primary  float-right"> Search </button>
</div>
<div class="col-md-4  justify-content-end mt-3">
<input type="text" class="form-control float-right ml-5 " placeholder="Search Posts.."> 
</div>
</div>
<!--Post Tabel -->
<h1 class="display-4 lead mt-5">List of Posts </h1>
<table class="table table-danger table-striped table-hover">
<thead class="bg-secondary text-white">
<tr>
  
<th scope="col">Id</th>
<th scope="col">Title</th>
<!--<th scope="col">Content</th>-->
<th scope="col"> User </th>
<th scope="col">Date</th>
<th scope="col"></th>
<th scope="col"></th>
<th scope="col"></th>

</tr>
</thead>
<tbody>
@foreach($post as $posts)
<tr>
      <th scope="row" >{{$posts->id}}</th>
      <td>{{$posts->title}}</td>
     <!-- <td>{{$posts->content}} </td>-->
      <td> {{ $posts->user->name ?? 'Anonym'}}</td>
      <td>{{$posts->updated_at}}</td>
      <td><button class="btn btn-warning btn-sm" data-toggle="modal" data-hover="tooltip" data-placement="top" data-target="#edit" id="modal-edit"> Edit</button></td>
      <td><a href="{{ url('http://blog.localhost:8000/post/'.$posts->title) }}" class="btn btn-success btn-sm">Show </a></td>
     <form action="{{url('Dashboard/posts/'.$posts->id)}}" method="post">
      @method('DELETE')
      @csrf 
      <td><button  class="btn btn-danger btn-sm"> Delete</button></td>
      </form>
      @endforeach

</tbody>
</table>


<!-- edit model-->
<div class="modal fade" id="edit"  role="dialog" aria-labelledby="editePost" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPost"><i class="now-ui-icons ui-1_simple-add mx-2 mt-1"></i>Edit Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <!--route('posts.update', 'test') action('PostsController@update',$posts->id)-->
      <form action="{{ url('Dashboard/posts/') }}" method="post" enctype="multipart/form-data">
      <div class="modal-body">
      @method('PATCH')
        @csrf
          <div class="form-group">
            <label for="recipient-name"  class="col-form-label">Title:</label>
            <input type="text" class="form-control" name="title" id="title" value="">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="editor" name="editor" ></textarea>
          </div>
          
<div class="input-group my-3 ">
  <div class="input-group-prepend mr-2 mb-3">
    <label class="input-group-text" for="inputGroupSelect01">Category</label>
  </div>
  <select class="custom-select mt-2" name="category_id" id="inputGroupSelect01">
    <option selected> </option>

    <option value="" > </option>
</select>
</div>

<hr>
<div class="custom-file">
    <input type="file" class="custom-file-input" name="img" id="customFile">
    <label class="custom-file-label" for="customFile">Choose file</label>
</div>
  </div>
 </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Save" class="btn btn-primary ">
      </div>
      </form>
    </div>
  </div>
</div>
</div>

<script>
    CKEDITOR.replace('editor1', {
        uiColor: '##d63031' //#CCEAEE
    });
    CKEDITOR.replace( 'editor', {
        uiColor: '##d63031' //#CCEAEE
    } );

    $(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

  </script>

@endsection
    
       

    
