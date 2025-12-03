<?php
include("header.php");
include('dbcon.php');

$user_id = $_SESSION['user_id'] ?? '';
$appointments = [];
$no_appointments = false;

if ($user_id) {
    // ✅ JOIN doctors table for full details
    $query = "SELECT a.*, 
                     d.first_name as doctor_first, d.last_name as doctor_last, 
                     d.specialization, d.location, d.phone_no
              FROM appointments a 
              LEFT JOIN doctors d ON a.doctor_id = d.id 
              WHERE a.user_id = '" . mysqli_real_escape_string($connection, $user_id) . "'
              ORDER BY a.appointment_date ASC, a.created_at DESC";
    
    $result = mysqli_query($connection, $query);
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $appointments[] = $row;
        }
        $no_appointments = empty($appointments);
    }
} else {
    header("Location: /login.php");
    exit();
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Appointments - EasyClinic</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .appointments-hero {
 background: linear-gradient(rgba(0, 128, 255, 0.7), rgba(0, 255, 115, 0.7)),
    url('IMG/hospital_2.png') center/cover no-repeat;            color: white; padding: 60px 0;
        }
        .appointment-card {
            transition: all 0.3s; border-radius: 15px;
        }
        .appointment-card:hover {
            transform: translateY(-2px); box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        .status-badge {
            padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;
        }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-confirmed { background: #d1ecf1; color: #0c5460; }
        .status-completed { background: #d4edda; color: #155724; }
        .status-cancelled { background: #f8d7da; color: #721c24; }
        .no-appointments {
            text-align: center; padding: 80px 20px; color: #6c757d;
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="appointments-hero">
        <div class="uk-container">
            <h1 class="uk-heading-xlarge uk-margin-remove">My Appointments</h1>
            <p class="uk-text-lead uk-margin-large-top">Manage your upcoming and past appointments</p>
        </div>
    </section>

    <div class="uk-container uk-margin-large">
        <?php if ($no_appointments): ?>
            <!-- No Appointments -->
            <div class="no-appointments">
                <span uk-icon="icon: calendar; ratio: 4" class="uk-margin-bottom"></span>
                <h2 class="uk-heading-medium uk-margin-large-top uk-margin-small-bottom">No Appointments Found</h2>
                <p class="uk-text-muted uk-margin-large-bottom">Book your first appointment with our specialists!</p>
                <a href="/find-doctors.php" class="uk-button uk-button-primary uk-button-large">
                    <span uk-icon="icon: search"></span> Find Doctors
                </a>
            </div>
        <?php else: ?>
            <!-- Appointments List -->
            <div class="uk-margin">
                <div class="uk-flex uk-flex-between uk-flex-middle">
                    <h3 class="uk-heading-line"><span><?php echo count($appointments); ?> Appointment<?php echo count($appointments) > 1 ? 's' : ''; ?></span></h3>
                    <span class="uk-text-muted uk-text-small">Sorted by date</span>
                </div>
            </div>

            <div class="uk-grid uk-child-width-1-1 uk-grid-collapse" uk-grid>
                <?php foreach ($appointments as $appointment): ?>
                <div>
                    <div class="appointment-card uk-card uk-card-default uk-card-body uk-padding-large ">
                        <div class="uk-grid-divider uk-grid uk-child-width-expand@s uk-flex-middle" uk-grid>
                            <!-- Doctor Info -->
                            <div class="uk-width-1-4@s">
                                <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 20px; margin-bottom: 10px;">
                                    <?php echo strtoupper(substr($appointment['doctor_first'], 0, 1) . substr($appointment['doctor_last'], 0, 1)); ?>
                                </div>
                                <h4 class="uk-margin-small-bottom uk-heading-small">
                                    Dr. <?php echo htmlspecialchars($appointment['doctor_first'] . ' ' . $appointment['doctor_last']); ?>
                                </h4>
                                <p class="uk-text-muted uk-margin-remove"><?php echo htmlspecialchars($appointment['specialization']); ?></p>
                            </div>

                            <!-- Appointment Details -->
                            <div class="uk-width-expand@s">
                                <div class="uk-child-width-1-2@s uk-flex-middle uk-grid" uk-grid>
                                    <div>
                                        <p class="uk-text-muted uk-margin-remove">Date</p>
                                        <p class="uk-text-bold uk-margin-small-top uk-heading-small"><?php echo date('M j, Y', strtotime($appointment['appointment_date'])); ?></p>
                                    </div>
                                    <div>
                                        <p class="uk-text-muted uk-margin-remove">Time</p>
                                        <p class="uk-text-bold uk-margin-small-top"><?php echo $appointment['preferred_time'] ?: 'TBD'; ?></p>
                                    </div>
                                    <div>
                                        <p class="uk-text-muted uk-margin-remove">Location</p>
                                        <p class="uk-margin-small-top"><?php echo htmlspecialchars($appointment['location']); ?></p>
                                    </div>
                                    <div>
                                        <p class="uk-text-muted uk-margin-remove">Phone</p>
                                        <p class="uk-margin-small-top uk-text-small"><?php echo htmlspecialchars($appointment['patient_phone']); ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Status & Actions -->
                            <div class="uk-width-auto@s uk-text-right">
                                <div class="status-badge status-<?php echo $appointment['status']; ?>">
                                    <?php echo ucfirst($appointment['status']); ?>
                                </div>
                                <div class="uk-margin-small-top">
                                    <?php if ($appointment['status'] == 'pending'): ?>
                                        <a href="#" class="uk-button uk-button-default uk-button-small" uk-toggle="target: #cancel-modal-<?php echo $appointment['id']; ?>">
                                            Cancel
                                        </a>
                                    <?php endif; ?>
                                    <a href="/CLINIC_APPOINTMENTSQL/receipt.php" class="uk-button uk-button-text uk-button-small">
                                        <span uk-icon="file-text"></span> Receipt
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cancel Confirmation Modal -->
                <div id="cancel-modal-<?php echo $appointment['id']; ?>" class="uk-flex-top" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                        <h3 class="uk-modal-title">Cancel Appointment</h3>
                        <p>Are you sure you want to cancel your appointment with Dr. <?php echo htmlspecialchars($appointment['doctor_first'] . ' ' . $appointment['doctor_last']); ?> on <?php echo $appointment['appointment_date']; ?>?</p>
                        <div class="uk-margin-top">
                            <a href="/cancel-appointment.php?id=<?php echo $appointment['id']; ?>" class="uk-button uk-button-danger uk-button-small uk-margin-right">Yes, Cancel</a>
                            <a href="/CLINIC_APPOINTMENTSQL/my-appointments.php" class="uk-button uk-button-default uk-button-small" uk-close>Keep Appointment</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit-icons.min.js"></script>
</body>
</html>
