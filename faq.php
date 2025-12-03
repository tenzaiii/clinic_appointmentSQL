<?php 
// ✅ FIX #1: Start output buffering at the VERY TOP
ob_start();
include('header.php'); 
include('dbcon.php'); 
?>

<style>
  :root {
  --primary-color: #1e87f0;
  --secondary-color: #32d296;
  --test-gradient: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
  --accent-teal: #00A6D6;
  --bg-light: #F5F7FB;
  --dark-text: #243746;
  --light-text: #6B7280;
  --white: #FFFFFF;
  --success: #28A745;
  --main-color: #c4ddf3;
}
  .container1{
    background: var(--test-gradient);
    height: 150px;
    margin-bottom: 50px;
    align-items: center;
    }

.container1 h2{
    font-size:60px;
    font-weight: 700;
    color: white;
    margin-left: 250px;
    padding: 20px;
}

.faq-container {
    max-width: 600px;
    margin: auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    max-width: 1200px;
    margin: auto;
  }

.faq-item {
    background-color: var(--secondary-color);
    border-radius: 8px;
    margin-bottom: 10px;
    box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.423);
    overflow: hidden;
  }

.faq-item input {
    display: none;
  }

.faq-question {
    display: block;
    padding: 15px 20px;
    font-weight: bold;
    cursor: pointer;
    position: relative;
    user-select: none;
  }

.faq-question::after {
    content: '\25BC';
    position: absolute;
    right: 20px;
    transition: transform 0.3s;
  }

.faq-item input:checked + .faq-question::after {
    transform: rotate(180deg);
  }

.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.5s ease, padding 0.3s ease;
    background-color: #d1edf3;
    padding: 0 20px;
  }

.faq-item input:checked ~ .faq-answer {
    max-height: 200px;
    padding: 15px 20px;
  }

.faq-answer p {
    margin: 0;
  }

.typing-text{
    width: 30ch;
    margin: 160px, 250px;
    text-wrap: nowrap;
    overflow:hidden;
    animation: typing 2s steps(30) infinite alternate-reverse;
    font-size: 80px;
    margin-top: 100px;
    color:#00baa2;
    margin-left: 30px;
}

@keyframes typing{
    from {
        width: 0ch;
    }
}

.gradient-overlay {
    position: relative;
    width: 100%;
    height: 450px;

    margin-top: 30px;
}

.gradient-overlay::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background:  var(--test-gradient)  ;
    
}

.gradient-overlay .content {
    position: relative;
    padding: 10px 50px;
    color: white;
    width: 80%;
margin: auto;

}
.gradient-overlay h2 {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 20px;
}

.gradient-overlay p {
    font-size: 23px;
    font-weight: 1000;
    line-height: 1.7;
    color: white;
    text-align: center;
}
</style>

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