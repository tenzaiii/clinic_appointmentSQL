<?php 
ob_start();
session_start();
include('dbcon.php');

$error = $success = '';
$form_data = [
    'first_name' => '', 'last_name' => '', 'email' => '', 'phone_no' => '', 
    'dob' => '', 'password' => '', 'confirm_password' => ''
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture all form data
    $form_data['first_name'] = trim($_POST['first_name']);
    $form_data['last_name'] = trim($_POST['last_name']);
    $form_data['email'] = trim($_POST['email']);
    $form_data['phone_no'] = trim($_POST['phone_no']);
    $form_data['dob'] = $_POST['dob'];
    $form_data['password'] = $_POST['password'];
    $form_data['confirm_password'] = $_POST['confirm_password'];
    
    // Comprehensive validation
    $errors = [];
    
    if (empty($form_data['first_name'])) $errors[] = "First name is required";
    elseif (!preg_match("/^[a-zA-Z\s]+$/", $form_data['first_name'])) $errors[] = "First name must contain only letters";
    
    if (empty($form_data['last_name'])) $errors[] = "Last name is required";
    elseif (!preg_match("/^[a-zA-Z\s]+$/", $form_data['last_name'])) $errors[] = "Last name must contain only letters";
    
    if (empty($form_data['email'])) $errors[] = "Email is required";
    elseif (!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format";
    
    if (empty($form_data['phone_no'])) $errors[] = "Phone number is required";
    elseif (!preg_match("/^[0-9+\-\s\(\)]{10,15}$/", $form_data['phone_no'])) $errors[] = "Invalid phone number format";
    
    if (empty($form_data['dob'])) $errors[] = "Date of birth is required";
    elseif (strtotime($form_data['dob']) > strtotime('-13 years')) $errors[] = "Must be at least 13 years old";
    
    if (empty($form_data['password'])) $errors[] = "Password is required";
    elseif (strlen($form_data['password']) < 6) $errors[] = "Password must be at least 6 characters";
    elseif ($form_data['password'] !== $form_data['confirm_password']) $errors[] = "Passwords do not match";
    
    // Database checks
    if (empty($errors)) {
        $check_email = "SELECT id FROM clinic_acc WHERE email='" . 
                       mysqli_real_escape_string($connection, $form_data['email']) . "'";
        if (mysqli_num_rows(mysqli_query($connection, $check_email)) > 0) {
            $errors[] = "Email already registered";
        }
    }
    
    // Insert if no errors
    if (empty($errors)) {
        $first_name = mysqli_real_escape_string($connection, $form_data['first_name']);
        $last_name = mysqli_real_escape_string($connection, $form_data['last_name']);
        $email = mysqli_real_escape_string($connection, $form_data['email']);
        $phone_no = mysqli_real_escape_string($connection, $form_data['phone_no']);
        $dob = mysqli_real_escape_string($connection, $form_data['dob']);
        $hashed_pass = password_hash($form_data['password'], PASSWORD_DEFAULT);
        $id = time() % 100000;
        
        $query = "INSERT INTO clinic_acc (id, first_name, last_name, email, phone_no, dob, password) 
                  VALUES ('$id', '$first_name', '$last_name', '$email', '$phone_no', '$dob', '$hashed_pass')";
        
        if (mysqli_query($connection, $query)) {
            $success = "Account created successfully! Please <a href='login.php'>login</a>.";
        } else {
            $error = "Registration failed: " . mysqli_error($connection);
        }
    } else {
        $error = implode('<br>', $errors);
    }
    
    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyClinic - Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="signup-container">
        <?php if ($error): ?>
                <div class="uk-alert-danger" uk-alert>
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="uk-alert-success" uk-alert>
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>
            
        <form method="POST" action="" novalidate>
            <div class="signup-card uk-grid-collapse" uk-grid>
                <!-- Left Column - Branding -->
               <div class="uk-width-1-2@m login-left uk-visible@m" style="background: linear-gradient(rgba(0, 128, 255, 0.7), rgba(0, 255, 115, 0.7)),
            url('IMG/clinic1.png'); background-size: cover;
        background-position: center;"></div>

                <!-- Right Column - Signup Form -->
                <div class="uk-width-1-1 uk-width-1-2@m signup-right">
                    <a href="login.php" class="brand-logo">Easy<span>Clinic</span></a>

                    <h2 class="signup-title">Create Your Account</h2>
                    <p class="signup-subtitle">Join thousands of patients managing their health online</p>

                    <div class="name-row">
                        <div class="form-group name-col">
                            <label class="form-label" for="firstName">First Name</label>
                            <input type="text" id="firstName" name="first_name" class="form-control" placeholder="John"
                                value="<?php echo htmlspecialchars($form_data['first_name']); ?>" required>
                        </div>
                        <div class="form-group name-col">
                            <label class="form-label" for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="last_name" class="form-control" placeholder="Doe"
                                value="<?php echo htmlspecialchars($form_data['last_name']); ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control"
                            placeholder="your.email@example.com"
                            value="<?php echo htmlspecialchars($form_data['email']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone_no" class="form-control" placeholder="(123) 456-7890"
                            value="<?php echo htmlspecialchars($form_data['phone_no']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="dob">Date of Birth</label>
                        <input type="date" id="dob" name="dob" class="form-control"
                            value="<?php echo htmlspecialchars($form_data['dob']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <div class="password-container">
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Create a password" required>
                            <span class="password-toggle" id="togglePassword" uk-icon="icon: eye-slash"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="confirmPassword">Confirm Password</label>
                        <div class="password-container">
                            <input type="password" id="confirmPassword" name="confirm_password" class="form-control"
                                placeholder="Confirm your password" required>
                            <span class="password-toggle" id="toggleConfirmPassword" uk-icon="icon: eye-slash"></span>
                        </div>
                    </div>

                    <!-- <div class="terms-container">
                        <input type="checkbox" id="terms" name="terms" <?php echo $form_data['terms'] ? 'checked' : ''; ?> required>
                        <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy
                                Policy</a></label>
                    </div> -->

                    <button type="submit" name="register" class="btn-signup">Create Account</button>
        </form>

        <p class="login-link">
            Already have an account? <a href="login.php">Log in</a>
        </p>
    </div>
    
         



    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit-icons.min.js"></script>
    
    <script>
        // Real-time password confirmation
        document.getElementById('password').addEventListener('input', checkPasswordMatch);
        document.getElementById('confirm_password').addEventListener('input', checkPasswordMatch);
        
        function checkPasswordMatch() {
            const pass = document.getElementById('password').value;
            const confirm = document.getElementById('confirm_password').value;
            const confirmField = document.getElementById('confirm_password');
            
            if (confirm && pass !== confirm) {
                confirmField.setCustomValidity('Passwords do not match');
            } else {
                confirmField.setCustomValidity('');
            }
        }
        
        // Form submission loading
        document.querySelector('form').addEventListener('submit', function() {
            const btn = this.querySelector('button[type="submit"]');
            btn.innerHTML = '<span uk-spinner="ratio: 0.8"></span> Creating Account...';
            btn.disabled = true;
        });
    </script>

<?php ob_end_flush(); ?>
</body>
</html>
