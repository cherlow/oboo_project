<?php

namespace App\Http\Controllers;

use App\Criminal;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role == 1) {
            return view('home');
        } elseif (auth()->user()->role == 3) {

            $criminals = Criminal::all();
            return view('user.home')->with("criminals", $criminals);
        } elseif (auth()->user()->role == 2) {
            return view('police.home');
        }
    }
}
