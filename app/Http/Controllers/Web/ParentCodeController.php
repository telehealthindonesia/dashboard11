<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ChildCode;
use App\Models\Code;
use App\Models\ParentCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ParentCodeController extends Controller
{
    public function index(){
        $parent_codes   = ParentCode::paginate(10);
        $codes          = Code::orderBy('display', 'ASC')->get();
        $data = [
            "title"             => "Parent Code",
            "class"             => "code",
            "sub_class"         => "parent",
            "content"           => "layout.admin",
            "codes"             => $codes,
            "parent_codes"      => $parent_codes,
        ];
        return view('admin.code.parent.index', $data);
    }
    public function store(Request $request){
        $validator      = Validator::make($request->all(), [
            'code_id'       => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $code = Code::find($request->code_id);
            $data_code = [
                'code_id'   => $code->id,
                'code'      => $code->code,
                'system'    => $code->system,
                'display'   => $code->display,
            ];
            $parent_code = new ParentCode();
            try {
                Log::info($data_code);
                $create = $parent_code->create($data_code);
                if($create){
                    return back()->with('success', 'Data berhasil disimpan');
                }else{
                    return back()->with('danger', 'Data gagal disimpan');
                }
            }catch (\Exception $e){
                Log::error($e->getMessage());
                return back()->with('danger', 'Server Error');
            }
        }
    }
    public function show($id)
    {
        try {
            $codes          = Code::all();
            $parent_code    = ParentCode::find($id);
            $child_codes    = ChildCode::where('parent.code', $parent_code->code)->orderBy('norut', 'ASC')->get();
            $data = [
                "title"         => "Data Code",
                "class"         => "code",
                "sub_class"     => "show",
                "content"       => "layout.admin",
                "codes"         => $codes,
                "parent_code"   => $parent_code,
                "child_codes"   => $child_codes
            ];
            return view('admin.code.parent.show', $data);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return back()->with('danger', $e->getMessage());
        }


    }
}
