<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Kelas;

class KelasKeypoint extends Model
{
    protected $table = "tb_master_kelas_keypoint";

    protected $primaryKey = 'id_keypoint';

    protected $fillable = [
        'id_kelas',
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
}
