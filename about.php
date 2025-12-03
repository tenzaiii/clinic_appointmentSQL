<?php 
// ✅ FIX #1: Start output buffering at the VERY TOP
ob_start();
include('header.php'); 
include('dbcon.php'); 
?>
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



   <?php 
// ✅ FIX #3: End output buffering at the bottom
ob_end_flush();
include('footer.php'); 
?>