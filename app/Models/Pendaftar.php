<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftar';
    protected $primaryKey = 'id_pendaftar';
    public $timestamps = false;

    protected $fillable = [
        'nis',
        'email',
        'nama_siswa',
        'id_jurusan',
        'id_kelas',
        'no_telp',
        'aksi',
        'status',
    ];

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'nis', 'nis');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id_jurusan');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
