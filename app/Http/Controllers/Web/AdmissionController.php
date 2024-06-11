<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Customer;
use App\Models\Question;
use App\Models\Service;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdmissionController extends Controller
{
    public function index($id)
    {
        $admissions = Admission::where('faskes.id', $id)->where('status', '!=', 'close')->orderBy('created_at', 'DESC')->get();
        $data = [
            "title"         => "Admission List",
            "class"         => "Admission",
            "sub_class"     => "list",
            "content"       => "layout.admin",
            "admissions"    => $admissions,
        ];

        return view('user.admission.index', $data);
    }
    public function kunjungan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'       => 'required',
            'customer_id'   => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $user_id        = $request->user_id;
            $customer_id    = $request->customer_id;

            $user       = User::find($user_id);
            $customer   = Customer::find($customer_id);
            $service    = Service::where('faskes.id', $customer_id)->get();

            $data = [
                "title"     => "Kunjungan Baru",
                "class"     => "Admission",
                "sub_class" => "list",
                "content"   => "layout.admin",
                "user"      => $user,
                "customer"  => $customer,
                "service"   => $service
            ];
            return view('user.admission.create', $data);
        }

    }
    public function find_user(Request $request)
    {
        $name   = $request->name;
        $users  = User::where('nama.nama_depan','like', '%'.$name.'%')->orWhere('nama.nama_belakang','like', '%'.$name.'%')->get();
        $data = [
            "title"     => "Find User",
            "class"     => "User",
            "sub_class" => "Find",
            "content"   => "layout.admin",
            "name"      => $name,
            "users"     => $users,
        ];
        return view('user.admission.find_user', $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_faskes' => 'required',
            'id_pasien' => 'required',
            'date'      => 'date'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $data_post = [
                'id_faskes'     => $request->id_faskes,
                'id_pasien'     => $request->id_pasien,
                'date'          => $request->date,
                "id_service"    => $request->id_service,
            ];

            $client         = new Client();
            $base_url       = env('APP_API_EXTERNAL');
            $apiEndpoint    = $base_url.'/v1/admissions'; // Replace with your API endpoint
            $session_token  = decrypt(session('web_token'));
            $header = [
                'Authorization' => "Bearer $session_token",
            ];

            try {
                $response = $client->post($apiEndpoint, [
                    'headers'       => $header,
                    'form_params'   => $data_post
                ]);

                // Handle the response if needed
                $statusCode = $response->getStatusCode();
                $responseData = json_decode($response->getBody(), true);

                // Perform any other actions with the response data
                // ...
                session()->flash('success', $responseData['message']);
                return redirect()->back();

            } catch (\Exception $e) {

                session()->flash('danger', 'Gagal membuat admisi baru');
                return redirect()->back();
            }
        }
    }
}
