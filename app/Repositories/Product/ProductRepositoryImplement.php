<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Product;

class ProductRepositoryImplement extends Eloquent implements ProductRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }
    public function index(){
        $products = $this->model->get();
        return $products;
    }
    public function show($id){
        $product = $this->model->where('_id', $id)->first();
        return $product;
    }
    public function ubah($id, array $data){
        $product = $this->model->where('_id', $id)->first();
        $update = $product->update($data);
        return $update;
    }
    public function store(array $data){
        $create = $this->model->create($data);
        return $create;
    }

    // Write something awesome :)
}
