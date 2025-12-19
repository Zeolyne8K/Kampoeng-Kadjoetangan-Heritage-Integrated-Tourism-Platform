<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MakeOrder extends Model
{
    //
    protected $table = 'make_orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_awalan',
        'email',
        'jenis_tiket',
        'metode_pembayaran',
        'jumlah_tiket',
        'total_harga',
        'status_pembayaran',
        'bukti_pembayaran',
        'tanggal_berlaku',
        'tanggal_kadaluarsa'
    ];
}
