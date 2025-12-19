<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpotFoto extends Model
{
    /** @use HasFactory<\Database\Factories\SpotFotoFactory> */
    use HasFactory;
    protected $table = 'spot_fotos';
    protected $primaryKey = 'spot_foto_id';
    protected $fillable = [
        'nama_spot_foto', 
        'jenis_spot_foto', 
        'gambar_spot_foto', 
        'deskripsi_spot_foto', 
        'sejarah_spot_foto', 
        'fakta_unik_spot_foto'
    ];
}
