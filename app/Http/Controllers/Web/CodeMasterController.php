<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Code;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CodeMasterController extends Controller

{
    public function index(){
        $code = Code::all();
        $data = [
            "title"         => "Data Code",
            "class"         => "code all",
            "sub_class"     => "Get All",
            "content"       => "layout.admin",
            "code"          => $code,
        ];
        return view('admin.code.vital-sign.index', $data);
    }
    public function create()
    {
        $category = Code::all();
        $code = new Code();
        $data = [
            "title"         => "Data Code",
            "class"         => "code",
            "sub_class"     => "create",
            "content"       => "layout.admin",
            "code"          => $code,
            "category"      => $category
        ];
        return view('admin.code.create', $data);
    }

    public function store(Request $request)
    {
        $session_token  = decrypt(session('web_token'));
        $validator      = Validator::make($request->all(), [
            'code'      => 'required|unique:codes,code',
            'system'    => 'required',
            'display'   => 'required'
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $session_token  = decrypt(session('web_token'));
            $url            = env('APP_API_EXTERNAL'). "/v1/codes";
            $post       = [
                'code'      => $request->code,
                'system'    => $request->system,
                'display'   => $request->display,
                'category'  => $request->category
            ];
            $bearer = Http::withHeaders([
                'Authorization' => 'Bearer '.$session_token,
                'Content-Type' => 'application/json',
            ]);

            try {
                $response = $bearer->post( $url, $post );
                // Check if the request was successful (status code 2xx).
                if ($response->successful()) {
                    session()->flash('success', 'Success, data saved');
                return redirect()->back();
                } else {
                    $data = json_decode($response->body());
                    session()->flash('danger', $data->message);
                    return redirect()->back()->withInput();
                }
            } catch (\Exception $e) {
                $data = json_decode($response->body());
                session()->flash('danger', $data->message);
                return redirect()->back()->withInput();

            }
        }
    }
    public function show($id)
    {
        try {
            $category = Code::all();
            $code = Code::find($id);
            $child_code = Code::where('category.code', $code->code)->orderBy('display')->get();
            $data = [
                "title"         => "Data Code",
                "class"         => "code",
                "sub_class"     => "show",
                "content"       => "layout.admin",
                "code"          => $code,
                "category"      => $category,
                "child_code"    => $child_code
            ];
            return view('admin.code.show', $data);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return back()->with('danger', $e->getMessage());
        }


    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'code'      => 'required',
            'system'    => 'required',
            'display'   => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $category_db = Code::where('code',$request->category)->first();
            $category = [
                'code'      => $category_db->code,
                'system'    => $category_db->system,
                'display'   => $category_db->display
            ];
            $input      = [
                'code'      => $request->code,
                'system'    => $request->system,
                'display'   => $request->display,
                'category'  => $category
            ];
//            dd($request->category);
            $code       = Code::find($id);
            $create     = $code->update($input);
            if($create){
                session()->flash('success', 'Success code updated');
                return redirect()->back();
            }
        }
    }
    public function parent(){
        $code = Code::where('category.code', 'category')->orderBy('display')->get();
        $data = [
            "title"         => "Data Code Parent",
            "class"         => "code parent",
            "sub_class"     => "Get parent",
            "content"       => "layout.admin",
            "code"          => $code,
        ];
        return view('admin.code.vital-sign.index', $data);
    }
}
