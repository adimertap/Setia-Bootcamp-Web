<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Kelas;

class DetailKuis extends Model
{
    protected $table = "tb_detail_kuis";

    protected $primaryKey = 'id_kuis';

    protected $fillable = [
        'id_kelas',
        'id_keypoint',
        'nama_kuis',
        'soal_kuis',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'jawaban'
    ];

    public $timestamps = true;

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas','id_kelas');
    }

    public function Modul()
    {
        return $this->belongsTo(DetailKeypoint::class, 'id_keypoint','id_keypoint');
    }
}
