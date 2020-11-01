@extends('layouts.master')
@section('title','Dashboard')
@section('content')
<div class="panel-header panel-header-sm">
      </div>

          <div class="container">
        <div class="row">
          <div class="col-12 mt-5">
            <div class="card  card-tasks">
              <div class="card-header ">
                <h5 class="card-category">Welcome {{ Auth::user()->name}} in The Dashboard</h5>
                <div class="card-title "> <h1 class="lead display-4">Statistics</h1>  </div>
              </div>
              <hr>
              <div class="card-body ">
              <div class="col-md-4 col-sm-12">
               <p class="lead"> Number Of Users : {{ $nusers }} </p>
               <hr>
               <p class="lead"> Number Of Posts : {{ $nposts }} </p>
               <hr>
               <p class="lead"> Number Of Categories : {{ $ncategories }} </p>
               </div>
               <div class="col-md-8 col-sm-12">
               <div id="chart" style="height: 150px;">
               {!! $chart->container()!!}
               {!! $chart->script()!!}
               </div>
               </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
@endsection
@section('scripts')
<script>
 
      </script>
@endsection