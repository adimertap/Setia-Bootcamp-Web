<?php

namespace App\Models\User;

use App\Models\Admin\Kelas;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = "tb_detail_review_kelas";

    protected $primaryKey = 'id_review';

    protected $fillable = [
        'id',
        'id_kelas',
        'review',
        'bintang',
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

    public function User()
    {
        return $this->belongsTo(User::class,'id','id');
    }

}
