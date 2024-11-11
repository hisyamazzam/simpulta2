<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disertasi extends Model
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
        'disertasi',
    ];
}
