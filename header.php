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
    <style>
        .profile-avatar {
            width: 36px; height: 36px; background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%; display: inline-flex; align-items: center; justify-content: center;
            font-weight: 600; color: white; font-size: 14px; margin-right: 10px;
        }
        .profile-header { 
            background: #f8f9fa; 
            border-bottom: 1px solid #e9ecef; 
            padding: 20px; 
        }
        .profile-info { font-size: 16px; margin-bottom: 4px; }
        .profile-email { font-size: 14px; color: #6c757d; }
        .dropdown-item:hover { background: #f8f9fa !important; }
        .logout-item { color: #dc3545 !important; }
        .logout-item:hover { background: #f8d7da !important; }
        .uk-dropdown { z-index: 1050; }
        .admin-badge {
            background: #dc3545; color: white; font-size: 10px; padding: 2px 6px;
            border-radius: 10px; font-weight: 600; margin-left: 5px;
        }
    </style>
</head>

<body>
    <?php 
    session_start();
    $is_logged_in = isset($_SESSION['user_id']);
    $user_name = $is_logged_in ? $_SESSION['user_name'] : '';
    $user_email = $is_logged_in ? $_SESSION['user_email'] : '';
    $is_admin = $is_logged_in && $user_email === 'admin@easyclinic.com';
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
                            uk-toggle="target: #mobile-dropdown; cls: uk-open; close: #profile-dropdown" 
                            aria-label="Toggle menu"></a>

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
                            <?php if ($is_admin): ?>
                                <li><a href="Services/dashboard.php" class="uk-text-bold">Dashboard</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <!-- Right Side - Login/Profile -->
                    <div class="uk-navbar-right uk-visible@m">
                        <ul class="uk-navbar-nav">
                            <?php if ($is_logged_in): ?>
                                <!-- User Profile Dropdown Trigger -->
                                <li>
                                    <a class="uk-link-reset" href="#" 
                                       uk-toggle="target: #profile-dropdown; cls: uk-open; close: #mobile-dropdown">
                                        <div class="profile-avatar">
                                            <?php echo strtoupper(substr($user_name, 0, 2)); ?>
                                        </div>
                                        Hi, <span class="uk-text-bold"><?php echo htmlspecialchars($user_name); ?></span>
                                        <?php if ($is_admin): ?>
                                            <span class="admin-badge">ADMIN</span>
                                        <?php endif; ?>
                                        <span uk-icon="triangle-down" style="font-size: 10px; margin-left: 8px;"></span>
                                    </a>
                                </li>
                            <?php else: ?>
                                <li><a href="login.php" class="uk-button uk-button-text uk-button-small">LOG IN</a></li>
                                <li><a href="signup.php" class="uk-button uk-button-text uk-button-small">SIGN UP</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Profile Dropdown - Closes mobile dropdown -->
        <?php if ($is_logged_in): ?>
        <div id="profile-dropdown" class="uk-dropdown" 
             uk-dropdown="mode: click; pos: bottom-right; offset: 10; close: #mobile-dropdown">
            <div class="uk-navbar-dropdown-grid uk-child-width-1-1 uk-grid-collapse" uk-grid>
                <div class="profile-header">
                    <div class="uk-flex uk-flex-middle">
                        <div class="profile-avatar" style="width: 56px; height: 56px; font-size: 18px; margin-right: 15px;">
                            <?php echo strtoupper(substr($user_name, 0, 2)); ?>
                        </div>
                        <div>
                            <div class="profile-info"><?php echo htmlspecialchars($user_name); ?></div>
                            <div class="profile-email"><?php echo htmlspecialchars($user_email); ?></div>
                            <?php if ($is_admin): ?>
                                <span class="admin-badge uk-margin-small-top uk-display-block">Administrator</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <div class="uk-padding-small">
                    <ul class="uk-nav uk-nav-default uk-margin-remove-bottom">
                        <li class="uk-active"><a href="my-appointments.php" class="dropdown-item">
                            <span uk-icon="icon: calendar" class="uk-margin-small-right"></span>My Appointments
                        </a></li>
                        <li><a href="profile.php" class="dropdown-item">
                            <span uk-icon="icon: settings" class="uk-margin-small-right"></span>Profile Settings
                        </a></li>
                        <?php if ($is_admin): ?>
                            <li><a href="dashboard.php" class="dropdown-item uk-text-bold">
                                <span uk-icon="icon: table" class="uk-margin-small-right"></span>Admin Dashboard
                            </a></li>
                            <li><a href="manage-doctors.php" class="dropdown-item">
                                <span uk-icon="icon: users" class="uk-margin-small-right"></span>Manage Doctors
                            </a></li>
                        <?php endif; ?>
                        <li><a href="prescriptions.php" class="dropdown-item">
                            <span uk-icon="icon: file-text" class="uk-margin-small-right"></span>Prescriptions
                        </a></li>
                        <li class="uk-nav-divider"></li>
                        <li>
                            <a href="logout.php" class="logout-item uk-flex uk-flex-middle dropdown-item">
                                <span uk-icon="icon: sign-out" class="uk-margin-small-right"></span>
                                Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Mobile Dropdown - Closes profile dropdown -->
        <div id="mobile-dropdown" class="uk-dropdown uk-dropdown-navbar uk-dropdown-width-2 uk-hidden@m"
            uk-dropdown="mode: click; boundary: !nav; boundary-align: true; pos: bottom-justify; offset: 0; close: #profile-dropdown">
            <div class="uk-navbar-dropdown-grid uk-child-width-1-1 uk-grid-collapse" uk-grid>
                <ul class="uk-nav uk-navbar-dropdown-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="form.php">Appointment</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="about.php">About</a></li>
                    <?php if ($is_admin): ?>
                        <li><a href="dashboard.php" class="uk-text-bold">Dashboard</a></li>
                    <?php endif; ?>
                    <?php if ($is_logged_in): ?>
                        <li class="uk-nav-divider"></li>
                        <li class="uk-nav-header uk-margin-small">
                            <span uk-icon="user" class="uk-margin-small-right"></span>
                            <?php echo htmlspecialchars($user_name); ?>
                            <?php if ($is_admin): ?><span class="admin-badge">ADMIN</span><?php endif; ?>
                        </li>
                        <li><a href="my-appointments.php"><span uk-icon="icon: calendar" class="uk-margin-small-right"></span>Appointments</a></li>
                        <li><a href="profile.php"><span uk-icon="icon: settings" class="uk-margin-small-right"></span>Profile</a></li>
                        <?php if ($is_admin): ?>
                            <li><a href="dashboard.php"><span uk-icon="icon: table" class="uk-margin-small-right"></span>Dashboard</a></li>
                        <?php endif; ?>
                        <li class="uk-nav-divider"></li>
                        <li><a href="logout.php" class="logout-item">
                            <span uk-icon="icon: sign-out" class="uk-margin-small-right"></span>Sign Out
                        </a></li>
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
