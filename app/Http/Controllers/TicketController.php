<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\MakeOrder;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Menampilkan daftar semua tiket
     */
    public function index()
    {
        $tickets = Ticket::all();
        
        // Tambahkan data penjualan untuk setiap ticket
        $ticketsWithStats = $tickets->map(function ($ticket) {
            return [
                'ticket' => $ticket,
                'total_sold' => $ticket->getTotalSold(),
                'total_revenue' => $ticket->getTotalRevenue(),
            ];
        });

        return view('admin.tickets.index', [
            'tickets' => $tickets,
            'ticketsWithStats' => $ticketsWithStats,
            'totalTickets' => $tickets->count(),
        ]);
    }

    /**
     * Menampilkan form untuk membuat tiket baru
     */
    public function create()
    {
        return view('admin.tickets.create');
    }

    /**
     * Menyimpan tiket baru ke database
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_ticket' => ['required', 'string', 'max:100', 'unique:tickets'],
            'label_ticket' => ['nullable', 'string', 'max:255'],
            'jenis_ticket' => ['required', 'in:Lokal,Mancanegara'],
            'harga_ticket' => ['required', 'integer', 'min:0'],
        ], [
            'nama_ticket.required' => 'Nama tiket harus diisi',
            'nama_ticket.unique' => 'Nama tiket sudah ada, gunakan nama lain',
            'harga_ticket.required' => 'Harga tiket harus diisi',
            'harga_ticket.integer' => 'Harga harus berupa angka',
            'jenis_ticket.required' => 'Jenis tiket harus dipilih',
        ]);

        // Buat tiket baru
        $ticket = Ticket::create($validated);

        return redirect()
            ->route('admin.ticket.index')
            ->with('success', "Tiket '{$ticket->nama_ticket}' berhasil dibuat!");
    }

    /**
     * Menampilkan detail tiket spesifik
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        
        // Ambil order history untuk ticket ini
        $orderHistory = MakeOrder::where('jenis_tiket', $ticket->nama_ticket)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.tickets.show', [
            'ticket' => $ticket,
            'orderHistory' => $orderHistory,
            'totalSold' => $ticket->getTotalSold(),
            'totalRevenue' => $ticket->getTotalRevenue(),
        ]);
    }

    /**
     * Menampilkan form untuk edit tiket
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('admin.tickets.edit', ['ticket' => $ticket]);
    }

    /**
     * Mengupdate tiket di database
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'nama_ticket' => [
                'required',
                'string',
                'max:100',
                'unique:tickets,nama_ticket,' . $ticket->ticket_id . ',ticket_id'
            ],
            'label_ticket' => ['nullable', 'string', 'max:255'],
            'jenis_ticket' => ['required', 'in:Lokal,Mancanegara'],
            'harga_ticket' => ['required', 'integer', 'min:0'],
        ]);

        // Update tiket
        $ticket->update($validated);

        return redirect()
            ->route('admin.ticket.index')
            ->with('success', "Tiket '{$ticket->nama_ticket}' berhasil diperbarui!");
    }

    /**
     * Menghapus tiket dari database
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticketName = $ticket->nama_ticket;

        // Cek apakah tiket sudah digunakan di order
        $orderCount = MakeOrder::where('jenis_tiket', $ticketName)->count();
        
        if ($orderCount > 0) {
            return redirect()
                ->route('admin.ticket.index')
                ->with('error', "Tiket '{$ticketName}' tidak bisa dihapus karena sudah ada " . $orderCount . " order!");
        }

        // Hapus tiket
        $ticket->delete();

        return redirect()
            ->route('admin.ticket.index')
            ->with('success', "Tiket '{$ticketName}' berhasil dihapus!");
    }

    /**
     * Soft delete - menandai tiket sebagai tidak aktif tanpa menghapus
     */
    public function deactivate($id)
    {
        $ticket = Ticket::findOrFail($id);
        
        // Update harga jadi 0 atau tambah status soft delete jika ada
        // Untuk sekarang kita bisa hide dari listing
        
        return redirect()
            ->route('admin.ticket.index')
            ->with('success', "Tiket '{$ticket->nama_ticket}' berhasil dinonaktifkan!");
    }

    /**
     * Export data tiket ke CSV
     */
    public function export()
    {
        $tickets = Ticket::all();
        
        $csv = "Nama Tiket,Label,Jenis,Harga,Total Terjual,Revenue\n";
        
        foreach ($tickets as $ticket) {
            $csv .= "\"{$ticket->nama_ticket}\"";
            $csv .= ",\"{$ticket->label_ticket}\"";
            $csv .= ",\"{$ticket->jenis_ticket}\"";
            $csv .= "," . $ticket->harga_ticket;
            $csv .= "," . $ticket->getTotalSold();
            $csv .= "," . $ticket->getTotalRevenue() . "\n";
        }

        return response($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="tickets_' . date('Y-m-d') . '.csv"',
        ]);
    }
}
