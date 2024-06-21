<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){

    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'id_user'           => 'required',
            'id_organisation'   => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

    }
}
