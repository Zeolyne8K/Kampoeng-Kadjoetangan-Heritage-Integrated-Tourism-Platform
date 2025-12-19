// Harga tiket
const TICKET_PRICES = {
  Lokal: 25000,
  Mancanegara: 35000
};

// DOM Elements
const ticketQuantityInput = document.getElementById('ticketQuantity');
const increaseBtn = document.getElementById('increaseBtn');
const decreaseBtn = document.getElementById('decreaseBtn');
const totalPriceElement = document.getElementById('totalPrice');
const priceBreakdownElement = document.getElementById('priceBreakdown');
const radioButtons = document.querySelectorAll('input[name="jenis_tiket"]');
const visitDateInput = document.getElementById('visitDate');

// Inisialisasi Flatpickr untuk date picker
if (visitDateInput) {
  flatpickr(visitDateInput, {
    minDate: 'today',
    dateFormat: 'Y-m-d',
    locale: {
      firstDayOfWeek: 1,
      weekdays: {
        shorthand: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
        longhand: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']
      },
      months: {
        shorthand: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        longhand: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
      }
    },
    onChange: function(selectedDates) {
      // Trigger any needed validation or updates
      console.log('Tanggal dipilih:', selectedDates[0]);
    }
  });
}

// Update total price
function updateTotalPrice() {
  const quantity = parseInt(ticketQuantityInput.value) || 1;
  const selectedTicket = document.querySelector('input[name="jenis_tiket"]:checked');
  const ticketType = selectedTicket ? selectedTicket.value : 'Lokal';
  const price = TICKET_PRICES[ticketType];
  const total = price * quantity;

  // Format angka dengan pemisah ribuan
  const formattedTotal = new Intl.NumberFormat('id-ID').format(total);
  const formattedPrice = new Intl.NumberFormat('id-ID').format(price);

  totalPriceElement.textContent = formattedTotal;
  priceBreakdownElement.textContent = `${quantity} x Rp ${formattedPrice}`;
  
  // Update hidden field untuk total harga
  const totalHargaInput = document.getElementById('totalHargaInput');
  if (totalHargaInput) {
    totalHargaInput.value = total;
  }
}

// Increase button handler
increaseBtn.addEventListener('click', (e) => {
  e.preventDefault();
  let currentValue = parseInt(ticketQuantityInput.value) || 1;
  if (currentValue < 100) {
    currentValue++;
    ticketQuantityInput.value = currentValue;
    updateTotalPrice();
  }
});

// Decrease button handler
decreaseBtn.addEventListener('click', (e) => {
  e.preventDefault();
  let currentValue = parseInt(ticketQuantityInput.value) || 1;
  if (currentValue > 1) {
    currentValue--;
    ticketQuantityInput.value = currentValue;
    updateTotalPrice();
  }
});

// Input change handler
ticketQuantityInput.addEventListener('change', () => {
  let value = parseInt(ticketQuantityInput.value) || 1;
  
  // Validasi range
  if (value < 1) {
    value = 1;
  } else if (value > 100) {
    value = 100;
  }
  
  ticketQuantityInput.value = value;
  updateTotalPrice();
});

// Ticket type change handler
radioButtons.forEach(radio => {
  radio.addEventListener('change', () => {
    updateTotalPrice();
  });
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

// Initialize price on load
updateTotalPrice();
