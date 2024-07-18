<?php

namespace App\Services\Product;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use LaravelEasyRepository\ServiceApi;
use App\Repositories\Product\ProductRepository;

class ProductServiceImplement extends ServiceApi implements ProductService{

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

    public function __construct(ProductRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }
    public function index(){
        $products = $this->mainRepository->index();
        return $products;

    }
    public function show($id){
        try {
            return $this->mainRepository->show($id);
        }catch (\Exception $exception){
            Log::debug($exception->getMessage());
            return [];
        }
    }
    public function store($data){
        try {
            return $this->mainRepository->store($data);
        }catch (\Exception $exception){
            Log::debug($exception->getMessage());
            return [];
        }
    }
    public function ubah($id, $data){
        try {
            return $this->mainRepository->ubah($id, $data);
        }catch (\Exception $exception){
            Log::debug($exception->getMessage());
            return [];
        }
    }


    // Define your custom methods :)
}
