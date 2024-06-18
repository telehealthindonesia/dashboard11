<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PersonalAccessToken;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('auth.login');
    }
    public function landing()
    {
        $user = Auth::user();
        return view('landing.about');
    }
    public function login(Request $request)
    {
        $user = Auth::user();
        return view('auth.login');
    }
    public function login_phone()
    {
        $user = Auth::user();
        return view('auth.login_phone');
    }
    public function login_phone_otp()
    {
        $user = Auth::user();
        return view('auth.login_phone_otp');
    }
    public function postLoginPhone(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor_telepon'        => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return redirect()->route('auth.login.phone')
                ->withErrors($validator)
                ->withInput();
        }
        $post = [
            'nomor_telepon'  => $request->nomor_telepon
        ];
        $user = User::where('kontak.nomor_telepon', $request->nomor_telepon);
        if($user->count()<1){
            session()->flash('danger', 'Wrong phone number !!!!');
            return back()->withInput();
        }else{
            $api_ext    = env('APP_API_EXTERNAL');
            $url        = $api_ext."/v1/auth/passcode/request";
            $header     = [];
            $client     = new Client();
            $response   = $client->post($url, [
                'headers' => $header,
                'form_params' => [
                    'nomor_telepon'  => $request->nomor_telepon,
                ]
            ]);
            $data = json_decode($response->getBody(), true);
//            dd($data);
            if($data['status_code'] != 200){
                session()->flash('danger', $data['message']);
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Input OTP yang dikirim ke whatsapp');
            return redirect()->route('auth.login.phone.otp')->withInput();
        }
    }
    public function postLoginPhoneOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor_telepon' => 'required|numeric',
            'otp'           => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return redirect()->route('auth.login.phone')
                ->withErrors($validator)
                ->withInput();
        }else{
            $post = [
                'nomor_telepon' => $request->nomor_telepon,
                'otp'           => $request->otp,
            ];
            $api_ext    = env('APP_API_EXTERNAL');
            $url        = $api_ext."/v1/auth/loginPhone";
            $header     = [];
            $client     = new Client();
            try {
                $response   = $client->post($url, [
                    'headers'       => $header,
                    'form_params'   => $post
                ]);

                // Periksa status kode respons
                if ($response->getStatusCode() === 200) {

                    // Respons sukses, lakukan sesuatu dengan data
                    $data = json_decode($response->getBody(), true);
//                    dd($data);
                    $data_token     = $data['data']['token']['code'];
                    $encryptedData  = encrypt($data_token);
                    session(['web_token' => $encryptedData]);
                    $user = User::find($data['data']['token']['user_id']);
                    Auth::login($user);
                    $request->session()->regenerate();
                    return redirect()->route('profile.index');
                } elseif ($response->getStatusCode() === 404) {
                    echo "Not Found";
                    // Respons dengan status 404 (Not Found)
                    // Handle kesalahan 404 di sini, misalnya, kembalikan pesan kesalahan atau lakukan tindakan lain yang sesuai
                } else {
                    // Respons dengan status kode lain
                    // Handle kesalahan lainnya di sini
                }
            } catch (RequestException $e) {
                // Tangani kesalahan permintaan seperti koneksi bermasalah atau API tidak tersedia
                if ($e->hasResponse()) {
                    // Ada respons dari API
                    $response = $e->getResponse();
                    if ($response->getStatusCode() === 404) {
                        $data = json_decode($response->getBody(), true);
                        session()->flash('danger', $data['message']);
                        return redirect()->back()->withInput();
                    } else {
                        // Handle kesalahan lainnya di sini
                    }
                } else {
                    // Tangani kesalahan ketika tidak ada respons dari API
                }
            }
        }
    }
    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'        => 'required|email',
            'password'        => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('ogin')
                ->withErrors($validator)
                ->withInput();
        }
        $post = [
            'username'  => $request->username,
            'password'  => $request->password
        ];
        $post_json = json_encode($post);
        $credentials = $post;
        if (Auth::attempt($credentials)) {
            $api_ext    = env('APP_API_EXTERNAL');
            $url        = $api_ext."/v1/auth/login";
            $header     = [];
            $client     = new Client();
            $response   = $client->post($url, [
                'headers' => $header,
                'form_params' => [
                    'username'  => $request->username,
                    'password'  => $request->password,
                ]
            ]);
            $data = json_decode($response->getBody(), true);
//            dd($data);
            if($data['status_code'] != 200){
                session()->flash('danger', $data['message']);
                return redirect()->back()->withInput();
            }
            $data_token     = $data['token']['code'];
            $encryptedData  = encrypt($data_token);
            session(['web_token' => $encryptedData]);
            return redirect()->route('profile.index');
        }else{
            session()->flash('danger', 'Wrong username or password');
            return redirect()->route('login')->withInput();
        }
    }
    public function register()
    {
        return view('auth.register');
    }
    public function daftar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_depan'        => 'required',
            'nama_belakang'     => 'required',
            'gender'            => ['required',Rule::in(['male', 'female'])],
            'nik'               => 'integer|unique:users,nik',
            'email'             => 'email:rfc,dns|unique:users,kontak.email',
            'nomor_telepon'     => 'required|unique:users,kontak.nomor_telepon',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required|date'
        ]);
        if ($validator->fails()) {
            return redirect()->route('auth.register')
                ->withErrors($validator)
                ->withInput();
        }else{
            $post=$request->all();
            $api_ext    = env('APP_API_EXTERNAL');
            $url        = $api_ext."/v1/auth/register";
            $client     = new Client();
            $response   = $client->post($url, [
                'form_params' => $post
            ]);
            $statusCode = $response->getStatusCode();
            if($statusCode==201){
                session()->flash('success', 'Success Registration');
                return redirect()->route('auth.activate');
            }
        }
    }
    public function forgotPassword()
    {
        return view('auth.forgotPassword');
    }
    public function getPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor_telepon' => 'required|numeric',
            'email'         => 'required|email',
        ]);
        $user = User::where([
            'kontak.nomor_telepon'  => $request->nomor_telepon,
            'kontak.email'          => $request->email
        ]);
        $data_user = $user->first();
//        dd($data_user);
        $post_data  = [
            'nomor_telepon' => $request->nomor_telepon,
            'email'         => $request->email
        ];
        if ($validator->fails()) {
            return redirect()->route('auth.forgotPassword')
                ->withErrors($validator)
                ->withInput();
        }elseif($user->count() < 1) {
            session()->flash('danger', 'User tidak ditemukan');
            return redirect()->route('auth.forgotPassword')
                ->withInput();
        }elseif ($data_user->forgot_password != null){
            $otp        = $data_user->forgot_password['code'];
            $exp_otp    = $data_user->forgot_password['exp'];
            if($exp_otp > time()){
                $sisa_waktu = (round(($exp_otp-time())/60,0))." menit";
                session()->flash('danger', "Anda masih memiliki OTP aktif, silahkan periksa email anda, sisa waktu $sisa_waktu");
                return redirect()->route('auth.forgotPassword')
                    ->withInput();
                //jika
            }else{
                $api_ext    = env('APP_API_EXTERNAL');
                $url        = $api_ext."/v1/auth/forgotpassword";
                $client     = new Client();
                $response   = $client->post($url, [
                    'form_params' => $post_data
                ]);
                $statusCode = $response->getStatusCode();
                if($statusCode == 200){
                    session()->flash('success', 'Permohonan reset akun telah diterima, input OTP yang telah kami kirimkan, untuk membuat password baru anda');
                    return redirect()->route('auth.request.reset.password');
                }
            }
        }else{
            $api_ext    = env('APP_API_EXTERNAL');
            $url        = $api_ext."/v1/auth/forgotpassword";
            $client     = new Client();
            $response   = $client->post($url, [
                'form_params' => $post_data
            ]);
            $statusCode = $response->getStatusCode();
            if($statusCode == 200){
                session()->flash('success', 'Permohonan reset akun telah diterima, periksa email anda');
                return redirect()->route('auth.forgotPassword');
            }
        }

    }
    public function reset_password()
    {
        return view('auth.reset_password');
    }
    public function do_reset_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp'       => 'required|numeric|digits:6',
            'username'  => 'required|email',
            'password'  => 'required|confirmed',

        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $user = User::where([
                'forgot_password.code'  => (int) $request->otp,
                'username'              => $request->username
            ]);
            $data_user = $user->first();
//            dd($data_user);
            if($user->count() < 1){
                session()->flash('danger', 'User tidak ditemukan');
                return redirect()->back()->withInput();
            }elseif($data_user->forgot_password['exp'] < time()){
                session()->flash('danger', 'OTP Kadaluarsa');
                return redirect()->back()->withInput();
            }else{
                $post_data  = [
                    'otp'       => $request->otp,
                    'username'  => $request->username,
                    'password'  => $request->password,
                    'password_confirmation' => $request->password_confirmation,
                ];
                $api_ext    = env('APP_API_EXTERNAL');
                $url        = $api_ext."/v1/auth/resetpassword";
                $client     = new Client();
                $response   = $client->put($url, [
                    'form_params' => $post_data
                ]);
                $statusCode = $response->getStatusCode();
                if($statusCode == 200){
                    session()->flash('success', 'Password berhasil direset');
                    return redirect()->route('auth.login');
                }
            }
        }
    }
    public function activate()
    {
        return view('auth.activate');
    }
    public function activate_manual()
    {
        return view('auth.activate_manual');
    }
    public function activate_url($nik, $otp)
    {
        $user = User::where([
            'nik'           => (int) $nik,
            'aktifasi.otp'  => (int) $otp
        ]);
        if($user->count() <1 ){
            echo "OTP dan NIK salah";
        }else{
            $data_aktivasi = [
                'aktifasi'  => [
                    'otp'   => null,
                    'exp'   => null
                ],
                'active'    => true
            ];
            $update = $user->update($data_aktivasi);
            if($update){
                session()->flash('success', 'Akun berhasil diaktifkan');
                return redirect()->route('auth.login');
            }
        }
    }
    public function do_activate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp'    => 'required|numeric|digits:6',
            'email'  => 'required|email',

        ]);
        if ($validator->fails()) {
            return redirect()->route('auth.activate')
                ->withErrors($validator)
                ->withInput();
        }else{
            $user = User::where([
                'kontak.email'      => $request->email
            ]);
            $user_data = $user->first();
            if($user->count() < 1){
                session()->flash('danger', 'Email tidak terdaftar');
                return redirect()->back();
            }elseif($user_data->active == true ) {
                session()->flash('danger', 'User sudah aktif');
                return redirect()->back()->withInput();
            }elseif($user_data->aktifasi['exp'] < time()){
                session()->flash('danger', 'OTP Sudah kadaluarsa');
                return redirect()->back();
            }else{
                $post_data  = $request->all();
                $api_ext    = env('APP_API_EXTERNAL');
                $url        = $api_ext."/v1/auth/aktifasi";
                $client     = new Client();
                $response   = $client->put($url, [
                    'form_params' => $post_data
                ]);
                $statusCode = $response->getStatusCode();
                if($statusCode == 200){
                    session()->flash('success', 'Akun berhasil diaktifkan');
                    return redirect()->route('auth.login');
                }else{
                    session()->flash('danger', 'Akun gagal diaktifkan');
                    return redirect()->route('auth.login');
                }
            }

        }
    }
    public function new_otp()
    {
        return view('auth.new_otp');
    }
    public function create_new_otp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor_telepon' => 'required|numeric|min_digits:10',
            'email'         => 'required|email',
        ]);
        $email = $request->email;
        $nomor_telepon = $request->nomor_telepon;
        $user = User::where([
            'kontak.nomor_telepon'  => $nomor_telepon,
            'kontak.email'          => $email
        ]);
        $data_user = $user->first();
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }elseif($user->count() < 1){
            session()->flash('danger', 'User tidak ditemukan');
            return redirect()->back()->withInput();
        }elseif ($data_user->active == true){
            session()->flash('danger', 'OTP gagal dibuat karena user sudah aktif');
            return redirect()->back()->withInput();
        }else{
            $post_data  = $request->all();
            $api_ext    = env('APP_API_EXTERNAL');
            $url        = $api_ext."/v1/auth/aktifasi";
            $client     = new Client();
            $response   = $client->post($url, [
                'form_params' => $post_data
            ]);
            $data = json_decode($response->getBody(),true);
            $statusCode = $response->getStatusCode();
            if($statusCode != 200){
                session()->flash('danger', $data['message']);
                return redirect()->back()->withInput();
            }
            session()->flash('success', $data['message']);
            return redirect()->route('auth.do_activate')->withInput();
        }
    }
    public function logout(Request $request)
    {
        $session_token  = decrypt(session('web_token'));
        $words          = explode("|", $session_token);
        $id_token       = $words['0'];
//        dd($id_token);
        $db_token       = PersonalAccessToken::find($id_token);
        $delete_token   = $db_token->delete();
        $delete_session = $request->session()->flush();
        session()->flash('success', "Anda berhasil logout");
        if($delete_token | $delete_session){
            Auth::logout();
            return redirect()->route('login');
        }else{
            return redirect()->route('login');
        }
    }
    private function sending_whatsapp($receiver, $message)
    {
        $url_sending_wa = "https://wa.atm-sehat.com/send";
        $header         = [];
        $client         = new Client();
        $sending        = $client->post($url_sending_wa, [
            'headers' => $header,
            'form_params'   => [
                'number'    => '6281213798746',
                'message'   => $message,
                'to'        => '62'.(int) $receiver,
                'type'      => 'chat'
            ]
        ]);
    }
}
