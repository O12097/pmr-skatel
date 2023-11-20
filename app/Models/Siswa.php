<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'nis';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nis',
        'nama_siswa',
        'email',
        'no_telp',
        'created_at',
    ];
    public $timestamps = false;

    // relasi ke tPresensi
    public function presensi(){
        return $this->hasMany(Presensi::class, 'nis', 'nis');
    }
}
