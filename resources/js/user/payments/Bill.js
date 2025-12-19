
  // Timer Configuration
  const PAYMENT_TIMEOUT = 5 * 60; // 5 minutes in seconds
  const timerDisplay = document.getElementById('timerDisplay');
  const billForm = document.getElementById('billForm');
  const fileInput = document.getElementById('bukti_pembayaran');
  const fileInfo = document.getElementById('fileInfo');
  const fileName = document.getElementById('fileName');

  let timeRemaining = PAYMENT_TIMEOUT;

  // Format time to MM:SS
  function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const secs = seconds % 60;
    return `${String(minutes).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
  }

  // Update timer display
  function updateTimer() {
    timerDisplay.textContent = formatTime(timeRemaining);
    
    if (timeRemaining <= 0) {
      clearInterval(timerInterval);
      handleTimerExpired();
    }
    
    timeRemaining--;
  }

  // Handle timer expiration - DELETE order
  function handleTimerExpired() {
    timerDisplay.classList.add('bg-red-600');
    timerDisplay.classList.remove('bg-amber-900');
    
    // Disable form submission
    billForm.style.opacity = '0.5';
    const submitBtn = billForm.querySelector('button[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
    
    // Show alert and redirect
    alert('Waktu pembayaran Anda telah habis. Pesanan akan dihapus.');
    
    // Call DELETE endpoint
    fetch('{{ route("payment.bill.delete") }}', {
      method: 'DELETE',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Content-Type': 'application/json'
      }
    }).then(() => {
      window.location.href = '{{ route("payment.arrival") }}';
    });
  }

  // Start timer
  const timerInterval = setInterval(updateTimer, 1000);

  // File input change handler
  fileInput.addEventListener('change', (e) => {
    if (e.target.files.length > 0) {
      fileName.textContent = e.target.files[0].name;
      fileInfo.classList.remove('hidden');
    }
  });

  // Form validation before submit
  billForm.addEventListener('submit', (e) => {
    if (!fileInput.files.length) {
      e.preventDefault();
      alert('Silakan upload bukti pembayaran terlebih dahulu');
      return false;
    }
  });

  // Slide-up animation on page load
  document.addEventListener('DOMContentLoaded', () => {
    const slideUpElements = document.querySelectorAll('[data-aos="slide-up"]');
    
    slideUpElements.forEach((element, index) => {
      setTimeout(() => {
        element.classList.add('animate-slide-up');
      }, index * 100);
    });
  });

  // Modal Elements
  const cancelModalOverlay = document.getElementById('cancelModalOverlay');
  const btnKembali = document.getElementById('btnKembali');
  const btnCancelNo = document.getElementById('btnCancelNo');
  const btnCancelYes = document.getElementById('btnCancelYes');

  // Show modal when Kembali button is clicked
  btnKembali.addEventListener('click', (e) => {
    e.preventDefault();
    cancelModalOverlay.classList.remove('hidden');
  });

  // Close modal when "Tidak, Lanjutkan" is clicked
  btnCancelNo.addEventListener('click', () => {
    cancelModalOverlay.classList.add('hidden');
  });

  // Delete order and redirect when "Ya, Batalkan" is clicked
  btnCancelYes.addEventListener('click', () => {
    // Disable button during request
    btnCancelYes.disabled = true;
    btnCancelYes.textContent = 'Membatalkan...';

    fetch('{{ route("payment.bill.delete") }}', {
      method: 'DELETE',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Content-Type': 'application/json'
      }
    }).then(() => {
      window.location.href = '{{ route("payment.arrival") }}';
    }).catch((error) => {
      console.error('Error:', error);
      alert('Terjadi kesalahan saat membatalkan pesanan');
      btnCancelYes.disabled = false;
      btnCancelYes.innerHTML = '<i class="fas fa-trash-alt mr-2"></i>Ya, Batalkan';
    });
  });

  // Close modal when clicking outside (on overlay)
  cancelModalOverlay.addEventListener('click', (e) => {
    if (e.target === cancelModalOverlay) {
      cancelModalOverlay.classList.add('hidden');
    }
  });