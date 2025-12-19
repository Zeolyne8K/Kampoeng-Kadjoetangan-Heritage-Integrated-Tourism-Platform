<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';
    protected $primaryKey = 'ticket_id';
    public $timestamps = true;

    protected $fillable = [
        'nama_ticket',
        'label_ticket',
        'jenis_ticket',
        'harga_ticket',
    ];

    protected $casts = [
        'harga_ticket' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationship dengan MakeOrder
     * Satu ticket dapat memiliki banyak order
     */
    public function makeOrders()
    {
        return $this->hasMany(MakeOrder::class, 'jenis_tiket', 'nama_ticket');
    }

    /**
     * Format harga ke format Rupiah
     */
    public function getPriceFormatted()
    {
        return 'Rp ' . number_format($this->harga_ticket, 0, ',', '.');
    }

    /**
     * Cek apakah ticket terjual
     */
    public function getTotalSold()
    {
        return MakeOrder::where('jenis_tiket', $this->nama_ticket)
            ->where('status_pembayaran', 'verified')
            ->sum('jumlah_tiket');
    }

    /**
     * Hitung revenue dari ticket ini
     */
    public function getTotalRevenue()
    {
        return MakeOrder::where('jenis_tiket', $this->nama_ticket)
            ->where('status_pembayaran', 'verified')
            ->sum('total_harga');
    }
}
