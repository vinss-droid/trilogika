<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPekerjaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_institusi',
        'jabatan',
        'alamat_kantor',
        'kode_pos_kantor',
        'tlp_kantor',
        'email_kantor',
        'fax_kantor',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
