<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast, easy, and hassle-free scheduling for all your medical needs - EasyClinic</title>
    <!-- CDNs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php 
    session_start();
    $is_logged_in = isset($_SESSION['user_id']);
    $user_name = $is_logged_in ? $_SESSION['user_name'] : '';
    ?>

    <!-- Top Contact Bar -->
    <div class="contact-info">
        <div class="uk-container">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-expand">
                    <span uk-icon="receiver"></span> Hotline: (02) 8988-1000
                    <span class="uk-margin-left"><span uk-icon="mail"></span> info@easyclinic.com</span>
                </div>
                <div class="uk-width-auto">
                    <a href="#" class="uk-margin-small-right" uk-icon="facebook"></a>
                    <a href="#" class="uk-margin-small-right" uk-icon="instagram"></a>
                    <a href="#" class="uk-margin-small-right" uk-icon="twitter"></a>
                    <a href="#" uk-icon="youtube"></a>
                </div>
            </div>
        </div>
    </div>

    <!-- NAVBAR -->
    <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
        <nav class="uk-navbar-container uk-box-shadow-small">
            <div class="uk-container">
                <div uk-navbar>
                    <div class="uk-navbar-left">
                        <!-- Mobile toggle -->
                        <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon href="#"
                            uk-toggle="target: #mobile-dropdown" aria-label="Toggle menu"></a>

                        <!-- Brand Logo -->
                        <a class="uk-navbar-item brand-logo" href="index.php" aria-label="Back to Home">
                            Easy<span>Clinic</span>
                        </a>

                        <!-- Main nav (Desktop) -->
                        <ul class="uk-navbar-nav uk-visible@m">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="services.php">Services</a></li>
                            <li><a href="form.php">Appointment</a></li>
                            <li><a href="faq.php">FAQ</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="dashboard.php">Dashboard</a></li>
                        </ul>
                    </div>

                    <!-- Right Side - Login/Profile -->
                    <div class="uk-navbar-right uk-visible@m">
                        <ul class="uk-navbar-nav">
                            <?php if ($is_logged_in): ?>
                                <!-- User Profile Dropdown -->
                                <li>
                                    <a href="#" uk-toggle="target: #profile-dropdown">
                                        <img src="https://via.placeholder.com/32x32/667eea/ffffff?text=<?php echo substr($user_name, 0, 2); ?>" 
                                             class="uk-border-circle" width="32" height="32" alt="Profile" style="margin-right: 8px;">
                                        Hi, <?php echo htmlspecialchars($user_name); ?>
                                        <span uk-icon="triangle-down" style="font-size: 12px;"></span>
                                    </a>
                                </li>
                            <?php else: ?>
                                <!-- Login Link -->
                                <li><a href="login.php" class="uk-button uk-button-text">LOG IN</a></li>
                                <li><a href="signup.php" class="uk-button uk-button-primary uk-button-small">SIGN UP</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- User Profile Dropdown -->
        <?php if ($is_logged_in): ?>
        <div id="profile-dropdown" class="uk-navbar-dropdown uk-navbar-dropdown-width-2 uk-hidden@m" uk-drop="mode: click; pos: bottom-right;">
            <div class="uk-navbar-dropdown-grid uk-child-width-1-1 uk-grid-collapse" uk-grid>
                <div class="uk-padding-small">
                    <div class="uk-flex uk-flex-middle">
                        <div class="uk-margin-small-left">
                            <p class="uk-margin-remove"><?php echo htmlspecialchars($user_name); ?></p>
                            <p class="uk-margin-remove uk-text-small uk-text-muted"><?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
                        </div>
                    </div>
                </div>
                <div class="uk-padding-remove uk-padding-small-bottom">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li><a href="dashboard.php"><span uk-icon="icon: user"></span> Dashboard</a></li>
                        <li><a href="profile.php"><span uk-icon="icon: settings"></span> Profile Settings</a></li>
                        <li><a href="appointments.php"><span uk-icon="icon: calendar"></span> My Appointments</a></li>
                        <li class="uk-nav-divider"></li>
                        <li>
                            <a href="logout.php" class="uk-text-danger">
                                <span uk-icon="icon: sign-out"></span> Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Mobile Dropdown Menu -->
        <div id="mobile-dropdown" class="uk-navbar-dropdown uk-navbar-dropdown-width-1 uk-hidden@m"
            uk-drop="mode: click; boundary: !nav; boundary-align: true; pos: bottom-justify; offset: 0;">
            <div class="uk-navbar-dropdown-grid uk-child-width-1-1 uk-grid-collapse" uk-grid>
                <ul class="uk-nav uk-navbar-dropdown-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="form.php">Appointment</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <?php if ($is_logged_in): ?>
                        <li class="uk-nav-divider"></li>
                        <li class="uk-nav-header">Account</li>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="logout.php" class="uk-text-danger">Sign Out</a></li>
                    <?php else: ?>
                        <li class="uk-nav-divider"></li>
                        <li><a href="login.php">LOG IN</a></li>
                        <li><a href="signup.php">SIGN UP</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Your page content goes here -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit-icons.min.js"></script>
</body>
</html>
