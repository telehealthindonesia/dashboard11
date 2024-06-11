<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model as Eloquent;
use MongoDB\Laravel\Eloquent\SoftDeletes;

class Teleconsultation extends Eloquent
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
    protected $connection   = 'mongodb';
    protected $primaryKey   = '_id';
    protected $guarded      = [];
}
