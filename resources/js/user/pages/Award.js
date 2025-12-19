/**
 * Award Page - Carousel & Animation Module
 */

document.addEventListener('DOMContentLoaded', function() {
  // ==========================================
  // SCROLL ANIMATIONS (Slide-up)
  // ==========================================
  
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate-slide-up');
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  // Observe all sections with data-aos attribute
  document.querySelectorAll('[data-aos="slide-up"]').forEach(el => {
    observer.observe(el);
  });

  // ==========================================
  // CAROUSEL LOGIC
  // ==========================================

  const carousel = {
    track: document.getElementById('carouselTrack'),
    prevBtn: document.getElementById('prevBtn'),
    nextBtn: document.getElementById('nextBtn'),
    totalCards: document.querySelectorAll('.carousel-card').length,
    currentSlide: 0,
    cardsPerView: 1,
    isDragging: false,
    startX: 0,

    get maxSlides() {
      return Math.max(0, this.totalCards - this.cardsPerView);
    },

    init() {
      if (this.totalCards === 0) return;
      this.updateCardsPerView();
      this.generateDots();
      this.setupSwipe();
      this.updateCarousel();
      window.addEventListener('resize', () => this.handleResize());
    },

    generateDots() {
      const totalSlides = Math.ceil(this.totalCards / this.cardsPerView);
      const dotsContainer = document.getElementById('dotsContainer');
      if (!dotsContainer) return;
      
      dotsContainer.innerHTML = '';
      for (let i = 0; i < totalSlides; i++) {
        const dot = document.createElement('button');
        dot.classList.add('carousel-dot', 'w-3', 'h-3', 'rounded-full', 'transition-all', 'duration-300');
        dot.classList.add(i === 0 ? 'bg-amber-900 active' : 'bg-gray-300');
        dot.setAttribute('onclick', `goToSlide(${i})`);
        dot.setAttribute('data-index', i);
        dotsContainer.appendChild(dot);
      }
    },

    setupSwipe() {
      if (!this.track) return;
      
      this.track.addEventListener('mousedown', (e) => this.handleDragStart(e));
      this.track.addEventListener('mousemove', (e) => this.handleDragMove(e));
      this.track.addEventListener('mouseup', (e) => this.handleDragEnd(e));
      this.track.addEventListener('mouseleave', (e) => this.handleDragEnd(e));
      
      this.track.addEventListener('touchstart', (e) => this.handleDragStart(e));
      this.track.addEventListener('touchmove', (e) => this.handleDragMove(e));
      this.track.addEventListener('touchend', (e) => this.handleDragEnd(e));
      
      this.track.addEventListener('dragstart', (e) => e.preventDefault());
    },

    handleDragStart(e) {
      this.isDragging = true;
      this.startX = e.type.includes('mouse') ? e.clientX : e.touches[0].clientX;
    },

    handleDragMove(e) {
      if (!this.isDragging) return;
      e.preventDefault();
    },

    handleDragEnd(e) {
      if (!this.isDragging) return;
      this.isDragging = false;
      
      const endX = e.type.includes('mouse') ? e.clientX : e.changedTouches[0].clientX;
      const diff = this.startX - endX;
      const threshold = 50;
      
      if (Math.abs(diff) > threshold) {
        if (diff > 0) {
          this.move(1);
        } else {
          this.move(-1);
        }
      }
    },

    updateCardsPerView() {
      if (window.innerWidth >= 768) {
        this.cardsPerView = 3;
      } else {
        this.cardsPerView = 1;
      }
    },

    handleResize() {
      const oldCardsPerView = this.cardsPerView;
      this.updateCardsPerView();
      if (oldCardsPerView !== this.cardsPerView) {
        this.currentSlide = 0;
        this.generateDots();
        this.updateCarousel();
      }
    },

    updateCarousel() {
      if (!this.track) return;

      const offset = -this.currentSlide * (100 / this.cardsPerView);
      this.track.style.transform = `translateX(${offset}%)`;

      this.updateDots();
      this.updateButtonStates();
    },

    updateDots() {
      document.querySelectorAll('.carousel-dot').forEach((dot, index) => {
        const isActive = index === this.currentSlide;
        dot.classList.toggle('active', isActive);
        dot.classList.toggle('bg-amber-900', isActive);
        dot.classList.toggle('bg-gray-300', !isActive);
      });
    },

    updateButtonStates() {
      if (!this.prevBtn || !this.nextBtn) return;

      this.prevBtn.style.opacity = this.currentSlide === 0 ? '0.5' : '1';
      this.prevBtn.style.cursor = this.currentSlide === 0 ? 'not-allowed' : 'pointer';

      this.nextBtn.style.opacity = this.currentSlide >= this.maxSlides ? '0.5' : '1';
      this.nextBtn.style.cursor = this.currentSlide >= this.maxSlides ? 'not-allowed' : 'pointer';
    },

    move(direction) {
      const newSlide = this.currentSlide + direction;
      if (newSlide >= 0 && newSlide <= this.maxSlides) {
        this.currentSlide = newSlide;
        this.updateCarousel();
      }
    },

    goToSlide(index) {
      if (index >= 0 && index <= this.maxSlides) {
        this.currentSlide = index;
        this.updateCarousel();
      }
    }
  };

  carousel.init();

  // Global functions for onclick handlers
  window.moveCarousel = (direction) => carousel.move(direction);
  window.goToSlide = (index) => carousel.goToSlide(index);
});
