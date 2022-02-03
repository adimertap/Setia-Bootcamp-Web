<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Level;
use App\Models\Admin\JenisKelas;
use Illuminate\Support\Facades\DB;

class Kelas extends Model
{
    protected $table = "tb_master_kelas";

    protected $primaryKey = 'id_kelas';

    protected $fillable = [
        'id_jenis_kelas',
        'id_level',
        'kode_kelas',
        'nama_kelas',
        'slug',
        'harga_kelas',
        'jumlah_lesson',
        'tentang_kelas',
        'cover_kelas',
        'status'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        
    ];

    public $timestamps = true;

    public function Jeniskelas()
    {
        return $this->belongsTo(JenisKelas::class,'id_jenis_kelas','id_jenis_kelas');
    }

    public function level()
    {
        return $this->belongsTo(level::class,'id_level','id_level');
    }

    public static function getId(){
        // return $this->orderBy('id_sparepart')->take(1)->get();
        $getId = DB::table('tb_master_kelas')->orderBy('id_kelas','DESC')->take(1)->get();
        if(count($getId) > 0) return $getId;
        return (object)[
            (object)[
                'id_kelas'=> 0
            ]
            ];

    }
}