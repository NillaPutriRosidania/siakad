<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KRS extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'krs';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'NIM',
        'Kode_mk',
    ];

    // Definisikan relasi dengan model Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'NIM', 'NIM');
    }

    // Definisikan relasi dengan model Matakuliah
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'Kode_mk', 'Kode_mk');
    }
}
