<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    /** @use HasFactory<\Database\Factories\EventsFactory> */
    use HasFactory;
    protected $table = 'events';
    protected $primaryKey = 'event_id';
    protected $fillable = [
        'nama_event', 
        'jenis_event', 
        'waktu_event', 
        'penyelenggara_event', 
        'gambar_event', 
        'lokasi_event', 
        'deskripsi_event'
    ];
}
