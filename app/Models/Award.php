<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    /** @use HasFactory<\Database\Factories\AwardFactory> */
    use HasFactory;
    protected $table = 'awards';
    protected $primaryKey = 'award_id';
    protected $fillable = [
        'nama_award', 'jenis_award', 'gambar_award', 'tanggal_penerimaan_award', 'deskripsi_award'
    ];
}
