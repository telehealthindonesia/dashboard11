<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    private UserService $userService;
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }
    public function registration(){
        $family = User::where('family.id_induk', Auth::id())->get();
        $data =[
            'title'     => 'Member Area',
            'class'     => 'Member',
            'sub_class' => 'Profile',
            'user'      => Auth::user(),
            'family'    => $family
        ];
        return view('landing.member.create-account', $data);
    }
    public function register(Request $request){
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama_depan'    => 'required',
            'nama_belakang' => 'required',
            'nik'           => 'required|integer|digits:16|unique:users,nik',
            'gender'        => ['required',Rule::in(['male', 'female'])],
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required|date'
        ]);
        $level  = "user";
        if($validator->fails()){
            return back()->withErrors($validator)->withInput()->with('validasi', 'Gagal Validasi');
        }
        $user = User::where('nik', (int)$request->nik)->get();
        if($user->count()<1){
            $user = $this->userService->store($request, $level);
            return back()->with('success', 'Data berhasil ditambah');
        }else{
            return back()->with('danger', 'Data Gagal ditambahkan, karena NIK sudah pernah didaftarkan')->withInput();
        }
    }
    public function profile(){
        $family = User::where('family.id_induk', Auth::id())->get();
        $data =[
            'title'     => 'Member Area',
            'class'     => 'Member',
            'sub_class' => 'Profile',
            'user'      => Auth::user(),
            'family'    => $family
        ];
        return view('landing.member.profile', $data);
    }
    public function transaksi(){
        $transaksi = ['a', 'b'];
        $data =[
            'title'     => 'Member Area',
            'class'     => 'Member',
            'sub_class' => 'Transaksi',
            'transaksi' => $transaksi
        ];
        return view('landing.member.transaksi', $data);
    }
    public function file(){
        $files = File::where('user_id', Auth::id())->where('nama_file', '!=', null)->get();
        $data =[
            'title'     => 'Member Area',
            'class'     => 'Member',
            'sub_class' => 'File',
            'files'     => $files
        ];
        return view('landing.member.file', $data);
    }
}
