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
                header("Location: dashboard.php");
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

    <div class="uk-container uk-margin-large-top">
        <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-align-center" style="box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
            <h2 class="uk-text-center uk-heading-line">Login</h2>
            
            <?php if ($error): ?>
                <div class="uk-alert-danger" uk-alert>
                    <span><?php echo $error; ?></span>
                </div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="uk-margin">
                    <label class="uk-form-label" for="email">Email</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="email" name="email" type="email" placeholder="your@email.com" 
                               value="<?php echo htmlspecialchars($email); ?>" required>
                    </div>
                </div>
                
                <div class="uk-margin">
                    <label class="uk-form-label" for="password">Password</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="password" name="password" type="password" placeholder="Password" required>
                    </div>
                </div>
                
                <button class="uk-button uk-button-primary uk-width-1-1" type="submit">Login</button>
            </form>
            
            <p class="uk-text-center uk-margin-top">
                <a href="signup.php">Create Account</a>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit-icons.min.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>
