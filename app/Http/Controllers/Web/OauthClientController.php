<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\OauthClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OauthClientController extends Controller
{
    public function index(){
        $this->authorize('viewAny', OauthClient::class);
        $oauth_clients = OauthClient::all();
        $data = [
            "title"             => "Client List",
            "class"             => "Client",
            "sub_class"         => "Get All",
            "content"           => "layout.admin",
            "oauth_clients"     => $oauth_clients,
        ];
        return view('client.client.index', $data);
    }
    public function mine(){
        $user_id        = Auth::id();
        $customer       = Customer::where('user_id', $user_id)->first();
        $oauth_clients  = OauthClient::where('user_id', Auth::id())->get();
        $data = [
            "title"             => "Client List",
            "class"             => "Client",
            "sub_class"         => "Get All",
            "content"           => "layout.admin",
            "oauth_clients"     => $oauth_clients,
            "customer"          => $customer
        ];
        return view('client.client.mine', $data);
    }
    public function show_post(Request $request){
        $username = Auth::user();
        $password = Auth::user()['password'];
        $password_post = bcrypt($request->password);
        if($password == $password_post){
            return back()->with('success', 'user validated');
        }else{
            return back()->with('danger', 'user not validated'.$password." ". $password_post);
        }


    }
    public function show($id){
        $oauth_clients = OauthClient::find($id);
        if($oauth_clients->user_id != null ){
            $user = \App\Models\User::find($oauth_clients->user_id);
        }else{
            $user = null;
        }
        $data = [
            "title"             => "Client List",
            "class"             => "Client",
            "sub_class"         => "Get All",
            "content"           => "layout.admin",
            "oauth_clients"     => $oauth_clients,
            "user"              => $user
        ];
        return view('client.client.show', $data);
    }
    public function update(Request $request ){

    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=> 'required',
            'redirect'=> 'required|url'
        ]);
        if ($validator->fails()) {
            return back()->with('danger', 'Gagal Validasi');
        }
        if (env('APP_ENV') == 'local'){
            $revoke = false;
        }else{
            $revoke = true;
        }
        $data_client = [
            'user_id'=> Auth::id(),
            'name'=> $request->name,
            'secret'=> bcrypt(uniqid()),
            'provider'=> "users",
            'redirect'=> $request->redirect,
            'personal_access_client'=> false,
            'password_client'=> true,
            'revoked'=> $revoke
        ];
        $client = new OauthClient();
        $create = $client->create($data_client);
        if($create){
            return back()->with('success', 'Sukses membuat project');
        }else{
            return back()->with('danger', 'Gagal membuat project');
        }

    }
}
