<?php 
// ✅ FIX #1: Start output buffering at the VERY TOP
ob_start();
include('headerPages.php'); 
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


<?php 
// ✅ FIX #3: End output buffering at the bottom
ob_end_flush();
include('footer.php'); 
?>