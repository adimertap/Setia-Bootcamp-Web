<?php

namespace App\Models\Perusahaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = "tb_pengumuman";

    protected $primaryKey = 'id_pengumuman';

    protected $fillable = [
        'nama_pengumuman',
        'job_description',
        'job_requirement',
        'job_type',
        'job_salary',
        'job_years_experience',
        'start_date',
        'end_date',
        'qualification'
    ];

    protected $hidden =[ 
        'created_at',
        'updated_at',
        
    ];

    public $timestamps = true;

}
