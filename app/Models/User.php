<?php

namespace App\Models;

use App\Models\Admin\Kelas;
use App\Models\Perusahaan\Pelamar;
use App\Models\Perusahaan\ProfilePerusahaan;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'occupation',
        'is_admin',
        'email_verified_at',
        'role',
        'phone',
        'address'
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
    ];

    public function Detailkelas()
    {
        return $this->belongsTomany(Kelas::class,'tb_detail_mentor','id','id_kelas');
    }

    public function Perusahaan()
    {
        return $this->belongsTo(ProfilePerusahaan::class,'id','id');
    }

    public function Pelamar()
    {
        return $this->belongsTo(Pelamar::class,'id','id');
    }

}
