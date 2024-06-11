<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ChildCode;
use App\Models\Code;
use App\Models\ParentCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ChildCodeController extends Controller
{
    public function store(Request $request) : object {
        $validator      = Validator::make($request->all(), [
            'code'       => 'required',
        ]);
        $parent_code = $request->parent;
        $child_code_post = $request->code;

        $validasi_duplikasi = ChildCode::where('parent.code', $parent_code)->where('code', $child_code_post);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }elseif($validasi_duplikasi->count()>0){
            return back()->with('danger', 'Code Sudah didaftarkan');
        }else{
            try {
                $parent         = Code::where('code',$parent_code)->first();
                $data_parent    = [
                    'code_id'   => $parent->id,
                    'code'      => $parent->code,
                    'system'    => $parent->system,
                    'display'   => $parent->display
                ];
                try {
                    $code           = Code::where('code',$child_code_post)->first();
                    $data_code = [
                        'parent'    => $data_parent,
                        'norut'     => (int)$request->norut,
                        'code_id'   => $code->id,
                        'code'      => $code->code,
                        'system'    => $code->system,
                        'display'   => $code->display,
                    ];
                    $child_code = new ChildCode();
                    Log::info($data_code);
                    $create = $child_code->create($data_code);
                    if($create){
                        Log::info($data_code);
                        return back()->with('success', 'Data berhasil disimpan');
                    }else{
                        Log::error('Gagal simpan child code');
                        return back()->with('danger', 'Data gagal disimpan');
                    }
                }catch (\Exception $e){
                    Log::info($e->getMessage());
                    return back()->with('danger', $e->getMessage());
                }

            }catch (\Exception $e){
                Log::info($e->getMessage());
                return back()->with('danger', $e->getMessage());
            }
        }
    }
    public function update(Request $request, $id) {
        $validator      = Validator::make($request->all(), [
            'norut'     => 'required',
            'code'      => 'required',
            'system'    => 'required',
            'display'   => 'required',
        ]);
        $child_code = ChildCode::find($id);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            try {
                $child_code_new = [
                    'norut'     => (int) $request->norut,
                    'code'      => $request->code,
                    'system'    => $request->system,
                    'display'   => $request->display
                ];
                $update = $child_code->update($child_code_new);
                if($update){
                    return back()->with('success', 'Data berhasil diupdate');
                }



            }catch (\Exception $e){
                Log::info($e->getMessage());
                return back()->with('danger', $e->getMessage());
            }

        }
    }
}
