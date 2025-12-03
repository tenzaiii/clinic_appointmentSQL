<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - EasyClinic</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/css/uikit.min.css" />
    <!-- Local CSS -->
    <link rel="stylesheet" href="css/pageStyles.css" link="styles">
</head>

<body>
    <!-- Top Contact Bar -->
    <div class="contact-info">
        <div class="uk-container">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-expand">
                    <span uk-icon="receiver"></span> Hotline: (02) 8988-1000
                    <span class="uk-margin-left"><span uk-icon="mail"></span> info@easyclinic.com</span>
                </div>
                <div class="uk-width-auto">
                    <a href="#" class="uk-margin-small-right" uk-icon="facebook"></a>
                    <a href="#" class="uk-margin-small-right" uk-icon="instagram"></a>
                    <a href="#" class="uk-margin-small-right" uk-icon="twitter"></a>
                    <a href="#" uk-icon="youtube"></a>
                </div>
            </div>
        </div>
    </div>

    <!-- NAVBAR -->
    <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
        <nav class="uk-navbar-container uk-box-shadow-small">
            <div class="uk-container">
                <div uk-navbar>
                    <div class="uk-navbar-left">
                        <!-- Toggle button visible on small screens only -->
                        <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon href="#"
                            uk-toggle="target: #mobile-dropdown" aria-label="Toggle menu"></a>

                        <a class="uk-navbar-item brand-logo" href="index.html"
                            aria-label="Back to Home">Easy<span>Clinic</span></a>


                        <!-- Main nav visible on medium+ screens -->
                        <ul class="uk-navbar-nav uk-visible@m">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="services.html">Services</a></li>
                            <li><a href="form.html">Appointment</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="about.html">About</a></li>
                        </ul>
                    </div>
                    <div class="uk-navbar-right uk-visible@m">
                        <ul class="uk-navbar-nav">
                            <li><a href="login.html">LOG IN</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Dropdown menu (hidden by default) for mobile toggle -->
        <div id="mobile-dropdown" class="uk-navbar-dropdown uk-navbar-dropdown-width-1 uk-hidden@m"
            uk-drop="mode: click; boundary: !nav; boundary-align: true; pos: bottom-justify; offset: 0;">
            <div class="uk-navbar-dropdown-grid uk-child-width-1-1 uk-grid-collapse" uk-grid>
                <ul class="uk-nav uk-navbar-dropdown-nav">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="form.html">Appointment</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="about.html">About</a></li>
                    <li class="uk-nav-divider"></li>
                    <li><a href="login.html">LOG IN</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero-section" style=" background: linear-gradient(rgba(0, 128, 255, 0.7), rgba(0, 255, 115, 0.7)),
    url('IMG/clinic1.png');  background-size: cover;
  background-position: center;">
        <div class="uk-container">
            <h2 class="uk-heading-medium">About EasyClinic</h2>
            <p class="uk-text-lead">Providing exceptional healthcare services with compassion and innovation since our
                founding</p>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="uk-section">
        <div class="uk-container">
            <h2 class="uk-text-center uk-heading-line"><span>Our Story</span></h2>
            <div class="uk-grid-large uk-child-width-1-2@m" uk-grid>
                <div>
                    <p class="uk-text-lead">Founded in 2005 as a small family clinic, EasyClinic has grown into one of
                        the region's most trusted healthcare providers.</p>
                    <p>What started as a humble practice with just three doctors has evolved into a comprehensive
                        medical facility serving over 50,000 patients annually. Our commitment to compassionate care and
                        medical excellence has remained unchanged throughout our growth.</p>
                    <p>Today, we operate multiple specialized centers across the metro area, each equipped with
                        state-of-the-art technology and staffed by board-certified physicians who are leaders in their
                        respective fields.</p>
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-card-body">
                        <h3 class="uk-card-title">Our Growth Journey</h3>
                        <ul class="uk-list uk-list-bullet">
                            <li>2005: Founded with 3 doctors and 10 staff members</li>
                            <li>2010: Expanded to include pediatric and women's health services</li>
                            <li>2015: Opened first satellite clinic in suburban area</li>
                            <li>2018: Introduced telemedicine services</li>
                            <li>2022: Launched comprehensive cancer care center</li>
                            <li>2024: Serving 50,000+ patients annually across 5 locations</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission, Vision, Values Section -->
    <section class="uk-section uk-section-muted">
        <div class="uk-container">
            <h2 class="uk-text-center uk-heading-line"><span>Mission, Vision & Values</span></h2>

            <div class="uk-grid-large uk-child-width-1-3@m uk-text-center" uk-grid>
                <div>
                    <div class="uk-card mission-card mission-vision-card">
                        <div class="uk-card-body">
                            <span uk-icon="icon: heart; ratio: 2"></span>
                            <h3 class="uk-card-title">Our Mission</h3>
                            <p>"To provide compassionate, affordable, and quality healthcare for every family."</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-card vision-card mission-vision-card">
                        <div class="uk-card-body">
                            <span uk-icon="icon: world; ratio: 2"></span>
                            <h3 class="uk-card-title">Our Vision</h3>
                            <p>"A healthier community through trusted medical service."</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-card values-card mission-vision-card">
                        <div class="uk-card-body">
                            <span uk-icon="icon: star; ratio: 2"></span>
                            <h3 class="uk-card-title">Our Values</h3>
                            <p>Compassion, Excellence, Integrity, Innovation, Community</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="values-grid">
                <div class="value-item">
                    <div class="value-icon">
                        <span uk-icon="icon: heart"></span>
                    </div>
                    <h4>Compassion</h4>
                    <p>We treat every patient with empathy and understanding.</p>
                </div>
                <div class="value-item">
                    <div class="value-icon">
                        <span uk-icon="icon: bolt"></span>
                    </div>
                    <h4>Excellence</h4>
                    <p>We strive for the highest standards in all we do.</p>
                </div>
                <div class="value-item">
                    <div class="value-icon">
                        <span uk-icon="icon: lock"></span>
                    </div>
                    <h4>Integrity</h4>
                    <p>We conduct ourselves with honesty and transparency.</p>
                </div>
                <div class="value-item">
                    <div class="value-icon">
                        <span uk-icon="icon: code"></span>
                    </div>
                    <h4>Innovation</h4>
                    <p>We embrace technology to improve patient outcomes.</p>
                </div>
            </div>
        </div>
    </section>



    <!-- Footer -->
    <footer class="site-footer">
        <div class="uk-container">
            <div class="uk-grid-large" uk-grid>
                <div class="uk-width-1-2@s uk-width-1-4@m">
                    <a class="uk-navbar-item brand-logo" href="index.html"
                        aria-label="Back to Home">Easy<span>Clinic</span></a>
                    <p class="footer-text" style="text-align: center;">Your trusted healthcare partner committed to
                        providing world-class medical services with

                    <div class="social-links">
                        <a href="#" class="uk-margin-small-right" uk-icon="facebook"></a>
                        <a href="#" class="uk-margin-small-right" uk-icon="instagram"></a>
                        <a href="#" class="uk-margin-small-right" uk-icon="twitter"></a>
                        <a href="#" uk-icon="youtube"></a>
                    </div>
                </div>

                <div class="uk-width-1-2@s uk-width-1-4@m">
                    <h3 class="footer-heading">Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#">Find a Doctor</a></li>
                        <li><a href="#">Book Appointment</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Patient Portal</a></li>
                        <li><a href="#">Health Packages</a></li>
                    </ul>
                </div>

                <div class="uk-width-1-2@s uk-width-1-4@m">
                    <h3 class="footer-heading">Services</h3>
                    <ul class="footer-links">
                        <li><a href="#">Emergency Care</a></li>
                        <li><a href="#">Surgery</a></li>
                        <li><a href="#">Laboratory</a></li>
                        <li><a href="#">Radiology</a></li>
                        <li><a href="#">Pharmacy</a></li>
                    </ul>
                </div>

                <div class="uk-width-1-2@s uk-width-1-4@m">
                    <h3 class="footer-heading">Contact Info</h3>
                    <ul class="footer-links">
                        <li><span uk-icon="icon: location"></span> 123 Healthcare Ave, Metro Manila</li>
                        <li><span uk-icon="icon: receiver"></span> (02) 8988-1000</li>
                        <li><span uk-icon="icon: mail"></span> info@easyclinic.com</li>
                        <li><span uk-icon="icon: clock"></span> 24/7 Emergency Services</li>
                    </ul>
                </div>
            </div>

            <div class="copyright">
                <p>&copy; 2025 EasyClinic. All Rights Reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of
                        Service</a></p>
            </div>
        </div>
    </footer>

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