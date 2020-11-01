@extends('layouts.master')
@section('title','Category')
@section('content')
<div class="panel-header panel-header-sm">
      </div>
      @if(session()->has('Add_cate'))
<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
          {{ session()->get('Add_cate')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
     <div class="row mt-5">
      <div class="col-md-6 col-sm-12">
      <form action="{{ action('CategoryController@store') }}" method="post">
      @csrf
      <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="now-ui-icons ui-1_simple-add"></i></span>
  </div>
  <input type="text" class="form-control" placeholder="Add Category" name="Add_Cate" aria-describedby="basic-addon1">
</div>
<input type="submit" value="Add" class="btn btn-success btn-md ml-5 ">
</form>
      </div>
      <div class="col-md-6 col-sm-12">
      <div class="card">
            <div class="card-body">
            <table class="table table-hover table-striped">
            <tbody>
      @foreach($category as $cate)
      <tr>
      <th class="text-center">{{$cate->id}}</th>
      <th class="text-center">{{$cate->title}}</th>
      <form action="{{url('Dashboard/category/'.$cate->id)}}" method="post">
      @method('DELETE')
      @csrf 
      <td><button  class="btn btn-danger btn-sm btn-circle"> <i class="now-ui-icons ui-1_simple-remove"></i> </button></td>
      </form> 
      </tr>
      @endforeach
            </tbody>
            </table>
            </div>
      </div>
      
      </div>
       </div>
@endsection
