<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    

    public function socialAccounts(){
        return $this->hasMany(SocialAccount::class);
    }

    public function userData(){
        return $this->hasOne(UserData::class);
    }

    public function buktiPersyaatan(){
        return $this->hasOne(BuktiPersyaratan::class);
    }
    public function schemas(){
        return $this->belongsToMany(Schema::class,'data_sertifikasi');
    }
    public function dataPekerjaan(){
        return $this->hasOne(DataPekerjaan::class);
    }
}
