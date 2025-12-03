<?php 
ob_start();
session_start();
include('dbcon.php');

$error = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($connection, trim($_POST['email']));
    $pass = trim($_POST['password']);
    
    if (empty($email) || empty($pass)) {
        $error = "All fields are required";
    } else {
        $query = "SELECT id, first_name, email, password FROM clinic_acc WHERE email='$email'";
        $result = mysqli_query($connection, $query);
        
        if ($result && $user = mysqli_fetch_assoc($result)) {
            if (password_verify($pass, $user['password']) || $pass === $user['password']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['first_name'];
                $_SESSION['user_email'] = $user['email'];
                
                mysqli_close($connection);
                ob_end_clean();
                header("Location: index.php");
                exit();
            } else {
                $error = "Invalid email or password";
            }
        } else {
            $error = "Invalid email or password";
        }
    }
    mysqli_close($connection);
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
        <?php if ($error): ?>
                <div class="uk-alert-danger" uk-alert>
                    <span><?php echo $error; ?></span>
                </div>
            <?php endif; ?>
        
        <div class="login-card uk-grid-collapse" uk-grid>
            <div class="uk-width-1-2@m login-left uk-visible@m">
                <h1 class="uk-margin-remove-bottom">Welcome to</h1>
                <h1 class="uk-heading-line uk-margin-remove">Easy<span>Clinic</span></h1>
                <p class="uk-margin-top">Fast, easy, and hassle-free scheduling</p>
            </div>

            <div class="uk-width-1-1 uk-width-1-2@m login-right">
                <a href="index.php" class="brand-logo">Easy<span>Clinic</span></a>
                <h2 class="login-title">Welcome Back!</h2>
                <p class="login-subtitle">Sign in to continue to your account</p>

                <form method="POST" action="">
                    <div class="form-group">
                        <label class="form-label" for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" 
                               placeholder="your.email@example.com" value="<?php echo htmlspecialchars($email); ?>" required>
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
</body>
</html>
<?php ob_end_flush(); ?>
