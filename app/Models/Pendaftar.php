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
        'kelas',
        'jurusan',
        'no_telp',
    ];

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }
}

