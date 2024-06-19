<?php

namespace App\Services\User;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use LaravelEasyRepository\ServiceApi;
use App\Repositories\User\UserRepository;

class UserServiceImplement extends ServiceApi implements UserService{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(UserRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function findByIdShort($user_id){
        try {
            return $this->mainRepository->findByIdShort($user_id);
        }catch (\Exception $exception){
            Log::debug($exception->getMessage());
            return [];
        }
    }
    public function findByEmail($email){
        try {
            return $this->mainRepository->findByEmail($email);
        }catch (\Exception $exception){
            Log::debug($exception->getMessage());
            return [];
        }
    }
    public function findByNIK($nik){
        try {
            return $this->mainRepository->findByNIK($nik);
        }catch (\Exception $exception){
            Log::debug($exception->getMessage());
            return [];
        }
    }
    public function profile($user_id){
        try {
            return $this->mainRepository->profile($user_id);
        }catch (\Exception $exception){
            Log::debug($exception->getMessage());
            return [];
        }
    }

    public function getUserByName($name, $gender, $date){
        try {
            return $this->mainRepository->getUserByName($name, $gender, $date);
        }catch (\Exception $exception){

        }
    }
    public function store($request, $level){
        $data_user = [
            'nama'  => [
                'nama_depan'    => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
            ],
            'nik'   => (int)$request->nik,
            'gender'=> $request->gender,
            'lahir' => [
                'tempat'    => $request->tempat_lahir,
                'tanggal'   => $request->tanggal_lahir
            ],
            'kontak'    => [
                'email'     => $request->email,
                'nomor_telepon' => $request->nomor_telepon
            ],
            'username'  => $request->email,
            'level'     => $level,
            'family'    => [
                'id_induk'          => Auth::id(),
                'hubungan_keluarga' => $request->relasi,
                'is_active'         => true
            ]

        ];

        try {
            return $this->mainRepository->store($data_user);
        }catch (\Exception $exception){
            Log::debug($exception->getMessage());
            return [];
        }
    }
    public function sendingWhatsapp($receiver, $message)
    {
        $url_sending_wa = "https://wa.atm-sehat.com/send";
        $header         = [];
        $client         = new Client();
        $sending        = $client->post($url_sending_wa, [
            'headers' => $header,
            'form_params'   => [
                'number'    => '6281213798746',
                'message'   => $message,
                'to'        => '62'.(int) $receiver,
                'type'      => 'chat'
            ]
        ]);
    }
    public function updateUser($request, $user){
        $data_user = [
            'nama'  => [
                'nama_depan'    => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
            ],
            'nik'   => $request->nik,
            'gender'=> $request->gender,
            'lahir' => [
                'tempat'    => $request->tempat_lahir,
                'tanggal'   => $request->tanggal_lahir
            ],
            'kontak'    => [
                'email'     => $request->email,
                'nomor_telepon' => $request->nomor_telepon
            ],
            'username'  => $request->email
        ];

        try {
            return $user->update($data_user);
        }catch (\Exception $exception){
            Log::debug($exception->getMessage());
            return [];
        }
    }
    public function angkatPetugas($user){
        try {
            $user['level'] = "petugas";
            return $this->mainRepository->angkatPetugas($user);
        }catch (\Exception $exception){

        }
    }
    public function usia($tgl_lahir)
    {
        $birthDate      = new \DateTime($tgl_lahir);
        $today          = new \DateTime("today");
        $y              = $today->diff($birthDate)->y;
        $m              = $today->diff($birthDate)->m;
        $d              = $today->diff($birthDate)->d;
        $usia           = [
            'tahun'         => $y,
            'bulan'         => $m,
            'hari'          => $d
        ];
        return response($usia);
    }

    // Define your custom methods :)
}
