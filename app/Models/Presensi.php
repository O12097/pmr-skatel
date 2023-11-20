<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'presensi';
    protected $primaryKey = 'id_presensi';
    public $timestamps = false;

    protected $fillable = [
        'nis',
        'tanggal_presensi',
        'status_presensi',
    ];

    public function setStatusPresensi($status)
    {
        $this->attributes['status_presensi'] = $status;
    }

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }
}
