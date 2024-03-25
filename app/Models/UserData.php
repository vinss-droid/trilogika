<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'telepon',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kalurahan',
        'kode_pos',
        'pendidikan',
        'nama_sekolah',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'warga_negara',
        'nik',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
