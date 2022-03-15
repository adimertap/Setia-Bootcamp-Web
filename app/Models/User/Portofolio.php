<?php

namespace App\Models\User;

use App\Models\Admin\Kelas;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = "tb_portofolio";

    protected $primaryKey = 'id_portofolio';

    protected $fillable = [
        'id',
        'id_kelas',
        'nama_project',
        'deskripsi_project',
        'url_project',
        'url_gambar',
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        
    ];

    public $timestamps = true;

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class,'id_kelas','id_kelas');
    }

    public function User()
    {
        return $this->belongsTo(User::class,'id','id');
    }
}
