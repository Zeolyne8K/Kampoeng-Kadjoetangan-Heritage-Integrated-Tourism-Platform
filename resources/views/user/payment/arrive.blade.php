@extends('templates.user.user-template')

@section('title')
KKH Web | Pemesanan Tiket
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
                        1
                    </div>
                    <div class="hidden sm:block h-1 w-8 md:w-16 bg-gray-300 mx-1 md:mx-2"></div>
                </div>
                
                <!-- Step 2 -->
                <div class="flex items-center">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-bold text-sm sm:text-base flex-shrink-0">
                        2
                    </div>
                    <div class="hidden sm:block h-1 w-8 md:w-16 bg-gray-300 mx-1 md:mx-2"></div>
                </div>
                
                <!-- Step 3 -->
                <div class="flex items-center">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-bold text-sm sm:text-base flex-shrink-0">
                        3
                    </div>
                    <div class="hidden sm:block h-1 w-8 md:w-16 bg-gray-300 mx-1 md:mx-2"></div>
                </div>
                
                <!-- Step 4 -->
                <div class="flex items-center">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-bold text-sm sm:text-base flex-shrink-0">
                        4
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="bg-white rounded-2xl shadow-lg p-6 sm:p-8 md:p-10" data-aos="slide-up">
            
            <!-- Success Message -->
            @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg" data-aos="slide-up">
                <div class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                    <p class="text-green-700 font-semibold">{{ session('success') }}</p>
                </div>
            </div>
            @endif

            <form action="{{ route('payment.arrive.makeOrder') }}" method="POST" class="space-y-8 sm:space-y-10" novalidate>
                @csrf
                <!-- Section 1: Informasi Diri -->
                <div class="border-b border-gray-200 pb-8 sm:pb-10">
                    <h2 class="text-2xl sm:text-2xl font-bold text-gray-900 mb-6 sm:mb-8 flex items-center gap-2" data-aos="slide-up">
                        <i class="fas fa-user-circle text-amber-900 text-2xl sm:text-2xl"></i>
                        Informasi Diri
                    </h2>

                    <!-- Nama Penggilan -->
                    <div class="flex flex-col mb-5 sm:mb-6" data-aos="slide-up">
                        <label class="mb-2 text-sm sm:text-base font-semibold text-gray-800">Nama Panggilan <span class="text-red-600">*</span></label>
                        <input type="text" name="nama_awalan" required placeholder="Masukan nama panggilan Anda" value="{{ old('nama_awalan') }}" class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 sm:p-4 text-gray-700 focus:ring-2 focus:ring-amber-900 focus:border-transparent focus:outline-none text-sm sm:text-base shadow-sm hover:shadow-md transition-all duration-200 placeholder-gray-400 @error('nama_awalan') border-red-500 @enderror">
                        @error('nama_awalan')
                        <span class="mt-2 text-red-600 text-xs sm:text-sm flex items-center gap-1">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="flex flex-col" data-aos="slide-up">
                        <label class="mb-2 text-sm sm:text-base font-semibold text-gray-800">Email</label>
                        <input type="email" name="email" placeholder="Contoh: test@example.com" value="{{ old('email') }}" class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 sm:p-4 text-gray-700 focus:ring-2 focus:ring-amber-900 focus:border-transparent focus:outline-none text-sm sm:text-base shadow-sm hover:shadow-md transition-all duration-200 placeholder-gray-400 @error('email') border-red-500 @enderror">
                        @error('email')
                        <span class="mt-2 text-red-600 text-xs sm:text-sm flex items-center gap-1">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                <!-- Section 2: Jenis dan Jumlah Tiket -->
                <div class="border-b border-gray-200 pb-8 sm:pb-10">
                    <h2 class="text-2xl sm:text-2xl font-bold text-gray-900 mb-6 sm:mb-8 flex items-center gap-2" data-aos="slide-up">
                        <i class="fas fa-ticket-alt text-amber-900 text-2xl sm:text-2xl"></i>
                        Jenis dan Jumlah Tiket
                    </h2>

                    <!-- Jenis Tiket Selection -->
                    <div class="mb-6 sm:mb-8" data-aos="slide-up">
                        <label class="mb-4 text-sm sm:text-base font-semibold text-gray-800 block">Jenis Tiket<span class="text-red-600">*</span></label>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                            <!-- Ticket Option 1 -->
                            <label class="cursor-pointer group" data-aos="slide-up">
                                <input type="radio" name="jenis_tiket" value="Lokal" required class="hidden peer" id="ticket_local">
                                <div class="border-2 border-gray-300 rounded-xl p-4 sm:p-6 transition-all duration-300 peer-checked:border-amber-900 peer-checked:bg-amber-50 hover:border-amber-900 hover:shadow-md">
                                    <div class="flex items-start gap-3 sm:gap-4">
                                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-amber-900 text-white flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                            <i class="fas fa-map-marker-alt text-lg sm:text-xl"></i>
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-gray-900 text-sm sm:text-base">Wisatawan Lokal</h3>
                                            <p class="text-gray-600 text-xs sm:text-sm mt-1">Untuk wisatawan di Indonesia</p>
                                            <p class="text-amber-900 font-bold text-base sm:text-lg mt-2">Rp 25.000</p>
                                        </div>
                                    </div>
                                </div>
                            </label>

                            <!-- Ticket Option 2 -->
                            <label class="cursor-pointer group" data-aos="slide-up">
                                <input type="radio" name="jenis_tiket" value="Mancanegara" required class="hidden peer" id="ticket_foreign">
                                <div class="border-2 border-gray-300 rounded-xl p-4 sm:p-6 transition-all duration-300 peer-checked:border-amber-900 peer-checked:bg-amber-50 hover:border-amber-900 hover:shadow-md">
                                    <div class="flex items-start gap-3 sm:gap-4">
                                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-amber-900 text-white flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                            <i class="fas fa-globe text-lg sm:text-xl"></i>
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-gray-900 text-sm sm:text-base">Wisatawan Asing</h3>
                                            <p class="text-gray-600 text-xs sm:text-sm mt-1">Untuk wisatawan mancanegara</p>
                                            <p class="text-amber-900 font-bold text-base sm:text-lg mt-2">Rp 35.000</p>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>

                        @error('jenis_tiket')
                        <span class="mt-3 text-red-600 text-xs sm:text-sm flex items-center gap-1">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Jumlah Tiket -->
                    <div class="flex flex-col" data-aos="slide-up">
                        <label class="mb-3 sm:mb-4 text-sm sm:text-base font-semibold text-gray-800">Jumlah Tiket yang Dibeli <span class="text-red-600">*</span></label>
                        
                        <div class="flex items-center gap-3 sm:gap-4 max-w-xs">
                            <button type="button" id="decreaseBtn" class="flex-shrink-0 w-10 h-10 sm:w-12 sm:h-12 rounded-lg bg-amber-900 hover:bg-amber-800 text-white font-bold text-lg sm:text-xl transition-all duration-200 flex items-center justify-center hover:shadow-md active:scale-95">
                                <i class="fas fa-minus"></i>
                            </button>
                            
                            <input type="number" name="jumlah_tiket" id="ticketQuantity" required min="1" max="100" value="1" class="flex-1 text-center bg-gray-50 border-2 border-gray-300 rounded-lg p-2 sm:p-3 text-gray-800 font-bold text-base sm:text-lg focus:ring-2 focus:ring-amber-900 focus:border-transparent focus:outline-none shadow-sm @error('jumlah_tiket') border-red-500 @enderror">
                            
                            <button type="button" id="increaseBtn" class="flex-shrink-0 w-10 h-10 sm:w-12 sm:h-12 rounded-lg bg-amber-900 hover:bg-amber-800 text-white font-bold text-lg sm:text-xl transition-all duration-200 flex items-center justify-center hover:shadow-md active:scale-95">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                        @error('jumlah_tiket')
                        <span class="mt-3 text-red-600 text-xs sm:text-sm flex items-center gap-1">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                <!-- Section 3: Tanggal Pemesanan -->
                <div class="border-b border-gray-200 pb-8 sm:pb-10">
                    <h2 class="text-2xl sm:text-2xl font-bold text-gray-900 mb-6 sm:mb-8 flex items-center gap-2" data-aos="slide-up">
                        <i class="fas fa-calendar-alt text-amber-900 text-2xl sm:text-2xl"></i>
                        Tanggal Pemesanan
                    </h2>

                    <!-- Tanggal -->
                    <div class="flex flex-col" data-aos="slide-up">
                        <label class="mb-3 sm:mb-4 text-sm sm:text-base font-semibold text-gray-800">Pilih Tanggal Kunjungan <span class="text-red-600">*</span></label>
                        
                        <div class="relative max-w-md">
                            <input type="text" id="visitDate" name="tanggal_kadaluarsa" required placeholder="Pilih tanggal kunjungan Anda" value="{{ old('tanggal_kadaluarsa') }}" class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 sm:p-4 text-gray-700 focus:ring-2 focus:ring-amber-900 focus:border-transparent focus:outline-none text-sm sm:text-base shadow-sm hover:shadow-md transition-all duration-200 placeholder-gray-400 pr-10 @error('tanggal_kadaluarsa') border-red-500 @enderror">
                            <i class="fas fa-calendar-alt absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                        </div>

                        @error('tanggal_kadaluarsa')
                        <span class="mt-3 text-red-600 text-xs sm:text-sm flex items-center gap-1">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                <!-- Total Section -->
                <div class="p-6 sm:p-8 mb-8 sm:mb-10" data-aos="slide-up">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-gray-700 text-sm sm:text-base font-medium mb-1">Total Harga</p>
                            <div class="flex items-baseline gap-2">
                                <span class="text-gray-600 text-xs sm:text-sm">Rp</span>
                                <p id="totalPrice" class="text-3xl sm:text-4xl font-bold text-amber-900">25.000</p>
                            </div>
                        </div>
                        <div class="text-right text-xs sm:text-sm text-gray-600">
                            <p id="priceBreakdown" class="font-semibold">1 x Rp 25.000</p>
                        </div>
                    </div>
                    <input type="hidden" name="total_harga" id="totalHargaInput" value="25000">
                </div>

                <!-- Action Buttons -->
                <div class="grid grid-cols-2 gap-3 sm:gap-4">
                    <a href="{{ route('user.beranda.index') }}" class="group flex items-center justify-center w-full bg-gray-200 hover:bg-gray-300 active:scale-95 text-gray-800 text-base sm:text-lg font-semibold py-3 sm:py-4 rounded-lg transition-all duration-300 ease-out transform hover:scale-105 hover:shadow-md focus:ring-4 focus:ring-gray-400/30 focus:outline-none">
                        <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform duration-300"></i>
                        Kembali
                    </a>

                    <button type="submit" class="group w-full bg-amber-900 hover:bg-amber-700 active:scale-95 text-white text-base sm:text-lg font-semibold py-3 sm:py-4 rounded-lg transition-all duration-300 ease-out transform hover:scale-105 hover:shadow-2xl focus:ring-4 focus:ring-amber-900/30 focus:outline-none">
                        <i class="fas fa-check-circle mr-2 group-hover:rotate-12 transition-transform duration-300"></i>
                        Konfirmasi
                    </button>
                </div>
            </form>
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

  /* Flatpickr Custom Styling */
  .flatpickr-calendar {
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
  }

  .flatpickr-day.selected {
    background-color: #78350f;
  }

  .flatpickr-day.selected:hover {
    background-color: #5d2e0f;
  }

  .flatpickr-day.today {
    border-color: #78350f;
  }

  .flatpickr-current-month .flatpickr-monthDropdown-months,
  .flatpickr-current-month .numInputWrapper {
    color: #78350f;
  }

  .flatpickr-prev-month,
  .flatpickr-next-month {
    color: #78350f;
  }

  .flatpickr-prev-month:hover,
  .flatpickr-next-month:hover {
    color: #5d2e0f;
  }
</style>

<!-- Flatpickr Library -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

@endsection