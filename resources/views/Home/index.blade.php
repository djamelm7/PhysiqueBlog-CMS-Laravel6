@extends('layouts.nb')
@section('title', 'Blog')
@section('content')
 <section id="showcase">
        <div id="mycar" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#mycar"  data-slide-to="0" class="active"></li>
                
            </ol>
<div class="carousel-inner">
            <div class="carousel-item carousel-image-1 active">
                <div class="container">
                    <div class="carousel-caption d-none d-sm-block text-center mt-5">
                        <h1 class="display-3 "> Physics Blog Posts </h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro rem ipsum dignissimos dolorem, esse id! Doloribus illum placeat odit magni?</p>
                    </div>
                </div>
            </div>
            
      
  
</div>
</div>
    </section>
    <!--Post section -->
    <section id="post">
    
     <div class="container">
      
       <div class="row">
        
  <div class="col-md-8 mt-5 ">
  <div class="row">
         @foreach($post as $posts) 

       <div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="{{asset('storage/'. $posts->post_img) }}" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <a href="{{ url('/post/'.$posts->title)}}" class=" fta"> {{ $posts->title }}</a>
        <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio aspernatur aut nam nostrum alia</p>
        <p class="card-text"><small class="text-muted">{{ $posts->updated_at}} 
        </small>
         <small> Posted By {{ $posts->user->name}}</small></p>
      </div>
    </div>

  </div>
</div>
@endforeach


           </div>
         </div>

         <div class="col-md-4 mt-5 ">
         
            
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-secondary"> 
              <b> Categories </b>
            </li>
            @foreach( $category as $categorys)
   
            <li class="list-group-item d-flex justify-content-between align-items-center"> 
              <a href="#">{{ $categorys->title}} </a>               <span class="badge badge-primary badge-pill">14</span>
            </li>

            @endforeach
          </ul>
          </div>

          <nav class="page-navigation">
            {{ $post->links() }}
          </nav>

    </section>
@endsection