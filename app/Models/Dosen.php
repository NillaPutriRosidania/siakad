<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    // Nama tabel jika tidak sesuai dengan konvensi plural
    protected $table = 'dosen';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'NIP',
        'Nama',
        'Alamat',
        'Nohp',
    ];

    // Tentukan primary key jika tidak menggunakan 'id'
    protected $primaryKey = 'NIP';

    // Tentukan tipe data primary key jika bukan integer
    protected $keyType = 'string';

    // Menyertakan timestamps jika menggunakan kolom created_at dan updated_at
    public $timestamps = true;

    public function pengampu()
    {
        return $this->hasMany(Pengampu::class, 'NIP', 'NIP');
    }
}
