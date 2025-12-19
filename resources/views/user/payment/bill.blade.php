@extends('templates.user.user-template')

@section('title')
KKH Web | Pembayaran
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
            
            <!-- Tagihan Pembayaran Header with Timer -->
            <div class="flex items-center justify-between mb-8 pb-6 border-b border-gray-200" data-aos="slide-up">
                <h2 class="text-2xl sm:text-2xl font-bold text-gray-900 flex items-center gap-2">
                    <i class="fas fa-clock text-amber-900 text-2xl sm:text-2xl"></i>
                    Tagihan Pembayaran
                </h2>
                <div class="bg-amber-900 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg font-bold text-lg sm:text-2xl" id="timerDisplay">
                    05:00
                </div>
            </div>

            <form action="{{ route('payment.bill.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8 sm:space-y-10" novalidate id="billForm">
                @csrf

                <!-- Hidden fields untuk menyimpan data -->
                @if(isset($first_request))
                    @foreach($first_request as $key => $value)
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endforeach
                @endif
                <input type="hidden" name="metode_pembayaran" value="{{ $payment_method }}">

                <!-- Section: Informasi Transfer -->
                <div class="border-b border-gray-200 pb-8 sm:pb-10">
                    <h3 class="text-xl sm:text-xl font-bold text-gray-900 mb-6 sm:mb-8 flex items-center gap-2" data-aos="slide-up">
                        <i class="fas fa-info-circle text-amber-900 text-xl sm:text-xl"></i>
                        Informasi Transfer
                    </h3>

                    @if($payment_method === 'Gopay' && $data_gopay)
                    <div class="space-y-6" data-aos="slide-up">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                            <div>
                                <p class="text-gray-600 text-xs sm:text-sm font-medium mb-2">Nama</p>
                                <p class="text-gray-900 font-semibold text-sm sm:text-base">{{ $data_gopay->nama }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600 text-xs sm:text-sm font-medium mb-2">No. Telepon Gopay</p>
                                <p class="text-gray-900 font-semibold text-sm sm:text-base">{{ $data_gopay->nomor_telepon }}</p>
                            </div>
                        </div>
                        <div>
                            <p class="text-gray-600 text-xs sm:text-sm font-medium mb-2">Nominal Transfer</p>
                            <p class="text-amber-900 font-bold text-lg sm:text-2xl">{{ 'Rp ' . number_format($first_request['total_harga'], 0, ',', '.') }}</p>
                        </div>
                    </div>
                    @elseif($payment_method === 'QRIS' && $data_qris)
                    <div class="space-y-6" data-aos="slide-up">
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
                    </div>
                    @endif
                </div>

                <!-- Section: Upload Bukti Pembayaran -->
                <div class="border-b border-gray-200 pb-8 sm:pb-10">
                    <h3 class="text-xl sm:text-xl font-bold text-gray-900 mb-6 sm:mb-8 flex items-center gap-2" data-aos="slide-up">
                        <i class="fas fa-file-upload text-amber-900 text-xl sm:text-xl"></i>
                        Unggah Bukti Pembayaran
                    </h3>

                    <div class="flex flex-col" data-aos="slide-up">
                        <label for="bukti_pembayaran" class="cursor-pointer">
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 sm:p-12 text-center hover:border-amber-900 hover:bg-amber-50 transition-all duration-300">
                                <i class="fas fa-cloud-upload-alt text-gray-400 text-4xl sm:text-5xl mb-4 block"></i>
                                <p class="text-gray-600 text-sm sm:text-base font-medium mb-2">Klik untuk upload atau drag file di sini</p>
                                <p class="text-gray-500 text-xs sm:text-sm">PNG, JPG, JPEG up to 5 MB</p>
                                <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept=".png,.jpg,.jpeg" class="hidden" required>
                            </div>
                        </label>
                        
                        <div id="fileInfo" class="mt-4 hidden">
                            <p class="text-green-600 text-sm font-medium">File selected: <span id="fileName"></span></p>
                        </div>

                        @error('bukti_pembayaran')
                        <span class="mt-3 text-red-600 text-xs sm:text-sm flex items-center gap-1">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="grid grid-cols-2 gap-3 sm:gap-4">
                    <button type="button" id="btnKembali" class="group flex items-center justify-center w-full bg-gray-200 hover:bg-gray-300 active:scale-95 text-gray-800 text-base sm:text-lg font-semibold py-3 sm:py-4 rounded-lg transition-all duration-300 ease-out transform hover:scale-105 hover:shadow-md focus:ring-4 focus:ring-gray-400/30 focus:outline-none">
                        <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform duration-300"></i>
                        Kembali
                    </button>

                    <button type="submit" class="group w-full bg-amber-900 hover:bg-amber-700 active:scale-95 text-white text-base sm:text-lg font-semibold py-3 sm:py-4 rounded-lg transition-all duration-300 ease-out transform hover:scale-105 hover:shadow-2xl focus:ring-4 focus:ring-amber-900/30 focus:outline-none">
                        <i class="fas fa-check-circle mr-2 group-hover:rotate-12 transition-transform duration-300"></i>
                        Konfirmasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<!-- Modal Peringatan Pembatalan Pesanan -->
<div id="cancelModalOverlay" class="hidden fixed inset-0 bg-white/30 backdrop-blur-md flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full animate-scale-up">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-red-500 to-red-600 text-white p-6 sm:p-8 rounded-t-2xl">
            <div class="flex items-center gap-3">
                <i class="fas fa-exclamation-triangle text-2xl sm:text-3xl"></i>
                <h2 class="text-xl sm:text-2xl font-bold">Pembatalan Pesanan</h2>
            </div>
        </div>

        <!-- Modal Body -->
        <div class="p-6 sm:p-8">
            <p class="text-gray-700 text-sm sm:text-base leading-relaxed mb-6">
                Apakah Anda yakin ingin membatalkan pesanan? Tindakan ini akan menghapus pesanan Anda dan Anda harus memulai dari awal.
            </p>
            
            <!-- Warning Info Box -->
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded">
                <p class="text-red-700 text-xs sm:text-sm flex items-start gap-2">
                    <i class="fas fa-info-circle mt-1 flex-shrink-0\"></i>
                    <span>Pesanan yang dibatalkan tidak dapat dipulihkan. Timer pembayaran akan direset.</span>
                </p>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="bg-gray-50 p-6 sm:p-8 rounded-b-2xl border-t border-gray-200 flex gap-3 sm:gap-4">
            <button id="btnCancelNo" type="button" class="flex-1 bg-gray-300 hover:bg-gray-400 active:scale-95 text-gray-800 font-semibold py-2 sm:py-3 rounded-lg transition-all duration-300 ease-out transform hover:scale-105 focus:ring-4 focus:ring-gray-400/30 focus:outline-none">
                <i class="fas fa-times mr-2\"></i>
                Tidak, Lanjutkan
            </button>
            <button id="btnCancelYes" type="button" class="flex-1 bg-red-600 hover:bg-red-700 active:scale-95 text-white font-semibold py-2 sm:py-3 rounded-lg transition-all duration-300 ease-out transform hover:scale-105 focus:ring-4 focus:ring-red-600/30 focus:outline-none\">
                <i class="fas fa-trash-alt mr-2\"></i>
                Ya, Batalkan
            </button>
        </div>
    </div>
</div>

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

  /* Modal Animation */
  @keyframes scale-up {
    from {
      opacity: 0;
      transform: scale(0.95);
    }
    to {
      opacity: 1;
      transform: scale(1);
    }
  }

  .animate-scale-up {
    animation: scale-up 0.3s ease-out;
  }
</style>

<script>
  
  // Timer Configuration
  const PAYMENT_TIMEOUT = 5 * 60; // 5 minutes in seconds
  const timerDisplay = document.getElementById('timerDisplay');
  const billForm = document.getElementById('billForm');
  const fileInput = document.getElementById('bukti_pembayaran');
  const fileInfo = document.getElementById('fileInfo');
  const fileName = document.getElementById('fileName');

  let timeRemaining = PAYMENT_TIMEOUT;

  // Format time to MM:SS
  function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const secs = seconds % 60;
    return `${String(minutes).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
  }

  // Update timer display
  function updateTimer() {
    timerDisplay.textContent = formatTime(timeRemaining);
    
    if (timeRemaining <= 0) {
      clearInterval(timerInterval);
      handleTimerExpired();
    }
    
    timeRemaining--;
  }

  // Handle timer expiration - DELETE order
  function handleTimerExpired() {
    timerDisplay.classList.add('bg-red-600');
    timerDisplay.classList.remove('bg-amber-900');
    
    // Disable form submission
    billForm.style.opacity = '0.5';
    const submitBtn = billForm.querySelector('button[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
    
    // Show alert and redirect
    alert('Waktu pembayaran Anda telah habis. Pesanan akan dihapus.');
    
    // Call DELETE endpoint
    fetch('{{ route("payment.bill.delete") }}', {
      method: 'DELETE',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Content-Type': 'application/json'
      }
    }).then(() => {
      window.location.href = '{{ route("payment.arrival") }}';
    });
  }

  // Start timer
  const timerInterval = setInterval(updateTimer, 1000);

  // File input change handler
  fileInput.addEventListener('change', (e) => {
    if (e.target.files.length > 0) {
      fileName.textContent = e.target.files[0].name;
      fileInfo.classList.remove('hidden');
    }
  });

  // Form validation before submit
  billForm.addEventListener('submit', (e) => {
    if (!fileInput.files.length) {
      e.preventDefault();
      alert('Silakan upload bukti pembayaran terlebih dahulu');
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
  });

  // Modal Elements
  const cancelModalOverlay = document.getElementById('cancelModalOverlay');
  const btnKembali = document.getElementById('btnKembali');
  const btnCancelNo = document.getElementById('btnCancelNo');
  const btnCancelYes = document.getElementById('btnCancelYes');

  // Show modal when Kembali button is clicked
  btnKembali.addEventListener('click', (e) => {
    e.preventDefault();
    cancelModalOverlay.classList.remove('hidden');
  });

  // Close modal when "Tidak, Lanjutkan" is clicked
  btnCancelNo.addEventListener('click', () => {
    cancelModalOverlay.classList.add('hidden');
  });

  // Delete order and redirect when "Ya, Batalkan" is clicked
  btnCancelYes.addEventListener('click', () => {
    // Disable button during request
    btnCancelYes.disabled = true;
    btnCancelYes.textContent = 'Membatalkan...';

    fetch('{{ route("payment.bill.delete") }}', {
      method: 'DELETE',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Content-Type': 'application/json'
      }
    }).then(() => {
      window.location.href = '{{ route("payment.arrival") }}';
    }).catch((error) => {
      console.error('Error:', error);
      alert('Terjadi kesalahan saat membatalkan pesanan');
      btnCancelYes.disabled = false;
      btnCancelYes.innerHTML = '<i class="fas fa-trash-alt mr-2"></i>Ya, Batalkan';
    });
  });

  // Close modal when clicking outside (on overlay)
  cancelModalOverlay.addEventListener('click', (e) => {
    if (e.target === cancelModalOverlay) {
      cancelModalOverlay.classList.add('hidden');
    }
  });
</script>

@endsection