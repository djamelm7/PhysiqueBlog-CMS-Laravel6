@extends('layouts.nb')
@section('title', 'Article')
@section('bg-img')
/storage/{{ $post->post_img}}
@endsection
@section('content')
<section id="showcasea" style="background-image: url(@yield("bg-img")); background-position:25px;background-size: cover;">
    </section>
<!---->
<section id="article">
<div class="container">
<div class="row">
<div class="col-md-10 mt-5 ">
<div class="card">
<div class="card-header">
            <h1 class="display-3 ml-4 my-5 text-center fancy"> {{ $post->title }}</h1>
           

            <div class="single pt-0">
<span class="author"><i class="fa fa-user-circle-o"></i>&nbsp;<span class="author vcard"><a class="url fn n" href="#">{{ $post->user->name }} </a></span></span> <span class="date"><i class="fa fa-clock-o"></i>&nbsp;Updated on May 23, 2020</span> <span class="comments"><i class="fa fa-comments-o"></i>&nbsp;<a href="#">Leave a comment</a></span>
</div>
            </div>

<div class="content ml-4 mt-5">
   
{!! $post->content !!}

</div>
</div>
</div>
</div>
</section>
<!--All Comment -->
<section id="showcomment">
<div class="container">
    <div class="col-md-10">
<div class="card mt-3">
  <div class="card-body">
  </div>
  </div>
</div>
</div>
</section>
<!-- comment -->
<section id="comment">
<div class="container">
<h2 class="lead display-4 mb-3"> Add Comment :</h2>
    <div class="row">
    <div class="col-md-6">
<form action="" method="POST">
@csrf
     <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">  <i class="fas fa-user-astronaut fa-2x"></i>
</span>
  </div>
  <input type="text" class="form-control form-control-lg" placeholder="Your name" aria-label="Username" name="user">
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">  <i class="fas fa-at fa-2x"></i>
</span>
  </div>
  <input type="email" class="form-control form-control-lg" placeholder="Email"  name="email" aria-describedby="basic-addon1">
</div>
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text"><i class="fas fa-meteor fa-2x"></i></span>
  </div>
  <textarea class="form-control" aria-label="With textarea" name="body" rows="10"></textarea>
</div>
<input type="submit" value="Send" class="btn btn-primary btn-block btn-lg mt-2" >
    </div>
    </form>   
</div>
</div>
</section>
<!--writer-->
<section id="writer">
<div class="container mb-2">
<div class="row i-m ">
   <div class="col-md-2">
<img src="https://www.pngrepo.com/png/227594/180/muslim-islam.png" alt="" class="img-fluid rounded-circle d-none d-md-block  about-img mt-4" width="150px" height="155px">
<p class="ml-3 mt-2 text-white">@Djamel Neguez </p> 
</div>
<div class="col-md-8  d-flex align-items-center d-block">
    <p class="lead text-white"> Description </p>
    <a href="#" class="fa fa-facebook  mr-5"></a>
</div>
</div>
</div>
</section>
@endsection
@section('scripts')
<script> 
const text = document.querySelector('.fancy');
const strtext = text.textContent;
const splittext = strtext.split("");
text.textContent = "";
for(let i = 0; i< splittext.length;i++){
      text.innerHTML+="<span>" + splittext[i] +"</span>";
}
let char = 0;
let timer = setInterval(onTick, 50);
function onTick(){
      const span = text.querySelectorAll('span')[char];
      span.classList.add('fade');
      char++
            if(char === splittext.length){
           complete();
           return ;
      }
}
function complete(){
      clearInterval(timer);
      timer = null;
}
</script>
@endsection