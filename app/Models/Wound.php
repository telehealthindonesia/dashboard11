<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model as Eloquent;
use MongoDB\Laravel\Eloquent\SoftDeletes;

class Wound extends Eloquent
{
    use HasFactory, SoftDeletes;
    protected $connection   = 'mongodb';
    protected $primaryKey   = '_id';
    protected $dates        = ['deleted_at'];
    protected $fillable     = ['id_petugas', 'id_pasien', 'jenis_luka', 'lokasi_luka', 'time'];

    public function assessment()
    {
        return $this->hasMany(WoundAssesment::class,'wound.id', '_id');
    }

    public function pasien(){
        return $this->belongsTo(User::class, 'id_pasien', '_id');
    }

}
