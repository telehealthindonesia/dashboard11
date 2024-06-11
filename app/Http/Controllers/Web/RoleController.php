<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\Customer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index(){
        $role_code = Code::where('code', 'role')->first();
        $roles      = Code::where('category.code', 'role')->get();
        $data = [
            "title"         => "Roles",
            "class"         => "role",
            "sub_class"     => "index",
            "content"       => "layout.user",
            "roles"         => $roles,
            "role_code"     => $role_code

        ];
        return view('admin.role.index', $data);
    }
    public function show($id){
        $role_code  = Code::find($id);
        $roles      = Role::where('role.code', $role_code->code)->get();
        $data = [
            "title"         => "Roles",
            "class"         => "role",
            "sub_class"     => "index",
            "content"       => "layout.user",
            "roles"         => $roles,
            "role_code"     => $role_code,

        ];
        return view('admin.role.show', $data);
    }
    public function store(Request $request)
    {
        $session_token  = decrypt(session('web_token'));
        $validator      = Validator::make($request->all(), [
            'user_id'       => 'required',
            'role_id'       => 'required',
            'customer_id'   => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $user_id    = $request->user_id;
            $role_id    = $request->role_id;
            $customer_id= $request->customer_id;
            $user       = User::find($user_id);
            $role       = Code::find($role_id);
            $customer   = Customer::find($customer_id);
            $data_user  = [
                'id'            => $user->id,
                'nama'          => $user->nama,
                'nik'           => $user->nik,
                'kontak'        => $user->kontak,
                'lahir'         => $user->lahir,
            ];
            $data_role  = [
                'id'        => $role->id,
                'code'      => $role->code,
                'system'    => $role->system,
                'display'   => $role->display,
                'category'  => $role->category
            ];
            $validasi_role = Role::where([
                'role.id'       => $role_id,
                'user.id'       => $user_id,
                'organisasi.id' => $customer_id
            ]);
            $organisasi     = [
                'id'        => $customer->id,
                'name'      => $customer->name
            ];
            if(empty($user)){
                return back()->with('danger', 'Empty User');
            }elseif (empty($role)){
                return back()->with('danger', 'Empty Role');
            }elseif($validasi_role->count()>0){
                return back()->with('danger', 'User telah terdaftar di role yang sama di organisasi tersebut');
            }elseif (empty($customer)){
                return back()->with('danger', 'Empty Organisasi');

            }
            else{
                $data_post       = [
                    'role'      => $data_role,
                    'user'      => $data_user ,
                    'organisasi'=> $organisasi,
                    'is_active' => true
                ];
                $role_modal = new Role();
                try {
                    $create = $role_modal->create($data_post);
                    if($create){
                        return back()->with('success', 'Data berhasil ditambahkan');
                    }else{
                        return back()->with('danger', 'Data gagal ditambahkan');
                    }

                } catch (\Exception $e) {
                    return back()->with('danger', 'Terjadi kesalahan di server');

                }
            }

        }
    }
    public function create(Request $request, $id){
        $role_code  = Code::find($id);
        if($request->name == null){
            $users      = User::paginate(5);
            $keyword_name = null;
        }else{
            $name       = $request->name;
            $keyword_name = $name;
            $users      = User::where('nama.nama_depan', 'like', '%'.$name.'%')->orWhere('nama.nama_belakang', 'like', '%'.$name.'%')->paginate(100);
        }

        $data = [
            "title"         => "Create $role_code->display",
            "class"         => "role",
            "sub_class"     => "create",
            "content"       => "layout.user",
            "users"         => $users,
            "role_code"     => $role_code,
            "keyword_name"  => $keyword_name

        ];
        return view('admin.role.create', $data);
    }
    public function search_customer(Request $request, $role_id, $user_id){
        $role_code  = Code::find($role_id);
        $user       = User::find($user_id);
        if($request->name == null){
            $customers          = Customer::paginate(5);
            $keyword_name       = null;
        }else{
            $name           = $request->name;
            $keyword_name   = $name;
            $customers      = Customer::where('name', 'like', '%'.$name.'%')->paginate(100);
        }

        $data = [
            "title"         => "Create $role_code->display",
            "class"         => "role",
            "sub_class"     => "create",
            "content"       => "layout.user",
            "user"          => $user,
            "customers"     => $customers,
            "role_code"     => $role_code,
            "keyword_name"  => $keyword_name

        ];
        return view('admin.role.search_customer', $data);
    }

    public function mine(){
        $user_id    = Auth::id();
        $roles      = Role::where('user.id', $user_id)->get();
//        dd($roles);
        $data = [
            "title"         => "Roles",
            "class"         => "role",
            "sub_class"     => "index",
            "content"       => "layout.user",
            "roles"         => $roles,

        ];
        return view('admin.role.mine', $data);
    }
}
