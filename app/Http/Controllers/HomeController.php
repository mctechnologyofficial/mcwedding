<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::user()->roles->first()->name == "user")
        {
            return view('dashboard.user.home');
        }
        else if(Auth::user()->roles->first()->name == "admin")
        {
            return view('dashboard.admin.home');
        }
        else
        {
            return view('dashboard.owner.home');
        }
    }
}
