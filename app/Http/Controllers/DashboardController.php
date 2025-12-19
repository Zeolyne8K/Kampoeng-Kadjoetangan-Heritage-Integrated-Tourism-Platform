<?php

namespace App\Http\Controllers;

use App\Models\MakeOrder;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard admin dengan statistik dan data pembayaran.
     */
    public function index()  
    {
        // Ambil data pembayaran dari database
        $allOrders = MakeOrder::all();
        
        // Hitung total transaksi
        $totalTransaksi = $allOrders->count();
        
        // Hitung berdasarkan status
        $pendingCount = $allOrders->where('status_pembayaran', 'pending')->count();
        $verifiedCount = $allOrders->where('status_pembayaran', 'verified')->count();
        $rejectedCount = $allOrders->where('status_pembayaran', 'rejected')->count();
        
        // Hitung total revenue dari yang terverifikasi
        $totalRevenue = $allOrders->where('status_pembayaran', 'verified')->sum('total_harga');
        
        // Ambil 5 pembayaran terbaru
        $recentPayments = MakeOrder::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        // Hitung perubahan persentase bulan ini
        $thisMonthOrders = MakeOrder::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
        
        $lastMonthOrders = MakeOrder::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->count();
        
        $percentageChange = $lastMonthOrders > 0 
            ? round((($thisMonthOrders - $lastMonthOrders) / $lastMonthOrders) * 100, 1)
            : 0;
        
        return view('admin.dashboard', compact(
            'totalTransaksi',
            'pendingCount',
            'verifiedCount',
            'rejectedCount',
            'totalRevenue',
            'recentPayments',
            'percentageChange'
        ));
    }
}

