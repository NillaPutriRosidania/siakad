<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliah';
    protected $primaryKey = 'Kode_mk';
    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'semester',
    ];
    protected $keyType = 'string';
    public $timestamps = true;
    public function presensiAkademik()
    {
        return $this->hasMany(PresensiAkademik::class, 'Kode_mk', 'Kode_mk');
    }
}
