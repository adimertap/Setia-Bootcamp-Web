<?php

namespace App\Models\Perusahaan;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePerusahaan extends Model
{
    protected $table = "tb_detail_perusahaan";

    protected $primaryKey = 'id_perusahaan';

    protected $fillable = [
        'id',
        'nama_legal',
        'jenis_perusahaan',
        'tanggal_berdirinya',
        'alamat_kantor',
        'alamat_website',
        'no_telp',
        'description',
        'foto_perusahaan'
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
}
