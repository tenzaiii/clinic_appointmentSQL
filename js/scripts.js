var swiper = new Swiper(".mySwiper", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  rewind: true,

  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  coverflowEffect: {
    rotate: 50,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows: true,
  },
  pagination: {
    el: ".swiper-pagination",
  },
});

// Password visibility toggle
document.getElementById('togglePassword').addEventListener('click', function () {
  const passwordInput = document.getElementById('password');
  const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
  passwordInput.setAttribute('type', type);

  // Toggle icon
  const icon = this.getAttribute('uk-icon') === 'icon: eye' ? 'icon: eye-slash' : 'icon: eye';
  this.setAttribute('uk-icon', icon);
});

// Form submission
document.querySelector('form').addEventListener('submit', function (e) {
  e.preventDefault();

  // Get form values
  const firstName = document.getElementById('firstName').value;
  const lastName = document.getElementById('lastName').value;
  const email = document.getElementById('email').value;
  const phone = document.getElementById('phone').value;
  const dob = document.getElementById('dob').value;
  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirmPassword').value;

  // Simple validation
  if (password !== confirmPassword) {
    alert('Passwords do not match!');
    return;
  }

  // In a real app, you would send this data to your server
  console.log({
    firstName,
    lastName,
    email,
    phone,
    dob,
    password
  });

  alert('Account created successfully! Redirecting to dashboard...');
  // window.location.href = 'dashboard.html'; // Uncomment for actual redirect
});