<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast, easy, and hassle-free scheduling for all your medical needs - EasyClinic</title>
    <!-- CDNs -->
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- UIkit -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.13/dist/css/uikit.min.css" />
    <!-- local css -->
    <link rel="stylesheet" href="css/styles.css" link="styles">
</head>

<body>
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
                        <!-- Toggle button visible on small screens only -->
                        <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon href="#"
                            uk-toggle="target: #mobile-dropdown" aria-label="Toggle menu"></a>

                        <a class="uk-navbar-item brand-logo" href="index.html"
                            aria-label="Back to Home">Easy<span>Clinic</span></a>


                        <!-- Main nav visible on medium+ screens -->
                        <ul class="uk-navbar-nav uk-visible@m">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="services.php">Services</a></li>
                            <li><a href="form.php">Appointment</a></li>
                            <li><a href="faq.php">FAQ</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="about.php">About</a></li>
                        </ul>
                    </div>
                    <div class="uk-navbar-right uk-visible@m">
                        <ul class="uk-navbar-nav">
                            <li><a href="login.php">LOG IN</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Dropdown menu (hidden by default) for mobile toggle -->
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
                    <li class="uk-nav-divider"></li>
                    <li><a href="login.php">LOG IN</a></li>
                </ul>
            </div>
        </div>
    </div>
