<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class PayoutTable extends Eloquent 
{
    use HasFactory, HasApiTokens,SoftDeletes;

    public $timestamps = false;
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
    protected $connection   = 'mongodb';
    protected $primaryKey   = 'reference_no';
    protected $guarded      = [];
}
