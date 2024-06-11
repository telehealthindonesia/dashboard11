<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model as Eloquent;
use MongoDB\Laravel\Eloquent\SoftDeletes;

class WoundAssesment extends Eloquent
{
    use HasFactory, SoftDeletes;
    protected $connection   = 'mongodb';
    protected $primaryKey   = '_id';
    protected $dates        = ['deleted_at'];
    protected $fillable     = ['time','wound', 'id_petugas', 'grade', 'panjang', 'lebar', 'kedalaman', 'warna', 'infeksi', 'jenis_exudate', 'foto' ];

    public function petugas_assesment_luka(){
        return $this->belongsTo(User::class, 'id_petugas', '_id');
    }
}
