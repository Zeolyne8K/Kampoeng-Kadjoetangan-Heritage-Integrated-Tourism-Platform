/**
 * Katalog Page - Animation & Interactivity Module
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
  // SEARCH FORM INTERACTIVITY
  // ==========================================

  const searchInput = document.querySelector('input[name="search"]');
  const searchButton = document.querySelector('button[type="submit"]');

  if (searchInput && searchButton) {
    // Add focus effects to input
    // searchInput.addEventListener('focus', function() {
    //   this.parentElement.style.boxShadow = '0 0 0 3px rgba(180, 83, 9, 0.1)';
    // });

    searchInput.addEventListener('blur', function() {
      this.parentElement.style.boxShadow = 'none';
    });

    // Add visual feedback on button click
    searchButton.addEventListener('click', function() {
      if (searchInput.value.trim() === '') {
        searchInput.focus();
        searchInput.style.borderColor = '#dc2626';
        setTimeout(() => {
          searchInput.style.borderColor = '#d1d5db';
        }, 500);
      }
    });

    // Clear error state on input
    searchInput.addEventListener('input', function() {
      this.style.borderColor = '#d1d5db';
    });
  }

  // ==========================================
  // ITEM HOVER EFFECTS
  // ==========================================

  const items = document.querySelectorAll('[data-aos="slide-up"]');
  
  items.forEach((item, index) => {
    // Skip first item (header section)
    if (index === 0) return;

    item.addEventListener('mouseenter', function() {
      this.style.transition = 'all 300ms ease-out';
    });

    item.addEventListener('mouseleave', function() {
      this.style.transition = 'all 300ms ease-out';
    });
  });

  // ==========================================
  // LINK HOVER ANIMATIONS
  // ==========================================

  const actionLinks = document.querySelectorAll('a[href*="show"]');
  
  actionLinks.forEach(link => {
    const icon = link.querySelector('i');
    if (icon) {
      link.addEventListener('mouseenter', function() {
        icon.style.transform = 'translateX(4px)';
      });

      link.addEventListener('mouseleave', function() {
        icon.style.transform = 'translateX(0)';
      });
    }
  });

  // ==========================================
  // RESET BUTTON ANIMATION
  // ==========================================

  const resetButton = document.querySelector('a.inline-flex.items-center.gap-2');
  if (resetButton) {
    const icon = resetButton.querySelector('i');
    resetButton.addEventListener('mouseenter', function() {
      if (icon) {
        icon.style.transform = 'rotate(180deg)';
      }
    });

    resetButton.addEventListener('mouseleave', function() {
      if (icon) {
        icon.style.transform = 'rotate(0deg)';
      }
    });
  }

  // ==========================================
  // PAGINATION BUTTON INTERACTIVITY
  // ==========================================

  const prevBtn = document.getElementById('btn-prev-katalog');
  const nextBtn = document.getElementById('btn-next-katalog');
  const currentPageSpan = document.getElementById('current-page');
  const totalPagesSpan = document.getElementById('total-pages');

  // Get pagination links from Laravel
  const paginationLinks = document.querySelectorAll('a[rel="prev"], a[rel="next"]');
  let prevLink = null;
  let nextLink = null;

  paginationLinks.forEach(link => {
    if (link.rel === 'prev') prevLink = link.href;
    if (link.rel === 'next') nextLink = link.href;
  });

  // Prev button click
  if (prevBtn) {
    prevBtn.addEventListener('click', function(e) {
      if (!prevBtn.disabled && prevLink) {
        e.preventDefault();
        // Add transition effect
        document.querySelector('section.mb-12').style.opacity = '0';
        document.querySelector('section.mb-12').style.transform = 'translateY(-20px)';
        
        setTimeout(() => {
          window.location.href = prevLink;
        }, 300);
      }
    });

    // Hover effect
    prevBtn.addEventListener('mouseenter', function() {
      if (!prevBtn.disabled) {
        const icon = prevBtn.querySelector('i');
        if (icon) {
          icon.style.transform = 'translateX(-4px)';
        }
      }
    });

    prevBtn.addEventListener('mouseleave', function() {
      const icon = prevBtn.querySelector('i');
      if (icon) {
        icon.style.transform = 'translateX(0)';
      }
    });
  }

  // Next button click
  if (nextBtn) {
    nextBtn.addEventListener('click', function(e) {
      if (!nextBtn.disabled && nextLink) {
        e.preventDefault();
        // Add transition effect
        document.querySelector('section.mb-12').style.opacity = '0';
        document.querySelector('section.mb-12').style.transform = 'translateY(20px)';
        
        setTimeout(() => {
          window.location.href = nextLink;
        }, 300);
      }
    });

    // Hover effect
    nextBtn.addEventListener('mouseenter', function() {
      if (!nextBtn.disabled) {
        const icon = nextBtn.querySelector('i');
        if (icon) {
          icon.style.transform = 'translateX(4px)';
        }
      }
    });

    nextBtn.addEventListener('mouseleave', function() {
      const icon = nextBtn.querySelector('i');
      if (icon) {
        icon.style.transform = 'translateX(0)';
      }
    });
  }
});

