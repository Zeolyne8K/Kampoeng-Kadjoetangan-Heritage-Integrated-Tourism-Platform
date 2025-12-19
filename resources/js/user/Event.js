// Event Carousel Slider
document.addEventListener('DOMContentLoaded', function() {
  const carousel = document.getElementById('event-carousel');
  const prevBtn = document.getElementById('prev-event');
  const nextBtn = document.getElementById('next-event');
  const currentSlideSpan = document.getElementById('event-current-slide');
  
  const cards = carousel.querySelectorAll('.event-card');
  const totalCards = cards.length;
  let currentIndex = 0;
  let startX = 0;
  let currentX = 0;
  let isDragging = false;

  // Get current event data
  function getCurrentEvent() {
    if (cards[currentIndex]) {
      const card = cards[currentIndex];
      const eventId = card.getAttribute('data-event-id');
      return {
        id: eventId,
        card: card
      };
    }
    return null;
  }

  // Update carousel position dan trigger data update
  function updateCarousel() {
    const translateX = -(currentIndex * 100);
    carousel.style.transform = `translateX(${translateX}%)`;
    currentSlideSpan.textContent = currentIndex + 1;
    
    // Trigger custom event untuk update data di section konten
    const event = getCurrentEvent();
    if (event) {
      const eventObj = new CustomEvent('eventChanged', {
        detail: {
          index: currentIndex + 1,
          event: event
        }
      });
      document.dispatchEvent(eventObj);
    }
  }

  // Next slide
  function nextSlide() {
    if (currentIndex < totalCards - 1) {
      currentIndex++;
      updateCarousel();
    }
  }

  // Previous slide
  function prevSlide() {
    if (currentIndex > 0) {
      currentIndex--;
      updateCarousel();
    }
  }

  // Event listeners for buttons
  prevBtn?.addEventListener('click', prevSlide);
  nextBtn?.addEventListener('click', nextSlide);

  // Touch/Mouse swipe support
  carousel.addEventListener('mousedown', (e) => {
    isDragging = true;
    startX = e.clientX;
  });

  carousel.addEventListener('touchstart', (e) => {
    isDragging = true;
    startX = e.touches[0].clientX;
  });

  carousel.addEventListener('mousemove', (e) => {
    if (!isDragging) return;
    currentX = e.clientX;
  });

  carousel.addEventListener('touchmove', (e) => {
    if (!isDragging) return;
    currentX = e.touches[0].clientX;
  });

  const handleDragEnd = () => {
    if (!isDragging) return;
    isDragging = false;

    const diff = startX - currentX;
    const threshold = 50;

    if (Math.abs(diff) > threshold) {
      if (diff > 0) {
        nextSlide();
      } else {
        prevSlide();
      }
    }
  };

  carousel.addEventListener('mouseup', handleDragEnd);
  carousel.addEventListener('mouseleave', handleDragEnd);
  carousel.addEventListener('touchend', handleDragEnd);

  // Initialize
  updateCarousel();
});
