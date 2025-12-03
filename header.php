<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast, easy, and hassle-free scheduling - EasyClinic</title>
    <!-- CDNs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/pageStyles.css">
    <style>
          :root {
  --primary-color: #1e87f0;
  --secondary-color: #32d296;
  --test-gradient: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
  --accent-teal: #00A6D6;
  --bg-light: #F5F7FB;
  --dark-text: #243746;
  --light-text: #6B7280;
  --white: #FFFFFF;
  --success: #28A745;
  --main-color: #c4ddf3;     
          }   
  .profile-avatar {
            width: 36px; height: 36px; background: var(--test-gradient);
            border-radius: 50%; display: inline-flex; align-items: center; justify-content: center;
            font-weight: 600; color: white; font-size: 14px; margin-right: 10px;
        }
        .profile-header { background: #f8f9fa; border-bottom: 1px solid #e9ecef; padding: 20px; }
        .profile-info { font-size: 16px; margin-bottom: 4px; color: #343a40; font-weight: 600; }
        .profile-email { font-size: 14px; color: #6c757d; }
        .dropdown-item {
            display: flex !important; align-items: center !important; padding: 10px 15px !important;
            color: #333 !important; text-decoration: none !important; border-radius: 8px !important;
            transition: background 0.2s !important;
        }
        .dropdown-item:hover { background: #f8f9fa !important; color: #000 !important; }
        .logout-item { color: #dc3545 !important; }
        .logout-item:hover { background: #f8d7da !important; color: #dc3545 !important; }
        .uk-dropdown { z-index: 1050; }
        .admin-badge {
            background: #dc3545; color: white; font-size: 10px; padding: 2px 6px;
            border-radius: 10px; font-weight: 600; margin-left: 5px;
        }

        /* DROPDOWN ENHANCEMENTS */
        .universal-dropdown {
            min-width: 300px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .profile-header-dropdown {
            background: background: var(--test-gradient);
            color: white; padding: 20px; border-radius: 12px 12px 0 0; text-align: center;
        }
        .profile-avatar-lg {
            width: 36px; height: 36px; background: var(--test-gradient);
            border-radius: 50%; display: inline-flex; align-items: center; justify-content: center;
            font-weight: 600; color: white; font-size: 14px; margin-right: 10px;
        }

        .brand-logo {
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--primary-color);
  text-decoration: none;
  text-align: center;
  text-transform: uppercase;
  letter-spacing: 1.5px;
}

.brand-logo span {
  color: var(--secondary-color);
}

/* Contact Info */
.contact-info {
  background: var(--test-gradient);
  color: white;
  padding: 15px 0;
}

.contact-info a {
  color: white;
}
        .navbar-trigger { cursor: pointer !important; display: flex !important; align-items: center !important; }
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

    <!-- Top Contact Bar (Desktop) -->
    <div class="contact-info ">
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

    <!-- MAIN NAVBAR -->
    <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
        <nav class="uk-navbar-container uk-box-shadow-small">
            <div class="uk-container">
                <div uk-navbar>
                    <!-- LEFT: Logo + Desktop Nav -->
                    <div class="uk-navbar-left">
                        <a class="uk-navbar-item brand-logo uk-margin-small-right" href="index.php">
                            Easy<span>Clinic</span>
                        </a>
                        
                        <!-- Desktop Navigation -->
                        <ul class="uk-navbar-nav uk-visible@m">
                            <li class="uk-active"><a href="index.php">Home</a></li>
                            <li><a href="services.php">Services</a></li>
                            <li><a href="form.php">Appointment</a></li>
                            <li><a href="faq.php">FAQ</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="about.php">About</a></li>
                            <?php if ($is_admin): ?>
                                <li><a href="dashboard.php" class="uk-text-bold">Dashboard</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <!-- RIGHT: Mobile + Profile Triggers -->
                    <div class="uk-navbar-right">
                        <!-- Mobile Hamburger -->
                        <a class="uk-navbar-toggle uk-hidden@m" href="#" 
                           uk-toggle="target: #main-dropdown" uk-navbar-toggle-icon 
                           uk-tooltip="Menu" aria-label="Toggle menu"></a>
                        
                        <!-- Profile Trigger (Desktop + Mobile) -->
                        <?php if ($is_logged_in): ?>
                            <a class="uk-navbar-item navbar-trigger uk-link-reset" href="#" 
                               uk-toggle="target: #main-dropdown">
                                <div class="profile-avatar">
                                    <?php echo strtoupper(substr($user_name, 0, 2)); ?>
                                </div>
                                Hi, <span class="uk-text-bold"><?php echo htmlspecialchars($user_name); ?></span>
                                <?php if ($is_admin): ?>
                                    <span class="admin-badge">ADMIN</span>
                                <?php endif; ?>
                                <span uk-icon="triangle-down" style="font-size: 10px; margin-left: 8px;"></span>
                            </a>
                        <?php else: ?>
                            <div class="uk-navbar-item">
                                <a href="login.php" class="uk-button uk-button-text uk-button-small uk-margin-small-right">LOG IN</a>
                                <a href="signup.php" class="uk-button uk-button-text uk-button-small">SIGN UP</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>

        <!-- 🌟 UNIVERSAL DROPDOWN (All Devices) -->
        <?php if ($is_logged_in): ?>
        <div id="main-dropdown" class="uk-dropdown universal-dropdown" 
             uk-dropdown="mode: click; pos: bottom-right; offset: 10">
            <div class="uk-navbar-dropdown-grid uk-child-width-1-1 uk-grid-collapse" uk-grid>
                <!-- Profile Header -->
                <div class="profile-header-dropdown">
                    <div class="profile-avatar-lg"><?php echo strtoupper(substr($user_name, 0, 2)); ?></div>
                    <div class="profile-info"><?php echo htmlspecialchars($user_name); ?></div>
                    <div class="profile-email"><?php echo htmlspecialchars($user_email); ?></div>
                    <?php if ($is_admin): ?>
                        <span class="admin-badge uk-margin-small-top uk-display-block">Administrator</span>
                    <?php endif; ?>
                </div>

                <!-- Navigation Menu -->
                <div class="uk-padding-small">
                    <ul class="uk-nav uk-dropdown-nav uk-margin-remove-bottom">
                        <li>
                            <a href="my-appointments.php" class="dropdown-item">
                                <span uk-icon="icon: calendar" class="uk-margin-small-right"></span>
                                My Appointments
                            </a>
                        </li>
                        <!-- <li>
                            <a href="profile.php" class="dropdown-item">
                                <span uk-icon="icon: settings" class="uk-margin-small-right"></span>
                                Profile Settings
                            </a>
                        </li> -->
                        <?php if ($is_admin): ?>
                            <li>
                                <a href="dashboard.php" class="dropdown-item uk-text-bold">
                                    <span uk-icon="icon: table" class="uk-margin-small-right"></span>
                                    Admin Dashboard
                                </a>
                            </li>
                            <!-- <li>
                                <a href="manage-doctors.php" class="dropdown-item">
                                    <span uk-icon="icon: users" class="uk-margin-small-right"></span>
                                    Manage Doctors
                                </a>
                            </li> -->
                        <?php endif; ?>
                        <!-- <li>
                            <a href="prescriptions.php" class="dropdown-item">
                                <span uk-icon="icon: file-text" class="uk-margin-small-right"></span>
                                Prescriptions
                            </a>
                        </li> -->
                        <li class="uk-nav-divider"></li>
                        <li>
                            <a href="logout.php" class="logout-item dropdown-item">
                                <span uk-icon="icon: sign-out" class="uk-margin-small-right"></span>
                                Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <!-- Your page content goes here -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/js/uikit-icons.min.js"></script>
</body>
</html>
