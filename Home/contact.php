<?php 
// ✅ FIX #1: Start output buffering at the VERY TOP
ob_start();
include('header.php'); 
include('dbcon.php'); 
?>


<div class="gradient-overlay" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(1, 255, 196, 0.818) 100%), url('IMG/hospital_3.png');   
    background-size: cover;
    background-position: center;">
    <div class="content">
        <div>
        <div class="uk-card1 uk-card-overlay custom-card uk-card-hover uk-card-body">
        <div class="typing-text">Contact Us</div>
    
<main class="contact">
            <section class="detail-block">
                <h2>General Inquiries</h2>
                <h4 class="detail-info">
                    Email: info@easyclinic.com
                </h4>
                <h4 class="detail-info">
                    Phone: (02) 8988-1000
                </h4>
                <p class="detail-description">
                    For all general questions, service requests, and partnership proposals.
                </p>
            </section>

            <section class="detail-block">
                <h2>Our Location</h2>
                <h4 class="detail-info">
                    Main Office: 123 Healthcare Ave, Metro Manila
                </h4>
                <p class="detail-description">
                    Visits are by appointment only. Please contact us before planning a visit.
                </p>
            </section>

            <section class="detail-block">
                <h2>Business Hours</h2>
                <h4 class="detail-info">
                    Visiting hours are from 8:00 AM to 8:00 PM daily.
                </h4>
                <h4 class="detail-info">
                    24/7 Emergency Services
                </h4>
                <p class="detail-description">
                    We aim to respond to all inquiries within one business day.
                </p>
            </section>
        </main>
    </div>
    </div>
    </div>
</div>


<!-- Footer -->
    <footer class="site-footer">
        <div class="uk-container">
            <div class="uk-grid-large" uk-grid>
                <div class="uk-width-1-2@s uk-width-1-4@m">
                    <a class="uk-navbar-item brand-logo" href="index.html"
                        aria-label="Back to Home">Easy<span>Clinic</span></a>
                    <p class="footer-text" style="text-align: center;">Your trusted healthcare partner committed to
                        providing world-class medical services with
                        compassion and excellence.</p>
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
        <script src="scripts.js"></script>
    </body>
</html>