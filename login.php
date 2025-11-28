<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fast, easy, and hassle-free scheduling for all your medical needs - EasyClinic</title>
  <!-- CDNs -->
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <!-- UIkit -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/css/uikit.min.css" />
  <!-- local css -->
  <link rel="stylesheet" href="css/styles.css" link="styles">
</head>

<body>
  <div class="login-container">
    <div class="login-card uk-grid-collapse" uk-grid>
      <!-- Left Column - Branding and Features -->
      <div class="uk-width-1-2@m login-left uk-visible@m">
      </div>

      <!-- Right Column - Login Form -->
      <div class="uk-width-1-1 uk-width-1-2@m login-right">
        <a href="index.html" class="brand-logo">Easy<span>Clinic</span></a>

        <h2 class="login-title">Welcome Back!</h2>
        <p class="login-subtitle">Sign in to continue to your account</p>

        <form>
          <div class="form-group">
            <label class="form-label" for="email">Email Address</label>
            <input type="email" id="email" class="form-control" placeholder="your.email@example.com" required>
          </div>

          <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <div class="password-container">
              <input type="password" id="password" class="form-control" placeholder="Enter your password" required>
              <span class="password-toggle" id="togglePassword" uk-icon="icon: eye-slash"></span>
            </div>
          </div>

          <div class="remember-forgot">
            <label class="remember-me">
              <input type="checkbox">
              <span>Remember me</span>
            </label>
            <a href="#" class="forgot-password">Forgot Password?</a>
          </div>

          <button type="submit" class="btn-login">Sign In</button>
        </form>



        <p class="signup-link">
          Don't have an account? <a href="signup.html">Sign up</a>
        </p>
      </div>
    </div>
  </div>

  <!-- SCRIPTS -->
  <!-- swiper -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
  <!-- UIkit -->
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit-icons.min.js"></script>
  <!-- local js -->
  <script src="js/scripts.js"></script>

</body>

</html>