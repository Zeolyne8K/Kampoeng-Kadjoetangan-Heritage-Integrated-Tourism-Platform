// DOM Elements
const methodGopayInput = document.getElementById('method_gopay');
const methodQrisInput = document.getElementById('method_qris');
const gopayInfoSection = document.getElementById('gopayInfo');
const qrisInfoSection = document.getElementById('qrisInfo');
const nominalTransferElement = document.getElementById('nominalTransfer');
const paymentForm = document.getElementById('paymentForm');

// Get total_harga from hidden input
function getTotalHarga() {
  const totalHargaInput = document.querySelector('input[name="total_harga"]');
  return totalHargaInput ? parseInt(totalHargaInput.value) : 0;
}

// Format currency
function formatCurrency(num) {
  return new Intl.NumberFormat('id-ID').format(num);
}

// Update nominal transfer display
function updateNominalTransfer() {
  const totalHarga = getTotalHarga();
  const formattedTotal = formatCurrency(totalHarga);
  nominalTransferElement.textContent = `Rp ${formattedTotal}`;
}

// Toggle payment method information
function togglePaymentInfo() {
  if (methodGopayInput.checked) {
    gopayInfoSection.classList.remove('hidden');
    qrisInfoSection.classList.add('hidden');
  } else if (methodQrisInput.checked) {
    gopayInfoSection.classList.add('hidden');
    qrisInfoSection.classList.remove('hidden');
  } else {
    gopayInfoSection.classList.add('hidden');
    qrisInfoSection.classList.add('hidden');
  }
}

// Event listeners for radio button changes
methodGopayInput.addEventListener('change', () => {
  togglePaymentInfo();
  updateNominalTransfer();
});

methodQrisInput.addEventListener('change', () => {
  togglePaymentInfo();
});

// Form validation before submit
paymentForm.addEventListener('submit', (e) => {
  const selectedMethod = document.querySelector('input[name="metode_pembayaran"]:checked');
  
  if (!selectedMethod) {
    e.preventDefault();
    alert('Silakan pilih metode pembayaran terlebih dahulu');
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

  // Initialize nominal transfer on load
  updateNominalTransfer();
});
