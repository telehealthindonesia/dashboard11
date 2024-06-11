<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wound;
use App\Models\WoundAssesment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WoundController extends Controller
{
    public function index(Request $request){
        if($request->limit == null){
            $limit = 10;
        }else{
            $limit = $request->limit;
        }
        $users = User::where('active', true)->paginate($limit);
        $data = [
            "title"         => "Pengkajian Luka",
            "class"         => "Pengkajian",
            "sub_class"     => "Pengkajian Luka",
            "content"       => "layout.admin",
            "users"         => $users,
        ];
        return view('admin.wound.index', $data);
    }
    public function show($id){
        $wound              = Wound::find($id);
        $wound_assesments   = WoundAssesment::where('wound.id', $id)->orderBy('time', 'DESC')->paginate(10);
        $data = [
            "title"             => "Monitoring Luka",
            "class"             => "Pengkajian",
            "sub_class"         => "Monitoring Luka",
            "content"           => "layout.admin",
            "wound"             => $wound,
            "wound_assesments"  => $wound_assesments
        ];
        return view('admin.wound.show', $data);
    }
    public function assesment($id){
        $wound  = Wound::find($id);
        $user   = User::find($wound->id_pasien);
        $data   = [
            "title"         => "Pengkajian Luka",
            "class"         => "Pengkajian",
            "sub_class"     => "Pengkajian Luka",
            "content"       => "layout.admin",
            "user"          => $user,
        ];
        return view('admin.wound.pengkajian', $data);
    }

    public function wound_user($id){
        $user = User::find($id);
        $wounds = Wound::where('id_pasien', $id)->get();
        $data = [
            "title"         => "Pengkajian Luka",
            "class"         => "Pengkajian",
            "sub_class"     => "Pengkajian Luka",
            "content"       => "layout.admin",
            "user"          => $user,
            "wounds"        => $wounds
        ];
        return view('admin.wound.wound_user', $data);
    }
    public function store(Request $request){
        $wound = new Wound();
        $data_wound = [
            "id_pasien"     => $request->id_pasien,
            "id_petugas"    => Auth::id(),
            "jenis_luka"    => $request->jenis,
            "lokasi_luka"   => $request->lokasi,
            "time"          => strtotime($request->time)
        ];
        $create = $wound->create($data_wound);
        if($create){
            return back()->with('success', 'Data berhasil ditambah');
        }else{
            return back()->with('danger', 'Data gagal ditambah');
        }

    }
}
