<?php
include("header.php");
include('dbcon.php');

$doctor = null;
$success_message = '';
$error_message = '';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: /find-doctors.php");
    exit();
}

$doctor_id = mysqli_real_escape_string($connection, $_GET['id']);
$query = "SELECT * FROM doctors WHERE id = '$doctor_id'";
$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $doctor = mysqli_fetch_assoc($result);
} else {
    header("Location: /find-doctors.php");
    exit();
}
// mysqli_close(mysql: $connection);

// Handle booking form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patient_name = mysqli_real_escape_string($connection, trim($_POST['patient_name']));
    $patient_email = mysqli_real_escape_string($connection, trim($_POST['patient_email']));
    $patient_phone = mysqli_real_escape_string($connection, trim($_POST['patient_phone']));
    $appointment_date = mysqli_real_escape_string($connection, trim($_POST['appointment_date']));
    $preferred_time = mysqli_real_escape_string($connection, trim($_POST['preferred_time']));
    
    // Validate required fields
    if (empty($patient_name) || empty($patient_email) || empty($patient_phone) || empty($appointment_date)) {
        $error_message = "Please fill in all required fields.";
    } else {
        // Save appointment to database
        $user_id = $_SESSION['user_id'] ?? 'guest_' . time();
        $status = 'pending';
        
        $insert_query = "INSERT INTO appointments (user_id, doctor_id, patient_name, patient_email, patient_phone, appointment_date, preferred_time, status, created_at) 
                        VALUES ('$user_id', '$doctor_id', '$patient_name', '$patient_email', '$patient_phone', '$appointment_date', '$preferred_time', '$status', NOW())";
        
        if (mysqli_query($connection, $insert_query)) {
            $success_message = "Appointment booked successfully! Confirmation sent to $patient_email.";
            
        } else {
            $error_message = "Booking failed. Please try again.";
        }
        mysqli_close($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment - Dr. <?php echo htmlspecialchars($doctor['first_name'] . ' ' . $doctor['last_name']); ?> - EasyClinic</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/css/uikit.min.css" />
        <link rel="stylesheet" href="css/styles.css">

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
  --main-color: #c4ddf3;}

        .booking-hero {
 background: linear-gradient(rgba(0, 128, 255, 0.7), rgba(0, 255, 115, 0.7)),
    url('IMG/hospital_2.png') center/cover no-repeat;            color: white; padding: 80px 0;
        }
        .booking-hero h1 {
            font-weight: 40px;
            font-size: 120px;
        }
        .doctor-profile {
            background: white; border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            padding: 40px; 
            margin: 40px;
        }
        .doctor-avatar {
            width: 120px; height: 120px; background: var(--test-gradient);
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            color: white; font-size: 48px; font-weight: bold; margin: 0 auto 20px;
        }
        .booking-form-section {
            background: white; border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            padding: 40px;
        }
        .confirmation-badge {
            background: #28a745; color: white; padding: 10px 20px; border-radius: 50px;
            font-weight: 600; display: inline-block; margin: 20px;
        }
    </style>
</head>
<body>
    <!-- Booking Hero -->
    <section class="booking-hero">
        <div class="uk-container">
            <h1 class="uk-heading-xlarge uk-margin-remove">BOOK APPOINTMENT</h1>
            <p class="uk-text-lead uk-margin-large-top">with Dr. <?php echo htmlspecialchars($doctor['first_name'] . ' ' . $doctor['last_name']); ?></p>
        </div>
    </section>

    <div class="uk-container">
        <?php if ($success_message): ?>
            <!-- ✅ SUCCESS - Appointment Confirmed -->
            <div class="uk-text-center uk-margin-large uk-padding-large booking-confirmation">
                <div class="confirmation-badge">✅ Appointment Pending!</div>
                <h4 class="uk-heading-large uk-margin-remove"><?php echo $success_message; ?></h4>
                <p class="uk-text-lead uk-margin-large-top">Waiting for approval</p>
                <div class="uk-margin-large-top">
                    <a href="/CLINIC_APPOINTMENTSQL/my-appointments.php" class="uk-button uk-button-large uk-margin-right" style="background: #32d296;">
                        <span uk-icon="icon: calendar"></span> View My Appointments
                    </a>
                    <a href="/CLINIC_APPOINTMENTSQL/form.php" class="uk-button uk-button-default uk-button-large" style="background: #1e87f0;>
                        <span uk-icon="icon: search"></span> Find More Doctors
                    </a>
                </div>
            </div>
        <?php else: ?>
            <!-- Doctor Profile -->
            <div class="doctor-profile uk-text-center">
                <div class="doctor-avatar">
                    <?php echo strtoupper(substr($doctor['first_name'], 0, 1) . substr($doctor['last_name'], 0, 1)); ?>
                </div>
                <h2 class="uk-heading-large uk-margin-remove">
                    Dr. <?php echo htmlspecialchars($doctor['first_name'] . ' ' . $doctor['last_name']); ?>
                </h2>
                <p class="uk-text-muted uk-margin-small-bottom"><?php echo htmlspecialchars($doctor['specialization']); ?></p>
                <p class="uk-text-bold uk-margin-remove"><?php echo htmlspecialchars($doctor['location']); ?></p>
                <p class="uk-margin-small-top"><span uk-icon="receiver" class="uk-margin-small-right"></span><?php echo htmlspecialchars($doctor['phone_no']); ?></p>
                <p class="uk-margin-remove-top uk-text-muted">
                    <span uk-icon="calendar" class="uk-margin-small-right"></span>
                    Available: <?php echo htmlspecialchars(str_replace(',', ', ', $doctor['available_days'])); ?>
                </p>
            </div>

            <!-- Booking Form -->
            <div class="booking-form-section">
                <?php if ($error_message): ?>
                    <div class="uk-alert-danger uk-margin-bottom" uk-alert>
                        <span uk-icon="icon: warning"></span> <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>

                <h3 class="uk-heading-line uk-text-center"><span>Complete Your Booking</span></h3>
                <form method="POST" class="uk-form-stacked uk-margin-large-top">
                    <div class="uk-child-width-1-2@s uk-grid" uk-grid>
                        <div>
                            <label class="uk-form-label">Full Name <span class="uk-text-danger">*</span></label>
                            <input class="uk-input uk-form-large" type="text" name="patient_name" 
                                   value="<?php echo htmlspecialchars($_POST['patient_name'] ?? ($_SESSION['user_name'] ?? '')); ?>" required>
                        </div>
                        <div>
                            <label class="uk-form-label">Email <span class="uk-text-danger">*</span></label>
                            <input class="uk-input uk-form-large" type="email" name="patient_email" 
                                   value="<?php echo htmlspecialchars($_POST['patient_email'] ?? ($_SESSION['user_email'] ?? '')); ?>" required>
                        </div>
                    </div>

                    <div class="uk-margin-large-top">
                        <label class="uk-form-label">Phone Number <span class="uk-text-danger">*</span></label>
                        <input class="uk-input uk-form-large" type="tel" name="patient_phone" 
                               value="<?php echo htmlspecialchars($_POST['patient_phone'] ?? ''); ?>" required>
                    </div>

                    <div class="uk-child-width-1-2@s uk-grid uk-margin-large-top" uk-grid>
                        <div>
                            <label class="uk-form-label">Preferred Date <span class="uk-text-danger">*</span></label>
                            <input class="uk-input uk-form-large" type="date" name="appointment_date" 
                                   value="<?php echo htmlspecialchars($_POST['appointment_date'] ?? ''); ?>" required>
                        </div>
                        <div>
                            <label class="uk-form-label">Preferred Time</label>
                            <select class="uk-select uk-form-large" name="preferred_time">
                                <option value="">Select Time</option>
                                <option value="9:00 AM" <?php echo ($_POST['preferred_time'] ?? '') == '9:00 AM' ? 'selected' : ''; ?>>9:00 AM</option>
                                <option value="10:00 AM" <?php echo ($_POST['preferred_time'] ?? '') == '10:00 AM' ? 'selected' : ''; ?>>10:00 AM</option>
                                <option value="2:00 PM" <?php echo ($_POST['preferred_time'] ?? '') == '2:00 PM' ? 'selected' : ''; ?>>2:00 PM</option>
                                <option value="4:00 PM" <?php echo ($_POST['preferred_time'] ?? '') == '4:00 PM' ? 'selected' : ''; ?>>4:00 PM</option>
                            </select>
                        </div>
                    </div>

                    <div class="uk-margin-large-top">
                        <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1" style="background-color: #32d296;">
                            <span uk-icon="icon: check"></span> Confirm & Book Appointment
                        </button>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit-icons.min.js"></script>

<?php include('footer.php'); ?>
</body>
</html>
