<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - EasyClinic</title>
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
    <div class="signup-container">
        <div class="signup-card uk-grid-collapse" uk-grid>
            <!-- Left Column - Branding and Features -->
            <div class="uk-width-1-2@m signup-left uk-visible@m">

            </div>

            <!-- Right Column - Signup Form -->
            <div class="uk-width-1-1 uk-width-1-2@m signup-right">
                <a href="index.html" class="brand-logo">Easy<span>Clinic</span></a>

                <h2 class="signup-title">Create Your Account</h2>
                <p class="signup-subtitle">Join thousands of patients managing their health online</p>

                <form>
                    <div class="name-row">
                        <div class="form-group name-col">
                            <label class="form-label" for="firstName">First Name</label>
                            <input type="text" id="firstName" class="form-control" placeholder="John" required>
                        </div>

                        <div class="form-group name-col">
                            <label class="form-label" for="lastName">Last Name</label>
                            <input type="text" id="lastName" class="form-control" placeholder="Doe" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Email Address</label>
                        <input type="email" id="email" class="form-control" placeholder="your.email@example.com"
                            required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="phone">Phone Number</label>
                        <input type="tel" id="phone" class="form-control" placeholder="(123) 456-7890" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="dob">Date of Birth</label>
                        <input type="date" id="dob" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <div class="password-container">
                            <input type="password" id="password" class="form-control" placeholder="Create a password"
                                required>
                            <span class="password-toggle" id="togglePassword" uk-icon="icon: eye-slash"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="confirmPassword">Confirm Password</label>
                        <div class="password-container">
                            <input type="password" id="confirmPassword" class="form-control"
                                placeholder="Confirm your password" required>
                            <span class="password-toggle" id="toggleConfirmPassword" uk-icon="icon: eye-slash"></span>
                        </div>
                    </div>

                    <div class="terms-container">
                        <input type="checkbox" id="terms" required>
                        <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy
                                Policy</a></label>
                    </div>

                    <button type="submit" class="btn-signup">Create Account</button>
                </form>

                <p class="login-link">
                    Already have an account? <a href="login.html">Log in</a>
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