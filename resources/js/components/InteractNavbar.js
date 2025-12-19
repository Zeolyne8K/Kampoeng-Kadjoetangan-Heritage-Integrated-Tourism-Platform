// Mobile Menu Toggle
  document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileArtikelBtn = document.getElementById('mobile-artikel-btn');
    const mobileArtikelMenu = document.getElementById('mobile-artikel-menu');
    const mobileArtikelIcon = document.getElementById('mobile-artikel-icon');

    // Toggle mobile menu
    mobileMenuBtn.addEventListener('click', function() {
      mobileMenu.classList.toggle('hidden');
      mobileMenuBtn.querySelector('i').classList.toggle('rotate-90');
    });

    // Toggle artikel dropdown in mobile
    mobileArtikelBtn.addEventListener('click', function(e) {
      e.preventDefault();
      mobileArtikelMenu.classList.toggle('hidden');
      mobileArtikelIcon.classList.toggle('rotate-180');
    });
  });