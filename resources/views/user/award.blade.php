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
            
            <section class="mb-12 md:mb-16" data-aos="slide-up">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-4 font-display">
                    {{ $data->nama_award }}
                </h1>
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 text-sm text-gray-600">
                    <span class="flex items-center">
                        <i class="fas fa-calendar mr-2 text-amber-900"></i>
                        {{ $data->updated_at->format('d M Y') }}
                    </span>
                    <span class="flex items-center">
                        <i class="fas fa-user mr-2 text-amber-900"></i>
                        Admin Kajoetangan
                    </span>
                </div>
            </section>

            <section class="mb-12 md:mb-16" data-aos="slide-up">
                <img src="{{ asset('storage/' . $data->gambar_award) }}" 
                     alt="{{ $data->nama_award }}" 
                     class="w-full h-64 sm:h-80 md:h-96 object-cover rounded-lg shadow-lg">
            </section>

            <!-- Main Content -->
            <article class="space-y-12 md:space-y-16">
                
                <section data-aos="slide-up">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-6 font-display">
                        Tentang {{ $data->nama_award }}
                    </h2>
                    <div class="space-y-4 text-base sm:text-lg text-gray-700 leading-relaxed">
                        <p>
                            {{ $data->deskripsi_award }}
                        </p>
                    </div>
                </section>

                <section data-aos="slide-up">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-6 font-display">
                        Detail Penghargaan
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                        <!-- Jenis Award -->
                        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-all duration-300">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-12 w-12 rounded-lg bg-amber-100">
                                        <i class="fas fa-award text-amber-900 text-xl"></i>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Jenis Penghargaan</h3>
                                    <p class="text-gray-700">{{ $data->jenis_award }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tanggal Penerimaan -->
                        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-all duration-300">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-12 w-12 rounded-lg bg-amber-100">
                                        <i class="fas fa-calendar-check text-amber-900 text-xl"></i>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Tanggal Penerimaan</h3>
                                    <p class="text-gray-700">{{ \Carbon\Carbon::parse($data->tanggal_penerimaan_award)->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="pt-12 border-t border-gray-200 px-4 py-8 md:py-12" data-aos="slide-up">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-8 text-center font-display">
                        Penghargaan Lainnya
                    </h2>
                    
                    <!-- Carousel Container -->
                    <div class="relative -mx-4 -my-8 md:-my-12 px-4 py-8 md:py-12">
                        <!-- Carousel Wrapper -->
                        <div class="overflow-hidden">
                            <div id="carouselTrack" class="flex transition-transform duration-500 ease-out" style="transform: translateX(0)">
                                <!-- Award Card -->
                                @foreach ($data_all as $award)
                                <div class="carousel-card w-full md:w-1/3 flex-shrink-0 px-4 py-9 md:px-5 md:py-12">
                                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:scale-105 transition-all duration-500 h-full group cursor-pointer transform">
                                        <a href="{{ route('user.award.show', ['id' => $award->award_id]) }}">
                                            <img src="{{ asset('storage/' . $award->gambar_award) }}" 
                                             alt="{{ $award->nama_award }}" 
                                             class="w-full h-40 sm:h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                                        </a>
                                        <div class="p-4">
                                            <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $award->nama_award }}</h3>
                                            <p class="text-sm text-gray-600 mb-2 flex items-center">
                                                <i class="fas fa-award mr-2 text-amber-900"></i>
                                                {{ $award->jenis_award }}
                                            </p>
                                            <p class="text-sm text-gray-600 mb-3 flex items-center">
                                                <i class="fas fa-calendar mr-2 text-amber-900"></i>
                                                {{ \Carbon\Carbon::parse($award->tanggal_penerimaan_award)->format('d M Y') }}
                                            </p>
                                            <a href="{{ route('user.award.show', ['id' => $award->award_id]) }}" class="text-amber-900 hover:text-amber-700 font-semibold text-sm flex items-center">
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
