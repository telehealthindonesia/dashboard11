<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    public function profile(){
        $data =[
            'title'     => 'Member Area',
            'class'     => 'Member',
            'sub_class' => 'Profile',
            'user'      => Auth::user()
        ];
        return view('landing.member.profile', $data);
    }
    public function anggota(){
        $family = User::where('family.id_induk', Auth::id())->get();
        $data =[
            'title'     => 'Member Area',
            'class'     => 'Member',
            'sub_class' => 'Anggota',
            'user'      => Auth::user(),
            'family'    => $family
        ];
        return view('landing.member.anggota', $data);
    }
    public function transaksi(){
        $data =[
            'title'     => 'Member Area',
            'class'     => 'Member',
            'sub_class' => 'Transaksi'
        ];
        return view('landing.member.anggota', $data);
    }
    public function file(){
        $data =[
            'title'     => 'Member Area',
            'class'     => 'Member',
            'sub_class' => 'File'
        ];
        return view('landing.member.anggota', $data);
    }
    public function faq(){
        return view('landing.faq');
    }
    public function removeAllSession(){
        Session::forget('myKey');
        route('landing.about');
    }
}
