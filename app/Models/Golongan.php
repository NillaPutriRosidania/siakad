<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = 'golongan';
    protected $primaryKey = 'id_Gol';
    protected $fillable = ['nama_Gol'];
    public $timestamps = true;
}
