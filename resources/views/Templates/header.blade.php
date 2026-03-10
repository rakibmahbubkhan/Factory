<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <title>{{ $company->company_name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $company->tagline ?? 'Leading company in industry' }}">
    <meta name="keywords" content="{{ $company->keywords ?? 'company, services, solutions' }}">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $company->company_name }}">
    <meta property="og:description" content="{{ $company->tagline ?? 'Leading company in industry' }}">
    @if($company->logo)
        <meta property="og:image" content="{{ asset('storage/' . $company->logo) }}">
    @endif
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <x-head.tinymce-config/>

    <!-- Favicon -->
    <link href="{{ asset('storage/' . $company->logo) }}" rel="icon" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <style>
        /* Mobile Responsive Navigation Styles */
        .header {
            position: sticky;
            top: 0;
            z-index: 1030;
            background: white;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .header.scrolled {
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        /* Mobile Top Bar */
        .top-bar.mobile-top-bar {
            display: none;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 0;
        }

        @media (max-width: 991.98px) {
            .top-bar.d-none.d-lg-block {
                display: none !important;
            }
            
            .top-bar.mobile-top-bar {
                display: block !important;
            }
        }

        .mobile-contact-info {
            display: flex;
            justify-content: space-around;
            align-items: center;
            text-align: center;
        }

        .mobile-contact-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
        }

        .mobile-contact-item a {
            color: white;
            text-decoration: none;
            font-size: 0.8rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2px;
        }

        .mobile-contact-item i {
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.2);
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        /* Navbar Styles */
        .navbar {
            padding: 15px 0;
        }

        .navbar-brand img {
            height: 50px;
            width: auto;
            transition: all 0.3s ease;
        }

        @media (max-width: 576px) {
            .navbar-brand img {
                height: 40px;
            }
        }

        /* Custom Toggler Button */
        .navbar-toggler {
            border: none;
            padding: 8px;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            background: transparent;
        }

        .navbar-toggler:focus {
            box-shadow: none;
            outline: none;
        }

        .navbar-toggler-icon {
            background-image: none;
            position: relative;
            width: 24px;
            height: 2px;
            background: #333;
            transition: all 0.3s ease;
        }

        .navbar-toggler-icon::before,
        .navbar-toggler-icon::after {
            content: '';
            position: absolute;
            width: 24px;
            height: 2px;
            background: #333;
            left: 0;
            transition: all 0.3s ease;
        }

        .navbar-toggler-icon::before {
            top: -8px;
        }

        .navbar-toggler-icon::after {
            top: 8px;
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon {
            background: transparent;
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon::before {
            transform: rotate(45deg);
            top: 0;
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon::after {
            transform: rotate(-45deg);
            top: 0;
        }

        /* Navigation Menu */
        #navbarContent {
            transition: all 0.3s ease;
        }

        @media (max-width: 991.98px) {
            #navbarContent {
                position: fixed;
                top: 0;
                right: -100%;
                width: 300px;
                height: 100vh;
                background: white;
                padding: 80px 30px 30px;
                box-shadow: -10px 0 30px rgba(0, 0, 0, 0.1);
                overflow-y: auto;
                transition: right 0.4s ease;
                z-index: 1040;
            }

            #navbarContent.show {
                right: 0;
            }

            .navbar-nav {
                flex-direction: column;
                gap: 5px;
            }

            .nav-item {
                width: 100%;
            }

            .nav-link {
                padding: 15px 20px !important;
                border-radius: 10px;
                margin: 2px 0;
                font-weight: 500;
                font-size: 1rem;
                display: flex;
                align-items: center;
                justify-content: space-between;
                transition: all 0.3s ease;
                border: 1px solid transparent;
            }

            .nav-link:hover,
            .nav-link.active {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white !important;
                transform: translateX(5px);
                border-color: #667eea;
            }

            .nav-link::after {
                content: '→';
                font-family: 'Font Awesome 6 Free';
                font-weight: 900;
                opacity: 0.5;
                transition: all 0.3s ease;
            }

            .nav-link:hover::after,
            .nav-link.active::after {
                opacity: 1;
                transform: translateX(5px);
            }
        }

        @media (min-width: 992px) {
            .navbar-nav {
                gap: 5px;
            }

            .nav-link {
                padding: 12px 20px !important;
                border-radius: 8px;
                font-weight: 500;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }

            .nav-link::before {
                content: '';
                position: absolute;
                bottom: 0;
                left: 50%;
                width: 0;
                height: 3px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                transition: all 0.3s ease;
                transform: translateX(-50%);
                border-radius: 3px 3px 0 0;
            }

            .nav-link:hover::before,
            .nav-link.active::before {
                width: 80%;
            }

            .nav-link:hover,
            .nav-link.active {
                color: #667eea !important;
                background: rgba(102, 126, 234, 0.1);
            }
        }

        /* Mobile Top Bar */
.top-bar.mobile-top-bar {
    display: none;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 8px 0;
}

.mobile-contact-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    text-align: center;
    flex-wrap: nowrap;
    width: 100%;
}

.mobile-contact-item {
    flex: 1;
    min-width: 0; /* Prevents items from overflowing */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 0 5px;
}

.mobile-contact-item a {
    color: white;
    text-decoration: none;
    font-size: 0.75rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 4px;
    width: 100%;
    overflow: hidden;
}

.mobile-contact-item i {
    font-size: 0.9rem;
    background: rgba(255, 255, 255, 0.2);
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    flex-shrink: 0;
}

.mobile-contact-item span {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    width: 100%;
    text-align: center;
}

/* Extra small devices (phones, less than 576px) */
@media (max-width: 575.98px) {
    .mobile-contact-item a {
        font-size: 0.7rem;
        gap: 3px;
    }
    
    .mobile-contact-item i {
        width: 24px;
        height: 24px;
        font-size: 0.8rem;
    }
    
    .mobile-contact-info {
        padding: 0 2px;
    }
    
    .mobile-contact-item {
        padding: 0 3px;
    }
}

/* Small devices (landscape phones, 576px and up) */
@media (min-width: 430px) and (max-width: 767.98px) {
    .mobile-contact-item a {
        font-size: 0.8rem;
    }
    
    .mobile-contact-item i {
        width: 26px;
        height: 26px;
    }
}

/* Medium devices (tablets, 768px and up) */
@media (min-width: 768px) and (max-width: 991.98px) {
    .mobile-contact-item a {
        font-size: 0.85rem;
    }
    
    .mobile-contact-item i {
        width: 30px;
        height: 30px;
        font-size: 1rem;
    }
}

/* Ensure mobile top bar only shows on mobile */
@media (max-width: 991.98px) {
    .top-bar.d-none.d-lg-block {
        display: none !important;
    }
    
    .top-bar.mobile-top-bar {
        display: block !important;
    }
}

        /* Mobile Menu Overlay */
        .mobile-menu-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1039;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .mobile-menu-overlay.show {
            display: block;
            opacity: 1;
        }

        /* Mobile Menu Close Button */
        .mobile-menu-close {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            background: #f8f9fa;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #333;
            cursor: pointer;
            z-index: 1041;
        }

        /* Social Icons in Mobile Menu */
        .mobile-menu-social {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            text-align: center;
        }

        .mobile-menu-social h6 {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .mobile-social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .mobile-social-icons a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #667eea;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .mobile-social-icons a:hover {
            background: #667eea;
            color: white;
            transform: translateY(-3px);
        }

        /* Responsive Contact Info */
        @media (max-width: 576px) {
            .mobile-contact-info {
                flex-direction: column;
                gap: 8px;
            }

            .mobile-contact-item {
                width: 100%;
            }

            .mobile-contact-item a {
                flex-direction: row;
                gap: 10px;
            }
        }

        /* Animation for Nav Items */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @media (max-width: 991.98px) {
            .navbar-nav .nav-item {
                animation: slideIn 0.3s ease forwards;
                opacity: 0;
            }

            .navbar-nav .nav-item:nth-child(1) { animation-delay: 0.1s; }
            .navbar-nav .nav-item:nth-child(2) { animation-delay: 0.2s; }
            .navbar-nav .nav-item:nth-child(3) { animation-delay: 0.3s; }
            .navbar-nav .nav-item:nth-child(4) { animation-delay: 0.4s; }
            .navbar-nav .nav-item:nth-child(5) { animation-delay: 0.5s; }
        }

        /* CTA Button for Mobile */
        .mobile-cta-button {
            margin-top: 20px;
            display: none;
        }

        @media (max-width: 991.98px) {
            .mobile-cta-button {
                display: block;
            }

            .mobile-cta-button a {
                display: block;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                padding: 15px 30px;
                border-radius: 10px;
                text-decoration: none;
                text-align: center;
                font-weight: 600;
                transition: all 0.3s ease;
            }

            .mobile-cta-button a:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
            }
        }

        /* Search Bar (Optional) */
        .navbar-search {
            display: none;
        }

        @media (max-width: 991.98px) {
            .navbar-search {
                display: block;
                margin-bottom: 20px;
            }

            .search-form {
                position: relative;
            }

            .search-input {
                width: 100%;
                padding: 12px 20px;
                padding-right: 50px;
                border: 1px solid #ddd;
                border-radius: 10px;
                font-size: 0.9rem;
                transition: all 0.3s ease;
            }

            .search-input:focus {
                border-color: #667eea;
                box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
                outline: none;
            }

            .search-button {
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
                background: none;
                border: none;
                color: #667eea;
                cursor: pointer;
            }
        }
    </style>
</head>

<body>
    <!-- Spinner -->
    <div id="spinner">
        <div class="spinner-container">
            <div class="spinner-border" role="status"></div>
            <div class="loading-text">Loading...</div>
        </div>
    </div>

    <!-- Header -->
    <header class="header">
        <!-- Desktop Top Bar -->
        <div class="top-bar d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="social-icons">
                            @if($company->facebook)
                                <a href="{{ $company->facebook }}" target="_blank" title="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @endif
                            @if($company->twitter)
                                <a href="{{ $company->twitter }}" target="_blank" title="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            @endif
                            @if($company->linkedin)
                                <a href="{{ $company->linkedin }}" target="_blank" title="LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            @endif
                            @if($company->youtube)
                                <a href="{{ $company->youtube }}" target="_blank" title="YouTube">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="contact-info">
                            @if($company->email)
                                <a href="mailto:{{ $company->email }}" class="me-4">
                                    <i class="fas fa-envelope me-1"></i> {{ $company->email }}
                                </a>
                            @endif
                            @if($company->main_contact)
                                <a href="tel:{{ $company->main_contact }}">
                                    <i class="fas fa-phone-alt me-1"></i> {{ $company->main_contact }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

       

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->company_name }}">
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Mobile Menu Overlay -->
                <div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>

                <div class="collapse navbar-collapse" id="navbarContent">
                    <!-- Mobile Menu Close Button -->
                    <button class="mobile-menu-close d-lg-none" id="mobileMenuClose">
                        <i class="fas fa-times"></i>
                    </button>

                    <!-- Search Bar for Mobile -->
                    <div class="navbar-search d-lg-none">
                        <form class="search-form" action="" method="GET">
                            <input type="text" class="search-input" placeholder="Search..." name="q">
                            <button type="submit" class="search-button">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Navigation Menu -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                                <i class="fas fa-home me-2 d-lg-none"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                                <i class="fas fa-info-circle me-2 d-lg-none"></i> About Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('service') }}" class="nav-link {{ request()->routeIs('service') ? 'active' : '' }}">
                                <i class="fas fa-cogs me-2 d-lg-none"></i> Services
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('machineries') }}" class="nav-link {{ request()->routeIs('machineries') ? 'active' : '' }}">
                                <i class="fas fa-industry me-2 d-lg-none"></i> Machineries
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                                <i class="fas fa-phone me-2 d-lg-none"></i> Contact
                            </a>
                        </li>
                    </ul>
                     <!-- Mobile Top Bar -->
        <!-- Mobile Top Bar -->
<div class="top-bar mobile-top-bar">
    <div class="container">
        <div class="mobile-contact-info">
            @if($company->email)
                <div class="mobile-contact-item">
                    <a href="mailto:{{ $company->email }}">
                        <i class="fas fa-envelope"></i>
                        <span>Email</span>
                    </a>
                </div>
            @endif
            @if($company->main_contact)
                <div class="mobile-contact-item">
                    <a href="tel:{{ $company->main_contact }}">
                        <i class="fas fa-phone-alt"></i>
                        <span>Call</span>
                    </a>
                </div>
            @endif
            <div class="mobile-contact-item">
                <a href="{{ route('contact') }}">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Location</span>
                </a>
            </div>
        </div>
    </div>
</div>

                    <!-- Social Icons in Mobile Menu -->
                    <div class="mobile-menu-social d-lg-none">
                        <h6>Follow Us</h6>
                        <div class="mobile-social-icons">
                            @if($company->facebook)
                                <a href="{{ $company->facebook }}" target="_blank" title="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @endif
                            @if($company->twitter)
                                <a href="{{ $company->twitter }}" target="_blank" title="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            @endif
                            @if($company->linkedin)
                                <a href="{{ $company->linkedin }}" target="_blank" title="LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            @endif
                            @if($company->youtube)
                                <a href="{{ $company->youtube }}" target="_blank" title="YouTube">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- CTA Button for Mobile -->
                    <div class="mobile-cta-button">
                        <a href="{{ route('contact') }}">
                            <i class="fas fa-paper-plane me-2"></i> Get In Touch
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <script>
        // Mobile Navigation Enhancement
        document.addEventListener('DOMContentLoaded', function() {
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navbarContent = document.getElementById('navbarContent');
            const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
            const mobileMenuClose = document.getElementById('mobileMenuClose');
            const navLinks = document.querySelectorAll('.nav-link');

            // Toggle mobile menu
            navbarToggler.addEventListener('click', function() {
                navbarContent.classList.toggle('show');
                mobileMenuOverlay.classList.toggle('show');
                document.body.style.overflow = 'hidden';
            });

            // Close mobile menu
            mobileMenuClose.addEventListener('click', closeMobileMenu);
            mobileMenuOverlay.addEventListener('click', closeMobileMenu);

            // Close menu when clicking on nav links (mobile)
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        closeMobileMenu();
                    }
                });
            });

            function closeMobileMenu() {
                navbarContent.classList.remove('show');
                mobileMenuOverlay.classList.remove('show');
                document.body.style.overflow = 'auto';
            }

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 992) {
                    closeMobileMenu();
                }
            });

            // Add scroll effect to header
            window.addEventListener('scroll', function() {
                const header = document.querySelector('.header');
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Handle keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeMobileMenu();
                }
            });

            // Add hover effect for desktop nav items
            if (window.innerWidth >= 992) {
                const navItems = document.querySelectorAll('.nav-item');
                navItems.forEach(item => {
                    item.addEventListener('mouseenter', function() {
                        this.classList.add('hover');
                    });
                    
                    item.addEventListener('mouseleave', function() {
                        this.classList.remove('hover');
                    });
                });
            }
        });

        // Animation for page load
        window.addEventListener('load', function() {
            // Hide spinner
            const spinner = document.getElementById('spinner');
            spinner.style.opacity = '0';
            setTimeout(() => {
                spinner.style.display = 'none';
            }, 300);

            // Add fade-in animation to content
            const mainContent = document.querySelector('main') || document.body;
            mainContent.style.opacity = '0';
            mainContent.style.transform = 'translateY(20px)';
            mainContent.style.transition = 'all 0.5s ease';

            setTimeout(() => {
                mainContent.style.opacity = '1';
                mainContent.style.transform = 'translateY(0)';
            }, 300);
        });
    </script>
</body>
</html>