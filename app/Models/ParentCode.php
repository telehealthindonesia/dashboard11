<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class ParentCode extends Eloquent
{
    use HasFactory, HasApiTokens,SoftDeletes;
    protected $connection   = 'mongodb';
    protected $primaryKey   = '_id';
    protected $dates        = ['deleted_at'];
    protected $fillable     = ['code_id', 'code', 'system', 'display'];
}
