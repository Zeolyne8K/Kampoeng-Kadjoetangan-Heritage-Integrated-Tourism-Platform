@extends('templates.user.user-template')

@section('title')
KKH Web | Metode Pembayaran
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

            <form action="{{ route('payment.method.store') }}" method="POST" class="space-y-8 sm:space-y-10" novalidate id="paymentForm">
                @csrf

                <!-- Hidden fields untuk menyimpan first_request data -->
                @if(isset($first_request))
                    @foreach($first_request as $key => $value)
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endforeach
                @endif

                <!-- Section: Pilih Metode Pembayaran -->
                <div class="border-b border-gray-200 pb-8 sm:pb-10">
                    <h2 class="text-2xl sm:text-2xl font-bold text-gray-900 mb-6 sm:mb-8 flex items-center gap-2" data-aos="slide-up">
                        <i class="fas fa-credit-card text-amber-900 text-2xl sm:text-2xl"></i>
                        Pilih Metode Pembayaran
                    </h2>

                    <!-- Payment Method Selection -->
                    <div class="mb-6 sm:mb-8" data-aos="slide-up">
                        <label class="mb-4 text-sm sm:text-base font-semibold text-gray-800 block">Pilih Metode <span class="text-red-600">*</span></label>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                            <!-- Gopay Option -->
                            <label class="cursor-pointer group" data-aos="slide-up">
                                <input type="radio" name="metode_pembayaran" value="Gopay" required class="hidden peer" id="method_gopay">
                                <div class="border-2 border-gray-300 rounded-xl p-4 sm:p-6 transition-all duration-300 peer-checked:border-amber-900 peer-checked:bg-amber-50 hover:border-amber-900 hover:shadow-md">
                                    <div class="flex items-center gap-3 sm:gap-4">
                                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-amber-900 text-white flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                            <i class="fas fa-wallet text-lg sm:text-xl"></i>
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-gray-900 text-sm sm:text-base">Gopay</h3>
                                            <p class="text-gray-600 text-xs sm:text-sm mt-1">Pembayaran via dompet digital Gopay</p>
                                        </div>
                                    </div>
                                </div>
                            </label>

                            <!-- QRIS Option -->
                            <label class="cursor-pointer group" data-aos="slide-up">
                                <input type="radio" name="metode_pembayaran" value="QRIS" required class="hidden peer" id="method_qris">
                                <div class="border-2 border-gray-300 rounded-xl p-4 sm:p-6 transition-all duration-300 peer-checked:border-amber-900 peer-checked:bg-amber-50 hover:border-amber-900 hover:shadow-md">
                                    <div class="flex items-center gap-3 sm:gap-4">
                                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-amber-900 text-white flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                            <i class="fas fa-qrcode text-lg sm:text-xl"></i>
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-gray-900 text-sm sm:text-base">QRIS</h3>
                                            <p class="text-gray-600 text-xs sm:text-sm mt-1">Pembayaran via QRIS Code</p>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>

                        @error('metode_pembayaran')
                        <span class="mt-3 text-red-600 text-xs sm:text-sm flex items-center gap-1">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                <!-- Section: Informasi Transfer (Gopay) -->
                <div id="gopayInfo" class="border-b border-gray-200 pb-8 sm:pb-10 hidden">
                    <h2 class="text-2xl sm:text-2xl font-bold text-gray-900 mb-6 sm:mb-8 flex items-center gap-2" data-aos="slide-up">
                        <i class="fas fa-info-circle text-amber-900 text-2xl sm:text-2xl"></i>
                        Informasi Transfer
                    </h2>

                    @if($data_gopay)
                    <div class="space-y-6" data-aos="slide-up">
                        <!-- Nama -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                            <div>
                                <p class="text-gray-600 text-xs sm:text-sm font-medium mb-2">Nama Merchant</p>
                                <p class="text-gray-900 font-semibold text-sm sm:text-base">{{ $data_gopay->nama }}</p>
                            </div>
                            
                            <!-- No. Telepon -->
                            <div>
                                <p class="text-gray-600 text-xs sm:text-sm font-medium mb-2">No. Telepon Gopay</p>
                                <p class="text-gray-900 font-semibold text-sm sm:text-base">{{ $data_gopay->nomor_telepon }}</p>
                            </div>
                        </div>

                        <!-- Nominal Transfer -->
                        <div>
                            <p class="text-gray-600 text-xs sm:text-sm font-medium mb-2">Nominal Transfer</p>
                            <p class="text-amber-900 font-bold text-lg sm:text-2xl" id="nominalTransfer">Rp 0</p>
                        </div>

                        <!-- Info Alert -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <p class="text-blue-700 text-xs sm:text-sm">
                                <i class="fas fa-lightbulb mr-2"></i>
                                Lakukan transfer sesuai nominal yang tertera untuk menyelesaikan pembayaran.
                            </p>
                        </div>
                    </div>
                    @else
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                        <p class="text-red-700 text-xs sm:text-sm">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            Data Gopay belum tersedia. Silakan hubungi administrator.
                        </p>
                    </div>
                    @endif
                </div>

                <!-- Section: Informasi Transfer (QRIS) -->
                <div id="qrisInfo" class="border-b border-gray-200 pb-8 sm:pb-10 hidden">
                    <h2 class="text-2xl sm:text-2xl font-bold text-gray-900 mb-6 sm:mb-8 flex items-center gap-2" data-aos="slide-up">
                        <i class="fas fa-info-circle text-amber-900 text-2xl sm:text-2xl"></i>
                        Informasi Transfer
                    </h2>

                    @if($data_qris)
                    <div class="space-y-6" data-aos="slide-up">
                        <!-- Nama Merchant & NMID -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                            <div>
                                <p class="text-gray-600 text-xs sm:text-sm font-medium mb-2">Nama Merchant</p>
                                <p class="text-gray-900 font-semibold text-sm sm:text-base">{{ $data_qris->nama_merchant }}</p>
                            </div>
                            
                            <div>
                                <p class="text-gray-600 text-xs sm:text-sm font-medium mb-2">NMID</p>
                                <p class="text-gray-900 font-semibold text-sm sm:text-base">{{ $data_qris->nmid }}</p>
                            </div>
                        </div>

                        <!-- Nominal Transfer -->
                        <div>
                            <p class="text-gray-600 text-xs sm:text-sm font-medium mb-2">Nominal Transfer</p>
                            <p class="text-amber-900 font-bold text-lg sm:text-2xl" id="nominalTransferQris">Rp 0</p>
                        </div>

                        <!-- QRIS Code -->
                        <div class="flex flex-col items-center">
                            <p class="text-gray-600 text-xs sm:text-sm font-medium mb-4">QRIS Code</p>
                            <div class="bg-gray-100 p-4 sm:p-6 rounded-lg border-2 border-dashed border-gray-300">
                                @if($data_qris->qris_image)
                                    <img src="{{ asset('storage/' . $data_qris->qris_image) }}" alt="QRIS Code" class="w-40 h-40 sm:w-48 sm:h-48 object-contain">
                                @else
                                    <div class="w-40 h-40 sm:w-48 sm:h-48 bg-gray-200 rounded flex items-center justify-center">
                                        <p class="text-gray-500 text-xs sm:text-sm text-center px-4">QRIS Code belum tersedia</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Info Alert -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <p class="text-blue-700 text-xs sm:text-sm">
                                <i class="fas fa-lightbulb mr-2"></i>
                                Scan QRIS Code menggunakan aplikasi pembayaran Anda untuk menyelesaikan transaksi.
                            </p>
                        </div>
                    </div>
                    @else
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                        <p class="text-red-700 text-xs sm:text-sm">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            Data QRIS belum tersedia. Silakan hubungi administrator.
                        </p>
                    </div>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="grid grid-cols-2 gap-3 sm:gap-4">
                    <a href="{{ route('payment.arrival') }}" class="group flex items-center justify-center w-full bg-gray-200 hover:bg-gray-300 active:scale-95 text-gray-800 text-base sm:text-lg font-semibold py-3 sm:py-4 rounded-lg transition-all duration-300 ease-out transform hover:scale-105 hover:shadow-md focus:ring-4 focus:ring-gray-400/30 focus:outline-none">
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
</style>

<script>
    // DOM Elements
const methodGopayInput = document.getElementById('method_gopay');
const methodQrisInput = document.getElementById('method_qris');
const gopayInfoSection = document.getElementById('gopayInfo');
const qrisInfoSection = document.getElementById('qrisInfo');
const nominalTransferElement = document.getElementById('nominalTransfer');
const nominalTransferQrisElement = document.getElementById('nominalTransferQris');
const paymentForm = document.getElementById('paymentForm');

// Get total_harga from hidden input
function getTotalHarga() {
  const totalHargaInput = document.querySelector('input[name="total_harga"]');
  return totalHargaInput ? parseInt(totalHargaInput.value) : 0;
}

// Format currency
function formatCurrency(num) {
  return new Intl.NumberFormat('id-ID').format(num);
}

// Update nominal transfer display
function updateNominalTransfer() {
  const totalHarga = getTotalHarga();
  const formattedTotal = formatCurrency(totalHarga);
  nominalTransferElement.textContent = `Rp ${formattedTotal}`;
  nominalTransferQrisElement.textContent = `Rp ${formattedTotal}`;
}

// Toggle payment method information
function togglePaymentInfo() {
  if (methodGopayInput.checked) {
    gopayInfoSection.classList.remove('hidden');
    qrisInfoSection.classList.add('hidden');
  } else if (methodQrisInput.checked) {
    gopayInfoSection.classList.add('hidden');
    qrisInfoSection.classList.remove('hidden');
  } else {
    gopayInfoSection.classList.add('hidden');
    qrisInfoSection.classList.add('hidden');
  }
}

// Event listeners for radio button changes
methodGopayInput.addEventListener('change', () => {
  togglePaymentInfo();
  updateNominalTransfer();
});

methodQrisInput.addEventListener('change', () => {
  togglePaymentInfo();
  updateNominalTransfer();
});

// Form validation before submit
paymentForm.addEventListener('submit', (e) => {
  const selectedMethod = document.querySelector('input[name="metode_pembayaran"]:checked');
  
  if (!selectedMethod) {
    e.preventDefault();
    alert('Silakan pilih metode pembayaran terlebih dahulu');
    return false;
  }
});

// Slide-up animation on page load
document.addEventListener('DOMContentLoaded', () => {
  const slideUpElements = document.querySelectorAll('[data-aos="slide-up"]');
  
  slideUpElements.forEach((element, index) => {
    setTimeout(() => {
      element.classList.add('animate-slide-up');
    }, index * 100);
  });

  // Initialize nominal transfer on load
  updateNominalTransfer();
});
</script>

@endsection
