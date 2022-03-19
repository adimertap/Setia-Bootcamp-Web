<?php

namespace App\Models;

use App\Models\Admin\Diskon;
use App\Models\Admin\Kelas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = "tb_checkouts";

    protected $primaryKey = 'id_checkouts';

    protected $fillable = [
        'id',
        'id_kelas',
        'id_diskon',
        'midtrans_url',
        'midtrans_booking_code',
        'payment_status',
        'percentage_diskon'

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

    public function Discount()
    {
        return $this->belongsTo(Diskon::class,'id_diskon','id_diskon');
    }

    public function setExpiredAttribute($value){
        $this->attributes['expired'] = date('Y-m-t', strtotime($value));
    }
}
