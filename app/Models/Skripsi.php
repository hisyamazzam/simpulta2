<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'email',
        'wa',
        'jurusan',
        'abstrakindonesia',
        'abstrakinggris',
        'lembarpengesahan',
        'skripsi',
    ];
}
