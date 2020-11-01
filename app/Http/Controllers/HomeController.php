<?php

namespace App\Http\Controllers;

use App\Charts\DasChart;
use Illuminate\Http\Request;
use app\Posts;
use DB;
use app\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nusers = DB::table('users')->count();
        $nposts = DB::table('posts')->count();
        $ncategories = DB::table('categories')->count();
      $chart = new DasChart;
        $chart->labels(['First', 'Second', 'Third']);
        $chart->dataset('my_data_set','Line', [1, 2, 3]);
       
        return view('Dashboard.dashboard', compact('nusers', 'nposts', 'ncategories', 'chart'));

    }
}
