<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMentor extends Model
{
    protected $table = "tb_detail_mentor";

    protected $primaryKey = 'id_mentor';

    protected $fillable = [
        'id',
        'id_kelas',
    ];

    public $timestamps = true;

    public function Kelas()
    {
        return $this->hasMany(Kelas::class, 'id_kelas','id_kelas');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'id','id');
    }
}
