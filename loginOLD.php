<?php 
// 1. Start Session and Output Buffering
ob_start();
session_start();

// 2. Configuration & Error Handling
// Always log errors, but only display them in a dev environment.
// For production, ini_set('display_errors', 0); is recommended.
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 3. Initialize Variables
$login_error = '';
$email_value = '';
$success_message = '';

// Check if user is already logged in (optional but good practice)
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Handle GET success message from successful login redirect
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $success_message = 'Login successful! Welcome back.';
}

// 4. Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $raw_email = trim($_POST['email']);
    $raw_password = $_POST['password']; // Do not trim password, leading/trailing spaces matter.
    
    $email_value = $raw_email;
    
    // Basic validation
    if (empty($raw_email) || empty($raw_password)) {
        $login_error = "Please fill in all fields.";
    } elseif (!filter_var($raw_email, FILTER_VALIDATE_EMAIL)) {
        $login_error = "Please enter a valid email address.";
    } else {
        // Include DB connection and execute secure logic
        include('dbcon.php'); // Assumes this file connects to $connection

        // --- Use Prepared Statements for Security ---
        $query = "SELECT id, first_name, email, password FROM clinic_acc WHERE email = ? LIMIT 1";
        
        $stmt = mysqli_prepare($connection, $query);
        
        if (!$stmt) {
            $login_error = "Database preparation error: " . mysqli_error($connection);
        } else {
            // Bind the email parameter
            mysqli_stmt_bind_param($stmt, "s", $raw_email);
            
            // Execute the statement
            mysqli_stmt_execute($stmt);
            
            // Get the result set
            $result = mysqli_stmt_get_result($stmt);
            
            if ($result && mysqli_num_rows($result) === 1) {
                $user = mysqli_fetch_assoc($result);
                $stored_hash = $user['password'];
                
                // --- CRITICAL FIX: Only use password_verify() for security ---
                // This checks the raw password against the stored HASH.
                if (password_verify($raw_password, $stored_hash)) {
                    // Password is correct!
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['first_name'];
                    $_SESSION['user_email'] = $user['email'];
                    
                    // Close DB connection and clean buffer before redirect
                    mysqli_stmt_close($stmt);
                    mysqli_close($connection);
                    ob_end_clean();
                    
                    // Redirect to the dashboard
                    header("Location: index.php?success=1");
                    exit();
                } else {
                    // Invalid password for this email
                    $login_error = "Invalid email or password.";
                }
            } else {
                // Email not found in database
                $login_error = "Invalid email or password.";
            }
            
            // Close statement
            mysqli_stmt_close($stmt);
        }
        
        // Close connection if it was opened
        if (isset($connection)) {
            mysqli_close($connection);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyClinic - Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="login-container">
        <?php if ($success_message): ?>
            <div class="uk-alert uk-alert-success uk-margin-small-bottom" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <span><?php echo htmlspecialchars($success_message); ?></span>
            </div>
        <?php endif; ?>

        <?php if(isset($_GET["message"])): ?>
            <div class="uk-alert uk-alert-danger uk-margin-small-bottom" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <span><?php echo htmlspecialchars($_GET["message"]); ?></span>
            </div>
        <?php endif; ?>
        
        <div class="login-card uk-grid-collapse" uk-grid>
            <div class="uk-width-1-2@m login-left uk-visible@m">
                <h1 class="uk-margin-remove-bottom">Welcome to</h1>
                <h1 class="uk-heading-line uk-margin-remove">Easy<span>Clinic</span></h1>
                <p class="uk-margin-top">Fast, easy, and hassle-free scheduling</p>
            </div>

            <div class="uk-width-1-1 uk-width-1-2@m login-right">
                <a href="index.html" class="brand-logo">Easy<span>Clinic</span></a>
                <h2 class="login-title">Welcome Back!</h2>
                <p class="login-subtitle">Sign in to continue to your account</p>

                <?php if ($login_error): ?>
                    <div class="uk-alert uk-alert-danger uk-margin-small-bottom" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <span><?php echo htmlspecialchars($login_error); ?></span>
                    </div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="form-group">
                        <label class="form-label" for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" 
                               placeholder="your.email@example.com" value="<?php echo htmlspecialchars($email_value); ?>" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <div class="password-container">
                            <input type="password" id="password" name="password" class="form-control" 
                                   placeholder="Enter your password" autocomplete="current-password" required>
                            <span class="password-toggle" id="togglePassword" uk-icon="icon: eye-slash"></span>
                        </div>
                    </div>

                    <div class="remember-forgot">
                        <label class="remember-me">
                            <input type="checkbox" name="remember">
                            <span>Remember me</span>
                        </label>
                        <a href="#" class="forgot-password">Forgot Password?</a>
                    </div>

                    <button type="submit" name="login" class="btn-login">Sign In</button>
                </form>

                <p class="signup-link">
                    Don't have an account? <a href="signup.php">Sign up</a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit-icons.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password toggle
            document.getElementById('togglePassword').onclick = function() {
                const pwd = document.getElementById('password');
                const icon = this.getAttribute('uk-icon');
                if (pwd.type === 'password') {
                    pwd.type = 'text';
                    this.setAttribute('uk-icon', 'icon: eye');
                } else {
                    pwd.type = 'password';
                    this.setAttribute('uk-icon', 'icon: eye-slash');
                }
            };

            // Submit loading
            document.querySelector('form').onsubmit = function() {
                const btn = document.querySelector('.btn-login');
                // Ensure the button is enabled before submission if validation fails
                if(this.checkValidity()) { 
                    btn.innerHTML = '<span uk-spinner="ratio: 0.9"></span> Signing In...';
                    btn.disabled = true;
                }
            };
        });
    </script>

<?php ob_end_flush(); ?>
</body>
</html>