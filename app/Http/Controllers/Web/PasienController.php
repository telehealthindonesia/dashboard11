<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Observation;
use App\Models\User;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(Request $request){
        if(! empty($request->keyword)){
            $keyword = "%".$request->keyword."%";
            $users = User::where('nama.nama_depan', 'like', $keyword)->orWhere('nama.nama_belakang', 'like', $keyword)->orderBy('nama.nama_depan', 'ASC')->paginate(10);
        }else{
            $users = User::orderBy('nama.nama_depan', 'ASC')->paginate(10);
        }

//        dd($users);
        $data = [
            "title"         => "Patient List",
            "class"         => "patien",
            "sub_class"     => "list",
            "content"       => "layout.admin",
            "users"         => $users
        ];
        return view('user.patient.index', $data);
    }
    public function observation($user_id){
        $user = User::find($user_id);
        $observation = Observation::where('id_pasien', $user_id)->orderBy('time', 'DESC')->get();
        $data = [
            "title"         => "Patient",
            "class"         => "Observation",
            "sub_class"     => "list",
            "content"       => "layout.admin",
            "observation"   => $observation,
            "user"          => $user
        ];
        return view('user.patient.observation', $data);
    }
    public function observation_id($observation_id){
        $observation        = Observation::find($observation_id);
        $user               = User::find($observation->id_pasien);
        $petugas            = User::find($observation->id_petugas);
        $user_observation   = Observation::where('id_pasien', $observation->id_pasien)->where('coding.code', $observation->coding['code'])->orderBy('time', 'DESC')->get();
        $data = [
            "title"         => "Patient",
            "class"         => "Observation",
            "sub_class"     => "list",
            "content"       => "layout.admin",
            "observation"   => $observation,
            "user"          => $user,
            "petugas"       => $petugas,
            "user_observation" => $user_observation
        ];
        return view('user.patient.observation_detail', $data);
    }
}
