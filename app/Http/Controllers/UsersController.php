<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User; 
use App\Profile;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('Dashboard.user')->with('users',$users);
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
     * Store a newly created resource in storage. unique:users 'not_regex:/^.+$/','not_regex:=-_/^.+$/' ,'regex:_@#.','not_regex:=-/^+$/'
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new User();
        //$user= User::find();
        $request->validate( [
          'name'=>'required|min:5|max:18',
           'email'=> ['required','email',],
           'password'=> ['required','confirmed'],
           'about-ed'=>'required|min:10|max:70',
           'name-profile'=> ['required'],
           'img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->input('password'));
        $user->save();
        $profile = new Profile();
        $profile->profile_name = $request->input('name-profile');
        $profile->description = $request->input('about-ed');
        $profile->github_url = $request-> input('facebook')  ;
        $profile->twitter_url = $request-> input('twitter')  ;
        if($request->hasFile('img')){
            $profile->avatar = request('img')->store('Profile-images');
        }
        $user->profile()->save($profile);
        session()->flash('adduser',' User Has Been Add !');
        return redirect('Dashboard/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$user = User::find(1);
      //$pro = Profile::find(1)->User;
        //dd($pro);
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
    public function update(Request $request, $id)
    {
        $request->validate( [
            'name'=>'required|min:5|max:18',
             'email'=> ['required','email',],
             //'password'=> ['required','confirmed'],
             //'about-ed'=>'required|min:10|max:70',
             //'name-profile'=> ['required'],
          ]);  
          $user = User::find($id);
          $user->name = $request->name;
          $user->email = $request->email;
          $user->save();
          if($user->save()){
           $profile = Profile::find($id);
            $profile->profile_name = $request->nameprofile;
            $profile->description = $request->abouted;
            $profile->save();
          }
          return redirect('/Dashboard/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('Dashboard/users');
    }
}
