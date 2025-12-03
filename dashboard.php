<?php 
// ✅ FIXED: ALL logic FIRST - Output buffering + proper structure
ob_start();
include('header.php'); 
include('dbcon.php'); 

// Handle Actions FIRST (before any HTML)
if (isset($_GET['approve_id'])) {
    $approve_id = mysqli_real_escape_string($connection, $_GET['approve_id']);
    $update_query = "UPDATE appointments SET status='confirmed' WHERE id='$approve_id'";
    if (mysqli_query($connection, $update_query)) {
        ob_end_clean();
        header("Location: " . $_SERVER['PHP_SELF'] . "?message=Appointment approved successfully&type=success");
        exit();
    }
}

if (isset($_GET['cancel_id'])) {
    $cancel_id = mysqli_real_escape_string($connection, $_GET['cancel_id']);
    $update_query = "UPDATE appointments SET status='cancelled' WHERE id='$cancel_id'";
    if (mysqli_query($connection, $update_query)) {
        ob_end_clean();
        header("Location: " . $_SERVER['PHP_SELF'] . "?message=Appointment cancelled&type=warning");
        exit();
    }
}

// Fetch ALL appointments
$query = "SELECT a.*, 
                 d.first_name as doctor_first, d.last_name as doctor_last, 
                 d.specialization,
                 p.first_name as patient_first, p.last_name as patient_last
          FROM appointments a 
          LEFT JOIN doctors d ON a.doctor_id = d.id
          LEFT JOIN clinic_acc p ON a.patient_email = p.email
          ORDER BY a.appointment_date ASC, a.created_at DESC";
$result = mysqli_query($connection, $query);
$appointments = [];
while ($row = mysqli_fetch_assoc($result)) {
    $appointments[] = $row;
}
mysqli_close($connection);
?>

<!-- Main Content -->
<main class="uk-section uk-section-default uk-padding-large">
    <div class="uk-container">
        <h1 class="uk-heading-divider uk-text-center uk-margin-large-bottom">Appointments Approval Dashboard</h1>
        
        <!-- Action Messages -->
        <?php if(isset($_GET['message'])): ?>
            <div class="uk-alert uk-alert-<?php echo $_GET['type'] ?? 'primary'; ?> uk-margin-medium-bottom" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <?php echo htmlspecialchars($_GET['message']); ?>
            </div>
        <?php endif; ?>

        <!-- Stats Cards -->
        <div class="uk-grid uk-child-width-1-3@m uk-child-width-1-2@s uk-margin-large-bottom" uk-grid>
            <div>
                <div class="uk-card uk-card-default uk-card-body uk-text-center">
                    <h3 class="uk-heading-medium uk-margin-remove"><?php echo count(array_filter($appointments, fn($a) => $a['status'] == 'pending')); ?></h3>
                    <p class="uk-text-muted">Pending</p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-primary uk-card-body uk-text-center">
                    <h3 class="uk-heading-medium uk-margin-remove"><?php echo count(array_filter($appointments, fn($a) => $a['status'] == 'confirmed')); ?></h3>
                    <p class="uk-text-muted uk-light">Confirmed</p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-danger uk-card-body uk-text-center">
                    <h3 class="uk-heading-medium uk-margin-remove"><?php echo count(array_filter($appointments, fn($a) => $a['status'] == 'cancelled')); ?></h3>
                    <p class="uk-text-muted uk-light">Cancelled</p>
                </div>
            </div>
        </div>

        <!-- Appointments Table -->
        <div class="uk-card uk-card-default uk-card-body uk-box-shadow-large">
            <div class="uk-overflow-auto">
                <table class="uk-table uk-table-hover uk-table-middle uk-table-divider uk-table-responsive">
                    <thead class="uk-background-muted">
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($appointments)): ?>
                            <tr>
                                <td colspan="8" class="uk-text-center uk-text-muted uk-padding-large">
                                    <span uk-icon="icon: calendar; ratio: 2" class="uk-margin-right"></span>
                                    No appointments found
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($appointments as $appointment): ?>
                            <tr class="uk-animation-slide-bottom-medium">
                                <td class="uk-text-nowrap">
                                    <strong><?php echo date('M j, Y', strtotime($appointment['appointment_date'])); ?></strong>
                                </td>
                                <td><?php echo $appointment['preferred_time'] ?: 'TBD'; ?></td>
                                <td>
                                    <?php echo htmlspecialchars(($appointment['patient_first'] ?? '') . ' ' . ($appointment['patient_last'] ?? $appointment['patient_name'])); ?>
                                    <br><small class="uk-text-muted"><?php echo htmlspecialchars($appointment['patient_email']); ?></small>
                                </td>
                                <td>
                                    Dr. <?php echo htmlspecialchars($appointment['doctor_first'] . ' ' . $appointment['doctor_last']); ?>
                                    <br><small class="uk-text-muted"><?php echo htmlspecialchars($appointment['specialization']); ?></small>
                                </td>
                                <td><?php echo htmlspecialchars($appointment['patient_phone']); ?></td>
                                <td>
                                    <span class="uk-label uk-label-<?php 
                                        echo $appointment['status'] == 'pending' ? 'warning' : 
                                             ($appointment['status'] == 'confirmed' ? 'success' : 'danger');
                                    ?>">
                                        <?php echo ucfirst($appointment['status']); ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="uk-flex uk-flex-middle uk-flex-nowrap" style="gap: 5px;">
                                        <?php if ($appointment['status'] == 'pending'): ?>
                                            <a href="?approve_id=<?php echo $appointment['id']; ?>" 
                                               class="uk-button uk-button-primary uk-button-small" 
                                               uk-tooltip="Approve"
                                               onclick="return confirm('Approve this appointment?')">
                                                <span uk-icon="check"></span>
                                            </a>
                                            <a href="?cancel_id=<?php echo $appointment['id']; ?>" 
                                               class="uk-button uk-button-danger uk-button-small" 
                                               uk-tooltip="Cancel"
                                               onclick="return confirm('Cancel this appointment?')">
                                                <span uk-icon="close"></span>
                                            </a>
                                        <?php else: ?>
                                            <span class="uk-badge uk-badge-secondary">No Action</span>
                                        <?php endif; ?>
                                        <!-- <a href="/CLINIC_APPOINTMENTSQL/receipt.php?id=<?php echo $appointment['id']; ?>" 
                                           class="uk-button uk-button-text uk-button-small" 
                                           uk-tooltip="View Receipt">
                                            <span uk-icon="file-text"></span>
                                        </a> -->
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php 
// ✅ End output buffering
ob_end_flush();
include('footer.php'); 
?>
