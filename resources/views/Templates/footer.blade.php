

   

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <img src="{{ asset('storage/' . $company->logo) }}" 
                         alt="{{ $company->company_name }}" 
                         class="footer-logo">
                    <p class="footer-about">
                        {{ $company->company_name }} - {{ $company->tagline ?? 'Leading company providing quality services' }}
                    </p>
                    <div class="social-icons">
                        @if($company->facebook)
                            <a href="{{ $company->facebook }}" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                        @if($company->twitter)
                            <a href="{{ $company->twitter }}" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif
                        @if($company->linkedin)
                            <a href="{{ $company->linkedin }}" target="_blank">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        @endif
                        @if($company->youtube)
                            <a href="{{ $company->youtube }}" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        @endif
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-5 mb-md-0">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="footer-links list-unstyled">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('service') }}">Services</a></li>
                        <li><a href="{{ route('machineries') }}">Machineries</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                    <h5 class="footer-title">Contact Info</h5>
                    <ul class="footer-contact list-unstyled">
                        @if($company->address)
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ $company->address }}</span>
                            </li>
                        @endif
                        @if($company->email)
                            <li>
                                <i class="fas fa-envelope"></i>
                                <span>{{ $company->email }}</span>
                            </li>
                        @endif
                        @if($company->main_contact)
                            <li>
                                <i class="fas fa-phone-alt"></i>
                                <span>{{ $company->main_contact }}</span>
                            </li>
                        @endif
                    </ul>
                </div>
                
                <div class="col-lg-3">
                    <h5 class="footer-title">Business Hours</h5>
                    <ul class="footer-contact list-unstyled">
                        <li>
                            <i class="fas fa-clock"></i>
                            <span>Mon - Fri: 9:00 AM - 6:00 PM</span>
                        </li>
                        <li>
                            <i class="fas fa-clock"></i>
                            <span>Saturday: 10:00 AM - 4:00 PM</span>
                        </li>
                        <li>
                            <i class="fas fa-clock"></i>
                            <span>Sunday: Closed</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="container">
                    <p class="mb-0">
                        &copy; {{ date('Y') }} {{ $company->company_name }}. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Libraries -->
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/aos/aos.js') }}"></script>

    <script>
        // Remove spinner when page loads
        window.addEventListener('load', function() {
            const spinner = document.getElementById('spinner');
            spinner.style.opacity = '0';
            setTimeout(() => {
                spinner.style.display = 'none';
            }, 300);
        });

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            const backToTop = document.getElementById('backToTop');
            
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
            
            // Show/hide back to top button
            if (window.scrollY > 300) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
            
            // Scroll animations
            const fadeElements = document.querySelectorAll('.fade-in-up');
            fadeElements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;
                
                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('visible');
                }
            });
        });

        // Back to top functionality
        document.getElementById('backToTop').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Hero slider
        const heroSlides = document.querySelectorAll('.hero-slide');
        const heroIndicators = document.querySelectorAll('.hero-indicator');
        let currentSlide = 0;
        
        function showSlide(index) {
            // Hide all slides
            heroSlides.forEach(slide => slide.classList.remove('active'));
            heroIndicators.forEach(indicator => indicator.classList.remove('active'));
            
            // Show current slide
            heroSlides[index].classList.add('active');
            heroIndicators[index].classList.add('active');
            currentSlide = index;
        }
        
        // Initialize indicators
        heroIndicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => showSlide(index));
        });
        
        // Auto slide every 5 seconds
        setInterval(() => {
            let nextSlide = (currentSlide + 1) % heroSlides.length;
            showSlide(nextSlide);
        }, 5000);

        // Mobile menu collapse when clicking a link
        const navLinks = document.querySelectorAll('.nav-link');
        const navbarCollapse = document.getElementById('navbarContent');
        
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 992) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                    bsCollapse.hide();
                }
            });
        });

        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Initialize WOW.js
        new WOW().init();
    </script>
</body>
</html>