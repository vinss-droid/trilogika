<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schema extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis',
        'nomor',
        'judul',
        'tujuan',
        'status',
    ];

 public function unitKompetensis()
    {
        return $this->hasMany(UnitKompetensi::class);
    }
    public function users(){
        return $this->belongsToMany(User::class,'data_sertifikasi');
    }
}
