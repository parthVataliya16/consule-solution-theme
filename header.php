<!doctype html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="UTF-8" />
    <!-- Theme Color -->
    <meta name="theme-color" content="#1697d2" />
    <!-- Title -->
    <title>Consule Solutions</title>
    <!-- Site favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.ico" />
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/header.css" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- header-starts -->
    <div class="header-wrap">
        <header>
            <div class="container">
                <div class="content">
                    <div class="left">
                        <div class="logo">
                            <a href="#">
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/logo.svg" alt="site-logo" class="svg" />
                            </a>
                        </div>
                    </div>
                    <div class="right">
                        <ul class="links">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">About Us</a>
                            </li>
                            <li class="dropdown">
                                <a href="#">Services</a>
                                <ul class="dropdown-inner">
                                    <li>
                                        <a href="#">
                                            <div class="icon">
                                                <img src="<?php echo get_template_directory_uri()?>/assets/images/services-dd-one.png" alt="services-icon" width="60" height="38" />
                                            </div>
                                            Implementation
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="icon">
                                                <img src="<?php echo get_template_directory_uri()?>/assets/images/services-dd-two.png" alt="services-icon" width="60" height="38" />
                                            </div>
                                            Integration
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="icon">
                                                <img src="<?php echo get_template_directory_uri()?>/assets/images/services-dd-three.png" alt="services-icon" width="60" height="38" />
                                            </div>
                                            Support Program
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#">Industries</a>
                                <ul class="dropdown-inner">
                                    <li>
                                        <a href="#">
                                            <div class="icon">
                                                <img src="<?php echo get_template_directory_uri()?>/assets/images/industry-dd-one.png" alt="industry-icon" width="60" height="38" />
                                            </div>
                                            Non-Profit
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="icon">
                                                <img src="<?php echo get_template_directory_uri()?>/assets/images/industry-dd-two.png" alt="industry-icon" width="60" height="38" />
                                            </div>
                                            Wholesale Distribution
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="icon">
                                                <img src="<?php echo get_template_directory_uri()?>/assets/images/industry-dd-three.png" alt="industry-icon" width="60" height="38" />
                                            </div>
                                            Manufacturing
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="icon">
                                                <img src="<?php echo get_template_directory_uri()?>/assets/images/industry-dd-four.png" alt="industry-icon" width="60" height="38" />
                                            </div>
                                            E-commerce
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="icon">
                                                <img src="<?php echo get_template_directory_uri()?>/assets/images/industry-dd-five.png" alt="industry-icon" width="60" height="38" />
                                            </div>
                                            Software
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Projects</a>
                            </li>
                            <li>
                                <a href="#">Blog</a>
                            </li>
                            <li>
                                <a href="#">Careers</a>
                            </li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn btn-primary fw-semibold">Contact Us</a>
                        </div>

                        <div class="menu-btn">
                            <button class="menu" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))" aria-label="Main Menu">
                                <svg width="40" height="40" viewBox="0 0 100 100">
                                    <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                                    <path class="line line2" d="M 20,50 H 80" />
                                    <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <!-- header-ends -->