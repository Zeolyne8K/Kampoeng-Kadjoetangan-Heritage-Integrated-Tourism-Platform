@extends('templates.user.user-template')

@section('body')
<main class="bg-gray-50 min-h-screen pt-8 pb-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Back Button -->
        <div class="mb-6 md:mb-8" data-aos="slide-up">
            <a href="{{ route('user.beranda.index') }}" class="inline-flex items-center gap-2 px-4 py-2 text-amber-900 hover:bg-amber-50 rounded-lg transition-colors duration-300">
                <i class="fas fa-arrow-left text-sm"></i>
                <span class="text-sm font-medium">Kembali ke Beranda</span>
            </a>
        </div>
    
        <div data-aos="slide-up">
            
            <!-- Header Section -->
            <section class="mb-12 md:mb-16" data-aos="slide-up">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-4 font-display">
                    {{ $data->nama_event }}
                </h1>
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 text-sm text-gray-600">
                    <span class="flex items-center">
                        <i class="fas fa-calendar mr-2 text-amber-900"></i>
                        {{ \Carbon\Carbon::parse($data->waktu_event)->format('d M Y') }}
                    </span>
                    <span class="flex items-center">
                        <i class="fas fa-user mr-2 text-amber-900"></i>
                        Admin Kadjoetangan
                    </span>
                </div>
            </section>

            <!-- Hero Image -->
            <section class="mb-12 md:mb-16" data-aos="slide-up">
                <img src="{{ asset('storage/' . $data->gambar_event) }}" 
                     alt="{{ $data->nama_event }}" 
                     class="w-full h-64 sm:h-80 md:h-96 object-cover rounded-lg shadow-lg">
            </section>

            <!-- Main Content -->
            <article class="space-y-12 md:space-y-16">
                
                <!-- Location Section -->
                <section data-aos="slide-up">
                    <div class="flex items-start gap-3 p-4 md:p-6 bg-white rounded-lg shadow-md border-l-4 border-amber-900">
                        <i class="fas fa-map-pin text-amber-900 text-xl flex-shrink-0 mt-1"></i>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Lokasi</h3>
                            <p class="text-gray-700">Jalan Pramusila No. 20, Krajan, Kab. Malang, Jawa Timur</p>
                        </div>
                    </div>
                </section>

                <!-- About Event -->
                <section data-aos="slide-up">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-6 font-display">
                        Tentang {{ $data->nama_event }}
                    </h2>
                    <div class="space-y-4 text-base sm:text-lg text-gray-700 leading-relaxed">
                        <p>
                            {{ $data->deskripsi_event }}
                        </p>
                    </div>
                </section>

                <!-- Event Schedule Section -->
                <section data-aos="slide-up">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-8 font-display">
                        Jadwal Acara
                    </h2>
                    
                    <div class="space-y-4">
                        <!-- Ticket Card 1 -->
                        <div class="bg-white rounded-lg shadow-md p-4 md:p-6 hover:shadow-xl transition-all duration-500 hover:-translate-y-1 cursor-pointer" data-aos="slide-up">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 md:gap-4">
                                <!-- Icon Section -->
                                <div class="flex-shrink-0">
                                    <div class="w-14 h-14 rounded-full bg-amber-100 flex items-center justify-center">
                                        <i class="fas fa-music text-amber-900 text-xl"></i>
                                    </div>
                                </div>
                                
                                <!-- Content Section -->
                                <div class="flex-grow">
                                    <h3 class="text-base md:text-lg font-semibold text-gray-900">
                                        {{ $data->jenis_event }}
                                    </h3>
                                    <p class="text-xs md:text-sm text-gray-600 mt-1">
                                        {{ $data->label_event }}
                                    </p>
                                </div>
                                
                                <!-- Time Badge -->
                                <div class="flex-shrink-0 bg-red-600 text-white px-3 md:px-4 py-1 md:py-2 rounded-lg text-center whitespace-nowrap">
                                    <p class="text-xs md:text-sm font-semibold">15:00-20:00</p>
                                    <p class="text-xs">WIB</p>
                                </div>
                            </div>
                            
                            <!-- CTA Button -->
                            <div class="mt-3 md:mt-4 pt-3 md:pt-4 border-t border-gray-200">
                                <a href="#" class="inline-flex items-center gap-2 text-amber-900 hover:text-amber-700 font-semibold text-xs md:text-sm transition-colors duration-300">
                                    Pesan Tiket Sekarang
                                    <i class="fas fa-arrow-right text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Discover Other Events -->
                <section class="pt-12 border-t border-gray-200 px-4 py-8 md:py-12" data-aos="slide-up">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-8 text-center font-display">
                        Temukan Event Lainnya
                    </h2>
                    
                    <!-- Carousel Container -->
                    <div class="relative -mx-4 -my-8 md:-my-12 px-4 py-8 md:py-12">
                        <!-- Carousel Wrapper -->
                        <div class="overflow-hidden">
                            <div id="carouselTrack" class="flex transition-transform duration-500 ease-out" style="transform: translateX(0)">
                                <!-- Event Card -->
                                @foreach ($data_all as $event)
                                <div class="carousel-card w-full md:w-1/3 flex-shrink-0 px-4 py-9 md:px-5 md:py-12">
                                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:scale-105 transition-all duration-500 h-full group cursor-pointer transform">
                                        <img src="{{ asset('storage/' . $event->gambar_event) }}" 
                                             alt="{{ $event->nama_event }}" 
                                             class="w-full h-40 sm:h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                                        <div class="p-4">
                                            <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $event->nama_event }}</h3>
                                            <p class="text-sm text-gray-600 mb-2 flex items-center">
                                                <i class="fas fa-calendar mr-2 text-amber-900"></i>
                                                {{ \Carbon\Carbon::parse($event->waktu_event)->format('d M Y') }}
                                            </p>
                                            <p class="text-sm text-gray-600 line-clamp-1 mb-3">
                                                {{ $event->jenis_event }}
                                            </p>
                                            <a href="{{ route('user.event.show', ['id' => $event->event_id]) }}" class="text-amber-900 hover:text-amber-700 font-semibold text-sm flex items-center">
                                                Lihat Selengkapnya
                                                <i class="fas fa-arrow-right ml-2 text-xs"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>

                        <!-- Left Arrow Button (Hidden di Mobile, Visible di Desktop) -->
                        <button id="prevBtn" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-6 md:-translate-x-12 z-10 w-10 h-10 rounded-full bg-amber-900 text-white flex items-center justify-center hover:bg-amber-800 transition-colors duration-300 hidden md:flex"
                                aria-label="Previous slide" onclick="moveCarousel(-1)">
                            <i class="fas fa-chevron-left text-lg"></i>
                        </button>

                        <!-- Right Arrow Button (Hidden di Mobile, Visible di Desktop) -->
                        <button id="nextBtn" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-6 md:translate-x-12 z-10 w-10 h-10 rounded-full bg-amber-900 text-white flex items-center justify-center hover:bg-amber-800 transition-colors duration-300 hidden md:flex"
                                aria-label="Next slide" onclick="moveCarousel(1)">
                            <i class="fas fa-chevron-right text-lg"></i>
                        </button>
                    </div>

                    <!-- Carousel Indicator Dots (Generated Dynamically via JavaScript) -->
                    <div id="dotsContainer" class="flex justify-center gap-3 mt-6">
                        <!-- Dots akan dihasilkan oleh JavaScript -->
                    </div>
                </section>
                
            </article>

            @include('components.user.informasi')
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
@endsection
