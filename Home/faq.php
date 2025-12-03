
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


<div class="container1">        
    <h2>Frequently Asked Questions</h2>
</div>


<!-- APPOINTMENT AND SCHEDULING -->
<div class="faq-container">
  <div class="faq-item">
    <input type="checkbox" id="faq1">
    <label class="faq-question" for="faq1">How can I book an appointment?</label>
    <div class="faq-answer">
      <p>You can book an appointment online through our website, via phone, or by visiting our reception desk.</p>
    </div>
  </div>

  <div class="faq-item">
    <input type="checkbox" id="faq2">
    <label class="faq-question" for="faq2">Can I reschedule or cancel my appointment?</label>
    <div class="faq-answer">
      <p>Yes, appointments can be rescheduled or canceled at least 24 hours in advance by contacting our reception.</p>
    </div>
  </div>


<!-- BILLING AND INSURANCE -->
<div class="faq-item">
    <input type="checkbox" id="faq3">
    <label class="faq-question" for="faq3">What insurance plans do you accept?</label>
    <div class="faq-answer">
      <p>We accept most major insurance providers. Please check our insurance page or contact us for details.</p>
    </div>
  </div>

<div class="faq-item">
    <input type="checkbox" id="faq4">
    <label class="faq-question" for="faq4">Can I pay my bill online?</label>
    <div class="faq-answer">
      <p>Yes, patients can pay their bills securely online through our patient portal.</p>
    </div>
  </div>


<!-- PATIENT CARE AND POLICIES -->
<div class="faq-item">
    <input type="checkbox" id="faq5">
    <label class="faq-question" for="faq5">What are visiting hours?</label>
    <div class="faq-answer">
      <p>Visiting hours are from 8:00 AM to 8:00 PM daily. Some departments may have restricted hours.</p>
    </div>
  </div>

<div class="faq-item">
    <input type="checkbox" id="faq6">
    <label class="faq-question" for="faq6">Are there accommodations for patients with disabilities?</label>
    <div class="faq-answer">
      <p>Yes, the hospital is fully accessible and offers support services for patients with disabilities.</p>
    </div>
  </div>
</div>


<div class="typing-text">EasyClinic FAQ Information!</div>



<div class="gradient-overlay" style="background-image: url('IMG/hospital_2.png');
    background-size: cover;
    background-position: center;">
    <div class="content">
        <p>
            Our hospital is committed to providing seamless,
            patient-centered care by offering a full range of medical services,
            from routine checkups to specialized treatments.
            Patients can easily schedule appointments online or through our 24/7 hotline,
            and emergency care is always available without prior booking.
            We ensure transparency in billing by providing clear cost estimates
            before procedures whenever possible, and we accept major insurance providers
            to make healthcare more accessible. All patient information is kept strictly confidential
            following national privacy standards, and our facility is equipped with modern diagnostic tools,
            clean wards, and trained medical staff to ensure safety and comfort throughout every visit.
        </p>
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