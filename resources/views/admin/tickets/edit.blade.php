@extends('templates.admin.admin-template')

@section('title')
KKH-Web | Edit Tiket
@endsection

@section('main')
<main class="bg-cream-page min-h-screen font-body">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 py-8 sm:py-12">
        
        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex items-center gap-3 mb-4">
                <a href="{{ route('admin.ticket.index') }}" class="text-amber-900 hover:text-amber-700 text-2xl transition-colors">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div>
                    <h1 class="text-3xl sm:text-4xl font-heritage font-bold text-black">
                        Edit Tiket
                    </h1>
                    <p class="text-gray-600 text-sm sm:text-base mt-1">Ubah informasi tiket {{ $ticket->nama_ticket }}</p>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-600 to-yellow-700 px-6 py-4">
                <h2 class="text-lg font-bold text-white flex items-center gap-2">
                    <i class="fas fa-edit"></i> Edit Tiket
                </h2>
            </div>

            <form action="{{ route('admin.ticket.update', $ticket->ticket_id) }}" method="POST" class="p-6 sm:p-8 space-y-6">
                @csrf
                @method('PUT')

                <!-- Info Tiket -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 flex items-center gap-3">
                    <i class="fas fa-info-circle text-blue-600 text-lg"></i>
                    <div>
                        <p class="text-sm text-blue-800">
                            <strong>ID Tiket:</strong> #{{ $ticket->ticket_id }}<br>
                            <strong>Dibuat:</strong> {{ $ticket->created_at->format('d M Y H:i') }}
                        </p>
                    </div>
                </div>

                <!-- Nama Tiket -->
                <div class="form-group">
                    <label for="nama_ticket" class="block text-gray-700 font-semibold text-sm mb-2">
                        <i class="fas fa-heading mr-2 text-amber-900"></i>Nama Tiket <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="nama_ticket" 
                        name="nama_ticket" 
                        value="{{ old('nama_ticket', $ticket->nama_ticket) }}"
                        placeholder="Contoh: Tiket Dewasa, Tiket Anak-anak, Tiket Senior"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-amber-900 focus:ring-2 focus:ring-amber-900/20 transition-all duration-300 @error('nama_ticket') border-red-500 @enderror"
                        required
                    >
                    @error('nama_ticket')
                        <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Label Tiket -->
                <div class="form-group">
                    <label for="label_ticket" class="block text-gray-700 font-semibold text-sm mb-2">
                        <i class="fas fa-tag mr-2 text-amber-900"></i>Label/Deskripsi
                    </label>
                    <textarea 
                        id="label_ticket" 
                        name="label_ticket"
                        rows="3"
                        placeholder="Contoh: Tiket masuk Kampoeng Kadjoetangan Heritage untuk pengunjung dewasa"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-amber-900 focus:ring-2 focus:ring-amber-900/20 transition-all duration-300 @error('label_ticket') border-red-500 @enderror"
                    >{{ old('label_ticket', $ticket->label_ticket) }}</textarea>
                    @error('label_ticket')
                        <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Grid 2 Kolom -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Jenis Tiket -->
                    <div class="form-group">
                        <label for="jenis_ticket" class="block text-gray-700 font-semibold text-sm mb-2">
                            <i class="fas fa-globe mr-2 text-amber-900"></i>Jenis Tiket <span class="text-red-500">*</span>
                        </label>
                        <select 
                            id="jenis_ticket" 
                            name="jenis_ticket"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-amber-900 focus:ring-2 focus:ring-amber-900/20 transition-all duration-300 @error('jenis_ticket') border-red-500 @enderror"
                            required
                        >
                            <option value="">-- Pilih Jenis Tiket --</option>
                            <option value="Lokal" @selected(old('jenis_ticket', $ticket->jenis_ticket) === 'Lokal')>
                                <i class="fas fa-map-marker-alt"></i> Lokal
                            </option>
                            <option value="Mancanegara" @selected(old('jenis_ticket', $ticket->jenis_ticket) === 'Mancanegara')>
                                <i class="fas fa-plane"></i> Mancanegara
                            </option>
                        </select>
                        @error('jenis_ticket')
                            <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Harga Tiket -->
                    <div class="form-group">
                        <label for="harga_ticket" class="block text-gray-700 font-semibold text-sm mb-2">
                            <i class="fas fa-money-bill mr-2 text-amber-900"></i>Harga Tiket (Rp) <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="number" 
                            id="harga_ticket" 
                            name="harga_ticket" 
                            value="{{ old('harga_ticket', $ticket->harga_ticket) }}"
                            placeholder="Contoh: 50000"
                            min="0"
                            step="1"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-amber-900 focus:ring-2 focus:ring-amber-900/20 transition-all duration-300 @error('harga_ticket') border-red-500 @enderror"
                            required
                        >
                        @error('harga_ticket')
                            <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                        @enderror
                        <p class="text-xs text-gray-500 mt-1">Harga dalam Rupiah (tanpa tanda Rp atau titik)</p>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex gap-3 pt-4 border-t">
                    <button 
                        type="submit"
                        class="flex-1 bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 rounded-lg transition-colors duration-300 flex items-center justify-center gap-2"
                    >
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a 
                        href="{{ route('admin.ticket.index') }}"
                        class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-3 rounded-lg transition-colors duration-300 flex items-center justify-center gap-2"
                    >
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>

        <!-- Statistics Card -->
        <div class="mt-8 bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-bold text-black mb-4 flex items-center gap-2">
                <i class="fas fa-chart-bar text-amber-900"></i> Statistik Penjualan
            </h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="border-l-4 border-blue-600 pl-4">
                    <p class="text-sm text-gray-600">Total Terjual</p>
                    <p class="text-3xl font-bold text-blue-600">{{ $ticket->getTotalSold() }} tiket</p>
                </div>
                <div class="border-l-4 border-green-600 pl-4">
                    <p class="text-sm text-gray-600">Total Revenue</p>
                    <p class="text-3xl font-bold text-green-600">Rp {{ number_format($ticket->getTotalRevenue(), 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <!-- Tips -->
        <div class="mt-8 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
            <p class="text-yellow-800 text-sm">
                <strong><i class="fas fa-lightbulb mr-2"></i>Tips:</strong><br>
                • Perubahan harga akan berlaku untuk order baru<br>
                • Statistik penjualan mencakup order yang sudah terverifikasi<br>
                • Gunakan nama tiket yang jelas dan konsisten
            </p>
        </div>
    </div>
</main>
@endsection
