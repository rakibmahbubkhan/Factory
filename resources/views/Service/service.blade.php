@include('Templates.header')

<!-- Services Hero Section -->
<section class="services-hero">
    <div class="hero-container">
        <div class="hero-content">
            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fas fa-cogs"></i> Services
                    </li>
                </ol>
            </nav>
            <h1 class="hero-title">
                <span class="hero-highlight">Agricultural Machinery</span>
                <br>Services & Solutions
            </h1>
            <p class="hero-description">
                Comprehensive services for all your agricultural machinery needs - from manufacturing to maintenance
            </p>
        </div>
        
        <!-- Service Stats -->
        <div class="service-stats">
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-industry"></i>
                </div>
                <div class="stat-content">
                    <h3>20+ Years</h3>
                    <p>Industry Experience</p>
                </div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="stat-content">
                    <h3>50+ Expert</h3>
                    <p>Technicians</p>
                </div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <div class="stat-content">
                    <h3>24/7</h3>
                    <p>Support Available</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Hero Background Elements -->
    <div class="hero-elements">
        <div class="element element-1">
            <i class="fas fa-cog"></i>
        </div>
        <div class="element element-2">
            <i class="fas fa-tractor"></i>
        </div>
        <div class="element element-3">
            <i class="fas fa-wrench"></i>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="services-overview">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">
                <i class="fas fa-cogs"></i>
                <span>Our Expertise</span>
            </span>
            <h2 class="section-title">Complete Machinery Solutions</h2>
            <p class="section-description">
                From custom manufacturing to comprehensive maintenance - we handle all aspects of agricultural machinery
            </p>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="services-grid-section">
    <div class="container">
        <div class="services-grid">
            @foreach($services as $service)
            <div class="service-card">
                <div class="service-image">
                    @if($service->image1)
                    <img src="{{ asset('storage/' . $service->image1) }}" 
                         alt="{{ $service->title }}" 
                         loading="lazy">
                    <div class="service-overlay">
                        <button class="service-zoom" onclick="openServiceModal('{{ $service->id }}')">
                            <i class="fas fa-search-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="service-content">
                    <div class="service-header">
                        <div class="service-icon">
                            <i class="fas fa-{{ getServiceIcon($service->title) }}"></i>
                        </div>
                        <h3>{{ $service->title }}</h3>
                    </div>
                    <p class="service-description">
                        {{ $service->description }}
                    </p>
                    <div class="service-features">
                        @if($service->image2)
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Custom Solutions</span>
                        </div>
                        @endif
                        @if($service->image3)
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Expert Support</span>
                        </div>
                        @endif
                    </div>
                    <div class="service-actions">
                        <a href="#contact" class="btn btn-primary">
                            <i class="fas fa-envelope me-2"></i>
                            <span>Get Quote</span>
                        </a>
                        <button class="btn btn-secondary" onclick="openServiceModal('{{ $service->id }}')">
                            <i class="fas fa-info-circle me-2"></i>
                            <span>Learn More</span>
                        </button>
                    </div>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Service Process -->
<section class="service-process">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">
                <i class="fas fa-list-ol"></i>
                <span>Our Process</span>
            </span>
            <h2 class="section-title">How We Deliver Excellence</h2>
        </div>
        
        <div class="process-timeline">
            <div class="process-step">
                <div class="step-number">01</div>
                <div class="step-content">
                    <h4>Consultation & Analysis</h4>
                    <p>Understanding your specific agricultural machinery requirements</p>
                </div>
            </div>
            
            <div class="process-step">
                <div class="step-number">02</div>
                <div class="step-content">
                    <h4>Planning & Design</h4>
                    <p>Creating customized machinery solutions with precision engineering</p>
                </div>
            </div>
            
            <div class="process-step">
                <div class="step-number">03</div>
                <div class="step-content">
                    <h4>Manufacturing</h4>
                    <p>Quality-controlled production using advanced manufacturing techniques</p>
                </div>
            </div>
            
            <div class="process-step">
                <div class="step-number">04</div>
                <div class="step-content">
                    <h4>Installation & Support</h4>
                    <p>Professional installation and ongoing maintenance services</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Our Services -->
<section class="why-choose-services">
    <div class="container">
        <div class="why-choose-grid">
            <div class="why-choose-content">
                <div class="section-header left-align">
                    <span class="section-subtitle">
                        <i class="fas fa-star"></i>
                        <span>Why Choose Us</span>
                    </span>
                    <h2 class="section-title">Excellence in Agricultural Machinery Services</h2>
                </div>
                
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div class="benefit-content">
                            <h4>Certified Quality</h4>
                            <p>ISO certified manufacturing and service processes</p>
                        </div>
                    </div>
                    
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="benefit-content">
                            <h4>Timely Delivery</h4>
                            <p>Guaranteed project completion within deadlines</p>
                        </div>
                    </div>
                    
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <div class="benefit-content">
                            <h4>Modern Equipment</h4>
                            <p>State-of-the-art machinery and tools for all services</p>
                        </div>
                    </div>
                    
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="benefit-content">
                            <h4>Expert Team</h4>
                            <p>Experienced engineers and technicians</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="why-choose-image">
                <div class="image-wrapper">
                    <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                         alt="Agricultural Machinery Service" 
                         loading="lazy">
                    <div class="image-badge">
                        <i class="fas fa-award"></i>
                        <span>Quality Assured</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
@if($clientsFeedbacks->where('isActive', true)->count() > 0)
<section class="services-testimonials">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">
                <i class="fas fa-comments"></i>
                <span>Client Feedback</span>
            </span>
            <h2 class="section-title">What Farmers Say About Our Services</h2>
            <p class="section-description">
                Success stories from agricultural businesses we've served
            </p>
        </div>
        
        <div class="testimonials-slider">
            <div class="slider-track">
                @foreach($clientsFeedbacks->where('isActive', true) as $feedback)
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        @if($feedback->image)
                        <img src="{{ asset('storage/' . $feedback->image) }}" 
                             alt="{{ $feedback->client_name }}" 
                             class="client-avatar">
                        @endif
                        <div class="client-info">
                            <h4>{{ $feedback->client_name }}</h4>
                            <p class="client-role">{{ $feedback->profession }}</p>
                        </div>
                        <div class="testimonial-rating">
                            @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= 4 ? 'filled' : '' }}"></i>
                            @endfor
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <p>"{{ $feedback->feedback }}"</p>
                    </div>
                    <div class="testimonial-footer">
                        <span class="service-type">
                            <i class="fas fa-tractor"></i> Machinery Service
                        </span>
                        <span class="testimonial-date">
                            {{ \Carbon\Carbon::parse($feedback->created_at)->format('M d, Y') }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="slider-controls">
                <button class="slider-prev" aria-label="Previous testimonial">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="slider-next" aria-label="Next testimonial">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Service CTA -->
<section class="service-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Need Agricultural Machinery Services?</h2>
            <p>Get expert consultation and customized solutions for your farming equipment</p>
            <div class="cta-buttons">
                <a href="tel:{{ $company->main_contact ?? '' }}" class="btn btn-primary">
                    <i class="fas fa-phone-alt me-2"></i>
                    <span>Call Now</span>
                </a>
                <a href="{{ route('contact') }}" class="btn btn-secondary">
                    <i class="fas fa-envelope me-2"></i>
                    <span>Request Quote</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Service Modal -->
<div class="service-modal" id="serviceModal">
    <div class="modal-container">
        <button class="modal-close" onclick="closeServiceModal()" aria-label="Close modal">
            <i class="fas fa-times"></i>
        </button>
        
        <div class="modal-content" id="serviceModalContent">
            <!-- Dynamic content will be loaded here -->
        </div>
    </div>
</div>

<!-- Helper function for service icons -->
<?php
function getServiceIcon($title) {
    $title = strtolower($title);
    if (strpos($title, 'manufacturing') !== false) return 'industry';
    if (strpos($title, 'repair') !== false) return 'wrench';
    if (strpos($title, 'maintenance') !== false) return 'tools';
    if (strpos($title, 'design') !== false) return 'ruler-combined';
    if (strpos($title, 'installation') !== false) return 'screwdriver';
    if (strpos($title, 'consultation') !== false) return 'headset';
    return 'cog';
}
?>

<style>
/* ===== Services Hero ===== */
.services-hero {
    background: linear-gradient(rgba(2, 36, 91, 0.9), rgba(2, 36, 91, 0.85)),
                url('https://images.unsplash.com/photo-1577223625815-6d472abf0d8f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');
    background-size: cover;
    background-position: center;
    color: white;
    padding: 120px 0 80px;
    position: relative;
    overflow: hidden;
}

.hero-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    position: relative;
    z-index: 2;
}

.breadcrumb-nav {
    margin-bottom: 30px;
}

.breadcrumb {
    background: transparent;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.breadcrumb-item a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 500;
    transition: color 0.3s ease;
}

.breadcrumb-item a:hover {
    color: var(--primary);
}

.breadcrumb-item.active {
    color: var(--primary);
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 20px;
}

.hero-highlight {
    color: var(--primary);
    position: relative;
    display: inline-block;
}

.hero-highlight::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 100%;
    height: 3px;
    background: var(--primary);
    transform: scaleX(0);
    transform-origin: left;
    animation: highlight 1s ease forwards 0.5s;
}

@keyframes highlight {
    to {
        transform: scaleX(1);
    }
}

.hero-description {
    font-size: 1.2rem;
    opacity: 0.9;
    max-width: 600px;
    margin-bottom: 40px;
    line-height: 1.6;
}

.service-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-top: 60px;
    padding-top: 40px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 20px;
}

.stat-icon {
    width: 60px;
    height: 60px;
    background: rgba(255, 94, 20, 0.2);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: var(--primary);
    border: 1px solid rgba(255, 94, 20, 0.3);
}

.stat-content h3 {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 5px;
    color: white;
}

.stat-content p {
    font-size: 0.9rem;
    opacity: 0.8;
    margin: 0;
}

.hero-elements {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.element {
    position: absolute;
    color: rgba(255, 255, 255, 0.05);
    font-size: 8rem;
    animation: float 20s infinite linear;
}

.element-1 {
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.element-2 {
    top: 60%;
    right: 15%;
    animation-delay: -10s;
}

.element-3 {
    bottom: 20%;
    left: 20%;
    animation-delay: -5s;
}

@keyframes float {
    0% {
        transform: rotate(0deg) translateY(0);
    }
    25% {
        transform: rotate(90deg) translateY(-20px);
    }
    50% {
        transform: rotate(180deg) translateY(0);
    }
    75% {
        transform: rotate(270deg) translateY(20px);
    }
    100% {
        transform: rotate(360deg) translateY(0);
    }
}

/* ===== Services Overview ===== */
.services-overview {
    padding: 80px 0;
    background: white;
}

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
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--secondary);
    margin-bottom: 20px;
    line-height: 1.2;
}

.section-description {
    font-size: 1.1rem;
    color: var(--gray);
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

/* ===== Services Grid ===== */
.services-grid-section {
    padding: 60px 0 100px;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.service-card {
    background: white;
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    transition: all 0.4s ease;
    position: relative;
}

.service-card:hover {
    transform: translateY(-15px);
    box-shadow: var(--shadow-2xl);
}

.service-image {
    height: 250px;
    position: relative;
    overflow: hidden;
}

.service-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.service-card:hover .service-image img {
    transform: scale(1.1);
}

.service-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(2, 36, 91, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.service-card:hover .service-overlay {
    opacity: 1;
}

.service-zoom {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: white;
    color: var(--primary);
    border: none;
    font-size: 24px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.service-zoom:hover {
    background: var(--primary);
    color: white;
    transform: scale(1.1);
}

.service-content {
    padding: 30px;
}

.service-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px;
}

.service-icon {
    width: 60px;
    height: 60px;
    background: var(--gradient-light);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 24px;
    flex-shrink: 0;
}

.service-header h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--secondary);
    margin: 0;
    line-height: 1.3;
}

.service-description {
    color: var(--gray);
    line-height: 1.6;
    margin-bottom: 20px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.service-features {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 25px;
}

.feature {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
}

.feature i {
    color: var(--primary);
    font-size: 16px;
}

.service-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.service-actions .btn {
    flex: 1;
    min-width: 120px;
}

/* ===== Service Process ===== */
.service-process {
    padding: 100px 0;
    background: white;
}

.process-timeline {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
    position: relative;
}

.process-timeline::before {
    content: '';
    position: absolute;
    top: 40px;
    left: 50px;
    right: 50px;
    height: 2px;
    background: var(--light-gray);
    z-index: 1;
}

.process-step {
    position: relative;
    z-index: 2;
}

.step-number {
    width: 80px;
    height: 80px;
    background: var(--primary);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    font-weight: 800;
    margin: 0 auto 20px;
    position: relative;
    border: 5px solid white;
    box-shadow: var(--shadow-md);
}

.step-content {
    text-align: center;
    padding: 0 10px;
}

.step-content h4 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 10px;
}

.step-content p {
    color: var(--gray);
    font-size: 0.95rem;
    line-height: 1.5;
    margin: 0;
}

/* ===== Why Choose Services ===== */
.why-choose-services {
    padding: 100px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
}

.why-choose-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.left-align {
    text-align: left;
}

.left-align .section-subtitle,
.left-align .section-title {
    margin-left: 0;
}

.benefits-grid {
    display: grid;
    gap: 25px;
    margin-top: 40px;
}

.benefit-item {
    display: flex;
    gap: 20px;
    padding: 25px;
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
    border-left: 4px solid transparent;
}

.benefit-item:hover {
    transform: translateX(10px);
    border-left-color: var(--primary);
    box-shadow: var(--shadow-lg);
}

.benefit-icon {
    width: 50px;
    height: 50px;
    background: var(--primary);
    color: white;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
}

.benefit-content h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 8px;
}

.benefit-content p {
    color: var(--gray);
    font-size: 0.9rem;
    line-height: 1.6;
    margin: 0;
}

.why-choose-image {
    position: relative;
}

.image-wrapper {
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-xl);
    position: relative;
}

.image-wrapper img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.5s ease;
}

.why-choose-image:hover .image-wrapper img {
    transform: scale(1.05);
}

.image-badge {
    position: absolute;
    bottom: 30px;
    right: 30px;
    background: var(--primary);
    color: white;
    padding: 12px 20px;
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 600;
    font-size: 14px;
    box-shadow: var(--shadow-md);
}

/* ===== Services Testimonials ===== */
.services-testimonials {
    padding: 100px 0;
    background: white;
}

.testimonials-slider {
    position: relative;
    overflow: hidden;
    padding: 20px 0;
}

.slider-track {
    display: flex;
    gap: 30px;
    animation: slide 40s linear infinite;
}

@keyframes slide {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(calc(-400px * {{ $clientsFeedbacks->where('isActive', true)->count() }}));
    }
}

.testimonials-slider:hover .slider-track {
    animation-play-state: paused;
}

.testimonial-card {
    flex: 0 0 380px;
    background: white;
    border-radius: var(--radius-xl);
    padding: 30px;
    box-shadow: var(--shadow-lg);
    border: 1px solid var(--light-gray);
    transition: all 0.3s ease;
}

.testimonials-slider:hover .testimonial-card {
    transform: none;
}

.testimonial-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-2xl);
}

.testimonial-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px;
}

.client-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--light);
}

.client-info h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 5px;
}

.client-role {
    color: var(--primary);
    font-weight: 600;
    font-size: 0.9rem;
}

.testimonial-rating {
    color: #FFC107;
    font-size: 0.9rem;
    margin-left: auto;
}

.testimonial-rating i.filled {
    color: #FFC107;
}

.testimonial-rating i:not(.filled) {
    color: var(--light-gray);
}

.testimonial-content {
    margin-bottom: 20px;
}

.testimonial-content p {
    color: var(--gray);
    font-style: italic;
    line-height: 1.6;
    margin: 0;
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

.service-type {
    display: flex;
    align-items: center;
    gap: 5px;
}

.testimonial-date {
    opacity: 0.7;
}

.slider-controls {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
    pointer-events: none;
    padding: 0 20px;
}

.slider-prev, .slider-next {
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

.slider-prev:hover, .slider-next:hover {
    background: var(--primary);
    color: white;
    border-color: var(--primary);
}

/* ===== Service CTA ===== */
.service-cta {
    padding: 100px 0;
    background: var(--gradient);
    color: white;
    text-align: center;
}

.cta-content h2 {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 20px;
}

.cta-content p {
    font-size: 1.2rem;
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

/* ===== Service Modal ===== */
.service-modal {
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
    overflow-y: auto;
}

.modal-container {
    max-width: 800px;
    margin: 50px auto;
    background: white;
    border-radius: var(--radius-xl);
    overflow: hidden;
    position: relative;
    animation: modalSlideIn 0.3s ease;
}

.modal-close {
    position: absolute;
    top: 20px;
    right: 20px;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: var(--primary);
    color: white;
    border: none;
    font-size: 20px;
    cursor: pointer;
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.modal-close:hover {
    background: var(--primary-dark);
    transform: rotate(90deg);
}

.modal-content {
    padding: 0;
}

/* ===== Responsive Design ===== */
@media (max-width: 1200px) {
    .services-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .process-timeline {
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
    }
    
    .process-timeline::before {
        display: none;
    }
    
    .why-choose-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .left-align {
        text-align: center;
    }
    
    .slider-track {
        animation-duration: 30s;
    }
}

@media (max-width: 992px) {
    .hero-title {
        font-size: 2.8rem;
    }
    
    .service-stats {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .section-title {
        font-size: 2.2rem;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.2rem;
    }
    
    .services-grid {
        grid-template-columns: 1fr;
    }
    
    .process-timeline {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .service-stats {
        grid-template-columns: 1fr;
        text-align: center;
    }
    
    .stat-item {
        flex-direction: column;
        text-align: center;
    }
    
    .slider-controls {
        display: none;
    }
    
    .testimonial-card {
        flex: 0 0 calc(100% - 40px);
        margin: 0 20px;
    }
    
    .cta-buttons {
        flex-direction: column;
    }
    
    .cta-buttons .btn {
        width: 100%;
    }
}

@media (max-width: 576px) {
    .hero-title {
        font-size: 1.8rem;
    }
    
    .section-title {
        font-size: 1.8rem;
    }
    
    .services-hero,
    .services-overview,
    .services-grid-section,
    .service-process,
    .why-choose-services,
    .services-testimonials,
    .service-cta {
        padding: 60px 0;
    }
    
    .service-image {
        height: 200px;
    }
    
    .step-number {
        width: 60px;
        height: 60px;
        font-size: 1.4rem;
    }
    
    .image-badge {
        bottom: 15px;
        right: 15px;
        padding: 8px 15px;
        font-size: 12px;
    }
}

/* ===== Animation ===== */
@keyframes modalFadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
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

/* ===== Loading States ===== */
.lazy-load {
    opacity: 0;
    transition: opacity 0.3s ease;
}

.lazy-load.loaded {
    opacity: 1;
}

/* ===== Variables ===== */
:root {
    --primary: #FF5E14;
    --primary-dark: #E04A00;
    --secondary: #02245B;
    --accent: #F59E0B;
    --light: #F8F9FA;
    --dark: #1A202C;
    --gray: #6B7280;
    --light-gray: #E5E7EB;
    --gradient: linear-gradient(135deg, #FF5E14 0%, #02245B 100%);
    --gradient-light: linear-gradient(135deg, #FF8A3D 0%, #0340A1 100%);
    --shadow-sm: 0 2px 4px rgba(0,0,0,0.05);
    --shadow-md: 0 4px 6px rgba(0,0,0,0.07);
    --shadow-lg: 0 10px 25px rgba(0,0,0,0.1);
    --shadow-xl: 0 20px 40px rgba(0,0,0,0.15);
    --shadow-2xl: 0 30px 60px rgba(0,0,0,0.2);
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
    --radius-xl: 20px;
    --transition: all 0.3s ease;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Service modal functionality
    function openServiceModal(serviceId) {
        const modal = document.getElementById('serviceModal');
        const content = document.getElementById('serviceModalContent');
        
        // Find the service data
        const service = serviceData.find(s => s.id === serviceId);
        if (!service) return;
        
        // Generate modal content
        content.innerHTML = `
            <div class="modal-header">
                <div class="modal-icon">
                    <i class="fas fa-${getServiceIcon(service.title)}"></i>
                </div>
                <h2>${service.title}</h2>
            </div>
            
            <div class="modal-body">
                <div class="modal-image">
                    <img src="{{ asset('storage/') }}/${service.image1}" alt="${service.title}">
                </div>
                
                <div class="modal-details">
                    <h3>Service Details</h3>
                    <p>${service.description}</p>
                    
                    <div class="modal-features">
                        <h4>Key Features:</h4>
                        <ul>
                            <li><i class="fas fa-check"></i> Customized solutions</li>
                            <li><i class="fas fa-check"></i> Expert engineering</li>
                            <li><i class="fas fa-check"></i> Quality assurance</li>
                            <li><i class="fas fa-check"></i> Timely delivery</li>
                        </ul>
                    </div>
                    
                    <div class="modal-contact">
                        <h4>Get This Service</h4>
                        <div class="contact-options">
                            <a href="tel:{{ $company->main_contact ?? '' }}" class="contact-option">
                                <i class="fas fa-phone"></i>
                                <span>Call Now</span>
                            </a>
                            <a href="{{ route('contact') }}" class="contact-option">
                                <i class="fas fa-envelope"></i>
                                <span>Request Quote</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
    
    function closeServiceModal() {
        const modal = document.getElementById('serviceModal');
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
    
    // Close modal on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeServiceModal();
        }
    });
    
    // Close modal when clicking outside
    document.getElementById('serviceModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeServiceModal();
        }
    });
    
    // Helper function for service icons
    function getServiceIcon(title) {
        const titleLower = title.toLowerCase();
        if (titleLower.includes('manufacturing')) return 'industry';
        if (titleLower.includes('repair')) return 'wrench';
        if (titleLower.includes('maintenance')) return 'tools';
        if (titleLower.includes('design')) return 'ruler-combined';
        if (titleLower.includes('installation')) return 'screwdriver';
        if (titleLower.includes('consultation')) return 'headset';
        return 'cog';
    }
    
    // Pass service data from PHP to JavaScript
    const serviceData = [
        @foreach($services as $service)
        {
            id: '{{ $service->id }}',
            title: '{{ $service->title }}',
            description: `{{ $service->description }}`,
            image1: '{{ $service->image1 }}',
            image2: '{{ $service->image2 }}',
            image3: '{{ $service->image3 }}'
        },
        @endforeach
    ];
    
    // Testimonial slider controls
    const sliderPrev = document.querySelector('.slider-prev');
    const sliderNext = document.querySelector('.slider-next');
    const sliderTrack = document.querySelector('.slider-track');
    
    let testimonialIndex = 0;
    const testimonialWidth = 380 + 30; // card width + gap
    
    sliderPrev?.addEventListener('click', () => {
        const count = {{ $clientsFeedbacks->where('isActive', true)->count() }};
        testimonialIndex = Math.max(testimonialIndex - 1, 0);
        sliderTrack.style.transform = `translateX(-${testimonialIndex * testimonialWidth}px)`;
    });
    
    sliderNext?.addEventListener('click', () => {
        const count = {{ $clientsFeedbacks->where('isActive', true)->count() }};
        testimonialIndex = Math.min(testimonialIndex + 1, count - 1);
        sliderTrack.style.transform = `translateX(-${testimonialIndex * testimonialWidth}px)`;
    });
    
    // Pause animation on hover
    sliderTrack?.addEventListener('mouseenter', () => {
        sliderTrack.style.animationPlayState = 'paused';
    });
    
    sliderTrack?.addEventListener('mouseleave', () => {
        sliderTrack.style.animationPlayState = 'running';
    });
    
    // Lazy load images
    const lazyImages = document.querySelectorAll('img[loading="lazy"]');
    
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.classList.add('loaded');
                observer.unobserve(img);
            }
        });
    });
    
    lazyImages.forEach(img => imageObserver.observe(img));
    
    // Smooth scroll for anchor links
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
});
</script>

@include('Templates.footer')