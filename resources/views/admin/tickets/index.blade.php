@extends('templates.admin.admin-template')

@section('title')
KKH-Web | Kelola Tiket
@endsection

@section('main')
<main class="bg-cream-page min-h-screen font-body">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8 sm:py-12">
        
        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl sm:text-4xl font-heritage font-bold text-black mb-2">
                        Kelola Tiket
                    </h1>
                    <p class="text-gray-600 text-sm sm:text-base">Atur harga dan jenis tiket masuk</p>
                </div>
                
                <div class="flex gap-2">
                    <a href="{{ route('admin.ticket.create') }}" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                        <i class="fas fa-plus"></i> Tambah Tiket
                    </a>
                    <a href="{{ route('admin.ticket.export') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                        <i class="fas fa-download"></i> Export
                    </a>
                </div>
            </div>
        </div>

        <!-- Alert Messages -->
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                <div class="flex items-start gap-3">
                    <i class="fas fa-exclamation-circle text-red-600 mt-1 flex-shrink-0"></i>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-red-700 mb-2">Terjadi Kesalahan</p>
                        <ul class="text-xs text-red-600 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg flex items-center gap-3">
                <i class="fas fa-check-circle text-green-600 text-lg"></i>
                <span class="text-sm font-semibold text-green-700">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg flex items-center gap-3">
                <i class="fas fa-exclamation-circle text-red-600 text-lg"></i>
                <span class="text-sm font-semibold text-red-700">{{ session('error') }}</span>
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 mb-8">
            <!-- Total Tiket -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-600">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-600 text-sm font-medium mb-1">Total Tiket</p>
                        <p class="text-3xl font-bold text-blue-600">{{ $totalTickets }}</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <i class="fas fa-ticket-alt text-blue-600 text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Tiket Lokal -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-amber-900">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-600 text-sm font-medium mb-1">Tiket Lokal</p>
                        <p class="text-3xl font-bold text-amber-900">{{ $tickets->where('jenis_ticket', 'Lokal')->count() }}</p>
                    </div>
                    <div class="bg-amber-100 p-3 rounded-lg">
                        <i class="fas fa-map-marker-alt text-amber-900 text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Tiket Mancanegara -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-600">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-600 text-sm font-medium mb-1">Tiket Mancanegara</p>
                        <p class="text-3xl font-bold text-purple-600">{{ $tickets->where('jenis_ticket', 'Mancanegara')->count() }}</p>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-lg">
                        <i class="fas fa-globe text-purple-600 text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tickets Table -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-gradient-to-r from-amber-900 to-amber-800 px-6 py-4">
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <i class="fas fa-list"></i> Daftar Tiket
                </h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="px-4 py-3 text-left font-semibold text-gray-700">ID</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700">Nama Tiket</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700">Jenis</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700">Harga</th>
                            <th class="px-4 py-3 text-center font-semibold text-gray-700">Terjual</th>
                            <th class="px-4 py-3 text-center font-semibold text-gray-700">Revenue</th>
                            <th class="px-4 py-3 text-center font-semibold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($tickets as $ticket)
                            @php
                                $stats = $ticketsWithStats->firstWhere('ticket.ticket_id', $ticket->ticket_id);
                            @endphp
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-4 py-3 font-mono text-xs font-semibold text-amber-900">#{{ $ticket->ticket_id }}</td>
                                <td class="px-4 py-3">
                                    <div class="font-medium text-gray-900">{{ $ticket->nama_ticket }}</div>
                                    <div class="text-xs text-gray-500">{{ $ticket->label_ticket }}</div>
                                </td>
                                <td class="px-4 py-3">
                                    @if ($ticket->jenis_ticket === 'Lokal')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                            <i class="fas fa-map-marker-alt mr-1"></i> Lokal
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                            <i class="fas fa-globe mr-1"></i> Mancanegara
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 font-semibold text-gray-900">
                                    {{ $ticket->getPriceFormatted() }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $stats['total_sold'] }} tiket
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-center font-semibold text-gray-900">
                                    Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('admin.ticket.show', $ticket->ticket_id) }}" 
                                           class="inline-flex items-center gap-1 px-3 py-1 bg-blue-100 text-blue-600 hover:bg-blue-200 rounded transition-colors duration-200" 
                                           title="Lihat detail">
                                            <i class="fas fa-eye text-sm"></i>
                                        </a>
                                        <a href="{{ route('admin.ticket.edit', $ticket->ticket_id) }}" 
                                           class="inline-flex items-center gap-1 px-3 py-1 bg-yellow-100 text-yellow-600 hover:bg-yellow-200 rounded transition-colors duration-200"
                                           title="Edit">
                                            <i class="fas fa-edit text-sm"></i>
                                        </a>
                                        <form action="{{ route('admin.ticket.destroy', $ticket->ticket_id) }}" method="POST" 
                                              class="inline-block"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus tiket ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="inline-flex items-center gap-1 px-3 py-1 bg-red-100 text-red-600 hover:bg-red-200 rounded transition-colors duration-200"
                                                    title="Hapus">
                                                <i class="fas fa-trash text-sm"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                                    <i class="fas fa-inbox text-3xl mb-2 block opacity-50"></i>
                                    <p>Belum ada tiket. <a href="{{ route('admin.ticket.create') }}" class="text-amber-900 hover:text-amber-700 font-semibold">Buat tiket baru</a></p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Help Text -->
        <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-lg">
            <p class="text-blue-800 text-sm">
                <strong><i class="fas fa-info-circle mr-2"></i>Informasi:</strong><br>
                Kelola tiket masuk untuk pengunjung. Anda dapat menambah, mengubah, dan menghapus tiket. 
                Kolom "Terjual" dan "Revenue" menunjukkan statistik penjualan berdasarkan order yang sudah terverifikasi.
            </p>
        </div>
    </div>
</main>
@endsection
