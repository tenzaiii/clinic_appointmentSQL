<?php 
// ✅ FIX #1: Start output buffering at the VERY TOP
ob_start();
include('headerPages.php'); 
include('dbcon.php'); 
?>



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


 <?php 
// ✅ FIX #3: End output buffering at the bottom
ob_end_flush();
include('footer.php'); 
?>