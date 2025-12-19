<!-- Footer Section -->
<footer class="bg-amber-900 text-white">
  <!-- Main Footer Content -->
  <div class="w-full py-12 sm:py-16 md:py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
      
      <!-- Footer Grid Container - 3 Columns -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12 mb-8 md:mb-12">
        
        <!-- Column 1: Brand & Description -->
        <div class="flex flex-col">
          <!-- Brand Title -->
          <div class="mb-6">
            <h2 class="font-display text-2xl sm:text-3xl font-bold text-white mb-3">
              Kampoeng Kadjoetangan Heritage
            </h2>
            <!-- Decorative Line under Brand Title -->
            <div class="h-1 w-16 bg-gradient-to-r from-amber-400 to-amber-600 rounded-full"></div>
          </div>
          
          <!-- Brand Description -->
          <p class="font-body text-sm sm:text-base text-gray-100 mb-6 leading-relaxed">
            Deskripsi brand (singkat): Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
          
          <!-- Social Media Section -->
          <div class="flex flex-col pt-6 border-t border-amber-700">
            <h3 class="font-body text-sm font-semibold uppercase tracking-wider text-gray-100 mb-3">
              Media Sosial Kami
            </h3>
            <!-- Decorative Line under Social Title -->
            <div class="h-0.5 w-12 bg-gradient-to-r from-amber-400 to-transparent rounded-full mb-4"></div>
            
            <!-- Social Icons Container -->
            <div class="flex items-center gap-4">
              <!-- YouTube Icon -->
              <a href="https://youtu.be/BTeTGwuVpwY?si=DvJVctzEyIuncN4y" class="group inline-flex items-center justify-center w-10 h-10 bg-white rounded-lg transition-all duration-300 ease-out transform hover:scale-125 active:scale-95" title="YouTube" aria-label="Follow us on YouTube">
                <i class="fab fa-youtube text-amber-900 text-lg group-hover:animate-pulse"></i>
              </a>
              
              <!-- Instagram Icon -->
              <a href="https://www.instagram.com/kayutanganheritage?igsh=ajNiOHF2ZXE3ZWho" class="group inline-flex items-center justify-center w-10 h-10 bg-white rounded-lg transition-all duration-300 ease-out transform hover:scale-125 active:scale-95" title="Instagram" aria-label="Follow us on Instagram">
                <i class="fab fa-instagram text-amber-900 text-lg group-hover:animate-pulse"></i>
              </a>
              
              <!-- Twitter Icon -->
              <a href="https://x.com/KampoengKJT" class="group inline-flex items-center justify-center w-10 h-10 bg-white rounded-lg transition-all duration-300 ease-out transform hover:scale-125 active:scale-95" title="Twitter" aria-label="Follow us on Twitter">
                <i class="fab fa-twitter text-amber-900 text-lg group-hover:animate-pulse"></i>
              </a>
              
              <!-- Facebook Icon -->
              <a href="https://www.facebook.com/kampoeng.kajoetangan/" class="group inline-flex items-center justify-center w-10 h-10 bg-white rounded-lg transition-all duration-300 ease-out transform hover:scale-125 active:scale-95" title="Facebook" aria-label="Follow us on Facebook">
                <i class="fab fa-facebook-f text-amber-900 text-lg group-hover:animate-pulse"></i>
              </a>
              
              <!-- Telegram Icon
              <a href="#" class="group inline-flex items-center justify-center w-10 h-10 bg-white rounded-lg transition-all duration-300 ease-out transform hover:scale-125 active:scale-95" title="Telegram" aria-label="Follow us on Telegram">
                <i class="fab fa-telegram text-amber-900 text-lg group-hover:animate-pulse"></i>
              </a> -->
            </div>
          </div>
        </div>
        
        <!-- Column 2: Empty (Spacer) -->
        <div class="hidden md:block"></div>
        
        <!-- Column 3: Website Links -->
        <div class="flex flex-col md:col-start-3 pt-6 md:pt-0 md:border-l md:border-amber-700 md:pl-8">
          <h3 class="font-display text-lg sm:text-xl font-bold text-white mb-2">
            Website Kami
          </h3>
          <!-- Decorative Line under Website Title -->
          <div class="h-1 w-16 bg-gradient-to-r from-amber-400 to-amber-600 rounded-full mb-6"></div>
          
          <!-- Links List -->
          <nav class="flex flex-col gap-3">
            <!-- Link: Beranda -->
            <a href="{{ route('user.beranda.index') }}" class="group font-body text-sm sm:text-base text-gray-100 hover:text-white transition-colors duration-300 flex items-center gap-2">
              <span class="inline-block w-0 group-hover:w-4 h-0.5 bg-white transition-all duration-300"></span>
              <span>Beranda</span>
            </a>
            
            <!-- Link: Artikel -->
            <a href="{{ route('user.katalog.index', ['table' => 'kuliners']) }}" class="group font-body text-sm sm:text-base text-gray-100 hover:text-white transition-colors duration-300 flex items-center gap-2">
              <span class="inline-block w-0 group-hover:w-4 h-0.5 bg-white transition-all duration-300"></span>
              <span>Artikel</span>
            </a>
            
            <!-- Link: Beri Masukan -->
            <a href="{{ route('user.feedback.create') }}" class="group font-body text-sm sm:text-base text-gray-100 hover:text-white transition-colors duration-300 flex items-center gap-2">
              <span class="inline-block w-0 group-hover:w-4 h-0.5 bg-white transition-all duration-300"></span>
              <span>Beri Masukan</span>
            </a>
            
            <!-- Link: Tentang Kami -->
            <a href="{{ route('user.us.index') }}" class="group font-body text-sm sm:text-base text-gray-100 hover:text-white transition-colors duration-300 flex items-center gap-2">
              <span class="inline-block w-0 group-hover:w-4 h-0.5 bg-white transition-all duration-300"></span>
              <span>Tentang Kami</span>
            </a>
            
            <!-- Link: Beli Tiket -->
            <a href="{{ route('payment.arrival') }}" class="group font-body text-sm sm:text-base text-gray-100 hover:text-white transition-colors duration-300 flex items-center gap-2">
              <span class="inline-block w-0 group-hover:w-4 h-0.5 bg-white transition-all duration-300"></span>
              <span>Beli Tiket</span>
            </a>
          </nav>
        </div>
        
      </div>
      
      <!-- Separator Line -->
      <div class="w-full h-0.5 bg-gradient-to-r from-transparent via-amber-700 to-transparent rounded-full"></div>
      
    </div>
  </div>
  
  <!-- Copyright Section -->
  <div class="w-full bg-amber-950 py-4 sm:py-5 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
      <p class="font-body text-xs sm:text-sm text-center text-gray-100">
        Copyright © Kampoeng Kadjoetangan Heritage 2025. Hak Cipta Dilindungi.
      </p>
    </div>
  </div>
</footer>
