<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Mime\MimeTypeGuesserInterface;

class PagesController extends Controller
{
    public function stafflogin()
    {
        if(!auth()->user()){

            return view('auth.stafflogin');
        }

        return redirect('/home');
     }
}
