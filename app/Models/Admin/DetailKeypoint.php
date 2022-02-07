<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKeypoint extends Model
{
    protected $table = "tb_detail_kelas_keypoint";

    protected $primaryKey = 'id_keypoint';

    protected $fillable = [
        'id_kelas',
        'nama_keypoint',
        'number'
    ];

    public $timestamps = true;

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas','id_kelas');
    }
    
}
