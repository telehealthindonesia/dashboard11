<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Profession;
use App\Models\User;
use Illuminate\Http\Request;

class ConsultantWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas        = User::where('is_consultant', '!=',true)->get();
        $consultants    = User::where('is_consultant', true)->get();
        $profesi        = Profession::all();
        $data = [
            "title"         => "Data Code",
            "class"         => "code all",
            "sub_class"     => "Get All",
            "content"       => "layout.admin",
            "consultants"   => $consultants,
            "petugas"       => $petugas,
            "profesi"       => $profesi
        ];
        return view('admin.consultant.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find($request->id_petugas);
//        dd($user);
        $profesi = Profession::find($request->id_profesi);
        $data_pendaftaran = [
            'gelar'         => [
                'gelar_depan'   => $request->gelar_depan,
                'gelar_belakang'   => $request->gelar_belakang
            ],
            'profesi'       => [
                'id'        => $profesi->_id,
                'name'      => $profesi->name,
                'spesialis' => null
            ],
            'is_consultant' => true,
            'consultant'    => [
                'isOpenForConsultation' => true,
                'fcm_token'             => uniqid()
            ],
            'level'         => 'petugas',
            'str'           => [
                'number'    => uniqid(),
                'terbit'    => date('Y-m-d'),
                'expired'   => date('Y-m-d')
            ]
        ];
        $create = $user->update($data_pendaftaran);
        if($create){
            session()->flash('success', 'Data berhasil ditambahkan');
        }else{
            session()->flash('danger', 'Data gagal ditambahkan');
        }
        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find($request->consultant_id);
        $profesi = Profession::find($request->id_profesi);
        $data_update = [
            'gelar'         => [
                'gelar_depan'   => $request->gelar_depan,
                'gelar_belakang'   => $request->gelar_belakang
            ],
            'profesi'       => [
                'id'        => $profesi->_id,
                'name'      => $profesi->name,
                'spesialis' => null
            ],
            'is_consultant' => true,
            'consultant'    => [
                'isOpenForConsultation' => $request->isOpenForConsultation,
                'fcm_token'             => uniqid()
            ],
            'level'         => 'petugas',
            'str'           => [
                'number'    => $request->str_number,
                'terbit'    => $request->str_terbit,
                'expired'   => $request->str_expired
            ]

        ];
        $update = $user->update($data_update);
        if($update){
            session()->flash('success', 'Data berhasil diupdate');
        }else{
            session()->flash('danger', 'Data gagal diupdate');
        }
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
