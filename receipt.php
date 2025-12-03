<?php
// ✅ ALL redirects FIRST - NO OUTPUT YET
include('dbcon.php');
$user_id = $_SESSION['user_id'] ?? '';

if (!isset($_GET['id']) || empty($_GET['id']) || !$user_id) {
    header("Location: /my-appointments.php");
    exit();
}

$appointment_id = mysqli_real_escape_string($connection, $_GET['id']);
$query = "SELECT a.*, 
                 d.first_name as doctor_first, d.last_name as doctor_last, 
                 d.specialization, d.location, d.phone_no
          FROM appointments a 
          LEFT JOIN doctors d ON a.doctor_id = d.id 
          WHERE a.id = '$appointment_id' AND a.user_id = '" . mysqli_real_escape_string($connection, $user_id) . "'";

$result = mysqli_query($connection, $query);
$appointment = null;

if ($result && $row = mysqli_fetch_assoc($result)) {
    $appointment = $row;
} else {
    header("Location: /my-appointments.php");
    exit();
}
mysqli_close($connection);

// ✅ NOW safe to include header.php
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt #<?php echo str_pad($appointment['id'], 5, '0', STR_PAD_LEFT); ?> - EasyClinic</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/css/uikit.min.css" />
        <link rel="stylesheet" href="css/styles.css">

    <style>
        @media print {
            .no-print { display: none !important; }
            body { margin: 0; font-size: 12px; }
            .receipt-container { box-shadow: none; max-width: none; }
        }
        
        .receipt-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white; padding: 40px 0;
        }
        .receipt-container {
            max-width: 800px; margin: 0 auto; background: white;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1); border-radius: 20px;
            overflow: hidden;
        }
        .receipt-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 30px; text-align: center;
        }
        .receipt-body {
            padding: 40px; background: white;
        }
        .receipt-number {
            font-size: 36px; font-weight: 700; color: #667eea;
            text-align: center; margin-bottom: 10px;
        }
        .status-badge {
            display: inline-block; padding: 8px 16px; border-radius: 25px;
            font-weight: 600; font-size: 14px; margin: 10px 0;
        }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-confirmed { background: #d4edda; color: #155724; }
        .status-completed { background: #d1ecf1; color: #0c5460; }
        .status-cancelled { background: #f8d7da; color: #721c24; }
        .doctor-avatar {
            width: 80px; height: 80px; background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            color: white; font-size: 28px; font-weight: bold; margin: 0 auto 15px;
        }
        .clinic-info { background: #f8f9fa; padding: 20px; border-radius: 10px; margin-bottom: 30px; }
        .appointment-details { background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.08); }
        .print-section { text-align: center; margin-top: 40px; }
        .cancel-section { margin-top: 30px; text-align: center; }
    </style>
</head>
<body>
    <!-- Receipt Hero -->
    <section class="receipt-hero">
        <div class="uk-container">
            <h1 class="uk-heading-xlarge uk-margin-remove uk-text-center">Appointment Receipt</h1>
        </div>
    </section>

    <div class="uk-container">
        <div class="receipt-container uk-margin-large">
            <!-- Receipt Header -->
            <div class="receipt-header">
                <div class="uk-h3 uk-margin-remove">Easy<span style="color: #667eea;">Clinic</span></div>
                <p class="uk-text-muted uk-margin-small-top">Fast, easy, and hassle-free scheduling</p>
                <div class="receipt-number">#<?php echo str_pad($appointment['id'], 5, '0', STR_PAD_LEFT); ?></div>
            </div>

            <!-- Receipt Body -->
            <div class="receipt-body">
                <!-- Status -->
                <div class="status-badge status-<?php echo $appointment['status']; ?>">
                    <?php echo strtoupper($appointment['status']); ?> 
                    <span uk-icon="icon: <?php echo $appointment['status'] == 'confirmed' ? 'check' : ($appointment['status'] == 'cancelled' ? 'close' : 'clock'); ?>"></span>
                </div>

                <!-- Doctor Info -->
                <div class="uk-text-center uk-margin-large">
                    <div class="doctor-avatar">
                        <?php echo strtoupper(substr($appointment['doctor_first'], 0, 1) . substr($appointment['doctor_last'], 0, 1)); ?>
                    </div>
                    <h2 class="uk-heading-medium uk-margin-small-bottom">
                        Dr. <?php echo htmlspecialchars($appointment['doctor_first'] . ' ' . $appointment['doctor_last']); ?>
                    </h2>
                    <p class="uk-text-muted"><?php echo htmlspecialchars($appointment['specialization']); ?></p>
                </div>

                <!-- Clinic Info -->
                <div class="clinic-info">
                    <div class="uk-grid uk-child-width-1-3@s uk-flex-middle" uk-grid>
                        <div>
                            <span uk-icon="location" class="uk-margin-small-right"></span>
                            <strong><?php echo htmlspecialchars($appointment['location']); ?></strong>
                        </div>
                        <div>
                            <span uk-icon="receiver" class="uk-margin-small-right"></span>
                            <?php echo htmlspecialchars($appointment['phone_no']); ?>
                        </div>
                        <div class="uk-text-right">
                            <span uk-icon="clock" class="uk-margin-small-right"></span>
                            <?php echo htmlspecialchars(str_replace(',', ', ', $appointment['available_days'])); ?>
                        </div>
                    </div>
                </div>

                <!-- Patient Info -->
                <div class="uk-margin-large-top">
                    <h4 class="uk-heading-line uk-margin-small-bottom"><span>Patient Information</span></h4>
                    <div class="uk-grid uk-child-width-1-2@m" uk-grid>
                        <div><strong>Name:</strong> <?php echo htmlspecialchars($appointment['patient_name']); ?></div>
                        <div><strong>Email:</strong> <?php echo htmlspecialchars($appointment['patient_email']); ?></div>
                        <div class="uk-width-1-1"><strong>Phone:</strong> <?php echo htmlspecialchars($appointment['patient_phone']); ?></div>
                    </div>
                </div>

                <!-- Appointment Details -->
                <div class="appointment-details uk-margin-large-top">
                    <h4 class="uk-heading-line uk-margin-small-bottom"><span>Appointment Details</span></h4>
                    <div class="uk-grid uk-child-width-1-2@m uk-flex-middle" uk-grid>
                        <div>
                            <div class="uk-h4 uk-margin-remove"><?php echo date('l, F j, Y', strtotime($appointment['appointment_date'])); ?></div>
                            <p class="uk-text-muted uk-margin-small-top uk-margin-remove"><?php echo date('g:i A', strtotime($appointment['appointment_date'] . ' ' . ($appointment['preferred_time'] ?? '9:00 AM'))); ?></p>
                        </div>
                        <div class="uk-text-right">
                            <div class="uk-h4 uk-margin-remove">Booking Date</div>
                            <p class="uk-text-muted uk-margin-small-top uk-margin-remove"><?php echo date('M j, Y g:i A', strtotime($appointment['created_at'])); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons (Hidden on Print) -->
                <div class="print-section no-print">
                    <button onclick="window.print()" class="uk-button uk-button-primary uk-button-large uk-margin-right">
                        <span uk-icon="print"></span> Print Receipt
                    </button>
                    <a href="/my-appointments.php" class="uk-button uk-button-default uk-button-large">
                        <span uk-icon="arrow-left"></span> Back to Appointments
                    </a>
                </div>

                <!-- Cancel Button (Only for Pending Appointments) -->
                <?php if ($appointment['status'] == 'pending'): ?>
                <div class="cancel-section no-print uk-margin-large-top">
                    <button class="uk-button uk-button-danger uk-button-large uk-width-1-1" uk-toggle="target: #cancel-modal">
                        <span uk-icon="close"></span> Cancel Appointment
                    </button>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Cancel Confirmation Modal -->
    <?php if ($appointment['status'] == 'pending'): ?>
    <div id="cancel-modal" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <h3 class="uk-modal-title uk-margin-remove-bottom">Confirm Cancellation</h3>
            <p class="uk-margin-medium-top">Are you sure you want to cancel your appointment with <strong>Dr. <?php echo htmlspecialchars($appointment['doctor_first'] . ' ' . $appointment['doctor_last']); ?></strong> on <strong><?php echo date('F j, Y', strtotime($appointment['appointment_date'])); ?></strong>?</p>
            <div class="uk-margin-large-top uk-text-right">
                <a href="#" class="uk-button uk-button-default uk-button-small uk-margin-right" uk-close>Keep Appointment</a>
                <a href="/cancel-appointment.php?id=<?php echo $appointment['id']; ?>" class="uk-button uk-button-danger uk-button-small">Yes, Cancel</a>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit-icons.min.js"></script>
</body>
</html>
