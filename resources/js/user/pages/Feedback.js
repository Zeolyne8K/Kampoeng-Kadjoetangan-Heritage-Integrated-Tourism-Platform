/**
 * Feedback Page - Animation & Form Interactivity Module
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
  // FORM VALIDATION
  // ==========================================

  const form = document.querySelector('form');
  if (form) {
    form.addEventListener('submit', function(e) {
      // Allow native HTML5 validation to work
      // Just add visual feedback on invalid inputs
      const invalidInputs = this.querySelectorAll(':invalid');
      
      invalidInputs.forEach(input => {
        input.scrollIntoView({ behavior: 'smooth', block: 'center' });
        input.focus();
        // The error messages will be shown by @error directive
        return false;
      });
    });
  }

  // ==========================================
  // AUTO-DISMISS SUCCESS MESSAGE
  // ==========================================

  const successMessage = document.querySelector('[data-aos="slide-up"] + .mb-6');
  if (successMessage && successMessage.classList.contains('bg-green-50')) {
    setTimeout(() => {
      successMessage.style.transition = 'opacity 0.3s ease-out';
      successMessage.style.opacity = '0';
      setTimeout(() => {
        successMessage.remove();
      }, 300);
    }, 5000);
  }
});
