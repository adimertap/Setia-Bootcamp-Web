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
        'jenis_diskon',
        'status_diskon'
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

    // public function Detaildiskon()
    // {
    //     return $this->belongsToMany(Kelas::class,'tb_detail_diskon','id_diskon','id_kelas');
    // }

    public static function getId()
    {
        $getId = DB::table('tb_master_diskon')->orderBy('id_diskon', 'DESC')->take(1)->get();
        if (count($getId) > 0) return $getId;
        return (object)[
            (object)[
                'id_diskon' => 0
            ]
        ];
    }


}
