<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'NIM';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'NIM',
        'Nama',
        'Alamat',
        'Nohp',
        'Semester',
        'id_Gol',
    ];

    protected $table = 'mahasiswa';
    public $timestamps = true;
    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_Gol', 'id_Gol');
    }
}
