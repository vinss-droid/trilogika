<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPersyaratan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ijazah',
        'sk_kerja',
        'ktp',
        'pas_foto',
        'cv',
        'status',
    ];
}
