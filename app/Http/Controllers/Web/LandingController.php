<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LandingController extends Controller
{
    public function home(){
        return view('landing.home');
    }
    public function about(){
        return view('landing.about');
    }
    public function siglePage(){
        return view('landing.single-page');
    }
    public function contact(){
        return view('landing.contact');
    }
    public function product(){
        return view('landing.product');
    }
    public function news(){
        return view('landing.news');
    }
    public function faq(){
        return view('landing.faq');
    }
    public function removeAllSession(){
        Session::forget('myKey');
        route('landing.about');
    }
}
