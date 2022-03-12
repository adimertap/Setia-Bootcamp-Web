<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Diskon extends Model
{
    protected $table = "tb_master_diskon";

    protected $primaryKey = 'id_diskon';

    protected $fillable = [
        'kode_diskon',
        'nama_diskon',
        'jumlah_diskon',
        'jenis_diskon'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        
    ];

    public $timestamps = true;

    public function Detailkelas()
    {
        return $this->belongsToMany(Kelas::class,'tb_detail_diskon','id_diskon','id_kelas');
    }

}
