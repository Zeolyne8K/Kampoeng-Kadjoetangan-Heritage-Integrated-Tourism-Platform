<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran - {{ $makeOrder->id }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
            background: white;
        }

        /* Print Styles */
        @media print {
            body {
                margin: 0;
                padding: 0;
            }
            .pdf-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body class="bg-white">
    <div class="pdf-container max-w-4xl mx-auto px-6 sm:px-8 py-10">
        <!-- Header -->
        <div class="text-center mb-8 pb-6 border-b-4 border-amber-900">
            <h1 class="text-3xl font-bold text-amber-900 mb-2">STRUK PEMBAYARAN</h1>
            <p class="text-sm text-gray-600 mb-2">Kampoeng Kadjoetangan Heritage</p>
            <div class="text-base font-bold text-amber-900">Pesanan Tiket Wisata</div>
            <div class="inline-block mt-4 px-6 py-2 bg-yellow-100 text-yellow-900 border-2 border-yellow-400 rounded-lg font-bold text-sm">
                ⏳ {{ $makeOrder->status_pembayaran }}
            </div>
        </div>

        <!-- Order Information -->
        <div class="mb-8">
            <div class="text-sm font-bold text-amber-900 border-b-2 border-yellow-600 pb-2 mb-4 uppercase tracking-wider">📋 Informasi Pesanan</div>
            <div class="space-y-3">
                <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                    <span class="font-bold text-gray-600 text-sm">No. Pesanan</span>
                    <span class="text-gray-900 text-sm">{{ $makeOrder->id }}</span>
                </div>
                <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                    <span class="font-bold text-gray-600 text-sm">Tanggal Pesanan</span>
                    <span class="text-gray-900 text-sm">{{ $makeOrder->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                    <span class="font-bold text-gray-600 text-sm">Status Pembayaran</span>
                    <span class="text-gray-900 font-bold text-sm">{{ $makeOrder->status_pembayaran }}</span>
                </div>
            </div>
        </div>

        <!-- Visitor Information -->
        <div class="mb-8">
            <div class="text-sm font-bold text-amber-900 border-b-2 border-yellow-600 pb-2 mb-4 uppercase tracking-wider">👤 Data Pemesan</div>
            <div class="space-y-3">
                <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                    <span class="font-bold text-gray-600 text-sm">Nama</span>
                    <span class="text-gray-900 text-sm">{{ $makeOrder->nama_awalan }}</span>
                </div>
                <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                    <span class="font-bold text-gray-600 text-sm">Email</span>
                    <span class="text-gray-900 text-sm">{{ $makeOrder->email ?: '-' }}</span>
                </div>
            </div>
        </div>

        <!-- Ticket Information -->
        <div class="mb-8">
            <div class="text-sm font-bold text-amber-900 border-b-2 border-yellow-600 pb-2 mb-4 uppercase tracking-wider">🎫 Informasi Tiket</div>
            <div class="space-y-3">
                <div class="flex justify-between items-start pb-3 border-b border-gray-200">
                    <span class="font-bold text-gray-600 text-sm">Jenis Tiket</span>
                    <div class="text-right">
                        <div class="text-gray-900 text-sm mb-2">
                            @if($makeOrder->jenis_tiket === 'Lokal')
                                Wisatawan Lokal
                            @elseif($makeOrder->jenis_tiket === 'Mancanegara')
                                Wisatawan Asing
                            @else
                                {{ $makeOrder->jenis_tiket }}
                            @endif
                        </div>
                        @if($makeOrder->jenis_tiket === 'Lokal')
                            <span class="inline-block px-3 py-1 bg-green-100 text-green-700 border border-green-400 rounded text-xs font-bold">LOKAL</span>
                        @elseif($makeOrder->jenis_tiket === 'Mancanegara')
                            <span class="inline-block px-3 py-1 bg-pink-100 text-pink-700 border border-pink-400 rounded text-xs font-bold">MANCANEGARA</span>
                        @endif
                    </div>
                </div>
                <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                    <span class="font-bold text-gray-600 text-sm">Jumlah Tiket</span>
                    <span class="text-gray-900 text-sm">{{ $makeOrder->jumlah_tiket }} orang</span>
                </div>
                <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                    <span class="font-bold text-gray-600 text-sm">Tanggal Berlaku</span>
                    <span class="text-gray-900 text-sm">{{ $makeOrder->tanggal_berlaku ? \Carbon\Carbon::parse($makeOrder->tanggal_berlaku)->format('d/m/Y') : '-' }}</span>
                </div>
                <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                    <span class="font-bold text-gray-600 text-sm">Tanggal Kadaluarsa</span>
                    <span class="text-gray-900 text-sm">{{ $makeOrder->tanggal_kadaluarsa ? \Carbon\Carbon::parse($makeOrder->tanggal_kadaluarsa)->format('d/m/Y') : '-' }}</span>
                </div>
            </div>
        </div>

        <!-- Payment Information -->
        <div class="mb-8">
            <div class="text-sm font-bold text-amber-900 border-b-2 border-yellow-600 pb-2 mb-4 uppercase tracking-wider">💳 Informasi Pembayaran</div>
            <div class="space-y-3">
                <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                    <span class="font-bold text-gray-600 text-sm">Metode Pembayaran</span>
                    <span class="text-gray-900 font-bold text-sm">{{ $makeOrder->metode_pembayaran }}</span>
                </div>
            </div>
        </div>

        <!-- Price Summary -->
        <div class="mb-8">
            <div class="text-sm font-bold text-amber-900 border-b-2 border-yellow-600 pb-2 mb-4 uppercase tracking-wider">💰 Ringkasan Harga</div>
            <div class="bg-gray-50 border border-gray-300 rounded-lg p-4">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-gray-600 text-sm">Total Harga</span>
                    <span class="text-gray-900 text-sm">{{ 'Rp ' . number_format($makeOrder->total_harga, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center pt-4 border-t-2 border-yellow-600">
                    <span class="text-amber-900 font-bold text-base">TOTAL PEMBAYARAN</span>
                    <span class="text-amber-900 font-bold text-2xl">{{ 'Rp ' . number_format($makeOrder->total_harga, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <!-- Important Note -->
        <div class="mb-8 p-4 bg-blue-50 border-l-4 border-blue-600 rounded">
            <p class="font-bold text-blue-900 text-sm mb-3">⚠️ Perhatian Penting:</p>
            <ul class="list-disc list-inside space-y-2 text-blue-900 text-xs">
                <li>Struk ini adalah bukti pembayaran Anda. Simpan dengan baik.</li>
                <li>Admin akan melakukan verifikasi pembayaran dalam waktu 1-2 jam kerja.</li>
                <li>Anda akan menerima email konfirmasi ketika pembayaran sudah diverifikasi.</li>
                <li>Gunakan No. Pesanan <strong>{{ $makeOrder->id }}</strong> untuk keperluan referensi.</li>
            </ul>
        </div>

        <!-- Footer -->
        <div class="mt-12 pt-6 border-t-2 border-yellow-600 text-center text-gray-500 text-xs">
            <p class="mb-2">Terima kasih telah berkunjung ke Kampoeng Kadjoetangan Heritage</p>
            <p class="mb-1">Dicetak pada: {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</p>
            <p>© {{ date('Y') }} Kampoeng Kadjoetangan Heritage. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>
