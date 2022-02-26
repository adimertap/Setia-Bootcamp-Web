<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DetailUserKelas extends Model
{
    protected $table = "tb_detail_user_kelas";

    protected $primaryKey = 'id_detail_kelas';

    protected $fillable = [
        'id_kelas',
        'id',
        'status_kelas'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        
    ];

    public $timestamps = true;

    public function getIsRegisteredAttribute()
    {
        if(!Auth::check()){
            return false;
        }
        return Checkout::whereIdKelas($this->id_kelas)->whereId(Auth::id())->exists();
    }

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class,'id_kelas','id_kelas');
    }

    public function User()
    {
        return $this->belongsTo(User::class,'id','id');
    }

    
}
