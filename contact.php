<?php 
// ✅ FIX #1: Start output buffering at the VERY TOP
ob_start();
include('header.php'); 
include('dbcon.php'); 
?>
<style>
    .gradient-overlay {
    position: relative;
    width: 100%;
    height: 150vh;
}

.gradient-overlay::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.gradient-overlay .content {
    position: relative;
    padding: 10px 50px;
    color: white;
    width: 60%;

}

.uk-card1{
   color: white;
   margin-left: 230px;
   margin-top: 100px;
   border-radius: 20px;
   box-shadow: 5px 5px 5px rgb(0, 0, 0);
   width: 1000px;
   height: 700px;

}

.gradient-overlay p {
    font-size: 23px;
    font-weight: 1000;
    line-height: 1.7;
    color: black;
}

.uk-card-overlay.custom-card { 
    background-color: rgba(255, 255, 255, 0.695); 
}

.typing-text{
    width: 30ch;
    text-wrap: nowrap;
    overflow:hidden;
    animation: typing 2s steps(30) infinite alternate-reverse;
    font-size: 40px;
    font-weight: 500;
    color:#00baa2;
    margin: 30px;
}

@keyframes typing{
    from {
        width: 0ch;
    }
}

.contact {
    display: flex;
    justify-content: space-between;
    gap: 30px;
    text-align: left;
    margin-bottom: 50px;
}

.detail-block {
    flex: 1;
    padding: 20px;
    background-color: #ecf0f1; 
    border-radius: 8px;
    border-left: 4px solid #3498db; 
}

.detail-block h2 {
    font-size: 1.4em;
    color: #3498db; 
    margin-top: 0;
    margin-bottom: 15px;
    font-weight: 600;
}

.detail-info {
    line-height: 1.6;
    margin-bottom: 5px;
    color: #2c3e50;
    font-style: normal;
}

.detail-description {
    color: #7f8c8d;
    margin-top: 15px;
    padding-top: 10px;
    border-top: 1px solid #bdc3c7;
}

</style>

<div class="gradient-overlay" style="background: linear-gradient(rgba(0, 128, 255, 0.7), rgba(0, 255, 115, 0.7)),
    url('IMG/hospital_3.png') center/cover no-repeat;;">
    <div class="content">
        <div>
        <div class="uk-card1 uk-card-overlay custom-card uk-card-hover uk-card-body uk-container-large">
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