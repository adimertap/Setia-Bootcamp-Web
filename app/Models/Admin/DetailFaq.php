<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailFaq extends Model
{
    protected $table = "tb_master_faq";

    protected $primaryKey = 'id_faq';

    protected $fillable = [
        'id_kelas',
        'id',
        'id_video_kelas',
        'id_mentor',
        'pertanyaan',
        'status_faq',
    ];

    public $timestamps = true;

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas','id_kelas');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'id','id');
    }

    public function Mentor()
    {
        return $this->belongsTo(User::class, 'id','id_mentor');
    }

    public function Video()
    {
        return $this->belongsTo(DetailVideo::class, 'id_video_kelas','id_video_kelas');
    }
}
