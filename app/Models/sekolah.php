<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sekolah extends Model
{
    use HasFactory;
    protected $table = 'sekolah';

    protected $fillable = [
        'id',
        'nama_sekolah',
        'jenjang',
        'alamat',
        'kecamatan',
        'latitude',
        'longitude'
    ];
}
