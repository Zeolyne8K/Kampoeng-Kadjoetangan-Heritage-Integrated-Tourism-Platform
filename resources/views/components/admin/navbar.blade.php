<nav class="bg-amber-900 text-white sticky top-0 z-50 shadow-lg">
  <div class="max-w-7xl mx-auto px-4 py-3 md:px-6">
    <div class="flex items-center justify-between">
      
      <!-- Logo/Brand -->
      <div class="flex-shrink-0">
        <h1 class="font-display text-lg md:text-xl font-bold leading-tight">
          Admin Panel<br>
          <span class="font-display text-xs md:text-sm text-amber-200">Kajoetangan</span>
        </h1>
      </div>

      <!-- Navigation Menu - Desktop -->
      <div class="hidden md:flex md:items-center md:space-x-6 lg:space-x-8">
        <a href="{{ route('admin.dashboard.index') }}" class="font-body hover:text-amber-200 transition-colors duration-200 text-sm lg:text-base flex items-center gap-2">
          <i class="fas fa-chart-line"></i> Dashboard
        </a>
        
        <a href="{{ route('admin.ticket.index') }}" class="font-body hover:text-amber-200 transition-colors duration-200 text-sm lg:text-base flex items-center gap-2">
          <i class="fas fa-ticket-alt"></i> Kelola Tiket
        </a>

        <!-- User Dropdown -->
        <div class="relative group">
          <button class="font-body flex items-center hover:text-amber-200 transition-colors duration-200 text-sm lg:text-base">
            <i class="fas fa-user-circle text-xl"></i>
            <i class="fas fa-chevron-down ml-2 text-xs group-hover:rotate-180 transition-transform duration-300"></i>
          </button>
          
          <div class="absolute right-0 mt-0 w-40 bg-amber-800 rounded-b-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 py-2">
            <a href="#" class="font-body px-4 py-2 hover:bg-amber-700 transition-colors duration-200 text-sm flex items-center">
              <i class="fas fa-cog mr-2"></i> Pengaturan
            </a>
            <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
              @csrf
              <button type="submit" class="w-full text-left font-body px-4 py-2 hover:bg-amber-700 transition-colors duration-200 text-sm flex items-center">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
              </button>
            </form>
          </div>
        </div>
      </div>

      <!-- Hamburger Menu - Mobile -->
      <div class="md:hidden">
        <button class="text-white hover:text-amber-200 transition-colors duration-200 p-2" id="mobile-menu-btn">
          <i class="fas fa-bars text-2xl"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div class="hidden md:hidden bg-amber-800 border-t border-amber-700 space-y-1 px-4 py-3" id="mobile-menu">
    <a href="{{ route('admin.dashboard.index') }}" class="font-body block px-3 py-2 rounded hover:bg-amber-700 transition-colors duration-200 text-sm font-medium flex items-center gap-2">
      <i class="fas fa-chart-line"></i> Dashboard
    </a>
    <a href="{{ route('admin.ticket.index') }}" class="font-body block px-3 py-2 rounded hover:bg-amber-700 transition-colors duration-200 text-sm font-medium flex items-center gap-2">
      <i class="fas fa-ticket-alt"></i> Kelola Tiket
    </a>
    <div class="border-t border-amber-700 my-2"></div>
    <a href="#" class="font-body block px-3 py-2 rounded hover:bg-amber-700 transition-colors duration-200 text-sm font-medium flex items-center gap-2">
      <i class="fas fa-cog"></i> Pengaturan
    </a>
    <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
      @csrf
      <button type="submit" class="w-full text-left font-body block px-3 py-2 rounded hover:bg-amber-700 transition-colors duration-200 text-sm font-medium flex items-center gap-2">
        <i class="fas fa-sign-out-alt"></i> Logout
      </button>
    </form>
  </div>
</nav>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuBtn.addEventListener('click', function() {
      mobileMenu.classList.toggle('hidden');
    });
  });
</script>