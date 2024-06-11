<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Wound;
use App\Models\WoundAssesment;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WoundAssesmentController extends Controller
{
    public function store(Request $request){
        $wound_id   = $request->wound_id;
        $wound      = Wound::find($wound_id);
        $data_wound = [
            'id'            => $wound->_id,
            'lokasi_luka'   => $wound->lokasi_luka,
            'jenis_luka'    => $wound->jenis_luka,
            'id_pasien'     => $wound->id_pasien,
            'id_petugas'    => $wound->id_petugas,
            'time'          => $wound->time
        ];
        $photo = $request->file('foto');
        // Upload the photo using Guzzle
        $client = new Client();
        $api_file = env('APP_API_EXTERNAL');
        $apiEndpoint = $api_file.'/files'; // Replace with your API endpoint
        $session_token  = decrypt(session('web_token'));
        $header = [
            'Authorization' => "Bearer $session_token",
        ];

        try {
            $response = $client->post($apiEndpoint, [
                'headers'   => $header,
                'multipart' => [
                    [
                        'name'     => 'file', // Name of the parameter in the API that expects the photo
                        'contents' => fopen($photo->getPathname(), 'r'), // Open the photo in read mode and send it
                        'filename' => $photo->getClientOriginalName(), // Use the original file name
                    ],
                ],
            ]);

            $responseData = json_decode($response->getBody(), true);
            $url_foto       = $responseData['data']['file']['url'];

            $wound_assesment = new WoundAssesment();
            $data   = [
                'time'          => strtotime($request->time),
                'wound'         => $data_wound,
                'id_petugas'    => Auth::id(),
                'grade'         => (int) $request->grade,
                'panjang'       => (float) $request->panjang,
                'lebar'         => (float) $request->lebar,
                'kedalaman'     => (float) $request->kedalaman,
                'warna'         => $request->warna,
                'infeksi'       => $request->infeksi,
                'jenis_exudate' => $request->jenis_exudate,
                'foto'          => $url_foto
            ];
            $create = $wound_assesment->create($data);
            if($create){
                return back()->with('success', 'Data Berhasil disimpan');
            }

        } catch (\Exception $e) {
            // Handle the error if an exception occurs
            \Log::error('Error uploading photo: ' . $e->getMessage());
            session()->flash('danger', 'Gagal Upload');
            return redirect()->back();
        }



    }
    public function show($id){
        $wound_assesment   = WoundAssesment::find($id);
        $data = [
            "title"             => "Monitoring Luka",
            "class"             => "Pengkajian",
            "sub_class"         => "Monitoring Luka",
            "content"           => "layout.admin",
            "wound_assesment"   => $wound_assesment
        ];
        return view('admin.wound_assessment.show', $data);

    }
}
