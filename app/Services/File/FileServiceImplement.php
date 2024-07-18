<?php

namespace App\Services\File;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use LaravelEasyRepository\ServiceApi;
use App\Repositories\File\FileRepository;

class FileServiceImplement extends ServiceApi implements FileService{

    /**
     * set title message api for CRUD
     * @param string $title
     */
     protected $title = "";
     /**
     * uncomment this to override the default message
     * protected $create_message = "";
     * protected $update_message = "";
     * protected $delete_message = "";
     */

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(FileRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }
    public function store($request, $nama_file){
        try {
            $file = $request->file('file');
            $result     = Storage::disk('s3')->putFileAs('image', $file, $file->hashName(), 'public');
            $url        = Storage::disk('s3')->url($result);
            $data_file  = [
                'nama_file' => $nama_file,
                'name'      => $file->hashName(),
                'extention' => $file->getClientOriginalExtension(),
                'mimeType'  => $file->getClientMimeType(),
                'size'      => $file->getSize(),
                'user_id'   => Auth::id(),
                'url'       => url($url)
            ];
            return $this->mainRepository->store($data_file);
        }catch (\Exception $exception){

        }
    }

    // Define your custom methods :)
}
