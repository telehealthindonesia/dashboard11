<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Code extends Eloquent
{
    use HasFactory, HasApiTokens,SoftDeletes;
    protected $connection   = 'mongodb';
    protected $primaryKey   = '_id';
    protected $dates        = ['deleted_at'];
    protected $fillable     = ['code', 'system', 'display', 'category', 'category.code', 'category.system', 'category.display'];

    public function child(){
        return $this->hasMany(Code::class, 'category.code', '_id');
    }
    public function parent(){
        return $this->belongsTo(Code::class, 'category.code', '_id');
    }
}
