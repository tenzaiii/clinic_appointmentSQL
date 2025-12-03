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
    <div class="uk-container uk-margin-large-top">
        <div class="uk-card uk-card-default uk-card-body uk-align-center">
            <h2 class="uk-text-center uk-heading-line uk-margin-large-bottom">Create Account</h2>
            
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
            
            <?php if (!$success): ?>
            <form method="POST" novalidate>
                <div class="name-row uk-margin-large">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="first_name">First Name</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="first_name" name="first_name" type="text" 
                                   placeholder="John" value="<?php echo htmlspecialchars($form_data['first_name']); ?>" required>
                        </div>
                    </div>
                    
                    <div class="uk-margin">
                        <label class="uk-form-label" for="last_name">Last Name</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="last_name" name="last_name" type="text" 
                                   placeholder="Doe" value="<?php echo htmlspecialchars($form_data['last_name']); ?>" required>
                        </div>
                    </div>
                </div>
                
                <div class="uk-margin">
                    <label class="uk-form-label" for="email">Email</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="email" name="email" type="email" 
                               placeholder="your@email.com" value="<?php echo htmlspecialchars($form_data['email']); ?>" required>
                    </div>
                </div>
                
                <div class="uk-margin">
                    <label class="uk-form-label" for="phone_no">Phone Number</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="phone_no" name="phone_no" type="tel" 
                               placeholder="123-456-7890" value="<?php echo htmlspecialchars($form_data['phone_no']); ?>" required>
                    </div>
                </div>
                
                <div class="uk-margin">
                    <label class="uk-form-label" for="dob">Date of Birth</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="dob" name="dob" type="date" 
                               value="<?php echo htmlspecialchars($form_data['dob']); ?>" required>
                    </div>
                </div>
                
                <div class="uk-margin">
                    <label class="uk-form-label" for="password">Password</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="password" name="password" type="password" 
                               placeholder="At least 6 characters" required>
                    </div>
                </div>
                
                <div class="uk-margin">
                    <label class="uk-form-label" for="confirm_password">Confirm Password</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="confirm_password" name="confirm_password" type="password" 
                               placeholder="Re-enter password" required>
                    </div>
                </div>
                
                <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-medium-top" type="submit">
                    Create Account
                </button>
            </form>
            
            <?php endif; ?>
            
            <p class="uk-text-center uk-margin-large-top">
                Already have account? <a href="login.php">Login</a>
            </p>
        </div>
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
