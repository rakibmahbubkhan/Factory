@include('Templates.header')

<!-- Modern Hero Section with Enhanced Slider -->
<section class="modern-hero-section">
    <!-- Slider Container -->
    <div class="slider-container">
        <div class="slider-wrapper">
            @foreach($sliders as $key => $slider)
            <div class="slider-slide @if($key == 0) active @endif">
                <div class="slide-image">
                    <img src="{{ asset('images/' . $slider->image) }}" 
                         alt="{{ $slider->title }}" 
                         loading="lazy"
                         data-lazy="{{ asset('images/' . $slider->image) }}">
                </div>
                <!-- <div class="slide-overlay"></div> -->
                <div class="container">
                    <div class="slide-content">
                        <span class="slide-badge">
                            <i class="fas fa-industry"></i>
                            <span>{{ $slider->sup_title }}</span>
                        </span>
                        <h1 class="slide-title">{{ $slider->title }}</h1>
                        <p class="slide-description">
                            {{ $slider->description ?? 'Precision Engineering for Modern Agriculture' }}
                        </p>
                        <div class="slide-actions">
                            <a href="{{ $slider->link ?? route('machineries') }}" 
                               class="btn btn-primary">
                                <i class="fas fa-tractor me-2"></i>
                                <span>Explore Machinery</span>
                            </a>
                            <a href="#contact" class="btn btn-secondary">
                                <i class="fas fa-phone-alt me-2"></i>
                                <span>Get Quote</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Slider Controls -->
        <div class="slider-controls">
            <button class="control-btn prev-btn" aria-label="Previous slide">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="control-btn next-btn" aria-label="Next slide">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        
        <!-- Slider Progress -->
        <div class="slider-progress">
            <div class="progress-bar"></div>
        </div>
    </div>
    
    <!-- Stats Bar -->
    <div class="hero-stats-bar">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <i class="fas fa-cogs"></i>
                    <div class="stat-content">
                        <h3><span class="counter" data-target="{{ $statistic->projects ?? 0 }}">0</span>+</h3>
                        <p>Machines Built</p>
                    </div>
                </div>
                <div class="stat-item">
                    <i class="fas fa-users"></i>
                    <div class="stat-content">
                        <h3><span class="counter" data-target="{{ $statistic->clients ?? 0 }}">0</span>+</h3>
                        <p>Happy Farmers</p>
                    </div>
                </div>
                <div class="stat-item">
                    <i class="fas fa-clock"></i>
                    <div class="stat-content">
                        <h3><span class="counter" data-target="{{ date('Y') - ($homeabout->experience ?? 2000) }}">0</span>+</h3>
                        <p>Years Experience</p>
                    </div>
                </div>
                <div class="stat-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="stat-content">
                        <h3><span class="counter" data-target="{{ $statistic->location ?? 10 }}">0</span>+</h3>
                        <p>Locations</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section" id="about">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">
                <i class="fas fa-industry"></i>
                <span>About Us</span>
            </span>
            <h2 class="section-title">Precision Engineering for Agriculture</h2>
            <p class="section-description">
                Leading manufacturer of high-quality agricultural machinery with decades of expertise
            </p>
        </div>
        
        <div class="about-grid">
            <div class="about-content">
                @if($homeabout)
                <p class="about-text">
                    {{ $homeabout->content }}
                </p>
                
                <div class="features-grid">
                    @foreach(explode(",", $homeabout->features ?? '') as $feature)
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="feature-content">
                            <h4>{{ trim($feature) }}</h4>
                            <p>Expert precision engineering solutions</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="about-actions">
                    <a href="{{ route('about') }}" class="btn btn-primary">
                        <i class="fas fa-info-circle me-2"></i>
                        <span>Learn More</span>
                    </a>
                    <a href="#contact" class="btn btn-secondary">
                        <i class="fas fa-play-circle me-2"></i>
                        <span>Virtual Tour</span>
                    </a>
                </div>
                @endif
            </div>
            
            <div class="about-image">
                @if($homeabout && $homeabout->image1)
                <div class="image-wrapper">
                    <img src="{{ asset('images/' . $homeabout->image1) }}" 
                         alt="Our Workshop" 
                         loading="lazy">
                    <div class="experience-badge">
                        <span>{{ date('Y') - ($homeabout->experience ?? 2000) }}+</span>
                        <small>Years Experience</small>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">
                <i class="fas fa-tools"></i>
                <span>Our Services</span>
            </span>
            <h2 class="section-title">Comprehensive Machinery Solutions</h2>
            <p class="section-description">
                From manufacturing to maintenance - complete agricultural machinery services
            </p>
        </div>
        
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-industry"></i>
                </div>
                <h3>Custom Manufacturing</h3>
                <p>Bespoke agricultural machinery designed and built to your specific requirements</p>
                <a href="{{ route('service') }}" class="service-link">
                    <span>Learn More</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-wrench"></i>
                </div>
                <h3>Equipment Repair</h3>
                <p>Expert repair and maintenance services for all agricultural machinery brands</p>
                <a href="{{ route('service') }}" class="service-link">
                    <span>Learn More</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-cog"></i>
                </div>
                <h3>Spare Parts</h3>
                <p>Genuine spare parts for all major agricultural equipment manufacturers</p>
                <a href="{{ route('service') }}" class="service-link">
                    <span>Learn More</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>Technical Support</h3>
                <p>24/7 technical support and consultation services for your machinery needs</p>
                <a href="{{ route('service') }}" class="service-link">
                    <span>Learn More</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
@if($products->where('isActive', true)->whereNotNull('image1')->count() > 0)
<section class="products-section" id="products">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">
                <i class="fas fa-tractor"></i>
                <span>Our Machinery</span>
            </span>
            <h2 class="section-title">Featured Agricultural Equipment</h2>
            <p class="section-description">
                High-performance machinery designed for modern farming efficiency
            </p>
        </div>
        
        <div class="products-grid">
            @foreach($products->where('isActive', true)->whereNotNull('image1')->take(6) as $product)
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('storage/' . $product->image1) }}" 
                         alt="{{ $product->product_name }}" 
                         loading="lazy">
                    <div class="product-overlay">
                        <a href="{{ route('products.show', $product->id) }}" class="view-btn">
                            <i class="fas fa-search"></i>
                        </a>
                        <a href="#contact" class="quote-btn">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>
                <div class="product-content">
                    <span class="product-category">Agricultural Machinery</span>
                    <h3 class="product-title">{{ $product->product_name }}</h3>
                    <div class="product-specs">
                        <span><i class="fas fa-cog"></i> Heavy Duty</span>
                        <span><i class="fas fa-bolt"></i> Power Efficient</span>
                    </div>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm">
                        <i class="fas fa-info-circle me-2"></i>
                        <span>View Details</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        @if($products->count() > 6)
        <div class="text-center mt-5">
            <a href="{{ route('machineries') }}" class="btn btn-primary">
                <i class="fas fa-warehouse me-2"></i>
                <span>View All Machinery</span>
            </a>
        </div>
        @endif
    </div>
</section>
@endif

<!-- Why Choose Us -->
<section class="features-section">
    <div class="container">
        <div class="features-grid">
            <div class="feature-highlight">
                <span class="highlight-subtitle">Why Choose Us</span>
                <h2 class="highlight-title">Excellence in Agricultural Machinery Manufacturing</h2>
                <p class="highlight-text">
                    We combine traditional craftsmanship with modern technology to deliver 
                    superior agricultural machinery solutions.
                </p>
                <div class="highlight-stats">
                    <div class="highlight-stat">
                        <h3>99%</h3>
                        <p>Client Satisfaction</p>
                    </div>
                    <div class="highlight-stat">
                        <h3>24/7</h3>
                        <p>Support Available</p>
                    </div>
                </div>
            </div>
            
            <div class="features-list">
                @if($qualification)
                @for($i = 1; $i <= 4; $i++)
                @if(isset($qualification->{'Tile'.$i}))
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-{{ $i == 1 ? 'tractor' : ($i == 2 ? 'cogs' : ($i == 3 ? 'industry' : 'seedling')) }}"></i>
                    </div>
                    <div class="feature-content">
                        <h4>{{ $qualification->{'Tile'.$i} }}</h4>
                        <p>{{ $qualification->{'Tile_description'.$i} }}</p>
                    </div>
                </div>
                @endif
                @endfor
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Certifications -->
<!-- Certifications Section with Auto-Slider -->
@if($certificates->count() > 0)
<section class="certifications-section">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">
                <i class="fas fa-award"></i>
                <span>Certifications & Accreditations</span>
            </span>
            <h2 class="section-title">Recognized Quality Standards</h2>
            <p class="section-description">
                Internationally recognized certifications for agricultural machinery excellence
            </p>
        </div>
        
        <!-- Slider Container -->
        <div class="certifications-container">
            <div class="certifications-track" id="certificationsTrack">
                <!-- Original Slides -->
                @foreach($certificates as $certificate)
                <div class="certificate-slide">
                    <div class="certificate-card">
                        <div class="certificate-image">
                            <img src="{{ asset('storage/' . $certificate->image) }}" 
                                 alt="{{ $certificate->title }}" 
                                 loading="lazy">
                            <div class="certificate-overlay">
                                <button class="zoom-btn" onclick="openCertificateModal('{{ asset('storage/' . $certificate->image) }}', '{{ $certificate->title }}')">
                                    <i class="fas fa-search-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="certificate-content">
                            <h5>{{ $certificate->title }}</h5>
                            <p class="certificate-desc">
                                <i class="fas fa-calendar-alt"></i>
                                Issued {{ \Carbon\Carbon::parse($certificate->created_at)->format('M Y') }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                
                <!-- Duplicated Slides for Infinite Loop -->
                @foreach($certificates as $certificate)
                <div class="certificate-slide">
                    <div class="certificate-card">
                        <div class="certificate-image">
                            <img src="{{ asset('storage/' . $certificate->image) }}" 
                                 alt="{{ $certificate->title }}" 
                                 loading="lazy">
                            <div class="certificate-overlay">
                                <button class="zoom-btn" onclick="openCertificateModal('{{ asset('storage/' . $certificate->image) }}', '{{ $certificate->title }}')">
                                    <i class="fas fa-search-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="certificate-content">
                            <h5>{{ $certificate->title }}</h5>
                            <p class="certificate-desc">
                                <i class="fas fa-calendar-alt"></i>
                                Issued {{ \Carbon\Carbon::parse($certificate->created_at)->format('M Y') }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Slider Controls -->
            <div class="slider-controls">
                <button class="control-btn prev-btn" id="certPrevBtn" aria-label="Previous certifications">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="control-btn next-btn" id="certNextBtn" aria-label="Next certifications">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            
            <!-- Slider Dots -->
            <div class="slider-dots" id="certDots">
                @foreach($certificates as $index => $certificate)
                <button class="dot @if($index === 0) active @endif" 
                        data-index="{{ $index }}" 
                        aria-label="Go to certificate {{ $index + 1 }}">
                </button>
                @endforeach
            </div>
            
            <!-- Auto-play Toggle -->
            <div class="autoplay-control">
                <button class="autoplay-toggle" id="autoplayToggle" aria-label="Toggle autoplay">
                    <i class="fas fa-pause"></i>
                    <span>Pause</span>
                </button>
            </div>
        </div>
        
        <!-- Certificate Counter -->
        <div class="certificate-counter">
            <span class="current-slide" id="currentSlide">1</span>
            <span class="counter-divider">/</span>
            <span class="total-slides">{{ $certificates->count() }}</span>
        </div>
    </div>
</section>

<!-- Certificate Modal -->
<div class="certificate-modal" id="certificateModal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeCertificateModal()">
            <i class="fas fa-times"></i>
        </button>
        <div class="modal-image">
            <img id="modalCertificateImage" src="" alt="Certificate">
        </div>
        <div class="modal-info">
            <h3 id="modalCertificateTitle"></h3>
            <button class="btn btn-download" onclick="downloadCertificate()">
                <i class="fas fa-download"></i> Download Certificate
            </button>
        </div>
    </div>
</div>
@endif


<!-- Testimonials -->
@if($clientsFeedbacks->where('isActive', true)->count() > 0)
<section class="testimonials-section">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">
                <i class="fas fa-comments"></i>
                <span>Testimonials</span>
            </span>
            <h2 class="section-title">What Our Clients Say</h2>
            <p class="section-description">
                Success stories from farmers and agricultural businesses
            </p>
        </div>
        
        <div class="testimonials-grid">
            @foreach($clientsFeedbacks->where('isActive', true)->take(3) as $feedback)
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="client-info">
                        @if($feedback->image)
                        <img src="{{ asset('storage/' . $feedback->image) }}" 
                             alt="{{ $feedback->client_name }}" 
                             class="client-avatar">
                        @endif
                        <div>
                            <h4>{{ $feedback->client_name }}</h4>
                            <p class="client-role">{{ $feedback->profession }}</p>
                        </div>
                    </div>
                    <div class="rating">
                        @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star {{ $i <= 4 ? 'filled' : '' }}"></i>
                        @endfor
                    </div>
                </div>
                <p class="testimonial-text">"{{ $feedback->feedback }}"</p>
                <div class="testimonial-footer">
                    <span class="project-type">
                        <i class="fas fa-tractor"></i> Machinery Project
                    </span>
                    <span class="testimonial-date">
                        {{ \Carbon\Carbon::parse($feedback->created_at)->format('M d, Y') }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="cta-section" id="contact">
    <div class="container">
        <div class="cta-content">
            <h2 class="cta-title">Ready to Transform Your Agriculture?</h2>
            <p class="cta-text">
                Contact us today for custom machinery solutions, expert repairs, or genuine spare parts.
            </p>
            <div class="cta-buttons">
                <a href="tel:{{ $company->main_contact ?? '' }}" class="btn btn-primary">
                    <i class="fas fa-phone-alt me-2"></i>
                    <span>Call Now</span>
                </a>
                <a href="{{ route('contact') }}" class="btn btn-secondary">
                    <i class="fas fa-envelope me-2"></i>
                    <span>Send Message</span>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* ===== Modern Variables ===== */
:root {
    --primary: green;
    --primary-dark: #006400;
    --secondary: #02245B;
    --accent: #F59E0B;
    --light: #F8F9FA;
    --dark: #1A202C;
    --gray: #6B7280;
    --light-gray: #E5E7EB;
    --success: #10B981;
    --gradient: linear-gradient(135deg, #FF5E14 0%, #02245B 100%);
    --gradient-light: linear-gradient(135deg, #FF8A3D 0%, #0340A1 100%);
    --shadow-sm: 0 2px 4px rgba(0,0,0,0.05);
    --shadow-md: 0 4px 6px rgba(0,0,0,0.07);
    --shadow-lg: 0 10px 25px rgba(0,0,0,0.1);
    --shadow-xl: 0 20px 40px rgba(0,0,0,0.15);
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
    --radius-xl: 24px;
    --transition: all 0.3s ease;
}

/* ===== Base Styles ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    line-height: 1.6;
    color: var(--dark);
}

.container {
    width: 100%;
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 20px;
}

/* ===== Typography ===== */
.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.section-subtitle {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: var(--primary);
    font-weight: 600;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 15px;
}

.section-title {
    font-size: 42px;
    font-weight: 800;
    color: var(--secondary);
    margin-bottom: 20px;
    line-height: 1.2;
}

.section-description {
    font-size: 18px;
    color: var(--gray);
    max-width: 600px;
    margin: 0 auto;
}

/* ===== Buttons ===== */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 14px 32px;
    border-radius: var(--radius-md);
    font-weight: 600;
    font-size: 16px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: var(--transition);
    gap: 8px;
}

.btn-primary {
    background: var(--primary);
    color: white;
}

.btn-primary:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.btn-secondary {
    background: transparent;
    color: var(--primary);
    border: 2px solid var(--primary);
}

.btn-secondary:hover {
    background: var(--primary);
    color: white;
    transform: translateY(-2px);
}

.btn-sm {
    padding: 10px 24px;
    font-size: 14px;
}

/* ===== Modern Hero Section ===== */
.modern-hero-section {
    position: relative;
    min-height: 100vh;
    background: var(--secondary);
    overflow: hidden;
    padding-top: 80px;
}

.slider-container {
    position: relative;
    height: calc(100vh - 80px);
    width: 100%;
}

.slider-wrapper {
    height: 100%;
    position: relative;
}

.slider-slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.8s ease, visibility 0.8s;
}

.slider-slide.active {
    opacity: 1;
    visibility: visible;
}

.slide-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.slide-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(0.4);
}

.slide-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(2,36,91,0.9) 0%, rgba(2,36,91,0.7) 100%);
}

.slide-content {
    position: relative;
    z-index: 2;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: white;
    max-width: 700px;
    padding: 40px 0;
}

.slide-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(255, 94, 20, 0.2);
    backdrop-filter: blur(10px);
    padding: 10px 20px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 14px;
    margin-bottom: 30px;
    border: 1px solid rgba(255, 94, 20, 0.3);
}

.slide-title {
    font-size: 56px;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    color: green;
}

.slide-description {
    font-size: 18px;
    opacity: 0.9;
    margin-bottom: 40px;
    line-height: 1.6;
}

.slide-actions {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

/* Slider Controls */
.slider-controls {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
    z-index: 3;
    display: flex;
    justify-content: space-between;
    padding: 0 20px;
}

.control-btn {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: white;
    font-size: 20px;
    cursor: pointer;
    transition: var(--transition);
    display: flex;
    align-items: center;
    justify-content: center;
}

.control-btn:hover {
    background: var(--primary);
    transform: scale(1.1);
}

/* Slider Progress */
.slider-progress {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background: rgba(255, 255, 255, 0.1);
}

.progress-bar {
    height: 100%;
    background: var(--primary);
    width: 0%;
    transition: width 0.3s ease;
}

/* Stats Bar */
.hero-stats-bar {
    background: white;
    padding: 30px 0;
    box-shadow: var(--shadow-md);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    border-radius: var(--radius-md);
    background: var(--light);
    transition: var(--transition);
}

.stat-item:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.stat-item i {
    font-size: 32px;
    color: var(--primary);
}

.stat-content h3 {
    font-size: 28px;
    font-weight: 800;
    color: var(--secondary);
    margin-bottom: 5px;
}

.stat-content p {
    color: var(--gray);
    font-size: 14px;
    font-weight: 500;
}

/* ===== About Section ===== */
.about-section {
    padding: 100px 0;
    background: white;
}

.about-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.about-text {
    font-size: 16px;
    line-height: 1.8;
    color: var(--gray);
    margin-bottom: 40px;
}

.features-grid {
    display: grid;
    gap: 20px;
    margin-bottom: 40px;
}

.feature-item {
    display: flex;
    gap: 15px;
    padding: 20px;
    border-radius: var(--radius-md);
    background: var(--light);
    transition: var(--transition);
}

.feature-item:hover {
    transform: translateX(10px);
    box-shadow: var(--shadow-md);
}

.feature-icon {
    width: 48px;
    height: 48px;
    background: var(--primary);
    color: white;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 20px;
}

.feature-content h4 {
    font-size: 18px;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 5px;
}

.feature-content p {
    color: var(--gray);
    font-size: 14px;
    margin: 0;
}

.about-image {
    position: relative;
}

.image-wrapper {
    border-radius: var(--radius-xl);
    overflow: hidden;
    position: relative;
}

.image-wrapper img {
    width: 100%;
    height: auto;
    display: block;
}

.experience-badge {
    position: absolute;
    bottom: 30px;
    right: 30px;
    background: var(--primary);
    color: white;
    padding: 20px;
    border-radius: var(--radius-lg);
    text-align: center;
    box-shadow: var(--shadow-lg);
}

.experience-badge span {
    display: block;
    font-size: 36px;
    font-weight: 800;
    line-height: 1;
}

.experience-badge small {
    font-size: 14px;
    opacity: 0.9;
}

/* ===== Services Section ===== */
.services-section {
    padding: 100px 0;
    background: var(--light);
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
}

.service-card {
    background: white;
    padding: 40px 30px;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    transition: var(--transition);
    text-align: center;
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
}

.service-icon {
    width: 70px;
    height: 70px;
    background: var(--gradient-light);
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 25px;
    color: white;
    font-size: 28px;
}

.service-card h3 {
    font-size: 22px;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 15px;
}

.service-card p {
    color: var(--gray);
    font-size: 15px;
    line-height: 1.6;
    margin-bottom: 25px;
}

.service-link {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: var(--primary);
    font-weight: 600;
    text-decoration: none;
    font-size: 15px;
    transition: var(--transition);
}

.service-link:hover {
    gap: 15px;
}

/* ===== Products Section ===== */
.products-section {
    padding: 100px 0;
    background: white;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.product-card {
    background: white;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: var(--transition);
}

.product-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
}

.product-image {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.product-card:hover .product-image img {
    transform: scale(1.1);
}

.product-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(2, 36, 91, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-card:hover .product-overlay {
    opacity: 1;
}

.view-btn, .quote-btn {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: white;
    color: var(--primary);
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 20px;
    transition: var(--transition);
}

.view-btn:hover, .quote-btn:hover {
    background: var(--primary);
    color: white;
    transform: scale(1.1);
}

.product-content {
    padding: 25px;
}

.product-category {
    display: inline-block;
    color: var(--primary);
    font-weight: 600;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 10px;
}

.product-title {
    font-size: 20px;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 15px;
}

.product-specs {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.product-specs span {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: var(--light);
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 13px;
    color: var(--gray);
}

.product-specs i {
    color: var(--primary);
}

/* ===== Features Section ===== */
.features-section {
    padding: 100px 0;
    background: var(--secondary);
    color: white;
}

.features-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.highlight-subtitle {
    display: inline-block;
    color: var(--primary);
    font-weight: 600;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 20px;
}

.highlight-title {
    color: green;
    font-size: 36px;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 20px;
}

.highlight-text {
    font-size: 16px;
    opacity: 0.9;
    line-height: 1.6;
    margin-bottom: 40px;
}

.highlight-stats {
    display: flex;
    gap: 40px;
}

.highlight-stat h3 {
    font-size: 42px;
    font-weight: 800;
    color: var(--primary);
    margin-bottom: 5px;
}

.highlight-stat p {
    font-size: 14px;
    opacity: 0.9;
}

.features-list {
    display: grid;
    gap: 20px;
}

/* ===== Certifications ===== */
.certifications-section {
    padding: 100px 0;
    background: white;
}

.certifications-slider {
    display: flex;
    gap: 30px;
    overflow-x: auto;
    padding: 20px 0;
    scrollbar-width: thin;
    scrollbar-color: var(--primary) var(--light-gray);
}

.certifications-slider::-webkit-scrollbar {
    height: 6px;
}

.certifications-slider::-webkit-scrollbar-track {
    background: var(--light-gray);
    border-radius: 3px;
}

.certifications-slider::-webkit-scrollbar-thumb {
    background: var(--primary);
    border-radius: 3px;
}

.certificate-slide {
    flex: 0 0 auto;
    width: 200px;
    text-align: center;
}

.certificate-image {
    height: 120px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: var(--light);
    border-radius: var(--radius-md);
    margin-bottom: 15px;
}

.certificate-image img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.certificate-slide h5 {
    font-size: 16px;
    font-weight: 600;
    color: var(--secondary);
}

/* ===== Testimonials ===== */
.testimonials-section {
    padding: 100px 0;
    background: var(--light);
}

.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.testimonial-card {
    background: white;
    padding: 30px;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
}

.testimonial-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 20px;
}

.client-info {
    display: flex;
    align-items: center;
    gap: 15px;
}

.client-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}

.client-info h4 {
    font-size: 18px;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 5px;
}

.client-role {
    font-size: 14px;
    color: var(--primary);
    font-weight: 600;
}

.rating {
    color: #FFC107;
}

.rating i.filled {
    color: #FFC107;
}

.rating i:not(.filled) {
    color: var(--light-gray);
}

.testimonial-text {
    font-size: 16px;
    line-height: 1.6;
    color: var(--gray);
    font-style: italic;
    margin-bottom: 20px;
}

.testimonial-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 20px;
    border-top: 1px solid var(--light-gray);
    font-size: 14px;
    color: var(--gray);
}

.project-type {
    display: flex;
    align-items: center;
    gap: 5px;
}

/* ===== CTA Section ===== */
.cta-section {
    padding: 100px 0;
    background: var(--gradient);
    color: white;
    text-align: center;
}

.cta-title {
    font-size: 42px;
    font-weight: 800;
    margin-bottom: 20px;
}

.cta-text {
    font-size: 18px;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto 40px;
}

.cta-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

/* ===== Responsive Design ===== */
@media (max-width: 1200px) {
    .services-grid,
    .products-grid,
    .testimonials-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 992px) {
    .section-title {
        font-size: 36px;
    }
    
    .about-grid,
    .features-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .slide-title {
        font-size: 42px;
    }
    
    .hero-stats-bar {
        padding: 20px 0;
    }
}

@media (max-width: 768px) {
    .section-title {
        font-size: 32px;
    }
    
    .slide-title {
        font-size: 32px;
    }
    
    .services-grid,
    .products-grid,
    .testimonials-grid {
        grid-template-columns: 1fr;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .slider-controls {
        display: none;
    }
    
    .slide-actions {
        flex-direction: column;
    }
    
    .slide-actions .btn {
        width: 100%;
    }
    
    .experience-badge {
        bottom: 20px;
        right: 20px;
        padding: 15px;
    }
    
    .experience-badge span {
        font-size: 28px;
    }
}

@media (max-width: 576px) {
    .section-title {
        font-size: 28px;
    }
    
    .slide-title {
        font-size: 28px;
    }
    
    .container {
        padding: 0 15px;
    }
    
    .btn {
        padding: 12px 24px;
        font-size: 14px;
    }
    
    .highlight-stats {
        flex-direction: column;
        gap: 20px;
    }
    
    .cta-buttons {
        flex-direction: column;
    }
    
    .cta-buttons .btn {
        width: 100%;
    }
}

/* ===== Animations ===== */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.fade-in-up {
    animation: fadeInUp 0.6s ease forwards;
}

@keyframes progress {
    from { width: 0%; }
    to { width: 100%; }
}

/* ===== Loading States ===== */
.lazy-load {
    opacity: 0;
    transition: opacity 0.3s ease;
}

.lazy-load.loaded {
    opacity: 1;
}



<style>
/* ===== Certifications Slider ===== */
.certifications-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    position: relative;
    overflow: hidden;
}

.certifications-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--primary), transparent);
}

/* Slider Container */
.certifications-container {
    position: relative;
    max-width: 1200px;
    margin: 0 auto 50px;
    padding: 0 60px;
    overflow: hidden;
}

/* Slider Track */
.certifications-track {
    display: flex;
    gap: 30px;
    transition: transform 0.5s ease;
    padding: 20px 0;
}

/* Certificate Slide */
.certificate-slide {
    flex: 0 0 calc(100% / 4 - 30px);
    min-width: 250px;
}

@media (max-width: 1200px) {
    .certificate-slide {
        flex: 0 0 calc(100% / 3 - 30px);
    }
}

@media (max-width: 768px) {
    .certificate-slide {
        flex: 0 0 calc(100% / 2 - 30px);
    }
    
    .certifications-container {
        padding: 0 40px;
    }
}

@media (max-width: 576px) {
    .certificate-slide {
        flex: 0 0 calc(100% - 30px);
    }
    
    .certifications-container {
        padding: 0 20px;
    }
}

/* Certificate Card */
.certificate-card {
    background: white;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.certificate-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

/* Certificate Image */
.certificate-image {
    position: relative;
    height: 180px;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 30px;
    border-bottom: 1px solid var(--light-gray);
}

.certificate-image img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.certificate-card:hover .certificate-image img {
    transform: scale(1.05);
}

.certificate-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(2, 36, 91, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.certificate-card:hover .certificate-overlay {
    opacity: 1;
}

.zoom-btn {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: white;
    color: var(--primary);
    border: none;
    cursor: pointer;
    font-size: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.zoom-btn:hover {
    background: var(--primary);
    color: white;
    transform: scale(1.1);
}

/* Certificate Content */
.certificate-content {
    padding: 20px;
    text-align: center;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.certificate-content h5 {
    font-size: 16px;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 10px;
    line-height: 1.4;
}

.certificate-desc {
    font-size: 13px;
    color: var(--gray);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin: 0;
}

.certificate-desc i {
    color: var(--primary);
}

/* Slider Controls */
.slider-controls {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
    pointer-events: none;
    z-index: 2;
}

.control-btn {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: white;
    border: 2px solid var(--light-gray);
    color: var(--secondary);
    font-size: 18px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    pointer-events: auto;
    box-shadow: var(--shadow-md);
}

.control-btn:hover {
    background: var(--primary);
    color: white;
    border-color: var(--primary);
    transform: scale(1.1);
}

.control-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none;
}

/* Slider Dots */
.slider-dots {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 30px;
}

.dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: var(--light-gray);
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 0;
}

.dot.active {
    background: var(--primary);
    transform: scale(1.2);
}

.dot:hover:not(.active) {
    background: var(--gray);
}

/* Auto-play Control */
.autoplay-control {
    position: absolute;
    bottom: -40px;
    right: 0;
}

.autoplay-toggle {
    display: flex;
    align-items: center;
    gap: 8px;
    background: var(--primary);
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: var(--radius-md);
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.autoplay-toggle:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
}

.autoplay-toggle.paused i {
    transform: rotate(90deg);
}

/* Certificate Counter */
.certificate-counter {
    text-align: center;
    margin-top: 20px;
    font-size: 18px;
    font-weight: 600;
    color: var(--secondary);
}

.current-slide {
    color: var(--primary);
    font-size: 24px;
}

.counter-divider {
    margin: 0 10px;
    opacity: 0.5;
}

/* Certificate Modal */
.certificate-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    z-index: 9999;
    padding: 20px;
    animation: modalFadeIn 0.3s ease;
}

@keyframes modalFadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.modal-content {
    max-width: 800px;
    margin: 50px auto;
    background: white;
    border-radius: var(--radius-lg);
    overflow: hidden;
    position: relative;
    animation: modalSlideIn 0.3s ease;
}

@keyframes modalSlideIn {
    from {
        transform: translateY(-50px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.modal-close {
    position: absolute;
    top: 15px;
    right: 15px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    font-size: 20px;
    cursor: pointer;
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.modal-close:hover {
    background: var(--primary);
    transform: rotate(90deg);
}

.modal-image {
    padding: 40px;
    background: white;
    text-align: center;
    max-height: 60vh;
    overflow-y: auto;
}

.modal-image img {
    max-width: 100%;
    height: auto;
    border-radius: var(--radius-md);
}

.modal-info {
    padding: 20px;
    background: var(--light);
    border-top: 1px solid var(--light-gray);
    text-align: center;
}

.modal-info h3 {
    color: var(--secondary);
    margin-bottom: 20px;
}

.btn-download {
    background: var(--primary);
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: var(--radius-md);
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.btn-download:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
}

/* Slider Animation for Infinite Loop */
@keyframes slide {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

.certifications-track.auto-slide {
    animation: slide 30s linear infinite;
}

.certifications-track.auto-slide:hover {
    animation-play-state: paused;
}

/* Responsive Adjustments */
@media (max-width: 992px) {
    .certificate-image {
        height: 150px;
        padding: 20px;
    }
    
    .control-btn {
        width: 40px;
        height: 40px;
        font-size: 16px;
    }
}

@media (max-width: 768px) {
    .certifications-section {
        padding: 60px 0;
    }
    
    .certificate-image {
        height: 120px;
        padding: 15px;
    }
    
    .certificate-content h5 {
        font-size: 14px;
    }
    
    .slider-dots {
        margin-top: 20px;
    }
}

@media (max-width: 576px) {
    .certificate-slide {
        min-width: 200px;
    }
    
    .certificate-image {
        height: 100px;
    }
    
    .modal-content {
        margin: 20px auto;
    }
    
    .modal-image {
        padding: 20px;
    }
}

/* Fade Edges Effect */
.certifications-container::before,
.certifications-container::after {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    width: 60px;
    z-index: 1;
    pointer-events: none;
}

.certifications-container::before {
    left: 0;
    background: linear-gradient(to right, #f8fafc, transparent);
}

.certifications-container::after {
    right: 0;
    background: linear-gradient(to left, #f8fafc, transparent);
}

@media (max-width: 768px) {
    .certifications-container::before,
    .certifications-container::after {
        width: 40px;
    }
}

@media (max-width: 576px) {
    .certifications-container::before,
    .certifications-container::after {
        width: 20px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced Slider Functionality
    class Slider {
        constructor() {
            this.slides = document.querySelectorAll('.slider-slide');
            this.currentSlide = 0;
            this.slideInterval = null;
            this.slideDuration = 5000;
            this.isAnimating = false;
            
            this.init();
        }
        
        init() {
            // Initialize controls
            this.initControls();
            
            // Start autoplay
            this.startAutoplay();
            
            // Initialize progress bar
            this.initProgressBar();
            
            // Keyboard navigation
            this.initKeyboardNavigation();
            
            // Touch/swipe support
            this.initTouchSupport();
            
            // Lazy load images
            this.lazyLoadImages();
        }
        
        initControls() {
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');
            
            prevBtn?.addEventListener('click', () => this.prevSlide());
            nextBtn?.addEventListener('click', () => this.nextSlide());
        }
        
        showSlide(index) {
            if (this.isAnimating) return;
            this.isAnimating = true;
            
            // Hide current slide
            this.slides[this.currentSlide].classList.remove('active');
            
            // Update current slide
            this.currentSlide = (index + this.slides.length) % this.slides.length;
            
            // Show new slide
            this.slides[this.currentSlide].classList.add('active');
            
            // Reset progress bar
            this.resetProgressBar();
            
            // Lazy load current slide image
            const currentImg = this.slides[this.currentSlide].querySelector('img');
            this.loadImage(currentImg);
            
            setTimeout(() => {
                this.isAnimating = false;
            }, 800);
        }
        
        nextSlide() {
            this.showSlide(this.currentSlide + 1);
            this.resetAutoplay();
        }
        
        prevSlide() {
            this.showSlide(this.currentSlide - 1);
            this.resetAutoplay();
        }
        
        startAutoplay() {
            this.slideInterval = setInterval(() => {
                this.nextSlide();
            }, this.slideDuration);
        }
        
        resetAutoplay() {
            clearInterval(this.slideInterval);
            this.startAutoplay();
        }
        
        initProgressBar() {
            this.progressBar = document.querySelector('.progress-bar');
            this.startProgressBar();
        }
        
        startProgressBar() {
            this.progressBar.style.animation = `progress ${this.slideDuration}ms linear forwards`;
        }
        
        resetProgressBar() {
            this.progressBar.style.animation = 'none';
            void this.progressBar.offsetWidth; // Trigger reflow
            this.startProgressBar();
        }
        
        initKeyboardNavigation() {
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') this.prevSlide();
                if (e.key === 'ArrowRight') this.nextSlide();
                if (e.key === ' ') {
                    e.preventDefault();
                    if (this.slideInterval) {
                        clearInterval(this.slideInterval);
                        this.slideInterval = null;
                    } else {
                        this.startAutoplay();
                    }
                }
            });
        }
        
        initTouchSupport() {
            let startX = 0;
            let endX = 0;
            
            const slider = document.querySelector('.slider-container');
            
            slider.addEventListener('touchstart', (e) => {
                startX = e.touches[0].clientX;
            });
            
            slider.addEventListener('touchmove', (e) => {
                endX = e.touches[0].clientX;
            });
            
            slider.addEventListener('touchend', () => {
                const threshold = 50;
                const diff = startX - endX;
                
                if (Math.abs(diff) > threshold) {
                    if (diff > 0) {
                        this.nextSlide();
                    } else {
                        this.prevSlide();
                    }
                }
            });
        }
        
        lazyLoadImages() {
            const lazyImages = document.querySelectorAll('img[data-lazy]');
            
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        this.loadImage(img);
                        observer.unobserve(img);
                    }
                });
            });
            
            lazyImages.forEach(img => imageObserver.observe(img));
        }
        
        loadImage(img) {
            if (!img.dataset.lazy) return;
            
            img.src = img.dataset.lazy;
            img.classList.add('loaded');
            delete img.dataset.lazy;
        }
    }
    
    // Initialize slider
    const slider = new Slider();
    
    // Counter Animation
    class Counter {
        constructor() {
            this.counters = document.querySelectorAll('.counter');
            this.init();
        }
        
        init() {
            this.counters.forEach(counter => {
                this.animateCounter(counter);
            });
        }
        
        animateCounter(counter) {
            const target = parseInt(counter.dataset.target);
            const duration = 2000;
            const step = Math.ceil(target / (duration / 16)); // 60fps
            
            let current = 0;
            
            const updateCounter = () => {
                current += step;
                if (current >= target) {
                    current = target;
                    counter.textContent = current;
                    return;
                }
                
                counter.textContent = current;
                requestAnimationFrame(updateCounter);
            };
            
            // Start when in viewport
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        updateCounter();
                        observer.unobserve(entry.target);
                    }
                });
            });
            
            observer.observe(counter);
        }
    }
    
    // Initialize counter
    const counter = new Counter();
    
    // Scroll Animations
    class ScrollAnimations {
        constructor() {
            this.animatedElements = document.querySelectorAll('.fade-in-up');
            this.init();
        }
        
        init() {
            this.checkScroll();
            window.addEventListener('scroll', () => this.checkScroll());
            window.addEventListener('resize', () => this.checkScroll());
        }
        
        checkScroll() {
            this.animatedElements.forEach(element => {
                const rect = element.getBoundingClientRect();
                const windowHeight = window.innerHeight;
                
                if (rect.top <= windowHeight - 100) {
                    element.classList.add('visible');
                }
            });
        }
    }
    
    // Initialize scroll animations
    const scrollAnimations = new ScrollAnimations();
    
    // Smooth Scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                const headerHeight = 80;
                const targetPosition = targetElement.offsetTop - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Mobile Menu Toggle (if needed)
    const initMobileMenu = () => {
        const menuToggle = document.querySelector('.menu-toggle');
        const mobileMenu = document.querySelector('.mobile-menu');
        
        if (menuToggle && mobileMenu) {
            menuToggle.addEventListener('click', () => {
                mobileMenu.classList.toggle('active');
                document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
            });
            
            // Close menu on link click
            mobileMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.remove('active');
                    document.body.style.overflow = '';
                });
            });
        }
    };
    
    initMobileMenu();
    
    // Initialize tooltips
    const initTooltips = () => {
        const tooltipElements = document.querySelectorAll('[data-tooltip]');
        
        tooltipElements.forEach(element => {
            element.addEventListener('mouseenter', (e) => {
                const tooltipText = element.dataset.tooltip;
                const tooltip = document.createElement('div');
                tooltip.className = 'tooltip';
                tooltip.textContent = tooltipText;
                document.body.appendChild(tooltip);
                
                const rect = element.getBoundingClientRect();
                tooltip.style.left = `${rect.left + rect.width / 2}px`;
                tooltip.style.top = `${rect.top - 10}px`;
                tooltip.style.transform = 'translateX(-50%)';
            });
            
            element.addEventListener('mouseleave', () => {
                const tooltip = document.querySelector('.tooltip');
                if (tooltip) tooltip.remove();
            });
        });
    };
    
    initTooltips();
});


document.addEventListener('DOMContentLoaded', function() {
    // Certifications Slider
    class CertificationsSlider {
        constructor() {
            this.track = document.getElementById('certificationsTrack');
            this.prevBtn = document.getElementById('certPrevBtn');
            this.nextBtn = document.getElementById('certNextBtn');
            this.dots = document.querySelectorAll('.dot');
            this.currentSlide = document.getElementById('currentSlide');
            this.autoplayToggle = document.getElementById('autoplayToggle');
            
            this.slides = document.querySelectorAll('.certificate-slide');
            this.originalSlidesCount = {{ $certificates->count() }};
            this.slideWidth = this.slides[0]?.offsetWidth || 0;
            this.gap = 30;
            this.currentIndex = 0;
            this.isTransitioning = false;
            this.isAutoPlaying = true;
            this.autoPlayInterval = null;
            this.slideDuration = 3000; // 3 seconds per slide
            
            this.init();
        }
        
        init() {
            // Set initial position
            this.updateTrackPosition();
            
            // Initialize controls
            this.initControls();
            
            // Start auto-play
            this.startAutoPlay();
            
            // Initialize responsive behavior
            this.initResponsive();
            
            // Update counter
            this.updateCounter();
        }
        
        updateTrackPosition(instant = false) {
            if (instant) {
                this.track.style.transition = 'none';
            } else {
                this.track.style.transition = 'transform 0.5s ease';
            }
            
            const position = -(this.currentIndex * (this.slideWidth + this.gap));
            this.track.style.transform = `translateX(${position}px)`;
            
            // Handle infinite loop
            setTimeout(() => {
                if (this.currentIndex >= this.originalSlidesCount) {
                    this.currentIndex = 0;
                    this.updateTrackPosition(true);
                }
            }, 500);
        }
        
        initControls() {
            // Previous button
            this.prevBtn.addEventListener('click', () => {
                this.prev();
                this.resetAutoPlay();
            });
            
            // Next button
            this.nextBtn.addEventListener('click', () => {
                this.next();
                this.resetAutoPlay();
            });
            
            // Dots navigation
            this.dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    const index = parseInt(dot.dataset.index);
                    this.goToSlide(index);
                    this.resetAutoPlay();
                });
            });
            
            // Auto-play toggle
            this.autoplayToggle.addEventListener('click', () => {
                this.toggleAutoPlay();
            });
            
            // Pause on hover
            this.track.addEventListener('mouseenter', () => {
                if (this.isAutoPlaying) {
                    this.pauseAutoPlay();
                }
            });
            
            this.track.addEventListener('mouseleave', () => {
                if (this.isAutoPlaying) {
                    this.resumeAutoPlay();
                }
            });
            
            // Keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    this.prev();
                    this.resetAutoPlay();
                } else if (e.key === 'ArrowRight') {
                    this.next();
                    this.resetAutoPlay();
                } else if (e.key === ' ') {
                    e.preventDefault();
                    this.toggleAutoPlay();
                }
            });
            
            // Touch/swipe support
            let startX = 0;
            let endX = 0;
            
            this.track.addEventListener('touchstart', (e) => {
                startX = e.touches[0].clientX;
            });
            
            this.track.addEventListener('touchmove', (e) => {
                endX = e.touches[0].clientX;
            });
            
            this.track.addEventListener('touchend', () => {
                const threshold = 50;
                const diff = startX - endX;
                
                if (Math.abs(diff) > threshold) {
                    if (diff > 0) {
                        this.next();
                    } else {
                        this.prev();
                    }
                    this.resetAutoPlay();
                }
            });
        }
        
        next() {
            if (this.isTransitioning) return;
            this.isTransitioning = true;
            
            this.currentIndex++;
            this.updateTrackPosition();
            this.updateDots();
            this.updateCounter();
            
            setTimeout(() => {
                this.isTransitioning = false;
            }, 500);
        }
        
        prev() {
            if (this.isTransitioning) return;
            this.isTransitioning = true;
            
            if (this.currentIndex === 0) {
                this.currentIndex = this.originalSlidesCount;
                this.updateTrackPosition(true);
                setTimeout(() => {
                    this.currentIndex--;
                    this.updateTrackPosition();
                }, 50);
            } else {
                this.currentIndex--;
                this.updateTrackPosition();
            }
            
            this.updateDots();
            this.updateCounter();
            
            setTimeout(() => {
                this.isTransitioning = false;
            }, 500);
        }
        
        goToSlide(index) {
            if (this.isTransitioning) return;
            this.isTransitioning = true;
            
            this.currentIndex = index;
            this.updateTrackPosition();
            this.updateDots();
            this.updateCounter();
            
            setTimeout(() => {
                this.isTransitioning = false;
            }, 500);
        }
        
        updateDots() {
            const activeIndex = this.currentIndex % this.originalSlidesCount;
            this.dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === activeIndex);
            });
        }
        
        updateCounter() {
            const displayIndex = (this.currentIndex % this.originalSlidesCount) + 1;
            this.currentSlide.textContent = displayIndex;
        }
        
        startAutoPlay() {
            if (this.autoPlayInterval) clearInterval(this.autoPlayInterval);
            
            this.autoPlayInterval = setInterval(() => {
                this.next();
            }, this.slideDuration);
            
            this.isAutoPlaying = true;
            this.updateAutoPlayButton();
        }
        
        pauseAutoPlay() {
            if (this.autoPlayInterval) {
                clearInterval(this.autoPlayInterval);
                this.autoPlayInterval = null;
                this.isAutoPlaying = false;
                this.updateAutoPlayButton();
            }
        }
        
        resumeAutoPlay() {
            if (!this.autoPlayInterval) {
                this.startAutoPlay();
            }
        }
        
        resetAutoPlay() {
            this.pauseAutoPlay();
            this.resumeAutoPlay();
        }
        
        toggleAutoPlay() {
            if (this.isAutoPlaying) {
                this.pauseAutoPlay();
            } else {
                this.startAutoPlay();
            }
        }
        
        updateAutoPlayButton() {
            const icon = this.autoplayToggle.querySelector('i');
            const text = this.autoplayToggle.querySelector('span');
            
            if (this.isAutoPlaying) {
                icon.className = 'fas fa-pause';
                text.textContent = 'Pause';
                this.autoplayToggle.classList.remove('paused');
            } else {
                icon.className = 'fas fa-play';
                text.textContent = 'Play';
                this.autoplayToggle.classList.add('paused');
            }
        }
        
        initResponsive() {
            // Update slide width on resize
            const updateSlideWidth = () => {
                this.slideWidth = this.slides[0]?.offsetWidth || 0;
                this.updateTrackPosition(true);
            };
            
            window.addEventListener('resize', updateSlideWidth);
            updateSlideWidth();
        }
    }
    
    // Initialize slider
    const certSlider = new CertificationsSlider();
    
    // Certificate Modal Functions
    function openCertificateModal(imageSrc, title) {
        const modal = document.getElementById('certificateModal');
        const modalImage = document.getElementById('modalCertificateImage');
        const modalTitle = document.getElementById('modalCertificateTitle');
        
        modalImage.src = imageSrc;
        modalTitle.textContent = title;
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
        
        // Store image for download
        modalImage.dataset.downloadUrl = imageSrc;
        modalImage.dataset.downloadName = title.replace(/\s+/g, '-').toLowerCase() + '.jpg';
    }
    
    function closeCertificateModal() {
        const modal = document.getElementById('certificateModal');
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
    
    function downloadCertificate() {
        const image = document.getElementById('modalCertificateImage');
        const link = document.createElement('a');
        link.href = image.dataset.downloadUrl;
        link.download = image.dataset.downloadName;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
    
    // Close modal on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeCertificateModal();
        }
    });
    
    // Close modal when clicking outside
    document.getElementById('certificateModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeCertificateModal();
        }
    });
    
    // Lazy load images
    const lazyImages = document.querySelectorAll('.certificate-image img');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.src;
                img.classList.add('loaded');
                observer.unobserve(img);
            }
        });
    });
    
    lazyImages.forEach(img => imageObserver.observe(img));
});
</script>

@include('Templates.footer')