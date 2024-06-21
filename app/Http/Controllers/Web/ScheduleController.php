<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(){
        dd("schedule.index");
    }
    public function customer($customer_id){
        dd("schedule.customer");
    }
    public function store(Request $request){

    }
}
