<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kit\StoreKitRequest;
use App\Models\Customer;
use App\Models\Kit;
use App\Models\Observation;
use App\Models\Religion;
use App\Models\TimeLine;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KitController extends Controller
{
    public function index(){
        $kit = Kit::all();
        $data = [
            "title"     => "Kits List",
            "class"     => "Kit",
            "sub_class" => "Get All",
            "content"   => "layout.admin",
            "kits"      => $kit
        ];
        return view('user.kits.index', $data);
    }
    public function create(){
        $session_token  = decrypt(session('web_token'));
//        dd($session_token);
        $customer       = Customer::all();
        $distributor    = Customer::where('is_distributor', true)->get();
        $kits           = new Kit();
        $data = [
            "title"     => "Kits List",
            "class"     => "Kit",
            "sub_class" => "Get All",
            "content"   => "layout.admin",
            "customer"  => $customer,
            "distributor"   => $distributor,
            "kits"          => $kits
        ];
        return view('user.kits.create', $data);
    }
    public function store(StoreKitRequest $request){
        $session_token  = decrypt(session('web_token'));
        $url            = env('APP_API_EXTERNAL'). "/v1/kits";
        $header = [
            'Authorization' => "Bearer $session_token",
        ];
        $post = [
            'kit_code'          => $request->code,
            'kit_name'          => $request->name,
            'owner_code'        => $request->owner,
            'distributor_code'  => $request->distributor
        ];
        $client     = new Client();
        try {
            $response   = $client->post($url, [
                'headers'       => $header,
                'form_params'   => $post
            ]);
            $data = json_decode($response->getBody(), true);

            // Periksa status kode respons
            if ($response->getStatusCode() == 201) {
                session()->flash('success', $data['message']);
                return back();
            } else {
                // Respons dengan status kode lain
                // Handle kesalahan lainnya di sini
                session()->flash('danger', $data['message'].$response->getStatusCode());
                return back();
            }
        } catch (RequestException $e) {
            // Tangani kesalahan permintaan seperti koneksi bermasalah atau API tidak tersedia
            session()->flash('danger', 'Gagal memproses data');
            return back();
        }

    }
    public function show($id){

    }
    public function transaksi($id, Request $request){

        $atm_sehat  = Kit::find($id);
        $keyword    = $request->keyword;
        if($request->keyword != null){
            $observation = Observation::where('atm_sehat.code', $atm_sehat->code)->where('pasien', '!=', null)->where('pasien.nama.nama_depan', 'like', "%".$keyword."%")->orWhere('pasien.nama.nama_belakang', 'like', "%".$keyword."%")->orderBy('time', 'DESC')->paginate(10);
        }else{
            $observation = Observation::where('atm_sehat.code', $atm_sehat->code)->orderBy('time', 'DESC')->paginate(10);
        }

//        dd($observation);
        $data = [
            "title"     => "Transaksi Kit",
            "class"     => "Kit",
            "sub_class" => "Transaksi",
            "content"   => "layout.admin",
            "observations"  => $observation,
            "keyword"       => $keyword,
            "atm_sehat"     => $atm_sehat,
        ];
        return view('user.kits.transaksi', $data);
    }



}
