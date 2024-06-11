<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\StoreUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use App\Http\Requests\User\UserPetugasCreateRequest;
use App\Models\Customer;
use App\Models\Marital_status;
use App\Models\Religion;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('nama.nama_depan', 'ASC')->get();
//        dd($users);
        $data = [
            "title"     => "Daftar User",
            "class"     => "User",
            "sub_class" => "Get All",
            "content"   => "layout.admin",
            "users"     => $users,
        ];
        return view('admin.user.index', $data);
    }

    public function petugas_all()
    {
        $customers = Customer::all();
        $users = User::where('level','petugas')->orderBy('nama.nama_depan', 'ASC')->get();
        $data = [
            "title"     => "List Petugas",
            "class"     => "User",
            "sub_class" => "Petugas",
            "content"   => "layout.admin",
            "users"     => $users,
            "customers" => $customers
        ];
        return view('admin.user.petugas', $data);
    }
    public function petugas_faskes($id)
    {
        $customers = Customer::all();
        $users = User::where([
            'level'         => 'petugas',
            'organisasi.id' => $id
        ])->orderBy('nama.nama_depan', 'ASC')->get();
        $data = [
            "title"     => "List Petugas",
            "class"     => "User",
            "sub_class" => "Petugas",
            "content"   => "layout.admin",
            "users"     => $users,
            "customers" => $customers
        ];
        return view('admin.user.petugas', $data);
    }

    public function store_petugas(UserPetugasCreateRequest $request)
    {

        $users      = User::where('nik', (int) $request->nik);
        $organisasi = Customer::find($request->organisasi);
        $data_organisasi = [
            'id'        => $organisasi->_id,
            'name'      => $organisasi->name,
            'status'    => true
        ];
        if($users->count()<1){
            session()->flash('danger', 'NIK tidak terdaftar');
            return back();
        }else{
            $update     = $users->update([
                'level'         => 'petugas',
                'organisasi'    => $data_organisasi
            ]);
            if($update){
                return back();

            }
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marital_status = Marital_status::all();
        $agama          = Religion::all();
        $users          = new User();
        $data = [
            "title"         => "Detail User",
            "class"         => "User",
            "sub_class"     => "Get All",
            "content"       => "layout.admin",
            "marital_status"=> $marital_status,
            "agama"         => $agama,
        ];
        return view('admin.user.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $post = [
            'nama_depan'    => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'gender'        => $request->gender,
            'nomor_telepon' => $request->nomor_telepon,
            'email'         => $request->email,
            'nik'           => (int) $request->nik,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'password'      => 'password'
        ];
//        dd($post);
        $api_ext        = env('APP_API_EXTERNAL');
        $url            = $api_ext."/v1/auth/register";
        $session_token  = decrypt(session('web_token'));
        $header         = [
            'Authorization' => "Bearer $session_token",
        ];
        $client         = new Client();
        try {
            $response   = $client->post($url, [
                'headers'       => $header,
                'form_params'   => $post
            ]);

            // Periksa status kode respons
            if ($response->getStatusCode() === 201) {
                $data = json_decode($response->getBody(), true);
                session()->flash('success', $data['message']);
                return redirect()->back();

            } elseif ($response->getStatusCode() === 404) {
                echo "Not Found";
            } else {
                echo "Lainnya";
            }
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                // Ada respons dari API
                $response = $e->getResponse();
                if ($response->getStatusCode() === 404) {
                    $data = json_decode($response->getBody(), true);
                    session()->flash('danger', $data['message']);
                    return redirect()->back()->withInput();
                } else {
                    $data = json_decode($response->getBody(), true);
                    session()->flash('danger', $data['message']);
                    return redirect()->back();

                    // Handle kesalahan lainnya di sini
                }
            } else {
                echo "Entah Kenapa";
                // Tangani kesalahan ketika tidak ada respons dari API
            }
        }






    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::find($id);
        $data = [
            "title"     => "Detail User",
            "class"     => "User",
            "sub_class" => "Get All",
            "content"   => "layout.admin",
            "users"     => $user,
        ];
        return view('admin.user.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marital_status = Marital_status::all();
        $agama          = Religion::all();
        $user           = User::find($id);
        $data           = [
            "title"         => "Edit User",
            "class"         => "User",
            "sub_class"     => "Edit",
            "content"       => "layout.admin",
            "marital_status"=> $marital_status,
            "agama"         => $agama,
            "users"         => $user,
        ];
        return view('admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_depan'        => 'required',
            'nama_belakang'     => 'required',
            'gender'            => ['required',Rule::in(['male', 'female'])],
            'nik'               => 'integer',
            'email'             => 'required|email:rfc,dns',
            'nomor_telepon'     => 'required|numeric',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required|date'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user           = User::find($id);
        $agama          = Religion::find($request->agama);
        $status_menikah     = Marital_status::where('code', $request->status_menikah)->first();
        $data_user  = [
            'nama'      => [
                'nama_depan'    => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang
            ],
            'gender'    => $request->gender,
            'nik'       => $request->nik,
            'lahir'     => [
                'tanggal'   => $request->tanggal_lahir,
                'tempat'    => $request->tempat_lahir
            ],
            'kontak'    => [
                'email'         => $request->email,
                'nomor_telepon' => $request->nomor_telepon
            ],
            'status_menikah'    => [
                'code'          => $status_menikah->code,
                'display'       => $status_menikah->display
            ],
            'suku'              => $request->suku,
            'agama'             => [
                'id'            => $agama->id,
                'name'          => $agama->name
            ],
            'warga_negara'      => $request->warga_negara,
            'active'            => true
        ];

       $update_user = $user->update($data_user);
        if($update_user){
            return back()->with('success', 'data updated');
        }else{
            return back()->with('danger', 'data gagal update');
        }
    }
    public function blokir(Request $request, $id)
    {
        $users      = User::find($id);
        $setuju     = $request->setuju;
        $update     = $users->update(['blokir' => 'Y']);
        if($update){
            return redirect()->route('users.index');

        }

    }
    public function kode($properti, $value)
    {
        $users = User::where($properti,'like', "%$value%")->orderBy('nama_depan')->get();
        $data = [
            "title"     => "Daftar User",
            "class"     => "User",
            "sub_class" => "Get All",
            "content"   => "layout.admin",
            "users"     => $users,
        ];
        return view('admin.user.index', $data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $destroy = $users->destroy($id);
        if($destroy){
            return redirect()->route('users.index');
        }
    }
    public function curl_get($token, $url, $method){
        $curl   = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST =>  $method,
            CURLOPT_HTTPHEADER => array($token),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return response($response);
    }
    public function curl_put($token, $url, $method, $data){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL             => $url,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_ENCODING        => '',
            CURLOPT_MAXREDIRS       => 10,
            CURLOPT_TIMEOUT         => 0,
            CURLOPT_FOLLOWLOCATION  => true,
            CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST   => $method,
            CURLOPT_POSTFIELDS      => $data,
            CURLOPT_HTTPHEADER      => array('Content-Type: application/json', $token),
            ));
        $response = curl_exec($curl);
        curl_close($curl);
        return response($response);
    }
    private function __guzzle($uri, $method, $body=null){
        $encryptedToken = Session::get('web_token');
        $decryptedToken = decrypt($encryptedToken);
        $client         = new Client();
        $encryptedToken = Session::$method('web_token');
        $decryptedToken = decrypt($encryptedToken);
        $response       = $client->get($uri, [
            'headers'   => [
                'Authorization' => 'Bearer ' . $decryptedToken,
            ],
            'body'      => $body
        ]);
        return $response->getBody()->getContents();
    }

}
