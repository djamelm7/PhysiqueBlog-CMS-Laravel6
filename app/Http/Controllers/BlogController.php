<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Categories;
use App\User;
use App\Comments;
class BlogController extends Controller
{ 
   public function index(){
       $post =  Posts::orderBy('created_at', 'desc')->paginate(10);
       $category = Categories::all();
       $user = User::all();
       $comments = Comments::all();
    return view('Home.index')->with('post',$post)->with('category', $category)->with('user',$user)->with('comments',$comments);
   }

}
