<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tesis extends Model
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
        'jurnal',
        'tesis',
    ];
}
