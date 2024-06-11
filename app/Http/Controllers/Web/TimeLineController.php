<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Kit;
use App\Models\TimeLine;
use Illuminate\Http\Request;

class TimeLineController extends Controller
{
    public function kits(){
        $kit = Kit::all();
        $data = [
            "title"     => "Kits List",
            "class"     => "Kit",
            "sub_class" => "Get All",
            "content"   => "layout.admin",
            "kits"      => $kit
        ];
        return view('user.timeline.index', $data);
    }
    public function queue($kit_code, Request $request){
        if($request->status == null){
            $status     = "pending";
        }else{
            $status     = $request->status;
        }
        $time_line  = TimeLine::where('station', $kit_code)->where('status', $status)->get();
        $data = [
            "title"     => "Queue Kit",
            "class"     => "Kit",
            "sub_class" => "Transaksi",
            "content"   => "layout.admin",
            "timeline"  => $time_line,
        ];
        return view('user.timeline.queue', $data);

    }
    public function ordered($id, Request $request){
        $time_line = TimeLine::find($id);
        if($request->aksi == "terima"){
            $status = "In Progress";
            $find_timeline = TimeLine::where('status', $status)->where('station', $time_line->station)->first();
            $update = $find_timeline->update(['status'=>'complete']);
            $kit = Kit::where('code', $time_line->station)->first();
            $update = $kit->update(['pasien'=>[
                'id_pasien'     => $time_line->pasien['id'],
                'time'          => time()
            ]]);


        }elseif($request->aksi == "tolak"){
            $status = "cancel";
        }elseif($request->aksi == "skip"){
            $status = "skip";
        }
        $update = $time_line->update(['status' => $status]);
        return back()->with('success', 'data berhasil diupdate');
    }
}
