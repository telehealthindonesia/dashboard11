<?php

namespace App\Services\File;

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

    // Define your custom methods :)
}
