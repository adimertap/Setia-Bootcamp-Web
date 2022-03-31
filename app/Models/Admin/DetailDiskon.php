<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailDiskon extends Model
{
    use SoftDeletes;

    protected $table = "tb_detail_diskon";

    protected $primaryKey = 'id_detail_diskon';

    protected $fillable = [
        'id_kelas',
        'id_diskon',
    ];

    public $timestamps = true;

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas','id_kelas');
    }

    public function Diskon()
    {
        return $this->belongsTo(Diskon::class, 'id_diskon','id_diskon');
    }

    
}
