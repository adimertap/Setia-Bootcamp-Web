<?php

namespace App\Models\Perusahaan;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    protected $table = "tb_pelamar";

    protected $primaryKey = 'id_pelamar';

    protected $fillable = [
        'id',
        'id_pengumuman',
        'nama_lengkap',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat_lengkap',
        'no_telp',
        'file_cv',
        'file_dukungan',
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        
    ];

    public $timestamps = true;

    public function User()
    {
        return $this->belongsTo(User::class,'id','id');
    }

    public function Pengumuman()
    {
        return $this->belongsTo(Pengumuman::class,'id_pengumuman','id_pengumuman');
    }
}
