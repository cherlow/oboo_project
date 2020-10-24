<?php

namespace App\Http\Controllers;

use App\User;
use App\Station;
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

            $police = count(User::where("role", 2)->get());
            $user = count(User::where("role", 3)->get());
            $station = count(Station::all());
            $report = count(Criminal::all());
            return view('home')->with("police", $police)->with("user", $user)->with("station", $station)->with("report", $report);
        } elseif (auth()->user()->role == 3) {

            $criminals = Criminal::all();
            return view('user.home')->with("criminals", $criminals);
        } elseif (auth()->user()->role == 2) {
            return view('police.home');
        }
    }


    public function adminusers()
    {
        $users = User::where("role", 3)->get();
        return view("admin.users")->with("users", $users);
    }


    public function userdetails(User $user)
    {
        return view("admin.userdetails")->with("user", $user);
    }
}
