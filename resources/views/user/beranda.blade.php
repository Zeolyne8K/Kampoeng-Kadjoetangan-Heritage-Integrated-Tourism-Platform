@extends('templates.user.user-template')

@section('title')
KKH | Beranda
@endsection

@section('body')
<!-- Hero Section -->
<section class="relative w-full h-screen pt-0 overflow-hidden bg-gray-900">
  <!-- Hero Background Image Container - 16:9 Aspect Ratio -->
  <div class="absolute inset-0 w-full h-full">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
         style="background-image: url('{{ asset("images/bg-hero.webp") }}'); filter: brightness(0.9);">
    </div>
    
    <!-- Gradient Overlay untuk contrast text -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-transparent to-black/50"></div>
  </div>

  <!-- Hero Content Container -->
  <div class="relative z-10 w-full h-full flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8">
    
    <!-- Content Wrapper dengan max-width untuk desktop -->
    <div class="w-full max-w-4xl mx-auto flex flex-col items-center justify-center text-center space-y-6 md:space-y-8">
      
      <!-- Main Heading -->
      <div class="space-y-3 md:space-y-4">
        <h1 class="font-display text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-tight drop-shadow-lg">
          Authentic Malang
        </h1>
        <h2 class="font-display text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight drop-shadow-lg">
          Heritage Experience
        </h2>
        
        <!-- Decorative Underline -->
        <div class="flex justify-center pt-2">
          <div class="h-1 w-24 sm:w-32 bg-gradient-to-r from-transparent via-amber-300 to-transparent rounded-full"></div>
        </div>
      </div>

      <!-- Subtitle/Description -->
      <p class="font-body text-sm sm:text-base md:text-lg text-gray-100 max-w-2xl leading-relaxed drop-shadow-md">
        Jelajahi kekayaan budaya dan keindahan warisan Malang yang autentik. Rasakan pengalaman tak terlupakan di setiap sudut Kampoeng Kadjoetangan Heritage.
      </p>

      <!-- CTA Buttons Container -->
      <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 pt-4 md:pt-6">
        
        <!-- Button: Beli Tiket -->
        <a href="{{ route('payment.arrival') }}" class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-amber-900 hover:bg-amber-700 text-white font-body font-semibold rounded-lg transition-all duration-300 ease-out transform hover:scale-105 hover:shadow-2xl active:scale-95">
          <i class="fas fa-ticket-alt mr-2 group-hover:rotate-12 transition-transform duration-300"></i>
          <span>Beli Tiket</span>
        </a>

        <!-- Button: Tanya AI -->
        <button id="tanyaAiButton" class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-white/10 hover:bg-white/20 border-2 border-white text-white font-body font-semibold rounded-lg backdrop-blur-sm transition-all duration-300 ease-out transform hover:scale-105 hover:shadow-2xl active:scale-95">
          <i class="fas fa-robot mr-2 group-hover:translate-x-1 transition-transform duration-300"></i>
          <span>Tanya AI</span>
        </button>

      </div>

    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex flex-col items-center animate-bounce">
      <span class="text-white/60 text-xs font-body mb-2">Scroll untuk melanjutkan</span>
      <i class="fas fa-chevron-down text-white/60"></i>
    </div>

  </div>
</section>

<!-- Map Section -->
<section class="relative w-full py-12 sm:py-16 md:py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
  <div class="max-w-6xl mx-auto">
    
    <!-- Section Header -->
    <div class="flex flex-col items-center justify-center text-center mb-8 md:mb-12">
      <div class="mb-4">
        <span class="text-amber-600 font-body text-sm sm:text-base font-semibold uppercase tracking-wider">
          <i class="fas fa-map-marker-alt mr-2"></i>Temukan Kami
        </span>
      </div>
      <h2 class="font-display text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-3 md:mb-4">
        Lokasi Kampoeng Kadjoetangan Heritage
      </h2>
      <div class="h-1 w-16 sm:w-20 bg-gradient-to-r from-amber-500 to-amber-600 rounded-full mb-4"></div>
      <p class="font-body text-sm sm:text-base text-gray-600 max-w-2xl">
        Jl. Raya Gempol - Malang, Kauman, Kec. Klojen, Kota Malang, Jawa Timur 65119
      </p>
    </div>

    <!-- Map Container with Hover Effects -->
    <div class="flex justify-center">
      <div class="w-full max-w-4xl group">
        <!-- Map Wrapper dengan shadow dan rounded corners -->
        <div class="relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 ease-out transform hover:scale-105">
          
          <!-- iFrame Map -->
          <div class="relative w-full bg-gray-200">
            <div class="aspect-video">
              <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.193284446038!2d112.62672157484627!3d-7.978963992046274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6292a5fa96abd%3A0x4c4114e495f92910!2sKampoeng%20Heritage%20Kajoetangan!5e0!3m2!1sid!2sid!4v1764255034667!5m2!1sid!2sid" 
                class="w-full h-full border-0 rounded-xl"
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>

          <!-- Overlay Info Box (Optional, positioned di bottom-right) -->
          <div class="absolute bottom-4 right-4 bg-white/95 backdrop-blur-sm rounded-lg shadow-lg p-4 transform group-hover:translate-x-1 group-hover:-translate-y-1 transition-all duration-500 ease-out max-w-xs opacity-0 md:opacity-100 group-hover:opacity-100">
            <div class="flex items-start space-x-3">
              <div class="flex-shrink-0 text-amber-600 mt-1">
                <i class="fas fa-info-circle text-lg"></i>
              </div>
              <div class="flex-1">
                <h3 class="font-body font-semibold text-gray-900 text-sm">Jam Operasional</h3>
                <p class="font-body text-xs text-gray-600 mt-1">Buka hingga pukul 10.00 PM</p>
                <a href="https://maps.app.goo.gl/PhKQF9V8hULE8mxN7" class="font-body text-xs text-amber-600 hover:text-amber-700 font-medium mt-2 inline-flex items-center">
                  Lihat Peta Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Additional Info Cards (Optional, bisa dihapus jika tidak diperlukan) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8 md:mt-12">
      
      <!-- Info Card 1: Alamat -->
      <div class="bg-white rounded-lg p-4 sm:p-6 shadow-md hover:shadow-lg transition-all duration-300 ease-out transform hover:-translate-y-1">
        <div class="flex items-center mb-3">
          <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center mr-3">
            <i class="fas fa-map-pin text-amber-600 text-lg"></i>
          </div>
          <h3 class="font-body font-semibold text-gray-900">Alamat</h3>
        </div>
        <p class="font-body text-sm text-gray-600">Jl. Raya Gempol, Klojen, Kota Malang, Jawa Timur</p>
      </div>

      <!-- Info Card 2: Jam Operasional -->
      <div class="bg-white rounded-lg p-4 sm:p-6 shadow-md hover:shadow-lg transition-all duration-300 ease-out transform hover:-translate-y-1">
        <div class="flex items-center mb-3">
          <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center mr-3">
            <i class="fas fa-clock text-amber-600 text-lg"></i>
          </div>
          <h3 class="font-body font-semibold text-gray-900">Jam Buka</h3>
        </div>
        <p class="font-body text-sm text-gray-600">Setiap hari mulai pukul 07-00-22.00 (7 AM-10 PM)</p>
      </div>

      <!-- Info Card 3: Website -->
      <!-- <div class="bg-white rounded-lg p-4 sm:p-6 shadow-md hover:shadow-lg transition-all duration-300 ease-out transform hover:-translate-y-1">
        <div class="flex items-center mb-3">
          <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center mr-3">
            <i class="fas fa-globe text-amber-600 text-lg"></i>
          </div>
          <h3 class="font-body font-semibold text-gray-900">Website</h3>
        </div>
        <a href="https://heritage-kajoetangan.com" target="_blank" class="font-body text-sm text-amber-600 hover:text-amber-700 font-medium">
          heritage-kajoetangan.com
        </a>
      </div> -->

    </div>

  </div>
</section>

<!-- Culinary Catalog Section -->
<section class="relative w-full py-12 sm:py-16 md:py-20 px-4 sm:px-6 lg:px-8 bg-white">
  <div class="max-w-7xl mx-auto">
    
    <!-- Main Container - Two Column Layout -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">
      
      <!-- Left Content Section -->
      <div class="flex flex-col justify-center order-2 md:order-1">
        
        <!-- Section Label -->
        <span class="text-amber-600 font-body text-sm sm:text-base font-semibold uppercase tracking-wider inline-flex items-center mb-3">
          <i class="fas fa-utensils mr-2"></i>Jelajahi Kuliner
        </span>

        <!-- Section Title -->
        <h2 class="font-display text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-4 leading-tight">
          Discover<br>The Culinary
        </h2>

        <!-- Decorative Line -->
        <div class="h-1 w-20 bg-gradient-to-r from-amber-500 to-amber-600 rounded-full mb-6"></div>

        <!-- Description -->
        <p class="font-body text-sm sm:text-base text-gray-600 mb-8 leading-relaxed">
          Jelajahi kekayaan kuliner autentik Malang di Kampoeng Kadjoetangan Heritage. Setiap hidangan menceritakan kisah sejarah dan budaya yang kaya dengan cita rasa yang tak terlupakan.
        </p>

        <!-- Navigation Buttons -->
        <div class="flex items-center gap-3 mb-8">
          <button id="prev-culinary" class="group w-12 h-12 rounded-lg border-2 border-gray-300 hover:border-amber-600 hover:bg-amber-50 flex items-center justify-center transition-all duration-300 ease-out">
            <i class="fas fa-chevron-left text-gray-600 group-hover:text-amber-600 transition-colors text-lg"></i>
          </button>
          <button id="next-culinary" class="group w-12 h-12 rounded-lg border-2 border-gray-300 hover:border-amber-600 hover:bg-amber-50 flex items-center justify-center transition-all duration-300 ease-out">
            <i class="fas fa-chevron-right text-gray-600 group-hover:text-amber-600 transition-colors text-lg"></i>
          </button>
        </div>

        <!-- CTA Button -->
        <a href="{{ route('user.katalog.index', ['table' => 'kuliners']) }}" class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-amber-600 hover:bg-amber-700 text-white font-body font-semibold rounded-lg transition-all duration-300 ease-out transform hover:scale-105 hover:shadow-xl active:scale-95 w-fit">
          <span>Explore More</span>
          <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
        </a>

      </div>

      <!-- Right Carousel Section -->
      <div class="relative order-1 md:order-2">
        
        <!-- Carousel Container -->
        <div class="relative overflow-hidden rounded-2xl bg-gray-100 h-96 md:h-[450px] shadow-lg hover:shadow-2xl transition-shadow duration-500">
          
          <!-- Carousel Wrapper -->
          <div id="culinary-carousel" class="flex h-full transition-transform duration-500 ease-out" style="transform: translateX(0%);" data-culinary='@json($data_kuliner)'>
            
            @forelse($data_kuliner as $index => $kuliner)
            <!-- Culinary Card {{ $index + 1 }} -->
            <div class="flex-shrink-0 w-full h-full relative group culinary-card" data-kuliner-id="{{ $kuliner->kuliner_id }}">
              <a href="{{ route('user.kuliner.show', ['id' => $kuliner->kuliner_id]) }}">
                <img src="{{ asset('storage/' . $kuliner->gambar_kuliner) }}" 
                   alt="{{ $kuliner->nama_kuliner }}" 
                   class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                <div class="absolute inset-0 flex flex-col justify-end p-4 sm:p-6">
                  <h3 class="font-display text-2xl sm:text-3xl font-bold text-white mb-2">{{ $kuliner->nama_kuliner }}</h3>
                  <p class="font-body text-xs sm:text-sm text-gray-100 line-clamp-2">{{ $kuliner->jenis_kuliner }}</p>
                </div>
              </a>
            </div>
            @empty
            <!-- Placeholder jika tidak ada data -->
            <div class="flex-shrink-0 w-full h-full relative group flex items-center justify-center bg-gray-200">
              <div class="text-center">
                <i class="fas fa-utensils text-4xl text-gray-400 mb-2"></i>
                <p class="text-gray-600 font-body">Data kuliner tidak tersedia</p>
              </div>
            </div>
            @endforelse

          </div>

        </div>

        <!-- Slide Indicator & Tags -->
        <div class="flex items-center justify-between mt-6">
          <span class="font-body text-sm text-gray-600">
            <span id="current-slide">1</span>/<span id="total-slides">{{ count($data_kuliner) }}</span>
          </span>
        </div>

      </div>

    </div>

  </div>
</section>

<!-- Photo Spot Section -->
<section class="relative w-full py-12 sm:py-16 md:py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
  <div class="max-w-7xl mx-auto">
    
    <!-- Main Container - Two Column Layout (Reversed) -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">
      
      <!-- Left Carousel Section -->
      <div class="relative order-1 md:order-1">
        
        <!-- Carousel Container -->
        <div class="relative overflow-hidden rounded-2xl bg-gray-100 h-96 md:h-[450px] shadow-lg hover:shadow-2xl transition-shadow duration-500">
          
          <!-- Carousel Wrapper -->
          <div id="photospot-carousel" class="flex h-full transition-transform duration-500 ease-out" style="transform: translateX(0%);" data-photospot='@json($data_spot_foto)'>
            
            @forelse($data_spot_foto as $index => $spotFoto)
            <!-- Photo Spot Card {{ $index + 1 }} -->
            <div class="flex-shrink-0 w-full h-full relative group photospot-card" data-photospot-id="{{ $spotFoto->spot_foto_id }}">
              <a href="{{ route('user.spot-foto.show', ['id' => $spotFoto->spot_foto_id]) }}">
                <img src="{{ asset('storage/' . $spotFoto->gambar_spot_foto) }}" 
                    alt="{{ $spotFoto->nama_spot_foto }}" 
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                <div class="absolute inset-0 flex flex-col justify-end p-4 sm:p-6">
                  <h3 class="font-display text-2xl sm:text-3xl font-bold text-white mb-2">{{ $spotFoto->nama_spot_foto }}</h3>
                  <p class="font-body text-xs sm:text-sm text-gray-100 line-clamp-2">{{ $spotFoto->jenis_spot_foto }}</p>
                </div>
              </a>
            </div>
            @empty
            <!-- Placeholder jika tidak ada data -->
            <div class="flex-shrink-0 w-full h-full relative group flex items-center justify-center bg-gray-200">
              <div class="text-center">
                <i class="fas fa-camera text-4xl text-gray-400 mb-2"></i>
                <p class="text-gray-600 font-body">Data spot foto tidak tersedia</p>
              </div>
            </div>
            @endforelse

          </div>

        </div>

        <!-- Slide Indicator -->
        <div class="flex items-center justify-between mt-6">
          <span class="font-body text-sm text-gray-600">
            <span id="photospot-current-slide">1</span>/<span id="photospot-total-slides">{{ count($data_spot_foto) }}</span>
          </span>
        </div>

      </div>

      <!-- Right Content Section -->
      <div class="flex flex-col justify-center order-2 md:order-2">
        
        <!-- Section Label -->
        <span class="text-amber-600 font-body text-sm sm:text-base font-semibold uppercase tracking-wider inline-flex items-center mb-3">
          <i class="fas fa-camera mr-2"></i>Jelajahi Spot Foto
        </span>

        <!-- Section Title -->
        <h2 class="font-display text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-4 leading-tight">
          Discover<br>The Photo Spot
        </h2>

        <!-- Decorative Line -->
        <div class="h-1 w-20 bg-gradient-to-r from-amber-500 to-amber-600 rounded-full mb-6"></div>

        <!-- Description -->
        <p class="font-body text-sm sm:text-base text-gray-600 mb-8 leading-relaxed">
          Jelajahi spot foto terbaik di Kampoeng Kadjoetangan Heritage. Setiap sudut menghadirkan keindahan arsitektur klasik dan pemandangan yang memukau, sempurna untuk mengabadikan momen berharga Anda.
        </p>

        <!-- Navigation Buttons -->
        <div class="flex items-center gap-3 mb-8">
          <button id="prev-photospot" class="group w-12 h-12 rounded-lg border-2 border-gray-300 hover:border-amber-600 hover:bg-amber-50 flex items-center justify-center transition-all duration-300 ease-out">
            <i class="fas fa-chevron-left text-gray-600 group-hover:text-amber-600 transition-colors text-lg"></i>
          </button>
          <button id="next-photospot" class="group w-12 h-12 rounded-lg border-2 border-gray-300 hover:border-amber-600 hover:bg-amber-50 flex items-center justify-center transition-all duration-300 ease-out">
            <i class="fas fa-chevron-right text-gray-600 group-hover:text-amber-600 transition-colors text-lg"></i>
          </button>
        </div>

        <!-- CTA Button -->
        <a href="{{ route('user.katalog.index', ['table' => 'spot_fotos']) }}" class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-amber-600 hover:bg-amber-700 text-white font-body font-semibold rounded-lg transition-all duration-300 ease-out transform hover:scale-105 hover:shadow-xl active:scale-95 w-fit">
          <span>Explore More</span>
          <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
        </a>

      </div>

    </div>

  </div>
</section>

<!-- Event Section -->
<section class="relative w-full py-12 sm:py-16 md:py-20 px-4 sm:px-6 lg:px-8 bg-white">
  <div class="max-w-7xl mx-auto">
    
    <!-- Main Container - Two Column Layout -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">
      
      <!-- Left Content Section -->
      <div class="flex flex-col justify-center order-2 md:order-1">
        
        <!-- Section Label -->
        <span class="text-amber-600 font-body text-sm sm:text-base font-semibold uppercase tracking-wider inline-flex items-center mb-3">
          <i class="fas fa-calendar-alt mr-2"></i>Jelajahi Event
        </span>

        <!-- Section Title -->
        <h2 class="font-display text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-4 leading-tight">
          Discover<br>Our Event
        </h2>

        <!-- Decorative Line -->
        <div class="h-1 w-20 bg-gradient-to-r from-amber-500 to-amber-600 rounded-full mb-6"></div>

        <!-- Description -->
        <p class="font-body text-sm sm:text-base text-gray-600 mb-8 leading-relaxed">
          Ikuti berbagai acara menarik di Kampoeng Kadjoetangan Heritage. Setiap event menghadirkan pengalaman budaya yang mendalam, dari pertunjukan tradisional hingga workshop yang edukatif untuk semua pengunjung.
        </p>

        <!-- Navigation Buttons -->
        <div class="flex items-center gap-3 mb-8">
          <button id="prev-event" class="group w-12 h-12 rounded-lg border-2 border-gray-300 hover:border-amber-600 hover:bg-amber-50 flex items-center justify-center transition-all duration-300 ease-out">
            <i class="fas fa-chevron-left text-gray-600 group-hover:text-amber-600 transition-colors text-lg"></i>
          </button>
          <button id="next-event" class="group w-12 h-12 rounded-lg border-2 border-gray-300 hover:border-amber-600 hover:bg-amber-50 flex items-center justify-center transition-all duration-300 ease-out">
            <i class="fas fa-chevron-right text-gray-600 group-hover:text-amber-600 transition-colors text-lg"></i>
          </button>
        </div>

        <!-- CTA Button -->
        <a href="{{ route('user.katalog.index', ['table' => 'events']) }}" class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-amber-600 hover:bg-amber-700 text-white font-body font-semibold rounded-lg transition-all duration-300 ease-out transform hover:scale-105 hover:shadow-xl active:scale-95 w-fit">
          <span>Explore More</span>
          <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
        </a>

      </div>

      <!-- Right Carousel Section -->
      <div class="relative order-1 md:order-2">
        
        <!-- Carousel Container -->
        <div class="relative overflow-hidden rounded-2xl bg-gray-100 h-96 md:h-[450px] shadow-lg hover:shadow-2xl transition-shadow duration-500">
          
          <!-- Carousel Wrapper -->
          <div id="event-carousel" class="flex h-full transition-transform duration-500 ease-out" style="transform: translateX(0%);" data-event='@json($data_event)'>
            
            @forelse($data_event as $index => $event)
            <!-- Event Card {{ $index + 1 }} -->
            <div class="flex-shrink-0 w-full h-full relative group event-card" data-event-id="{{ $event->event_id }}">
              <a href="{{ route('user.event.show', ['id' => $event->event_id]) }}">
                <img src="{{ asset('storage/' . $event->gambar_event) }}" 
                   alt="{{ $event->nama_event }}" 
                   class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-out">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                <div class="absolute inset-0 flex flex-col justify-end p-4 sm:p-6">
                  <h3 class="font-display text-2xl sm:text-3xl font-bold text-white mb-2">{{ $event->nama_event }}</h3>
                  <p class="font-body text-xs sm:text-sm text-gray-100 line-clamp-2">{{ $event->jenis_event }}</p>
                </div>
              </a>
            </div>
            @empty
            <!-- Placeholder jika tidak ada data -->
            <div class="flex-shrink-0 w-full h-full relative group flex items-center justify-center bg-gray-200">
              <div class="text-center">
                <i class="fas fa-calendar-alt text-4xl text-gray-400 mb-2"></i>
                <p class="text-gray-600 font-body">Data event tidak tersedia</p>
              </div>
            </div>
            @endforelse

          </div>

        </div>

        <!-- Slide Indicator -->
        <div class="flex items-center justify-between mt-6">
          <span class="font-body text-sm text-gray-600">
            <span id="event-current-slide">1</span>/<span id="event-total-slides">{{ count($data_event) }}</span>
          </span>
        </div>

      </div>

    </div>

  </div>
</section>

<!-- Awards & Prestasi Section -->
<section class="relative w-full py-12 sm:py-16 md:py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
  <div class="max-w-7xl mx-auto">
    
    <!-- Section Header -->
    <div class="flex flex-col items-center justify-center text-center mb-12 md:mb-16">
      <span class="text-amber-600 font-body text-sm sm:text-base font-semibold uppercase tracking-wider inline-flex items-center mb-3">
        <i class="fas fa-award mr-2"></i>Prestasi Kami
      </span>
      <h2 class="font-display text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-4">
        Penghargaan & Prestasi
      </h2>
      <div class="h-1 w-20 bg-gradient-to-r from-amber-500 to-amber-600 rounded-full mb-4"></div>
      <p class="font-body text-sm sm:text-base text-gray-600 max-w-2xl">
        Apresiasi dan penghargaan yang kami terima merupakan bukti komitmen kami dalam melestarikan warisan budaya dan memberikan pengalaman terbaik bagi setiap pengunjung.
      </p>
    </div>

    <!-- Awards Carousel Container -->
    <div class="relative overflow-hidden py-4">
      
      <!-- Carousel Wrapper -->
      <div id="awards-carousel" class="flex transition-transform duration-500 ease-out" style="transform: translateX(0%);" data-awards='@json($data_award)'>
        
        @forelse($data_award as $index => $award)
        <!-- Award Card {{ $index + 1 }} -->
        <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3 award-card px-2" data-award-id="{{ $award->award_id }}">
          <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 ease-out transform hover:-translate-y-2 h-full flex flex-col">
            
            <a href="{{ route('user.award.show', ['id' => $award->award_id]) }}">
              <!-- Image Container -->
              <div class="relative overflow-hidden h-56 sm:h-64 md:h-72 bg-gray-100">
                <img src="{{ asset('storage/' . $award->gambar_award) }}" 
                    alt="{{ $award->nama_award }}" 
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-out">
                
                <!-- Badge: Award Type
                <div class="absolute top-3 right-3 bg-amber-600 text-white px-2 py-1 rounded-lg text-xs font-semibold font-body shadow-lg">
                  {{ $award->jenis_award }}
                </div> -->
              </div>
            </a>

            <!-- Content Container -->
            <div class="p-4 sm:p-5 flex flex-col flex-grow">
              
              <!-- Award Title -->
              <h3 class="font-display text-base sm:text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-amber-600 transition-colors">
                {{ $award->nama_award }}
              </h3>

              <!-- Award Date -->
              <div class="flex items-center text-gray-500 text-xs sm:text-sm font-body mb-3">
                <i class="fas fa-calendar-alt mr-2 text-amber-600 text-xs"></i>
                <span>{{ \Carbon\Carbon::parse($award->tanggal_penerimaan_award)->format('d M Y') }}</span>
              </div>

              <!-- Award Description -->
              <p class="font-body text-xs sm:text-sm text-gray-600 mb-4 line-clamp-2 flex-grow leading-relaxed">
                {{ $award->deskripsi_award }}
              </p>

              <!-- Divider -->
              <div class="border-t border-gray-200 pt-3 mt-auto">
                <!-- Badge Detail -->
                <div class="inline-flex items-center px-2 py-1 bg-amber-50 rounded-md">
                  <i class="fas fa-star text-amber-600 mr-1 text-xs"></i>
                  <span class="text-xs font-semibold text-amber-700 font-body">{{ $award->jenis_award }}</span>
                </div>
              </div>

            </div>

          </div>
        </div>
        @empty
        <!-- Placeholder jika tidak ada data -->
        <div class="flex-shrink-0 w-full flex items-center justify-center py-12">
          <div class="text-center">
            <i class="fas fa-award text-4xl text-gray-400 mb-3"></i>
            <p class="text-gray-600 font-body text-sm">Data penghargaan tidak tersedia</p>
          </div>
        </div>
        @endforelse

      </div>

      <!-- Navigation Buttons -->
      <div class="flex justify-center gap-3 mt-8 md:mt-12">
        <button id="prev-awards" class="group w-12 h-12 rounded-lg border-2 border-gray-300 hover:border-amber-600 hover:bg-amber-50 flex items-center justify-center transition-all duration-300 ease-out active:scale-95">
          <i class="fas fa-chevron-left text-gray-600 group-hover:text-amber-600 transition-colors text-lg"></i>
        </button>
        <button id="next-awards" class="group w-12 h-12 rounded-lg border-2 border-gray-300 hover:border-amber-600 hover:bg-amber-50 flex items-center justify-center transition-all duration-300 ease-out active:scale-95">
          <i class="fas fa-chevron-right text-gray-600 group-hover:text-amber-600 transition-colors text-lg"></i>
        </button>
      </div>

      <!-- Slide Indicator Tidak Berfungsi -->
      <div class="flex justify-center mt-6">
        <span class="font-body text-sm text-gray-600">
          <span id="awards-current-slide">1</span>/<span id="awards-total-slides">{{ count($data_award) }}</span>
        </span>
      </div>

    </div>

  </div>
</section>

<!-- Chatbot Modal -->
<div id="chatbotModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm flex items-end sm:items-center justify-center z-50 p-4">
  <div class="bg-white rounded-lg shadow-2xl w-full sm:w-96 max-h-[90vh] sm:max-h-[600px] flex flex-col animate-in slide-in-from-bottom sm:slide-in-from-center duration-300">
    
    <!-- Header -->
    <div class="bg-amber-900 text-white px-6 py-4 rounded-t-lg flex items-center justify-between">
      <div class="flex items-center space-x-3">
        <i class="fas fa-robot text-xl"></i>
        <div>
          <h3 class="font-body font-semibold text-lg">Tanya AI</h3>
          <p class="text-amber-100 text-xs">Siap membantu Anda</p>
        </div>
      </div>
      <button id="closeChatbot" class="hover:bg-amber-800 rounded-lg p-2 transition-colors">
        <i class="fas fa-times text-lg"></i>
      </button>
    </div>

    <!-- Messages Container -->
    <div id="chatMessages" class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-50">
      <!-- Welcome Message -->
      <div class="flex justify-start">
        <div class="bg-gray-200 text-gray-800 rounded-lg px-4 py-2 max-w-xs">
          <p class="text-sm">Halo! 👋 Ada yang bisa saya bantu?</p>
        </div>
      </div>
    </div>

    <!-- Input Area -->
    <div class="border-t border-gray-200 bg-white px-4 py-3 rounded-b-lg">
      <form id="chatForm" class="flex gap-2">
        <input 
          type="text" 
          id="messageInput" 
          placeholder="Tulis pesan..." 
          class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 text-sm font-body"
          autocomplete="off"
        />
        <button 
          id="sendMessageButton" 
          type="button"
          class="bg-amber-900 hover:bg-amber-700 text-white rounded-lg px-4 py-2 transition-colors active:scale-95 transform"
        >
          <i class="fas fa-paper-plane"></i>
        </button>
      </form>
    </div>

  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const tanyaAiButton = document.getElementById('tanyaAiButton');
    const chatbotModal = document.getElementById('chatbotModal');
    const closeChatbot = document.getElementById('closeChatbot');
    const chatMessages = document.getElementById('chatMessages');
    const messageInput = document.getElementById('messageInput');
    const sendMessageButton = document.getElementById('sendMessageButton');
    const chatForm = document.getElementById('chatForm');

    if (!tanyaAiButton || !chatbotModal) {
        console.warn('Chatbot elements not found');
        return;
    }

    // Open chatbot modal
    tanyaAiButton.addEventListener('click', function() {
        chatbotModal.classList.remove('hidden');
        chatbotModal.classList.add('flex');
        messageInput.focus();
    });

    // Close chatbot modal
    if (closeChatbot) {
        closeChatbot.addEventListener('click', function() {
            chatbotModal.classList.add('hidden');
            chatbotModal.classList.remove('flex');
        });
    }

    // Close modal when clicking outside
    chatbotModal.addEventListener('click', function(e) {
        if (e.target === chatbotModal) {
            chatbotModal.classList.add('hidden');
            chatbotModal.classList.remove('flex');
        }
    });

    // Send message
    function sendMessage() {
        const message = messageInput.value.trim();
        
        if (!message) {
            return;
        }

        // Display user message
        const userMessageDiv = document.createElement('div');
        userMessageDiv.classList.add('flex', 'justify-end', 'mb-4');
        userMessageDiv.innerHTML = `
            <div class="bg-amber-800 text-white rounded-lg px-4 py-2 max-w-xs break-words">
                ${escapeHtml(message)}
            </div>
        `;
        chatMessages.appendChild(userMessageDiv);
        messageInput.value = '';

        // Show loading indicator
        const loadingDiv = document.createElement('div');
        loadingDiv.classList.add('flex', 'justify-start', 'mb-4', 'loading-message');
        loadingDiv.innerHTML = `
            <div class="bg-gray-200 text-gray-800 rounded-lg px-4 py-2">
                <div class="flex space-x-2">
                    <div class="w-2 h-2 bg-gray-600 rounded-full animate-bounce"></div>
                    <div class="w-2 h-2 bg-gray-600 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                    <div class="w-2 h-2 bg-gray-600 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
                </div>
            </div>
        `;
        chatMessages.appendChild(loadingDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;

        // Send to API
        fetch('/api/chat', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                message: message
            })
        })
        .then(response => response.json())
        .then(data => {
            // Remove loading indicator
            loadingDiv.remove();

            if (data.success) {
                // Display AI response
                const aiMessageDiv = document.createElement('div');
                aiMessageDiv.classList.add('flex', 'justify-start', 'mb-4');
                aiMessageDiv.innerHTML = `
                    <div class="bg-gray-200 text-gray-800 rounded-lg px-4 py-2 max-w-xs break-words">
                        ${escapeHtml(data.message)}
                    </div>
                `;
                chatMessages.appendChild(aiMessageDiv);
            } else {
                // Display error message
                const errorDiv = document.createElement('div');
                errorDiv.classList.add('flex', 'justify-start', 'mb-4');
                errorDiv.innerHTML = `
                    <div class="bg-red-100 text-red-800 rounded-lg px-4 py-2 max-w-xs break-words">
                        ${escapeHtml(data.message || 'Terjadi kesalahan saat mengirim pesan')}
                    </div>
                `;
                chatMessages.appendChild(errorDiv);
            }

            chatMessages.scrollTop = chatMessages.scrollHeight;
        })
        .catch(error => {
            console.error('Error:', error);
            loadingDiv.remove();
            
            const errorDiv = document.createElement('div');
            errorDiv.classList.add('flex', 'justify-start', 'mb-4');
            errorDiv.innerHTML = `
                <div class="bg-red-100 text-red-800 rounded-lg px-4 py-2 max-w-xs break-words">
                    Koneksi error. Silakan coba lagi.
                </div>
            `;
            chatMessages.appendChild(errorDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        });
    }

    sendMessageButton.addEventListener('click', sendMessage);

    // Send message on Enter key
    messageInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    });

    // Escape HTML to prevent XSS
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
});

</script>

@endsection