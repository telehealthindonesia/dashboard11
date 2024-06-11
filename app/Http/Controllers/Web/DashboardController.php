<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Code;
use App\Models\Customer;
use App\Models\Dashboard;
use App\Models\Kit;
use App\Models\Observation;
use App\Models\Service;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{

    public function index()
    {
        $this->authorize('super_admin', User::class);

        $codes      = Code::paginate(5);
        $petugas    = User::where('level', 'petugas')->paginate(5);
        $observation= Observation::where('_id', '!=', null)->paginate(5);
        $users      = User::paginate(5);
        $vital_sign = Observation::where('category.code','vital-signs')->paginate(5);
        $laboratory = Observation::where('category.code','laboratory')->paginate(5);
        $customer   = Customer::paginate(5);
        $services   = Service::paginate(5);
        $kits       = Kit::paginate(5);
        $data   = [
            "title"         => "Dashboard",
            "class"         => "Dashboard",
            "sub_class"     => "Index",
            "content"       => "layout.user",
            "users"         => $users,
            "codes"         => $codes,
            "petugas"       => $petugas,
            "observations"  => $observation,
            "vital_sign"    => $vital_sign,
            "laboratory"    => $laboratory,
            "customer"      => $customer,
            "services"      => $services,
            "kits"          => $kits,
        ];
        return view('user.dashboard.index', $data);
    }
    public function customer(){
        $this->authorize('petugas', User::class);
        $id_customer = Auth::user()['organisasi']['id'];
        $customer   = Customer::where('_id', $id_customer)->first();
        $kits       = Kit::where('owner.code', $customer->code)->get();
//        dd(KitResource::collection($kits));
        $admission  = Admission::where('faskes.id', $id_customer)->get();
        $petugas    = User::where([
            'organisasi.id' => $id_customer,
            'level'         => 'petugas'
        ])->get();
        $data = [
            "title"         => "Detail Customer",
            "class"         => "customer",
            "sub_class"     => "detail",
            "content"       => "layout.admin",
            "customer"      => $customer,
            "kits"          => $kits,
            "admission"     => $admission,
            "petugas"       => $petugas
        ];

        return view('user.customer.show', $data);
    }
    public function db(){
        $dashboard = Dashboard::all();
        $data = [
            "title"         => "Dashboard",
            "class"         => "Dashboard",
            "sub_class"     => "Index",
            "content"       => "layout.user",
            "dashboard"     => $dashboard
        ];
        return view('user.dashboard.db', $data);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'variable'  => 'required',
            'model'     => 'required',
            'key'       => 'required',
            'value'     => 'required',
            'colour'    => 'required'
        ]);
        $variable   = $request->variable;
        $model      = "\App\Models\ ".$request->model;
        $key        = $request->key;
        $value      = $request->value;
        $colour     = $request->colour;
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{


            $data_input = [
                'variable'      => $variable,
                'model'         => str_replace(" ", "", $model),
                'key'           => $key,
                'value'         => $value,
                'colour'        => $colour,
            ];
            $dashboard = new Dashboard();
            try {
                $create = $dashboard->create($data_input);
                if($create){
                    return back()->with('success', 'Data berhasil disimpan');
                }

            } catch (RequestException $e) {

            }
        }
    }
    public function show($id){
        $dashboard = Dashboard::find($id);
        if($dashboard->value != "all"){
            $data = $dashboard->model::where($dashboard->key, $dashboard->value)->where('update', null)->limit(100);
        }else{
            $data = $dashboard->model::where('update', null)->limit(100);
        }
        if(!empty($data->get())){
            $count = $data->count();
            $dat_update = $data->update(['update'=>time()]);
            $update = $dashboard->update([
                'count'     => $dashboard->count+$count,
                'update'    => time() ]);
            if($update){
                return back()->with('success', 'Data Updated');
            }
        }
        return back()->with('danger', 'Data tidak ada perubahan');
    }
}
