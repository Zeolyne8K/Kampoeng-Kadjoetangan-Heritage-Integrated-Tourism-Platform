@extends('templates.admin.admin-template')

@section('title')
KKH-Web | Detail Tiket
@endsection

@section('main')
<main class="bg-cream-page min-h-screen font-body">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-8 sm:py-12">
        
        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex items-center gap-3 mb-4">
                <a href="{{ route('admin.ticket.index') }}" class="text-amber-900 hover:text-amber-700 text-2xl transition-colors">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div>
                    <h1 class="text-3xl sm:text-4xl font-heritage font-bold text-black">
                        {{ $ticket->nama_ticket }}
                    </h1>
                    <p class="text-gray-600 text-sm sm:text-base mt-1">{{ $ticket->label_ticket }}</p>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            
            <!-- Ticket Info Card -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                        <h2 class="text-lg font-bold text-white flex items-center gap-2">
                            <i class="fas fa-info-circle"></i> Informasi Tiket
                        </h2>
                    </div>

                    <div class="p-6 space-y-6">
                        <!-- ID & Tanggal -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm text-gray-600 mb-1 font-medium">ID Tiket</p>
                                <p class="text-2xl font-bold text-amber-900">#{{ $ticket->ticket_id }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1 font-medium">Jenis Tiket</p>
                                <div>
                                    @if ($ticket->jenis_ticket === 'Lokal')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-amber-100 text-amber-800">
                                            <i class="fas fa-map-marker-alt mr-2"></i> Lokal
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                                            <i class="fas fa-globe mr-2"></i> Mancanegara
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <hr class="border-gray-200">

                        <!-- Harga -->
                        <div>
                            <p class="text-sm text-gray-600 mb-2 font-medium">Harga Tiket</p>
                            <p class="text-4xl font-bold text-green-600">{{ $ticket->getPriceFormatted() }}</p>
                        </div>

                        <hr class="border-gray-200">

                        <!-- Deskripsi -->
                        <div>
                            <p class="text-sm text-gray-600 mb-2 font-medium">Deskripsi/Label</p>
                            <p class="text-gray-700 leading-relaxed">{{ $ticket->label_ticket ?? 'Tidak ada deskripsi' }}</p>
                        </div>

                        <hr class="border-gray-200">

                        <!-- Tanggal Dibuat/Update -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm text-gray-600 mb-1 font-medium">Dibuat</p>
                                <p class="text-gray-700">{{ $ticket->created_at->format('d M Y H:i') }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1 font-medium">Terakhir Diubah</p>
                                <p class="text-gray-700">{{ $ticket->updated_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-3 pt-4 border-t">
                            <a 
                                href="{{ route('admin.ticket.edit', $ticket->ticket_id) }}"
                                class="flex-1 bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 rounded-lg transition-colors duration-300 flex items-center justify-center gap-2"
                            >
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.ticket.destroy', $ticket->ticket_id) }}" method="POST" class="flex-1"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus tiket ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded-lg transition-colors duration-300 flex items-center justify-center gap-2">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Sidebar -->
            <div class="space-y-6">
                <!-- Sales Stats -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                        <h3 class="text-lg font-bold text-white flex items-center gap-2">
                            <i class="fas fa-chart-bar"></i> Penjualan
                        </h3>
                    </div>

                    <div class="p-6 space-y-4">
                        <div class="border-l-4 border-blue-600 pl-4">
                            <p class="text-xs text-gray-600 font-medium">Tiket Terjual</p>
                            <p class="text-3xl font-bold text-blue-600">{{ $totalSold }}</p>
                        </div>

                        <div class="border-l-4 border-green-600 pl-4">
                            <p class="text-xs text-gray-600 font-medium">Total Revenue</p>
                            <p class="text-2xl font-bold text-green-600">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
                        </div>

                        <div class="border-l-4 border-purple-600 pl-4">
                            <p class="text-xs text-gray-600 font-medium">Rata-rata per Unit</p>
                            <p class="text-2xl font-bold text-purple-600">
                                @if ($totalSold > 0)
                                    Rp {{ number_format($totalRevenue / $totalSold, 0, ',', '.') }}
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-gradient-to-r from-amber-900 to-amber-800 px-6 py-4">
                        <h3 class="text-lg font-bold text-white flex items-center gap-2">
                            <i class="fas fa-link"></i> Link Cepat
                        </h3>
                    </div>

                    <div class="p-6 space-y-2">
                        <a href="{{ route('admin.ticket.index') }}" class="block px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-800 transition-colors">
                            <i class="fas fa-list mr-2"></i> Kembali ke List
                        </a>
                        <a href="{{ route('admin.ticket.create') }}" class="block px-4 py-2 bg-green-100 hover:bg-green-200 rounded-lg text-green-800 transition-colors">
                            <i class="fas fa-plus mr-2"></i> Tiket Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order History -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-6 py-4">
                <h2 class="text-lg font-bold text-white flex items-center gap-2">
                    <i class="fas fa-history"></i> Riwayat Order (10 Terbaru)
                </h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="px-4 py-3 text-left font-semibold text-gray-700">ID Order</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700">Nama Pemesan</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700">Email</th>
                            <th class="px-4 py-3 text-center font-semibold text-gray-700">Jumlah</th>
                            <th class="px-4 py-3 text-center font-semibold text-gray-700">Total</th>
                            <th class="px-4 py-3 text-center font-semibold text-gray-700">Status</th>
                            <th class="px-4 py-3 text-center font-semibold text-gray-700">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($orderHistory as $order)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-4 py-3 font-mono text-xs font-semibold text-amber-900">#{{ $order->id }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900">{{ $order->nama_awalan }}</td>
                                <td class="px-4 py-3 text-gray-700">{{ $order->email ?? '-' }}</td>
                                <td class="px-4 py-3 text-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $order->jumlah_tiket }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-center font-semibold text-gray-900">
                                    Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    @if ($order->status_pembayaran === 'pending')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-clock mr-1"></i> Pending
                                        </span>
                                    @elseif ($order->status_pembayaran === 'verified')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i class="fas fa-check mr-1"></i> Verified
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            <i class="fas fa-times mr-1"></i> Rejected
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-center text-gray-700 text-xs">
                                    {{ $order->created_at->format('d M Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                                    <i class="fas fa-inbox text-2xl mb-2 block opacity-50"></i>
                                    Belum ada order untuk tiket ini
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($orderHistory->total() > 0)
                <div class="px-6 py-4 border-t bg-gray-50">
                    {{ $orderHistory->links() }}
                </div>
            @endif
        </div>
    </div>
</main>
@endsection
