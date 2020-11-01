<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="../assets/img/science.png">
    <link href="https://fonts.googleapis.com/css2?family=Grenze+Gotisch:wght@234&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome/css/all.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Aladin&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Physique For Life - @yield('title') </title>
</head>
<body> <!-- bg-mix -->
<nav class="navbar navbar-inverse navbar-expand-lg navbar-dark vv fixed-top">
<a class="navbar-brand h1 ml-5" href="#" id="navbar-font"> <img src="{{asset('assets/img/science.png') }}" width="50px" height="45px"> <b> Physique </b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse mr-5" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link " href="#">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Coures</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
    </ul>
  </div>
</nav>

@yield('content')


<script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>

    <script>

$(function() {
    //caches a jQuery object containing the header element
    var nav = $(".vv");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 50) {
            nav.addClass("bg-mix");
        } else {
            nav.removeClass("bg-mix");
        }
    });
});

    </script>
</body>

</html>