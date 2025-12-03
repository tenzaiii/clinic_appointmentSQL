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

// Password toggle
document.getElementById('togglePassword').addEventListener('click', function () {
  const password = document.getElementById('password');
  const icon = this;
  if (password.type === 'password') {
    password.type = 'text';
    icon.setAttribute('uk-icon', 'icon: eye');
  } else {
    password.type = 'password';
    icon.setAttribute('uk-icon', 'icon: eye-slash');
  }
});

// Loading state
document.querySelector('form').addEventListener('submit', function () {
  const btn = document.querySelector('.btn-login');
  btn.innerHTML = '<span uk-spinner="ratio: 0.8"></span> Signing In...';
  btn.disabled = true;
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