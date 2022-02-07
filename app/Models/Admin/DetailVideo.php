<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\DetailKeypoint;

class DetailVideo extends Model
{
    protected $table = "tb_detail_video_kelas";

    protected $primaryKey = 'id_video_kelas';

    protected $fillable = [
        'id_kelas',
        'id_keypoint',
        'nama_video',
        'url_video',
        'keterangan_video'
    ];

    public $timestamps = true;

    public function Keypoint()
    {
        return $this->belongsTo(DetailKeypoint::class, 'id_keypoint','id_keypoint');
    }
}
