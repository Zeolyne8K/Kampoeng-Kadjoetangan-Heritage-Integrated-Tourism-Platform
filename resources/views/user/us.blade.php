@extends('templates.user.user-template')

@section('title')
KKH Web | Tentang Kami
@endsection

@section('body')

    <main class="bg-white font-body">
        <!-- About Us Section -->
        <section class="py-12 sm:py-16 md:py-20 px-4 sm:px-6 bg-gray-50">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl sm:text-5xl md:text-6xl font-display font-bold text-center text-black mb-8 sm:mb-12 animate-fade-up">
                    Tentang Kami
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 sm:gap-12 items-center mb-12 sm:mb-16">
                    <!-- Text Content -->
                    <div class="order-2 md:order-1 animate-fade-up" style="animation-delay: 0.1s">
                        <p class="font-body text-gray-700 text-sm sm:text-base leading-relaxed">
                            {{ $data->orientation }}
                        </p>
                    </div>

                    <!-- Image -->
                    <div class="order-1 md:order-2 animate-fade-up transition-transform duration-300 hover:scale-105 hover:shadow-2xl" style="animation-delay: 0.2s">
                        <img src="{{ asset('storage/about-us/' . $data->orientation_image) }}" 
                             alt="Tentang Kami" 
                             class="w-full h-64 sm:h-80 object-cover rounded-lg shadow-lg">
                    </div>
                </div>
            </div>
        </section>

        <!-- Sejarah & Identitas Kami -->
        <section class="py-12 sm:py-16 md:py-20 px-4 sm:px-6 bg-white">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-display font-bold text-center text-black mb-12 sm:mb-16 animate-fade-up">
                    Sejarah &amp; Identitas Kami
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 sm:gap-12 items-center">
                    <!-- Image -->
                    <div class="order-2 md:order-1 animate-fade-up transition-transform duration-300 hover:scale-105 hover:shadow-2xl" style="animation-delay: 0.1s">
                        <img src="{{ asset('storage/about-us/' . $data->kadjoetangan_image) }}" 
                             alt="Sejarah Kajoetangan" 
                             class="w-full h-64 sm:h-80 object-cover rounded-lg shadow-lg">
                    </div>

                    <!-- Text Content -->
                    <div class="order-1 md:order-2 animate-fade-up" style="animation-delay: 0.2s">
                        <p class="font-body text-gray-700 text-sm sm:text-base leading-relaxed mb-4">
                            {{ $data->kadjoetangan_history }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Visi & Misi -->
        <section class="py-12 sm:py-16 md:py-20 px-4 sm:px-6 bg-gray-50">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 sm:gap-12">
                    <!-- Visi -->
                    <div class="animate-fade-up transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 rounded-lg p-6 bg-white" style="animation-delay: 0.1s">
                        <h3 class="text-2xl sm:text-3xl font-heritage font-bold text-black mb-4">Visi</h3>
                        <p class="font-body text-gray-700 text-sm sm:text-base leading-relaxed">
                            {{ $data->vision }}
                        </p>
                    </div>

                    <!-- Misi -->
                    <div class="animate-fade-up transition-transform duration-300 hover:shadow-lg hover:-translate-y-1 rounded-lg p-6 bg-white" style="animation-delay: 0.2s">
                        <h3 class="text-2xl sm:text-3xl font-heritage font-bold text-black mb-4">Misi</h3>
                        <p class="font-body text-gray-700 text-sm sm:text-base leading-relaxed">
                            {{ $data->mission }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection