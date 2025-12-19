<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuliner extends Model
{
    /** @use HasFactory<\Database\Factories\KulinerFactory> */
    use HasFactory;
    protected $table = 'kuliners';
    // Ini benar kah?
    protected $primaryKey = 'kuliner_id';
    protected $fillable = [
        'nama_kuliner', 
        'jenis_kuliner', 
        'deskripsi_kuliner', 
        'sejarah_kuliner', 
        'fakta_unik_kuliner', 
        'gambar_kuliner'
    ];

}
