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

    <!-- Services Hero Section -->
    <section class="services-hero" style="background: linear-gradient(rgba(0, 128, 255, 0.7), rgba(0, 255, 115, 0.7)),
    url('IMG/clinic3.png'); background-size: cover;
  background-position: center;">
        <div class="uk-container">
            <div class="uk-text-center uk-margin-large-bottom">
                <h2 class="uk-heading-medium">Our Clinic Services</h2>
                <p class="uk-text-lead">Friendly doctors, professional service, and an easy booking experience all in
                    one place.</p>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION -->
    <section class="uk-section uk-section-muted section-padding">
        <div class="uk-container">
            <div class="uk-grid-match uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid>
                <!-- Service Item -->
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-text-center service-card">
                        <span uk-icon="icon: heart; ratio: 3.5" class="service-icon"></span>
                        <h3 class="uk-card-title uk-margin-remove-bottom">General Practitioner</h3>
                        <p class="uk-margin-small-top">Comprehensive primary care for your everyday health needs.</p>
                    </div>
                </div>
                <!-- Service Item -->
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-text-center service-card">
                        <span uk-icon="icon: happy; ratio: 3.5" class="service-icon"></span>
                        <h3 class="uk-card-title uk-margin-remove-bottom">Dentist</h3>
                        <p class="uk-margin-small-top">Complete dental care to keep your smile healthy and bright.</p>
                    </div>
                </div>
                <!-- Service Item -->
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-text-center service-card">
                        <span uk-icon="icon: users; ratio: 3.5" class="service-icon"></span>
                        <h3 class="uk-card-title uk-margin-remove-bottom">Pediatrician</h3>
                        <p class="uk-margin-small-top">Specialized healthcare for infants, children, and adolescents.
                        </p>
                    </div>
                </div>
                <!-- Service Item -->
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-text-center service-card">
                        <span uk-icon="icon: star; ratio: 3.5" class="service-icon"></span>
                        <h3 class="uk-card-title uk-margin-remove-bottom">Dermatologist</h3>
                        <p class="uk-margin-small-top">Expert care for skin, hair, and nail conditions.</p>
                    </div>
                </div>
                <!-- Service Item -->
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-text-center service-card">
                        <span uk-icon="icon: eye; ratio: 3.5" class="service-icon"></span>
                        <h3 class="uk-card-title uk-margin-remove-bottom">Ophthalmologist</h3>
                        <p class="uk-margin-small-top">Vision care and treatment for all types of eye diseases.</p>
                    </div>
                </div>
                <!-- Service Item -->
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-text-center service-card">
                        <span uk-icon="icon: lifesaver; ratio: 3.5" class="service-icon"></span>
                        <h3 class="uk-card-title uk-margin-remove-bottom">Cardiologist</h3>
                        <p class="uk-margin-small-top">Advanced diagnosis and treatment for heart conditions.</p>
                    </div>
                </div>
                <!-- New Service Item -->
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-text-center service-card">
                        <span uk-icon="icon: nut; ratio: 3.5" class="service-icon"></span>
                        <h3 class="uk-card-title uk-margin-remove-bottom">Orthopedic Surgeon</h3>
                        <p class="uk-margin-small-top">Specialized care for musculoskeletal system and joint disorders.
                        </p>
                    </div>
                </div>
                <!-- New Service Item -->
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-text-center service-card">
                        <span uk-icon="icon: happy; ratio: 3.5" class="service-icon"></span>
                        <h3 class="uk-card-title uk-margin-remove-bottom">Psychiatrist</h3>
                        <p class="uk-margin-small-top">Mental health diagnosis and treatment for all age groups.</p>
                    </div>
                </div>
                <!-- New Service Item -->
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-text-center service-card">
                        <span uk-icon="icon: lifesaver; ratio: 3.5" class="service-icon"></span>
                        <h3 class="uk-card-title uk-margin-remove-bottom">Gynecologist</h3>
                        <p class="uk-margin-small-top">Women's health services including reproductive care.</p>
                    </div>
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