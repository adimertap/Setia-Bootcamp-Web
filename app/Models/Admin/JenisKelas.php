<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class JenisKelas extends Model
{

    protected $table = "tb_master_jenis_kelas";

    protected $primaryKey = 'id_jenis_kelas';

    protected $fillable = [
        'jenis_kelas',
        'status_jenis',
        'keterangan'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        
    ];

    public $timestamps = true;

    // public function Detailretur()
    // {
    //     return $this->belongsToMany(Sparepart::class,'tb_inventory_detretur','id_retur','id_sparepart')->withPivot('qty_retur','keterangan_retur');
    // }

    // public function Rcv()
    // {
    //     return $this->belongsTo(Rcv::class,'id_rcv','id_rcv');
    // }

    // public function Pegawai()
    // {
    //     return $this->belongsTo(Pegawai::class,'id_pegawai','id_pegawai');
    // }
}
