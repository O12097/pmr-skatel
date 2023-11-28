<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    protected $primaryKey = 'id_kegiatan';
    public $timestamps = true;

    protected $fillable = [
        'nama_kegiatan',
        'tautan_dokumentasi',
        'deskripsi',
        'tanggal',
        'created_at',
        'updated_at'
    ];
}
