@extends('layouts.nb')
@section('title', 'Category')
@section('content')

<div class="card bg-dark text-white">
@foreach($category->posts() as $post)
 
 {{$post->title }}

@endforeach
</div>
@endsection