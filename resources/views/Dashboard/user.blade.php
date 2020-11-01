@extends('layouts.master')
@section('title','User ')
@section('content')
<div class="panel-header panel-header-sm">
      </div>
      @if(session()->has('adduser'))
<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
          {{ session()->get('adduser')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="content mb-5">
<div class="row">
<div class="col-md-9 col-sm-12  ">
<div class="card">
<div class="card-header">
   @if(Auth::check() && Auth::user()->admin == "1")
   <button type="button" class="btn btn-success justify-content-end" data-toggle="modal" data-target="#adduser" > <i class="now-ui-icons ui-1_simple-add"></i>
Add User </button>
@endif
</div>

@if(Auth::check() && Auth::user()->admin == "1")
<h1 class="display-4 lead mt-5"> Users :  </h1>
<table class="table table-danger table-striped table-hover">
<thead class="bg-secondary text-white">
<tr>
  
<th scope="col">UserName</th>
<th scope="col"> em@il </th>
<th scope="col">Date Reg</th>
<th scope="col">Role</th>
<th scope="col"></th>
<th scope="col"></th>
<th scope="col"></th>
</tr>
</thead>
<tbody>
@foreach($users as $user)
<tr>
      <th scope="row" >{{$user->name}}</th>
      <td>{{$user->email}}</td>
      <td> {{ $user->created_at}}</td>
      @if($user->admin=="1")  
      <td class="btn btn-success disabled mt-1 btn-sm"> 
       Admin
    </td>
    @elseif($user->admin=="0")
    <td class="btn btn-info disabled mt-1 btn-sm"> 
    Editor
    </td>
       @endif
      <td><button class="btn btn-warning btn-sm" data-toggle="modal" data-hover="tooltip" data-placement="top" data-target="#edit" id="modal-edit"> Edit</button></td>
      <td><a href="" class="btn btn-success btn-sm">Show </a></td>
      @if($user->admin=="0")
      <form action="{{ route('users.destroy', $user->id)}}" method="POST">
      @method('DELETE')
        @csrf
      <td><button href="" class="btn btn-danger btn-sm">Delete </button></td>
    </form>
    @endif
      @endforeach
</tbody>
</table>
@endif
</div>

@if(Auth::user()->admin=="0")

<h5 class="title ml-3 mt-5">Edit Profile</h5>
<div class="card-body bg-white re ">
<form action="{{ route('users.update', Auth::user()->id) }}" method="POST" >
  @csrf
 @method('PATCH')
                  <div class="row">
                    <div class="col-md-5 px-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="name" placeholder="Username" value="{{ Auth::user()->name }}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ Auth::user()->email }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Profile :</label>
                        <input type="text" class="form-control" name="nameprofile" value="{{ Auth::user()->profile->profile_name }}">
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="City" value="Mike">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" placeholder="Country" value="Andrew">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" class="form-control" placeholder="ZIP Code">
                      </div>
                    </div>
                  </div>
                  <div class="row" >
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About Me</label>
                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" name="abouted" value="Mike">{{ Auth::user()->profile->description }}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <input type="submit" class="btn btn-success btn-lg" value="Save" >
                  </div>
                </form>
</div>
@endif
</div>

<!---ma-->
<div class="col-md-3 col-sm-12 ">
<div class="card card-user">
              <div class="image">
                <img src="../assets/img/bg5.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#"><!--Auth::user()->profile->avatar  -->
                  @if(Auth::user()->profile->avatar == "https://www.pngrepo.com/png/227594/180/muslim-islam.png")
                    <img class="avatar border-gray" src="{{ Auth::user()->profile->avatar}}" alt="...">
                  @else
                  <img class="avatar border-gray" src="{{ asset('/storage/'.Auth::user()->profile->avatar) }}" alt="...">
                 @endif
                   
               <h5 class="title">{{ Auth::user()->name}}</h5>
                  </a> 
                  <p class="description">
                  <b>@</b>{{Auth::user()->profile->profile_name}}  
                  </p>
                </div>
                <!--<div class="col-md-2"><a href="#" class="btn btn-danger btn-circle"><img src="{{asset('/images/eye.png') }}" class="pb-2" alt="eye" width="35px" heigth="35px"></a></div>-->
                <p class="description text-center">
               <b>"</b>  {{ Auth::user()->profile->description}} <b>"</b> 
                </p>
              </div>
              
              <hr>
              <div class="button-container">
                <a href="{{ Auth::user()->profile->github_url}}" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-facebook-f fa-lg"></i>
                </a>
                <a href="{{ Auth::user()->profile->twitter_url}}" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-twitter fa-lg"></i>
                </a>
                <a href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-linkedin fa-lg"></i>
                </a>
              </div>
            </div>

</div>
</div>
</div>

<!-- Add User Model -->
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="adduser" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
      <small class="text-danger mt-2"> *You can't Add admin , you can add an editor</small>

        <form action="{{ route('users.store') }}"  method="post" enctype="multipart/form-data">
  @csrf
          <div class="row">
          <div class="col-md-6">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">User name :</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          </div>
          <div class="col-md-6">
          <div class="form-group">
            <label for="message-text" class="col-form-label">Profile Name :</label>
<input type="text" class="form-control" name="name-profile">     
    </div>
    </div>
    <div class="col-md-12">
    <div class="form-group">
    <label for="recipient-name" class="col-form-label">Email :</label>
            <input type="email" class="form-control" id="email" name="email">
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
      <label for="Pw">Password :</label>
      <input type="password" class="form-control" name="password">
    </div>
    </div>

    <div class="col-md-6">
    <div class="form-group">
      <label for="cPw"> Confirm Password :</label>
      <input type="password" class="form-control" name="password_confirmation">
    </div>
    </div>
<div class="col-md-12">
    <div class="form-group">
      <label for="about-ed"> About Admin : </label>
      <textarea name="about-ed" id="about-ed" class="form-control" cols="30" rows="10" placeholder="Why we add you ?"></textarea>
    </div>
    </div>
    <!--<div class="col-md-6">
    <div class="form-group">
    <label for="github"><i class="fab fa-github fa-lg"></i> GitHub</label>
    <input type="text" class="form-control" placeholder="GitHub Account" name="github">
    </div>
    </div>-->
    <div class="col-md-6">
    <div class="form-group">
    <label for="twitter"><i class="fab fa-twitter fa-lg"></i> Twitter</label>
    <input type="text" class="form-control" placeholder="Twitter Account" name="twitter">
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
    <label for="Facebook"><i class="fab fa-facebook fa-lg"></i> Facebook</label>
    <input type="text" class="form-control" placeholder="Facebook Account" name="facebook">
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
    <label for="instagram"><i class="fab fa-linkedin fa-lg"></i> linkedin</label>
    <input type="text" class="form-control" placeholder="linkedin Account" name="linkedin">
    </div>
    </div>
 
    <div class="col-md-12">
    <label for="img-ad">Admin Photo :</label>
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

@endsection