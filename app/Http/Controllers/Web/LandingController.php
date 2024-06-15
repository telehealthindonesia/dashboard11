<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LandingController extends Controller
{
    public function home(){

        $user = Auth::user();
        return view('landing.home');
    }
    public function about(){
        $user = Auth::user();
        return view('landing.about');
    }
    public function siglePage(){
        $user = Auth::user();
        return view('landing.single-page');
    }
    public function contact(){
        $user = Auth::user();
        return view('landing.contact');
    }
    public function news(){
        $user = Auth::user();
        return view('landing.news');
    }
    public function faq(){
        $user = Auth::user();
        return view('landing.faq');
    }
    public function removeAllSession(){
        Session::forget('myKey');
        route('landing.about');
    }
}
