<?php

namespace App\Http\Controllers;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Auth;
use App\User;
use App\Album;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['album'] = Album::get();
        return view('home')->with($data);
    }
}
