<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Faq;
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
        $family = User::where('family.id_induk', Auth::id())->get();
        $user   = Auth::user();
        $data =[
            'title'     => 'Pendaftaran Vaksin',
            'class'     => 'Booking',
            'sub_class' => 'Vaccine',
            'user'      => $user,
            'family'    => $family
        ];
        return view('landing.single-page', $data);
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
        $customer_id    = env('CUSTOMER_ID');
        $faq            = Faq::where('corporate_id', $customer_id)->get();
        $user           = Auth::user();
        $data =[
            'title'     => 'Pendaftaran Vaksin',
            'class'     => 'Booking',
            'sub_class' => 'Vaccine',
            'faq'       => $faq,
        ];
        return view('landing.faq', $data);
    }
    public function removeAllSession(){
        Session::forget('myKey');
        route('landing.about');
    }
}
