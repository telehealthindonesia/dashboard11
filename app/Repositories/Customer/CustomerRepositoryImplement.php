<?php

namespace App\Repositories\Customer;

use App\Http\Resources\UserResource;
use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Customer;

class CustomerRepositoryImplement extends Eloquent implements CustomerRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Customer $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)

    public function index(){
        $user = $this->model->get();
        $data_user = UserResource::collection($user);
        return $data_user;
    }
}
