<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model as Eloquent;
use MongoDB\Laravel\Eloquent\SoftDeletes;


class Customer extends Eloquent
{
    use HasFactory, SoftDeletes;
    protected $connection   = 'mongodb';
    protected $primaryKey   = '_id';
    protected $dates        = ['deleted_at'];
    protected $fillable     = ['code', 'name', 'pic', 'user_id', 'email', 'hp', 'alamat', 'website', 'is_distributor'];

}
