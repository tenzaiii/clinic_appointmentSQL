<?php
ob_start();
session_start();
include('dbcon.php');

$errors = [];
$success_message = '';
$form_data = [
    'first_name' => '',
    'last_name' => '',
    'email' => '',
    'phone_no' => '',
    'dob' => '',
    'password' => '',
    'terms' => false
];

// Handle Registration
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    // Capture form data
    $form_data['first_name'] = trim($_POST['first_name']);
    $form_data['last_name'] = trim($_POST['last_name']);
    $form_data['email'] = trim($_POST['email']);
    $form_data['phone_no'] = trim($_POST['phone_no']);
    $form_data['dob'] = $_POST['dob'];
    $form_data['password'] = $_POST['password'];
    $form_data['confirm_password'] = $_POST['confirm_password'];
    $form_data['terms'] = isset($_POST['terms']);

    // Validation
    if (empty($form_data['first_name']))
        $errors[] = "First name is required";
    elseif (!preg_match("/^[a-zA-Z\s]+$/", $form_data['first_name']))
        $errors[] = "First name must contain only letters";

    if (empty($form_data['last_name']))
        $errors[] = "Last name is required";
    elseif (!preg_match("/^[a-zA-Z\s]+$/", $form_data['last_name']))
        $errors[] = "Last name must contain only letters";

    if (empty($form_data['email']))
        $errors[] = "Email is required";
    elseif (!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL))
        $errors[] = "Invalid email format";

    if (empty($form_data['phone_no']))
        $errors[] = "Phone number is required";
    elseif (!preg_match("/^[0-9+\-\s\(\)]{10,15}$/", $form_data['phone_no']))
        $errors[] = "Invalid phone number format";

    if (empty($form_data['dob']))
        $errors[] = "Date of birth is required";
    elseif (strtotime($form_data['dob']) > strtotime('-13 years'))
        $errors[] = "Must be at least 13 years old";

    if (empty($form_data['password']))
        $errors[] = "Password is required";
    elseif (strlen($form_data['password']) < 6)
        $errors[] = "Password must be at least 6 characters";
    elseif ($form_data['password'] !== $form_data['confirm_password'])
        $errors[] = "Passwords do not match";

    if (!$form_data['terms'])
        $errors[] = "You must accept the Terms of Service";

    // Email uniqueness check
    if (empty($errors)) {
        $check_email = "SELECT id FROM clinic_acc WHERE email='" . mysqli_real_escape_string($connection, $form_data['email']) . "'";
        $email_result = mysqli_query($connection, $check_email);
        if (mysqli_num_rows($email_result) > 0) {
            $errors[] = "Email already registered";
        }
    }

    // Create account if no errors
    if (empty($errors)) {
        $first_name = mysqli_real_escape_string($connection, $form_data['first_name']);
        $last_name = mysqli_real_escape_string($connection, $form_data['last_name']);
        $email = mysqli_real_escape_string($connection, $form_data['email']);
        $phone_no = mysqli_real_escape_string($connection, $form_data['phone_no']);
        $dob = mysqli_real_escape_string($connection, $form_data['dob']);
        $password = password_hash($form_data['password'], PASSWORD_DEFAULT);

        // Generate random 5-digit ID or use AUTO_INCREMENT
        $random_id_query = "SELECT FLOOR(RAND() * 90000 + 10000) as id";
        $id_result = mysqli_query($connection, $random_id_query);
        $random_id = mysqli_fetch_assoc($id_result)['id'];

        $query = "INSERT INTO clinic_acc (id, first_name, last_name, email, phone_no, dob, password) 
                  VALUES ('$random_id', '$first_name', '$last_name', '$email', '$phone_no', '$dob', '$password')";

        if (mysqli_query($connection, $query)) {
            ob_end_clean();
            header("Location: login.php?message=Account created successfully! Please login.");
            exit();
        } else {
            $errors[] = "Registration failed: " . mysqli_error($connection);
        }
    }
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - EasyClinic</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="signup-container">
        <?php if (!empty($errors)): ?>
            <div class="uk-alert uk-alert-danger uk-margin-medium-bottom" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <ul class="uk-margin-remove">
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ($success_message): ?>
            <div class="uk-alert uk-alert-success uk-margin-medium-bottom" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <?php echo htmlspecialchars($success_message); ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="" novalidate>
            <div class="signup-card uk-grid-collapse" uk-grid>
                <!-- Left Column - Branding -->
                <div class="uk-width-1-2@m signup-left uk-visible@m">

                </div>

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

                    <div class="terms-container">
                        <input type="checkbox" id="terms" name="terms" <?php echo $form_data['terms'] ? 'checked' : ''; ?> required>
                        <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy
                                Policy</a></label>
                    </div>

                    <button type="submit" name="register" class="btn-signup">Create Account</button>
        </form>

        <p class="login-link">
            Already have an account? <a href="login.php">Log in</a>
        </p>
    </div>
    
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit-icons.min.js"></script>

    <script>
        // Password toggles
        document.querySelectorAll('.password-toggle').forEach(toggle => {
            toggle.onclick = function () {
                const input = this.parentElement.querySelector('input');
                if (input.type === 'password') {
                    input.type = 'text';
                    this.setAttribute('uk-icon', 'icon: eye');
                } else {
                    input.type = 'password';
                    this.setAttribute('uk-icon', 'icon: eye-slash');
                }
            };
        });

        // Form submission loading
        document.querySelector('form').onsubmit = function () {
            document.querySelector('.btn-signup').innerHTML = '<span uk-spinner="ratio: 0.9"></span> Creating...';
            document.querySelector('.btn-signup').disabled = true;
        };

        // Real-time password match check
        document.getElementById('password').addEventListener('input', checkPasswordMatch);
        document.getElementById('confirmPassword').addEventListener('input', checkPasswordMatch);

        function checkPasswordMatch() {
            const pass = document.getElementById('password').value;
            const confirm = document.getElementById('confirmPassword').value;
            const confirmField = document.getElementById('confirmPassword');

            if (confirm && pass !== confirm) {
                confirmField.classList.add('error');
                confirmField.style.borderColor = '#dc3545';
            } else {
                confirmField.classList.remove('error');
                confirmField.style.borderColor = '#e9ecef';
            }
        }
    </script>

    <?php ob_end_flush(); ?>
</body>

</html>