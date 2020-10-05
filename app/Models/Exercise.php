<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_murid', 'status_murid', 'nilai_ujian', 'nilai_pts', 'nilai_uas'
    ];
}
