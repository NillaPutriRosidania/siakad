<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    // Tentukan nama tabel (bisa diabaikan jika nama tabel sudah sesuai dengan konvensi)
    protected $table = 'matakuliah';

    // Tentukan primary key
    protected $primaryKey = 'Kode_mk';

    // Tentukan kolom yang bisa diisi massal
    protected $fillable = [
        'kode_mk',  // Pastikan nama sesuai dengan input form
        'nama_mk',
        'sks',
        'semester',
    ];

    // Tentukan tipe data primary key
    protected $keyType = 'string';  // Sesuaikan jika memang Kode_mk adalah string

    // Menonaktifkan fitur timestamps jika tidak ada kolom created_at dan updated_at
    public $timestamps = true;  // Jika ada kolom created_at dan updated_at di tabel
}
