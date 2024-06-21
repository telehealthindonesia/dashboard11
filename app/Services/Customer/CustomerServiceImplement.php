<?php

namespace App\Services\Customer;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Customer\CustomerRepository;

class CustomerServiceImplement extends ServiceApi implements CustomerService{

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

    public function __construct(CustomerRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
    public function index(){
        try {
            return $this->mainRepository->getUserByName($name, $gender, $date);
        }catch (\Exception $exception){

        }
    }
}
