document.addEventListener('DOMContentLoaded', function() {
  const awardsCarousel = document.getElementById('awards-carousel');
  const prevButton = document.getElementById('prev-awards');
  const nextButton = document.getElementById('next-awards');
  const cards = document.querySelectorAll('.award-card');
  
  const currentSlideSpan = document.getElementById('awards-current-slide');
  const totalSlidesSpan = document.getElementById('awards-total-slides');

  let currentIndex = 0;
  let cardsPerView = 1;
  let startX = 0;
  let currentX = 0;
  let isDragging = false;

  // Determine cards per view based on screen size
  function updateCardsPerView() {
    if (window.innerWidth < 640) {
      cardsPerView = 1;
    } else if (window.innerWidth < 1024) {
      cardsPerView = 2;
    } else {
      cardsPerView = 3;
    }
  }

  updateCardsPerView();
  window.addEventListener('resize', function() {
    updateCardsPerView();
    updateCarousel();
  });

  // Get current award data
  function getCurrentAward() {
    const card = cards[currentIndex];
    if (!card) return { id: null, card: null };
    
    return {
      id: card.getAttribute('data-award-id'),
      card: card
    };
  }

  // Update carousel position and dispatch event
  function updateCarousel() {
    const slideNumber = Math.floor(currentIndex / cardsPerView) + 1;
    const totalSlides = Math.ceil(cards.length / cardsPerView);
    
    // Calculate transform percentage based on card width
    const percentPerCard = 100 / cardsPerView;
    const offset = -currentIndex * percentPerCard;
    awardsCarousel.style.transform = `translateX(${offset}%)`;
    
    // Update slide indicator with both current and total
    currentSlideSpan.textContent = slideNumber;
    totalSlidesSpan.textContent = totalSlides;

    // Dispatch custom event
    const currentAward = getCurrentAward();
    window.dispatchEvent(new CustomEvent('awardChanged', {
      detail: {
        index: currentIndex,
        award: currentAward
      }
    }));
  }

  // Next slide
  function nextSlide() {
    const maxIndex = Math.max(0, cards.length - cardsPerView);
    if (currentIndex < maxIndex) {
      currentIndex = Math.min(currentIndex + cardsPerView, maxIndex);
      updateCarousel();
    }
  }

  // Previous slide
  function prevSlide() {
    if (currentIndex > 0) {
      currentIndex = Math.max(currentIndex - cardsPerView, 0);
      updateCarousel();
    }
  }

  // Button click handlers
  nextButton.addEventListener('click', nextSlide);
  prevButton.addEventListener('click', prevSlide);

  // Touch/Mouse events for swipe support
  awardsCarousel.addEventListener('mousedown', (e) => {
    startX = e.clientX;
    isDragging = true;
    awardsCarousel.style.cursor = 'grabbing';
  });

  awardsCarousel.addEventListener('touchstart', (e) => {
    startX = e.touches[0].clientX;
    isDragging = true;
  });

  awardsCarousel.addEventListener('mousemove', (e) => {
    if (!isDragging) return;
    currentX = e.clientX;
  });

  awardsCarousel.addEventListener('touchmove', (e) => {
    if (!isDragging) return;
    currentX = e.touches[0].clientX;
  });

  awardsCarousel.addEventListener('mouseup', () => {
    if (!isDragging) return;
    isDragging = false;
    awardsCarousel.style.cursor = 'grab';
    
    const diff = startX - currentX;
    
    if (Math.abs(diff) > 50) {
      if (diff > 0) {
        nextSlide();
      } else {
        prevSlide();
      }
    }
  });

  awardsCarousel.addEventListener('touchend', () => {
    if (!isDragging) return;
    isDragging = false;
    
    const diff = startX - currentX;
    
    if (Math.abs(diff) > 50) {
      if (diff > 0) {
        nextSlide();
      } else {
        prevSlide();
      }
    }
  });

  // Initialize
  updateCarousel();
});
