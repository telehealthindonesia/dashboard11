<?php

namespace App\Repositories\File;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\File;

class FileRepositoryImplement extends Eloquent implements FileRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(File $model)
    {
        $this->model = $model;
    }
    public function store($data){
        $store = $this->model->create($data);
        return $store;
    }


    // Write something awesome :)
}
