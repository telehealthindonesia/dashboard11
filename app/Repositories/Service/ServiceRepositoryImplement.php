<?php

namespace App\Repositories\Service;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Service;

class ServiceRepositoryImplement extends Eloquent implements ServiceRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Service $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}
