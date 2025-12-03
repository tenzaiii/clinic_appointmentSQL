<?php 
// ✅ FIX #1: Start output buffering at the VERY TOP
ob_start();
include('headerPages.php'); 
include('dbcon.php'); 
?>

<!-- SHOWCASE -->
<div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
    <div class="uk-card-media-left uk-cover-container">
        <img src="IMG/clinic3.png" alt="" class="uk-animation-reverse uk-transform-origin-top-right" uk-scrollspy="cls: uk-animation-kenburns; repeat: true" uk-cover>
        <canvas width="600" height="400"></canvas>
    </div>
    <div>
        <div class="uk-card-body">
            <h3 class="uk-card-title uk-text-center" >Caring for You, One Appointment at a Time</h3>
            <p class="uk-text-center">Our clinic is dedicated to giving you the attention and care you deserve, whenever you need it.</p>
        </div>
    </div>
</div>
<div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
    <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
        <img src="IMG/clinic4.png" alt="" class="uk-animation-reverse uk-transform-origin-top-right" uk-scrollspy="cls: uk-animation-kenburns; repeat: true" uk-cover>
        <canvas width="600" height="400"></canvas>
    </div>
    <div>
        <div class="uk-card-body">
            <h3 class="uk-card-title uk-text-center" >Quality Care Made Easy 
                <br> Book Anytime, Anywhere</h3>
            <p class="uk-text-center" >Convenient online scheduling for fast, reliable, and comfortable clinic visits.</p>
        </div>
    </div>
</div>




<?php 
// ✅ FIX #3: End output buffering at the bottom
ob_end_flush();
include('footer.php'); 
?>