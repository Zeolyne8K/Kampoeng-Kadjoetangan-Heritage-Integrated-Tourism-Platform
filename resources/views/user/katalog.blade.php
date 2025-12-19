@extends('templates.user.user-template')

@section('title')
KKH Web | Halaman Katalog Artikel
@endsection

@section('body')
<main class="bg-gray-50 min-h-screen pt-8 pb-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Back Button -->
        <div class="mb-6 md:mb-8" data-aos="slide-up">
            <a href="{{ route('user.beranda.index') }}" class="inline-flex items-center gap-2 px-4 py-2 text-amber-900 hover:bg-amber-50 rounded-lg transition-colors duration-300">
                <i class="fas fa-arrow-left text-sm"></i>
                <span class="text-sm font-medium">Kembali ke Beranda</span>
            </a>
        </div>

        <!-- Header Section -->
        <section class="mb-10 md:mb-12" data-aos="slide-up">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-3 font-display leading-tight">
                Explore Kampoeng Kadjoetangan Heritage<br>
                <span class="text-amber-900">{{ isset($label) ? $label : 'Exotic Places' }}</span>
            </h1>
            <div class="h-1 w-20 bg-gradient-to-r from-amber-500 to-amber-600 rounded-full"></div>
        </section>

        <!-- Search & Filter Section -->
        <section class="mb-10 md:mb-12" data-aos="slide-up">
            <form action="{{ route('user.katalog.index', ['table' => request('table', 'kuliner')]) }}" method="GET" class="flex flex-col sm:flex-row gap-3 sm:gap-0">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Cari Label..." 
                    value="{{ request('search', '') }}"
                    class="flex-grow bg-white border border-gray-300 rounded-lg px-4 py-3 sm:py-4 text-sm sm:text-base text-gray-700 focus:ring-1 focus:ring-amber-900 focus:border-transparent focus:outline-none shadow-sm hover:shadow-md transition-all duration-200 placeholder-gray-400">
                <button 
                    type="submit"
                    class="group bg-amber-900 hover:bg-amber-700 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-lg font-semibold text-sm sm:text-base transition-all duration-300 hover:shadow-lg active:scale-95 flex items-center justify-center">
                    <i class="fas fa-search mr-2 group-hover:scale-110 transition-transform"></i>
                    Cari
                </button>
            </form>
        </section>

        <!-- Items List Section -->
        <section class="mb-12 md:mb-16" data-aos="slide-up">
            
            @if($data->count() > 0)
                <div class="space-y-4 sm:space-y-5">
                    @foreach($data as $item)
                        <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 overflow-hidden border border-gray-200" data-aos="slide-up">
                            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 sm:gap-6 p-4 sm:p-6">
                                
                                <!-- Image Column -->
                                <div class="sm:col-span-1 flex items-center justify-center">
                                    <div class="w-full sm:w-32 h-32 rounded-lg overflow-hidden flex-shrink-0 bg-gray-100">
                                        @if(isset($item->gambar_kuliner))
                                            <img src="{{ asset('storage/' . $item->gambar_kuliner) }}" alt="{{ $item->nama_kuliner }}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                                        @elseif(isset($item->gambar_spot_foto))
                                            <img src="{{ asset('storage/' . $item->gambar_spot_foto) }}" alt="{{ $item->nama_spot_foto }}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                                        @elseif(isset($item->gambar_event))
                                            <img src="{{ asset('storage/' . $item->gambar_event) }}" alt="{{ $item->nama_event }}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                                        @elseif(isset($item->gambar_award))
                                            <img src="{{ asset('storage/' . $item->gambar_award) }}" alt="{{ $item->nama_award }}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                                <i class="fas fa-image text-gray-400 text-2xl"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Content Column -->
                                <div class="sm:col-span-3 flex flex-col justify-center">
                                    <!-- Title -->
                                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-2">
                                        @if(isset($item->nama_kuliner))
                                            {{ $item->nama_kuliner }}
                                        @elseif(isset($item->nama_spot_foto))
                                            {{ $item->nama_spot_foto }}
                                        @elseif(isset($item->nama_event))
                                            {{ $item->nama_event }}
                                        @elseif(isset($item->nama_award))
                                            {{ $item->nama_award }}
                                        @endif
                                    </h3>

                                    <!-- Description -->
                                    <p class="text-sm sm:text-base text-gray-600 mb-4 line-clamp-2 leading-relaxed">
                                        @if(isset($item->deskripsi_kuliner))
                                            {{ $item->deskripsi_kuliner }}
                                        @elseif(isset($item->deskripsi_spot_foto))
                                            {{ $item->deskripsi_spot_foto }}
                                        @elseif(isset($item->deskripsi_event))
                                            {{ $item->deskripsi_event }}
                                        @elseif(isset($item->deskripsi_award))
                                            {{ $item->deskripsi_award }}
                                        @else
                                            Tidak ada deskripsi tersedia
                                        @endif
                                    </p>

                                    <!-- CTA Button -->
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs sm:text-sm text-gray-500">
                                            @if(isset($item->jenis_kuliner))
                                                <i class="fas fa-utensils mr-1"></i>{{ $item->jenis_kuliner }}
                                            @elseif(isset($item->jenis_spot_foto))
                                                <i class="fas fa-camera mr-1"></i>{{ $item->jenis_spot_foto }}
                                            @elseif(isset($item->jenis_event))
                                                <i class="fas fa-calendar mr-1"></i>{{ $item->jenis_event }}
                                            @elseif(isset($item->jenis_award))
                                                <i class="fas fa-award mr-1"></i>{{ $item->jenis_award }}
                                            @endif
                                        </span>
                                        
                                        <a href="
                                            @if(isset($item->kuliner_id))
                                                {{ route('user.kuliner.show', ['id' => $item->kuliner_id]) }}
                                            @elseif(isset($item->spot_foto_id))
                                                {{ route('user.spot-foto.show', ['id' => $item->spot_foto_id]) }}
                                            @elseif(isset($item->event_id))
                                                {{ route('user.event.show', ['id' => $item->event_id]) }}
                                            @elseif(isset($item->award_id))
                                                {{ route('user.award.show', ['id' => $item->award_id]) }}
                                            @endif
                                        " class="group inline-flex items-center gap-2 text-amber-900 hover:text-amber-700 font-semibold text-sm sm:text-base transition-all duration-300">
                                            Buka
                                            <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination Section -->
                <div class="flex flex-col sm:flex-row items-center justify-between gap-6 sm:gap-8 mt-10 md:mt-12 px-4 py-8 border-t border-gray-200" data-aos="slide-up">
                    
                    <!-- Left Button -->
                    <button id="btn-prev-katalog" 
                        {{ $data->onFirstPage() ? 'disabled' : '' }}
                        class="btn-prev-katalog group flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 rounded-full border-2 border-amber-900 hover:bg-amber-900 hover:shadow-lg transition-all duration-300 active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-transparent">
                        <i class="fas fa-chevron-left text-amber-900 text-lg sm:text-xl"></i>
                    </button>

                    <!-- Page Indicator -->
                    <div class="text-center">
                        <span class="text-sm sm:text-base font-semibold text-gray-900">
                            <span id="current-page" class="text-amber-900">{{ $data->currentPage() }}</span>
                            <span class="text-gray-500">/</span>
                            <span id="total-pages" class="text-gray-600">{{ $data->lastPage() }}</span>
                        </span>
                        <p class="text-xs sm:text-sm text-gray-500 mt-1">
                            Halaman
                        </p>
                    </div>

                    <!-- Right Button -->
                    <button id="btn-next-katalog"
                        {{ !$data->hasMorePages() ? 'disabled' : '' }}
                        class="btn-next-katalog group flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 rounded-full border-2 border-amber-900 hover:bg-amber-900 hover:shadow-lg transition-all duration-300 active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-transparent">
                        <i class="fas fa-chevron-right text-amber-900 text-lg sm:text-xl"></i>
                    </button>

                </div>

                <!-- Total Items Info -->
                <div class="text-center mt-6 sm:mt-8 px-4">
                    <span class="text-sm text-gray-600 font-medium">
                        Menampilkan {{ $data->firstItem() ?? 0 }} - {{ $data->lastItem() ?? 0 }} dari {{ $data->total() }} item
                    </span>
                </div>

            @else
                <!-- Empty State -->
                <div class="bg-white rounded-lg shadow-md p-12 sm:p-16 text-center border border-gray-200" data-aos="slide-up">
                    <div class="flex justify-center mb-6">
                        <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center">
                            @if(request('table') === 'kuliner' || !request('table'))
                                <i class="fas fa-utensils text-amber-900 text-3xl"></i>
                            @elseif(request('table') === 'spot_foto')
                                <i class="fas fa-camera text-amber-900 text-3xl"></i>
                            @elseif(request('table') === 'event')
                                <i class="fas fa-calendar-alt text-amber-900 text-3xl"></i>
                            @elseif(request('table') === 'award')
                                <i class="fas fa-award text-amber-900 text-3xl"></i>
                            @endif
                        </div>
                    </div>
                    
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-2">
                        Tidak Ada Data Ditemukan
                    </h3>
                    
                    <p class="text-gray-600 text-sm sm:text-base mb-6 max-w-md mx-auto">
                        @if(request('search'))
                            Maaf, kami tidak menemukan hasil untuk pencarian "<strong>{{ request('search') }}</strong>". Coba gunakan kata kunci lain.
                        @else
                            Saat ini belum ada data yang tersedia. Silakan cek kembali nanti.
                        @endif
                    </p>

                    @if(request('search'))
                        <a href="{{ route('user.katalog.index', ['table' => request('table', 'kuliner')]) }}" class="group inline-flex items-center gap-2 px-6 py-3 bg-amber-900 hover:bg-amber-700 text-white font-semibold rounded-lg transition-all duration-300 hover:scale-105 hover:shadow-lg active:scale-95">
                            <i class="fas fa-redo"></i>
                            Reset Pencarian
                        </a>
                    @endif
                </div>
            @endif

        </section>

        @include('components.user.informasi')
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