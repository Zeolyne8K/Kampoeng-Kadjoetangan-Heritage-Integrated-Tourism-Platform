<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"/>
    <title>KKH-Web | Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600;700&display=swap');
        
        .font-display { font-family: 'Playfair Display', serif; }
        .font-body { font-family: 'Inter', sans-serif; }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-in {
            animation: slideIn 0.6s ease-out;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-amber-900 via-amber-800 to-amber-950 min-h-screen flex items-center justify-center font-body">
    <main class="w-full min-h-screen flex items-center justify-center py-12 sm:py-16 px-4 sm:px-6">
        
        <div class="w-full max-w-sm animate-slide-in">
            
            <!-- Login Card -->
            <div class="bg-white rounded-2xl shadow-2xl p-8 sm:p-10 backdrop-blur-sm">
                
                <!-- Header -->
                <div class="text-center mb-8 sm:mb-10">
                    <div class="flex justify-center mb-5">
                        <div class="bg-gradient-to-br from-amber-900 to-amber-800 w-16 h-16 sm:w-20 sm:h-20 rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-lock text-white text-3xl sm:text-4xl"></i>
                        </div>
                    </div>
                    
                    <h1 class="text-3xl sm:text-4xl font-display font-bold text-gray-900 mb-2">
                        Admin Login
                    </h1>
                    <p class="text-gray-600 font-body text-sm sm:text-base">
                        Dashboard Kampung Kajoetangan Heritage
                    </p>
                </div>

                <!-- Login Form -->
                <form action="{{ route('admin.auth.login') }}" method="POST" class="space-y-5 sm:space-y-6">
                    @csrf

                    <!-- Email Input -->
                    <div class="flex flex-col">
                        <label class="mb-2 text-sm sm:text-base font-semibold text-gray-800 font-body">
                            <i class="fas fa-envelope mr-2 text-amber-900"></i>Email Admin
                        </label>
                        <input type="email" 
                               name="email" 
                               required 
                               placeholder="admin@kajoetangan.com"
                               value="{{ old('email') }}"
                               class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 sm:px-5 py-3 sm:py-4 text-gray-700 focus:ring-2 focus:ring-amber-900 focus:border-transparent focus:outline-none text-sm sm:text-base shadow-sm hover:shadow-md transition-all duration-200 placeholder-gray-400 font-body">
                        @error('email')
                        <span class="mt-2 text-red-600 text-xs sm:text-sm flex items-center gap-1 font-body">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="flex flex-col">
                        <label class="mb-2 text-sm sm:text-base font-semibold text-gray-800 font-body">
                            <i class="fas fa-lock mr-2 text-amber-900"></i>Password
                        </label>
                        <div class="relative">
                            <input type="password" 
                                   name="password" 
                                   id="passwordInput"
                                   required 
                                   placeholder="••••••••"
                                   class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 sm:px-5 py-3 sm:py-4 text-gray-700 focus:ring-2 focus:ring-amber-900 focus:border-transparent focus:outline-none text-sm sm:text-base shadow-sm hover:shadow-md transition-all duration-200 placeholder-gray-400 pr-12 font-body">
                            <button type="button" 
                                    class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-600 hover:text-amber-900 transition-colors duration-300"
                                    id="togglePasswordBtn">
                                <i class="fas fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                        @error('password')
                        <span class="mt-2 text-red-600 text-xs sm:text-sm flex items-center gap-1 font-body">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center pt-2">
                        <input type="checkbox" 
                               name="remember" 
                               id="remember"
                               class="w-4 h-4 accent-amber-900 rounded cursor-pointer transition-all duration-200">
                        <label for="remember" class="ml-3 text-sm sm:text-base text-gray-700 cursor-pointer font-body hover:text-amber-900 transition-colors">
                            Ingat saya
                        </label>
                    </div>

                    <!-- Error Alert (jika ada) -->
                    @if ($errors->any())
                        <div class="mb-6 p-4 sm:p-5 bg-red-50 border border-red-200 rounded-lg">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-exclamation-circle text-red-600 mt-1 flex-shrink-0 text-lg"></i>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-red-700 mb-2 font-body">Login Gagal</p>
                                    <ul class="text-xs text-red-600 space-y-1 font-body">
                                        @foreach ($errors->all() as $error)
                                            <li class="flex items-center gap-2"><span class="w-1 h-1 bg-red-600 rounded-full"></span>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Success Alert (jika ada) -->
                    @if (session('success'))
                        <div class="mb-6 p-4 sm:p-5 bg-green-50 border border-green-200 rounded-lg">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-check-circle text-green-600 text-lg"></i>
                                <span class="text-sm font-semibold text-green-700 font-body">{{ session('success') }}</span>
                            </div>
                        </div>
                    @endif

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="group w-full bg-amber-900 hover:bg-amber-700 active:scale-95 text-white font-semibold py-3 sm:py-4 rounded-lg transition-all duration-300 text-sm sm:text-base flex items-center justify-center gap-2 mt-8 sm:mt-10 shadow-lg hover:shadow-xl transform hover:scale-105 focus:ring-4 focus:ring-amber-900/30 focus:outline-none font-body">
                        <i class="fas fa-sign-in-alt group-hover:rotate-12 transition-transform duration-300"></i> 
                        Masuk ke Dashboard
                    </button>
                </form>

                <!-- Divider -->
                <div class="mt-8 sm:mt-10 pt-6 sm:pt-8 border-t border-gray-200">
                    <p class="text-center text-xs sm:text-sm text-gray-600 font-body">
                        <i class="fas fa-lock-open mr-2"></i>
                        Halaman ini hanya untuk admin
                    </p>
                </div>

                <!-- Demo Credentials (development only) -->
                <div class="mt-5 p-4 sm:p-5 bg-blue-50 rounded-lg border border-blue-200 hover:shadow-md transition-shadow duration-300">
                    <p class="text-xs sm:text-sm font-semibold text-blue-900 mb-3 font-body flex items-center gap-2">
                        <i class="fas fa-info-circle text-blue-600"></i> Demo Credentials:
                    </p>
                    <div class="text-xs sm:text-sm text-blue-800 space-y-2 font-body">
                        <p class="flex items-center gap-2"><span class="w-1 h-1 bg-blue-600 rounded-full"></span><strong>Email:</strong> admin@kajoetangan.com</p>
                        <p class="flex items-center gap-2"><span class="w-1 h-1 bg-blue-600 rounded-full"></span><strong>Password:</strong> admin123</p>
                    </div>
                </div>
            </div>

            <!-- Back to Home Link -->
            <div class="mt-8 sm:mt-10 text-center">
                <a href="/" class="group inline-flex items-center justify-center gap-2 text-white hover:text-amber-200 text-sm sm:text-base transition-all duration-300 font-body">
                    <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform duration-300"></i> 
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </main>

</body>

<!-- Import Auth Module Script -->
<script type="module">
  import './Auth.js';
</script>
</html>