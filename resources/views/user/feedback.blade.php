@extends('templates.user.user-template')

@section('title')
KKH | Feedback Page
@endsection

@section('body')
<main class="bg-gray-50 min-h-screen pt-8 pb-12">
    
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section -->
        <div class="text-center mb-12 sm:mb-16 md:mb-20 w-full" data-aos="slide-up">
            <div class="flex items-center justify-center mb-4 sm:mb-6">
                <hr class="flex-1 border-gray-300">
                <span class="px-4 text-gray-500 text-sm sm:text-base">
                    <!-- Divider -->
                </span>
                <hr class="flex-1 border-gray-300">
            </div>
            
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-2 sm:mb-3 leading-tight font-display">
                Masukan & Saran
            </h1>
            
            <p class="text-gray-700 text-sm sm:text-base md:text-lg px-2 sm:px-4">
                Masukan Anda sangat berharga bagi kami untuk terus berkembang
            </p>
        </div>

        <!-- Form Section -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-8 md:gap-12 items-start">
            
            <!-- Form Container (Left - 3 cols) -->
            <div class="md:col-span-3" data-aos="slide-up">
                <div class="bg-white rounded-2xl shadow-lg p-8 sm:p-10">
                    
                    <!-- Success Message -->
                    @if (session('success'))
                    <div id="successAlert" class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg animate-slide-down" data-aos="slide-up">
                        <div class="flex items-center justify-between gap-3">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-600 text-xl animate-bounce"></i>
                                <p class="text-green-700 font-semibold">{{ session('success') }}</p>
                            </div>
                            <button type="button" onclick="document.getElementById('successAlert').remove()" class="text-green-600 hover:text-green-800 transition-colors">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    @endif

                    <form action="{{ route('user.feedback.store') }}" method="POST" class="space-y-5 sm:space-y-6">
                        @csrf

                        <!-- Nama Lengkap -->
                        <div class="flex flex-col" data-aos="slide-up">
                            <label class="mb-2 text-sm sm:text-base font-semibold text-gray-800">Nama Lengkap<span class="text-red-600">*</span></label>
                            <input type="text" name="feedback_sender_name" required placeholder="Masukkan nama lengkap Anda" value="{{ old('feedback_sender_name') }}" class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 sm:p-4 text-gray-700 focus:ring-2 focus:ring-amber-900 focus:border-transparent focus:outline-none text-sm sm:text-base shadow-sm hover:shadow-md transition-all duration-200 placeholder-gray-400">
                            @error('feedback_sender_name')
                            <span class="mt-2 text-red-600 text-xs sm:text-sm flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="flex flex-col" data-aos="slide-up">
                            <label class="mb-2 text-sm sm:text-base font-semibold text-gray-800">Alamat Email <span class="text-red-600">*</span></label>
                            <input type="email" name="feedback_sender_email" required placeholder="example@email.com" value="{{ old('feedback_sender_email') }}" class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 sm:p-4 text-gray-700 focus:ring-2 focus:ring-amber-900 focus:border-transparent focus:outline-none text-sm sm:text-base shadow-sm hover:shadow-md transition-all duration-200 placeholder-gray-400 @error('feedback_sender_email') border-red-500 @enderror">
                            @error('feedback_sender_email')
                            <span class="mt-2 text-red-600 text-xs sm:text-sm flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Feedback Label -->
                        <div class="flex flex-col" data-aos="slide-up">
                            <label class="mb-2 text-sm sm:text-base font-semibold text-gray-800">Label Masukan<span class="text-red-600">*</span></label>
                            <input type="text" name="feedback_label" required placeholder="Contoh: Perbaikan Tanda Penunjuk Arah" value="{{ old('feedback_label') }}" class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 sm:p-4 text-gray-700 focus:ring-2 focus:ring-amber-900 focus:border-transparent focus:outline-none text-sm sm:text-base shadow-sm hover:shadow-md transition-all duration-200 placeholder-gray-400">
                            @error('feedback_label')
                            <span class="mt-2 text-red-600 text-xs sm:text-sm flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Feedback Message Type -->
                        <div class="flex flex-col" data-aos="slide-up">
                            <label class="mb-2 text-sm sm:text-base font-semibold text-gray-800">Jenis Masukan <span class="text-red-600">*</span></label>
                            <select name="feedback_message_type" required class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 sm:p-4 text-gray-700 focus:ring-2 focus:ring-amber-900 focus:border-transparent focus:outline-none text-sm sm:text-base shadow-sm hover:shadow-md transition-all duration-200 @error('feedback_message_type') border-red-500 @enderror">
                                <option value="" disabled selected>-- Pilih Jenis Masukan --</option>
                                <option value="Saran" {{ old('feedback_message_type') === 'Saran' ? 'selected' : '' }}>Saran</option>
                                <option value="Kritik" {{ old('feedback_message_type') === 'Kritik' ? 'selected' : '' }}>Kritik</option>
                                <option value="Masukan" {{ old('feedback_message_type') === 'Masukan' ? 'selected' : '' }}>Masukan</option>
                            </select>
                            @error('feedback_message_type')
                            <span class="mt-2 text-red-600 text-xs sm:text-sm flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Pesan/Feedback -->
                        <div class="flex flex-col" data-aos="slide-up">
                            <label class="mb-2 text-sm sm:text-base font-semibold text-gray-800">Pesan Anda <span class="text-red-600">*</span></label>
                            <textarea name="feedback_sender_message" required rows="6" placeholder="Tulis pesan, masukan, atau kritik Anda di sini..." class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 sm:p-4 text-gray-700 focus:ring-2 focus:ring-amber-900 focus:border-transparent focus:outline-none text-sm sm:text-base shadow-sm hover:shadow-md transition-all duration-200 resize-none placeholder-gray-400 @error('feedback_sender_message') border-red-500 @enderror">{{ old('feedback_sender_message') }}</textarea>
                            @error('feedback_sender_message')
                            <span class="mt-2 text-red-600 text-xs sm:text-sm flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="group w-full bg-amber-900 hover:bg-amber-700 active:scale-95 text-white text-base sm:text-lg font-semibold py-3 sm:py-4 rounded-lg transition-all duration-300 ease-out transform hover:scale-105 hover:shadow-2xl focus:ring-4 focus:ring-amber-900/30 focus:outline-none mt-4 sm:mt-6" data-aos="slide-up">
                            <i class="fas fa-paper-plane mr-2 group-hover:rotate-12 transition-transform duration-300"></i>
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Info Section (Right - 2 cols) -->
            <div class="md:col-span-2 space-y-6" data-aos="slide-up">
                
                <!-- Info Card 1 -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-lg bg-amber-100">
                                <i class="fas fa-lightbulb text-amber-900 text-xl"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Saran</h3>
                            <p class="text-gray-600 text-sm">Ide-ide cemerlang untuk meningkatkan pengalaman Anda</p>
                        </div>
                    </div>
                </div>

                <!-- Info Card 2 -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-lg bg-amber-100">
                                <i class="fas fa-comments text-amber-900 text-xl"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Masukan</h3>
                            <p class="text-gray-600 text-sm">Pendapat berharga untuk perbaikan berkelanjutan</p>
                        </div>
                    </div>
                </div>

                <!-- Info Card 3 -->
                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-lg bg-amber-100">
                                <i class="fas fa-bullhorn text-amber-900 text-xl"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Kritik</h3>
                            <p class="text-gray-600 text-sm">Evaluasi jujur untuk kesempurnaan layanan kami</p>
                        </div>
                    </div>
                </div>
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

  /* Toast Notification Styles */
  .toast-notification {
    position: fixed;
    top: 20px;
    right: 20px;
    background: white;
    padding: 16px 24px;
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    display: flex;
    align-items: center;
    gap: 12px;
    z-index: 9999;
    max-width: 400px;
    animation: slideInRight 0.4s ease-out, slideOutRight 0.4s ease-out 3.6s forwards;
  }

  .toast-notification.success {
    border-left: 4px solid #16a34a;
  }

  .toast-notification.error {
    border-left: 4px solid #dc2626;
  }

  @keyframes slideInRight {
    from {
      transform: translateX(400px);
      opacity: 0;
    }
    to {
      transform: translateX(0);
      opacity: 1;
    }
  }

  @keyframes slideOutRight {
    from {
      transform: translateX(0);
      opacity: 1;
    }
    to {
      transform: translateX(400px);
      opacity: 0;
    }
  }

  @media (max-width: 768px) {
    .toast-notification {
      top: 10px;
      right: 10px;
      left: 10px;
      max-width: none;
    }
  }

  .animate-slide-down {
    animation: slideDown 0.5s ease-out;
  }

  @keyframes slideDown {
    from {
      opacity: 0;
      transform: translateY(-20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>

<!-- Import Feedback Module Script -->
<script type="module">
  import './modules/Feedback.js';
</script>

<!-- Toast Notification Script -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Show toast notification if there's a success message
    @if (session('success'))
      showToast('{{ session('success') }}', 'success');
      // Auto-dismiss alert after 4 seconds
      const alertElement = document.getElementById('successAlert');
      if (alertElement) {
        setTimeout(() => {
          alertElement.style.animation = 'slideDown 0.5s ease-out reverse';
          setTimeout(() => {
            alertElement.remove();
          }, 500);
        }, 4000);
      }
    @endif

    @if (session('error'))
      showToast('{{ session('error') }}', 'error');
    @endif
  });

  function showToast(message, type = 'success') {
    // Create toast element
    const toast = document.createElement('div');
    toast.className = `toast-notification ${type}`;
    
    const icon = type === 'success' 
      ? '<i class="fas fa-check-circle text-green-600 text-xl"></i>'
      : '<i class="fas fa-exclamation-circle text-red-600 text-xl"></i>';
    
    const textColor = type === 'success' ? 'text-green-700' : 'text-red-700';
    
    toast.innerHTML = `
      ${icon}
      <span class="${textColor} font-medium text-sm sm:text-base">${message}</span>
    `;
    
    document.body.appendChild(toast);
    
    // Auto-remove after animation
    setTimeout(() => {
      toast.remove();
    }, 4000);
  }
</script>
@endsection