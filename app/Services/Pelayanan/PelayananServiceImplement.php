<?php

namespace App\Services\Pelayanan;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Pelayanan\PelayananRepository;

class PelayananServiceImplement extends ServiceApi implements PelayananService{

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

    public function __construct(PelayananRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
}
