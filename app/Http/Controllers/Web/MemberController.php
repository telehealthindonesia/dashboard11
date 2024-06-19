<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Jobs\RegisterUserNotificationJob;
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
    public function login(){
        $product        = ['a', 'b'];
        $data =[
            'title'     => 'Login',
            'class'     => 'Member',
            'sub_class' => 'Login',
            'product'   => $product,
        ];
        return view('landing.auth.request_otp', $data);
    }
    public function doLogin(Request $request){
        $nik            = (int) $request->nik;
        $tanggal_lahir  = $request->tanggal_lahir;
        $user           = User::where('nik', $nik)->where('lahir.tanggal', $tanggal_lahir)->first();
        $otp            = rand(1000,9999);
        $exp            = time()+(24*60*60);
        $date_exp       = date('Y-m-d H:i', $exp);
        $message        = "OTP : $otp, exp: $date_exp";
        $product        = ['a', 'b'];
        if(empty($user)){
            return back()->with('danger', 'Pasien tidak ditemukan')->withInput();
        }elseif ($user->aktifasi != null){
            $input          = [
                'nama'      => [
                    'nama_depan'    => $user->nama['nama_depan'],
                    'nama_belakang' => $user->nama['nama_belakang']
                ],
                'gender'            => $user->gender,
                'nik'               => (int) $user->nik,
                'lahir'     => [
                    'tempat'    => $user->lahir['tempat'],
                    'tanggal'   => $user->lahir['tanggal']
                ],
                'kontak'    => [
                    'email'         => $user->kontak['email'],
                    'nomor_telepon' => $user->kontak['nomor_telepon']
                ],
                'username'  => $user->username,
                'password'  => $user->password,
                'aktifasi'  => [
                    'otp'   => $otp,
                    'exp'   => $exp
                ],
                'family'    => $request->family,

            ];
            if($user->aktifasi['exp'] > time()){
                $data =[
                    'title'     => 'Login',
                    'class'     => 'Member',
                    'sub_class' => 'Login',
                    'product'   => $product,
                    'user'      => $user
                ];
                return view('landing.auth.login', $data);
            }else{
                $update_otp     = $user->update([
                    'aktifasi'=>[
                        'otp'   => $otp,
                        'exp'   => $exp
                    ]]);
                if($update_otp){
                    if($user->kontak != null){
                        if($user->kontak['email'] != null){
                            dispatch(new RegisterUserNotificationJob(recipient: $user->kontak['email'], data: $input));
                        }
                        if($user->kontak['nomor_telepon'] != null){
                            $receiver       = $user->kontak['nomor_telepon'];
                            $sending        = $this->userService->sendingWhatsapp($receiver, $message);
                            $data =[
                                'title'     => 'Login',
                                'class'     => 'Member',
                                'sub_class' => 'Login',
                                'product'   => $product,
                                'user'      => $user
                            ];
                            return view('landing.auth.login', $data);

                        }else{
                            dd('nomor HP kosong');
                        }
                    }else{
                        dd('Kontak blm diisi');
                    }
                }else{
                    dd('OTP gagal dibuat');
                }
            }
        }
    }
    public function auth(Request $request, $id){
        $user       = User::find($id);
        $otp        = $request->otp;
        $otp_db     = $user->aktifasi['otp'];
        $exp_otp    = $user->aktifasi['exp'];
        $now        = time();
        if($exp_otp>$now){
            if($otp != $otp_db){
                return back()->with('danger', 'OTP Salah');
            }else{
                Auth::login($user);
                return redirect()->route('member.profile');
            }
        }else{
            return back()->with('danger', 'OTP Kadaluarsa');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('member.login')->with('success', 'Anda berhasil logout');
    }
    public function newAccount(){
        $product        = ['a', 'b'];
        $data =[
            'title'     => 'Login',
            'class'     => 'Member',
            'sub_class' => 'Login',
            'product'   => $product,
        ];
        return view('landing.auth.register', $data);
    }
}
