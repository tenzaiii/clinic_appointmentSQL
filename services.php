<?php 
// ✅ FIX #1: Start output buffering at the VERY TOP
ob_start();
include('header.php'); 
include('dbcon.php'); 
?>

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





  <?php 
// ✅ FIX #3: End output buffering at the bottom
ob_end_flush();
include('footer.php'); 
?>