<?php 
// ✅ FIX #1: Start output buffering at the VERY TOP
ob_start();
include('header.php'); 
include('dbcon.php'); 
?>

<!-- Main Content -->
<main class="uk-section uk-section-default uk-padding-large">
    <div class="uk-container">
        <h1 class="uk-heading-divider uk-text-center uk-margin-large-bottom">Clinic Database Management</h1>
        
        <!-- Action Messages -->
        <?php if(isset($_GET['message'])): ?>
            <div class="uk-alert uk-alert-<?php echo $_GET['type'] ?? 'primary'; ?> uk-margin-medium-bottom">
                <?php echo htmlspecialchars($_GET['message']); ?>
            </div>
        <?php endif; ?>

        <!-- Add User Button -->
        <div class="uk-text-center uk-margin-large">
            <button class="uk-button uk-button-primary uk-button-large" uk-toggle="target: #add-modal">➕ Add New Patient</button>
        </div>

        <!-- Patients Table -->
        <div class="uk-card uk-card-default uk-card-body uk-box-shadow-large">
            <div class="uk-overflow-auto">
                <table class="uk-table uk-table-hover uk-table-middle uk-table-divider uk-table-responsive">
                    <thead class="uk-background-muted">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM clinic_acc ORDER BY id ASC";
                        $result = mysqli_query($connection, $query);
                        
                        if (!$result) {
                            echo "<tr><td colspan='6' class='uk-text-center uk-text-muted'>Error loading data</td></tr>";
                        } else {
                            if (mysqli_num_rows($result) == 0) {
                                echo "<tr><td colspan='6' class='uk-text-center uk-text-muted'>No patients found</td></tr>";
                            } else {
                                while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                    <tr>
                                        <td class="uk-text-nowrap"><?php echo $row['id']; ?></td>
                                        <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                                        <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                                        <td><?php echo htmlspecialchars($row['phone_no']); ?></td>
                                        <td>
                                            <div class="uk-flex uk-flex-middle">
                                                <button class="uk-button uk-button-text uk-button-small edit-btn" 
                                                        uk-toggle="target: #edit-modal-<?php echo $row['id']; ?>"
                                                        uk-tooltip="Edit">
                                                    <span uk-icon="icon: pencil"></span>
                                                </button>
                                                <a href="?delete_id=<?php echo $row['id']; ?>" 
                                                   class="uk-button uk-button-text uk-button-danger uk-button-small uk-margin-small-left"
                                                   uk-tooltip="Delete"
                                                   onclick="return confirm('Are you sure you want to delete this patient?')">
                                                    <span uk-icon="icon: trash"></span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal for each row -->
                                    <div id="edit-modal-<?php echo $row['id']; ?>" uk-modal>
                                        <div class="uk-modal-dialog uk-modal-body">
                                            <button class="uk-modal-close-default" type="button" uk-close></button>
                                            <h3 class="uk-modal-title">Edit Patient #<?php echo $row['id']; ?></h3>
                                            <form action="" method="POST">
                                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                                <div class="uk-margin">
                                                    <label class="uk-form-label">First Name</label>
                                                    <div class="uk-form-controls">
                                                        <input class="uk-input" name="first_name" value="<?php echo htmlspecialchars($row['first_name']); ?>" required>
                                                    </div>
                                                </div>
                                                <div class="uk-margin">
                                                    <label class="uk-form-label">Last Name</label>
                                                    <div class="uk-form-controls">
                                                        <input class="uk-input" name="last_name" value="<?php echo htmlspecialchars($row['last_name']); ?>" required>
                                                    </div>
                                                </div>
                                                <div class="uk-margin">
                                                    <label class="uk-form-label">Email</label>
                                                    <div class="uk-form-controls">
                                                        <input class="uk-input" name="email" type="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                                                    </div>
                                                </div>
                                                <div class="uk-margin">
                                                    <label class="uk-form-label">Phone</label>
                                                    <div class="uk-form-controls">
                                                        <input class="uk-input" name="phone_no" value="<?php echo htmlspecialchars($row['phone_no']); ?>" required>
                                                    </div>
                                                </div>
                                                <div class="uk-margin uk-text-right">
                                                    <button class="uk-button uk-button-default uk-modal-close uk-margin-small-right" type="button">Cancel</button>
                                                    <button class="uk-button uk-button-primary" name="update_patient" type="submit">Update Patient</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Add New Patient Modal -->
<div id="add-modal" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h3 class="uk-modal-title">Add New Patient</h3>
        <form action="" method="POST">
            <div class="uk-margin">
                <label class="uk-form-label" for="first_name">First Name</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="first_name" name="first_name" type="text" placeholder="Enter first name" required>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="last_name">Last Name</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="last_name" name="last_name" type="text" placeholder="Enter last name" required>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="email">Email</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="email" name="email" type="email" placeholder="Enter email" required>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="phone_no">Phone Number</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="phone_no" name="phone_no" type="tel" placeholder="Enter phone number" required>
                </div>
            </div>
            <div class="uk-margin uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close uk-margin-small-right" type="button">Cancel</button>
                <button class="uk-button uk-button-primary" name="add_patient" type="submit">Add Patient</button>
            </div>
        </form>
    </div>
</div>

<?php
// ✅ FIX #2: Handle ALL operations BEFORE any HTML output
if (isset($_GET['delete_id'])) {
    $delete_id = mysqli_real_escape_string($connection, $_GET['delete_id']);
    $delete_query = "DELETE FROM clinic_acc WHERE id='$delete_id'";
    
    if (mysqli_query($connection, $delete_query)) {
        ob_end_clean(); // Clear buffer before redirect
        header("Location: " . $_SERVER['PHP_SELF'] . "?message=Patient deleted successfully&type=success");
    } else {
        ob_end_clean();
        header("Location: " . $_SERVER['PHP_SELF'] . "?message=Error deleting patient&type=danger");
    }
    exit();
}

if (isset($_POST['add_patient'])) {
    $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone_no = mysqli_real_escape_string($connection, $_POST['phone_no']);
    
    $check_email = "SELECT id FROM clinic_acc WHERE email='$email'";
    $email_result = mysqli_query($connection, $check_email);
    
    if (mysqli_num_rows($email_result) > 0) {
        ob_end_clean();
        header("Location: " . $_SERVER['PHP_SELF'] . "?message=Email already exists&type=warning");
    } else {
        $query = "INSERT INTO clinic_acc (first_name, last_name, email, phone_no) VALUES ('$first_name', '$last_name', '$email', '$phone_no')";
        if (mysqli_query($connection, $query)) {
            ob_end_clean();
            header("Location: " . $_SERVER['PHP_SELF'] . "?message=Patient added successfully&type=success");
        } else {
            ob_end_clean();
            header("Location: " . $_SERVER['PHP_SELF'] . "?message=Error adding patient&type=danger");
        }
    }
    exit();
}

if (isset($_POST['update_patient'])) {
    $id = (int)$_POST['edit_id'];
    $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone_no = mysqli_real_escape_string($connection, $_POST['phone_no']);
    
    $query = "UPDATE clinic_acc SET first_name='$first_name', last_name='$last_name', email='$email', phone_no='$phone_no' WHERE id='$id'";
    if (mysqli_query($connection, $query)) {
        ob_end_clean();
        header("Location: " . $_SERVER['PHP_SELF'] . "?message=Patient updated successfully&type=success");
    } else {
        ob_end_clean();
        header("Location: " . $_SERVER['PHP_SELF'] . "?message=Error updating patient&type=danger");
    }
    exit();
}

mysqli_close($connection);
?>

<?php 
// ✅ FIX #3: End output buffering at the bottom
ob_end_flush();
include('footer.php'); 
?>
