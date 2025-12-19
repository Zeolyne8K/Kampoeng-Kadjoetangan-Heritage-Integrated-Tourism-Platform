@extends('templates.user.user-template')

@section('title')
KKH Web | Struk Pembayaran
@endsection

@section('body')
<main class="bg-gray-50 min-h-screen pt-8 pb-12">
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section -->
        <div class="text-center mb-10 sm:mb-14 md:mb-16 w-full" data-aos="slide-up">
            <div class="flex items-center justify-center mb-4 sm:mb-6">
                <hr class="flex-1 border-gray-300">
                <span class="px-4 text-gray-500 text-sm sm:text-base">
                    <!-- Divider -->
                </span>
                <hr class="flex-1 border-gray-300">
            </div>
            
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-2 sm:mb-3 leading-tight font-display">
                Pesan Tiket
            </h1>
            
            <p class="text-gray-700 text-sm sm:text-base md:text-lg px-2 sm:px-4">
                Pesan tiket masuk di sini
            </p>
        </div>

        <!-- Step Indicator -->
        <div class="flex justify-center items-center gap-2 sm:gap-4 mb-10 sm:mb-14 md:mb-16" data-aos="slide-up">
            <div class="flex items-center gap-2 sm:gap-4">
                <!-- Step 1 -->
                <div class="flex items-center">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-amber-900 text-white flex items-center justify-center font-bold text-sm sm:text-base flex-shrink-0">
                        <i class="fas fa-check text-sm sm:text-base"></i>
                    </div>
                    <div class="hidden sm:block h-1 w-8 md:w-16 bg-amber-900 mx-1 md:mx-2"></div>
                </div>
                
                <!-- Step 2 -->
                <div class="flex items-center">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-amber-900 text-white flex items-center justify-center font-bold text-sm sm:text-base flex-shrink-0">
                        <i class="fas fa-check text-sm sm:text-base"></i>
                    </div>
                    <div class="hidden sm:block h-1 w-8 md:w-16 bg-amber-900 mx-1 md:mx-2"></div>
                </div>
                
                <!-- Step 3 -->
                <div class="flex items-center">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-amber-900 text-white flex items-center justify-center font-bold text-sm sm:text-base flex-shrink-0">
                        <i class="fas fa-check text-sm sm:text-base"></i>
                    </div>
                    <div class="hidden sm:block h-1 w-8 md:w-16 bg-amber-900 mx-1 md:mx-2"></div>
                </div>
                
                <!-- Step 4 -->
                <div class="flex items-center">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-amber-900 text-white flex items-center justify-center font-bold text-sm sm:text-base flex-shrink-0">
                        <i class="fas fa-check text-sm sm:text-base"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Card Section -->
        <div class="bg-white rounded-2xl shadow-lg p-6 sm:p-8 md:p-10" data-aos="slide-up">
            
            <!-- Thank You Section -->
            <div class="text-center mb-10 sm:mb-12 pb-8 sm:pb-10 border-b border-gray-200">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-green-100 flex items-center justify-center animate-bounce">
                        <i class="fas fa-check-circle text-4xl sm:text-5xl text-green-600"></i>
                    </div>
                </div>
                
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3 sm:mb-4">
                    Terima Kasih
                </h2>
                
                <p class="text-gray-700 text-sm sm:text-base leading-relaxed">
                    Terima kasih telah membeli tiket di Kampoeng Kadjoetangan Heritage
                </p>
            </div>

            <!-- Ticket Details Card -->
            <div class="bg-gray-50 rounded-xl border-2 border-gray-200 p-6 sm:p-8 mb-8 sm:mb-10" data-aos="slide-up">
                <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-6 sm:mb-8">
                    Tiket Anda
                </h3>

                <!-- Ticket Info Grid -->
                <div class="space-y-6">
                    <!-- UUID and Nama Row -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <p class="text-gray-600 text-xs sm:text-sm font-medium mb-2">UUID</p>
                            <p class="text-gray-900 font-mono text-sm sm:text-base break-all">{{ $makeOrder->id }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 text-xs sm:text-sm font-medium mb-2">Nama</p>
                            <p class="text-gray-900 font-semibold text-sm sm:text-base">{{ $makeOrder->nama_awalan }}</p>
                        </div>
                    </div>

                    <!-- Email Row -->
                    <div>
                        <p class="text-gray-600 text-xs sm:text-sm font-medium mb-2">Email</p>
                        <p class="text-gray-900 text-sm sm:text-base">{{ $makeOrder->email ?: '-' }}</p>
                    </div>

                    <!-- Ticket Type and Quantity Row -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <p class="text-gray-600 text-xs sm:text-sm font-medium mb-2">Jenis Tiket</p>
                            <p class="text-gray-900 font-semibold text-sm sm:text-base">
                                @if($makeOrder->jenis_tiket === 'Lokal')
                                    Wisatawan Lokal
                                @elseif($makeOrder->jenis_tiket === 'Mancanegara')
                                    Wisatawan Asing
                                @else
                                    {{ $makeOrder->jenis_tiket }}
                                @endif
                            </p>
                        </div>
                        <div>
                            <p class="text-gray-600 text-xs sm:text-sm font-medium mb-2">Jumlah Tiket</p>
                            <p class="text-gray-900 font-semibold text-sm sm:text-base">{{ $makeOrder->jumlah_tiket }}/orang</p>
                        </div>
                    </div>

                    <!-- Total Price Row -->
                    <div class="pt-4 border-t border-gray-300">
                        <div class="flex items-center justify-between">
                            <p class="text-gray-600 text-sm sm:text-base font-medium">Total Harga</p>
                            <p class="text-amber-900 font-bold text-lg sm:text-2xl">
                                {{ 'Rp ' . number_format($makeOrder->total_harga, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>

                    <!-- Payment Method and Date Row -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-4 border-t border-gray-300">
                        <div>
                            <p class="text-gray-600 text-xs sm:text-sm font-medium mb-2">Metode Pembayaran</p>
                            <p class="text-gray-900 font-semibold text-sm sm:text-base">{{ $makeOrder->metode_pembayaran }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 text-xs sm:text-sm font-medium mb-2">Tanggal Berlaku</p>
                            <p class="text-gray-900 font-semibold text-sm sm:text-base">
                                {{ \Carbon\Carbon::parse($makeOrder->tanggal_berlaku)->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>

                    <!-- Expiry Date Row -->
                    <div class="pt-4 border-t border-gray-300">
                        <p class="text-gray-600 text-xs sm:text-sm font-medium mb-2">Tanggal Kadaluarsa</p>
                        <p class="text-gray-900 font-semibold text-sm sm:text-base">
                            {{ \Carbon\Carbon::parse($makeOrder->tanggal_kadaluarsa)->format('d/m/Y') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Info Box -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-8" data-aos="slide-up">
                <p class="text-blue-700 text-xs sm:text-sm flex items-start gap-2">
                    <i class="fas fa-info-circle mt-1 flex-shrink-0"></i>
                    <span>Simpan dan periksa email Anda untuk detail lebih lanjut mengenai tiket Anda. Admin akan segera melakukan verifikasi pembayaran Anda.</span>
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                <a href="{{ route('payment.struk.download', $makeOrder->id) }}" class="group w-full bg-amber-900 hover:bg-amber-700 active:scale-95 text-white text-base sm:text-lg font-semibold py-3 sm:py-4 rounded-lg transition-all duration-300 ease-out transform hover:scale-105 hover:shadow-2xl focus:ring-4 focus:ring-amber-900/30 focus:outline-none inline-flex items-center justify-center">
                    <i class="fas fa-download mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                    Simpan Tiket
                </a>

                <a href="{{ route('user.beranda.index') }}" class="group flex items-center justify-center w-full bg-gray-200 hover:bg-gray-300 active:scale-95 text-gray-800 text-base sm:text-lg font-semibold py-3 sm:py-4 rounded-lg transition-all duration-300 ease-out transform hover:scale-105 hover:shadow-md focus:ring-4 focus:ring-gray-400/30 focus:outline-none">
                    <i class="fas fa-home mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</main>

<!-- CSS untuk Slide-up Animation -->
<style>
  [data-aos="slide-up"] {
    opacity: 0;
    transform: translateY(40px);
    transition: opacity 0.6s ease-out, transform 0.6s ease-out;
  }

  [data-aos="slide-up"].animate-slide-up {
    opacity: 1;
    transform: translateY(0);
  }

  @keyframes bounce {
    0%, 100% {
      transform: translateY(0);
    }
    50% {
      transform: translateY(-10px);
    }
  }

  .animate-bounce {
    animation: bounce 1s ease-in-out infinite;
  }
</style>

<script>
  // Slide-up animation on page load
  document.addEventListener('DOMContentLoaded', () => {
    const slideUpElements = document.querySelectorAll('[data-aos="slide-up"]');
    
    slideUpElements.forEach((element, index) => {
      setTimeout(() => {
        element.classList.add('animate-slide-up');
      }, index * 100);
    });
  });
</script>

@endsection