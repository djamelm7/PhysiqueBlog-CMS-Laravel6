<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Posts;
use App\Categories;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->admin == "1"){
            $post = Posts::all(); 
         }else{
        $post = Posts::where('user_id', Auth::user()->id)->get();
         }
        // $post = Posts::with('category')->get();
               $category=Categories::all();
        return view('Dashboard.post')->with('post',$post)->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //'image'=> 'required||image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //'category'=>'required',
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|min:5|max:50',
            'editor1'=> 'required|min:20',
            'category_id'=>'required|integer',
            'img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $post = new Posts;
        $cat = new Categories;
        $post->title=$request->input('title');
        $post->content=$request->input('editor1');
        $post->user_id=Auth::user()->id;
        $post->category_id=$request->category_id;
        if($request->hasFile('img')){
            $post->post_img = $request->img->store('images');
        }
        $post->save();
        session()->flash('add',' Post Has Been Add !');
        return redirect('/Dashboard/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        $post = Posts::wheretitle($title)->firstOrFail();
        //$post= Posts::select('id')->where('title', $title)->first();

       return view('Home.article')->with('post', $post);  
 }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title'=>'required|min:5|max:50',
            'editor'=> 'required|min:20',
            'category_id'=>'required|integer',
            'img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $post = Posts::find($id);
        //$cat = new Categories;
        $post->title=$request->input('title');
        $post->content=$request->input('editor');
        $post->user_id=Auth::user()->id;
        $post->category_id=$request->category_id;
        if($request->hasFile('img')){
           $path = $request->img->store('images');
        }
        $post->post_img = $path ;
        $post->save();
        session()->flash('update',' Post Has Been Updated !');
        return redirect('/Dashboard/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $post = Posts::find($id);
        $post->delete();
        return redirect('Dashboard/posts');
       //return $request->all();

    }
}
       


