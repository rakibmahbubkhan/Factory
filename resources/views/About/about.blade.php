@include('Templates.header')

<!-- Modern About Hero -->
<section class="modern-about-hero">
    <div class="container">
        <div class="hero-content">
            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fas fa-industry"></i> About Us
                    </li>
                </ol>
            </nav>
            <h1 class="hero-title">
                <span class="hero-highlight">Precision Engineering</span>
                <br>For Modern Agriculture
            </h1>
            <p class="hero-description">
                Leading manufacturer of high-quality agricultural machinery with decades of expertise
            </p>
        </div>
        
        <!-- Hero Stats -->
        <div class="hero-stats">
            <div class="stat-item">
                <span class="stat-number" data-count="{{ $statistic->experience ?? 20 }}">0</span>
                <span class="stat-label">Years Experience</span>
            </div>
            <div class="stat-item">
                <span class="stat-number" data-count="{{ $statistic->members ?? 50 }}">0</span>
                <span class="stat-label">Expert Engineers</span>
            </div>
            <div class="stat-item">
                <span class="stat-number" data-count="{{ $statistic->projects ?? 1000 }}">0</span>
                <span class="stat-label">Machines Built</span>
            </div>
        </div>
    </div>
</section>

<!-- Company Overview -->
<section class="company-overview">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">
                <i class="fas fa-building"></i>
                <span>Company Overview</span>
            </span>
            <h2 class="section-title">{{ $about->title ?? 'Our Story' }}</h2>
        </div>
        
        <div class="overview-grid">
            <div class="overview-content">
                <p class="overview-text">
                    {{ $about->content ?? 'We are a leading agricultural machinery manufacturer with decades of experience in precision engineering...' }}
                </p>
                
                <div class="mission-vision">
                    <div class="mission-card">
                        <div class="card-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h4>Our Mission</h4>
                        <p>To revolutionize agriculture through innovative machinery solutions that increase productivity and sustainability.</p>
                    </div>
                    <div class="vision-card">
                        <div class="card-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h4>Our Vision</h4>
                        <p>To be the global leader in agricultural machinery manufacturing, setting industry standards for quality and innovation.</p>
                    </div>
                </div>
            </div>
            
            <div class="overview-images">
                <div class="image-grid">
                    @if($about && $about->image1)
                    <div class="main-image">
                        <img src="{{ asset('storage/' . $about->image1) }}" 
                             alt="Our Manufacturing Facility" 
                             loading="lazy">
                        <div class="image-badge">
                            <i class="fas fa-industry"></i>
                            <span>Manufacturing Facility</span>
                        </div>
                    </div>
                    @endif
                    
                    @if($about && $about->image2)
                    <div class="secondary-image">
                        <img src="{{ asset('storage/' . $about->image2) }}" 
                             alt="Quality Control" 
                             loading="lazy">
                        <div class="image-badge">
                            <i class="fas fa-check-circle"></i>
                            <span>Quality Assurance</span>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="core-values">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">
                <i class="fas fa-star"></i>
                <span>Core Values</span>
            </span>
            <h2 class="section-title">What Drives Our Excellence</h2>
        </div>
        
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h4>Precision Engineering</h4>
                <p>Meticulous attention to detail in every machine we manufacture</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h4>Quality Assurance</h4>
                <p>Rigorous testing and quality control at every production stage</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h4>Innovation</h4>
                <p>Continuous R&D to develop cutting-edge agricultural solutions</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h4>Customer Focus</h4>
                <p>Building lasting relationships through exceptional service</p>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Showcase -->
<section class="statistics-showcase">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item-large">
                <div class="stat-content">
                    <h3>Our Journey in Numbers</h3>
                    <p>Decades of excellence in agricultural machinery manufacturing</p>
                </div>
                <div class="stat-highlight">
                    <span class="highlight-number">{{ $about->experience ?? 20 }}+</span>
                    <span class="highlight-label">Years of Excellence</span>
                </div>
            </div>
            
            <div class="stat-items">
                <div class="stat-item">
                    <i class="fas fa-users"></i>
                    <div>
                        <span class="stat-number" data-count="{{ $statistic->members ?? 50 }}">0</span>
                        <span class="stat-label">Expert Team Members</span>
                    </div>
                </div>
                
                <div class="stat-item">
                    <i class="fas fa-user-check"></i>
                    <div>
                        <span class="stat-number" data-count="{{ $statistic->clients ?? 500 }}">0</span>
                        <span class="stat-label">Satisfied Clients</span>
                    </div>
                </div>
                
                <div class="stat-item">
                    <i class="fas fa-project-diagram"></i>
                    <div>
                        <span class="stat-number" data-count="{{ $statistic->projects ?? 1000 }}">0</span>
                        <span class="stat-label">Completed Projects</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Certifications Showcase -->
@if($certificates->count() > 0)
<section class="certifications-showcase">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">
                <i class="fas fa-award"></i>
                <span>Accreditations</span>
            </span>
            <h2 class="section-title">Our Certifications</h2>
            <p class="section-description">
                Internationally recognized quality and safety certifications
            </p>
        </div>
        
        <div class="certifications-slider">
            <div class="slider-track">
                @foreach($certificates as $certificate)
                <div class="certificate-card">
                    <div class="certificate-image">
                        <img src="{{ asset('storage/' . $certificate->image) }}" 
                             alt="{{ $certificate->title }}" 
                             loading="lazy">
                        <div class="certificate-overlay">
                            <button class="view-certificate" 
                                    onclick="openCertificate('{{ asset('storage/' . $certificate->image) }}', '{{ $certificate->title }}')">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="certificate-info">
                        <h5>{{ $certificate->title }}</h5>
                        <p>Quality Standard Certified</p>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="slider-controls">
                <button class="slider-prev" aria-label="Previous certificate">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="slider-next" aria-label="Next certificate">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Our Team -->
@if($teams->count() > 0)
<section class="team-section">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">
                <i class="fas fa-users"></i>
                <span>Our Experts</span>
            </span>
            <h2 class="section-title">Meet Our Engineering Team</h2>
            <p class="section-description">
                Skilled professionals dedicated to agricultural machinery innovation
            </p>
        </div>
        
        <div class="team-grid">
            @foreach($teams as $team)
            <div class="team-card">
                <div class="team-image">
                    @if($team->image)
                    <img src="{{ asset('storage/' . $team->image) }}" 
                         alt="{{ $team->name }}" 
                         loading="lazy">
                    @endif
                    <div class="team-overlay">
                        <div class="team-social">
                            @if($team->facebook)
                            <a href="{{ $team->facebook }}" target="_blank" aria-label="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            @endif
                            @if($team->twitter)
                            <a href="{{ $team->twitter }}" target="_blank" aria-label="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            @endif
                            @if($team->instagram)
                            <a href="{{ $team->instagram }}" target="_blank" aria-label="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            @endif
                            @if($team->linkedin)
                            <a href="{{ $team->linkedin }}" target="_blank" aria-label="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="team-info">
                    <h4>{{ $team->name }}</h4>
                    <p class="team-position">{{ $team->designation }}</p>
                    <div class="team-expertise">
                        <span class="expertise-tag">Engineering</span>
                        <span class="expertise-tag">Machinery</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Why Choose Us -->
<section class="why-choose-us">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">
                <i class="fas fa-check-circle"></i>
                <span>Why Choose Us</span>
            </span>
            <h2 class="section-title">Excellence in Every Machine</h2>
        </div>
        
        <div class="features-grid">
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <div class="feature-content">
                    <h4>Advanced Manufacturing</h4>
                    <p>State-of-the-art production facilities with latest technology</p>
                </div>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <div class="feature-content">
                    <h4>Quality Certified</h4>
                    <p>Internationally recognized quality standards and certifications</p>
                </div>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <div class="feature-content">
                    <h4>24/7 Support</h4>
                    <p>Round-the-clock technical support and maintenance services</p>
                </div>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="feature-content">
                    <h4>Custom Solutions</h4>
                    <p>Bespoke machinery designed for specific agricultural needs</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="about-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Partner with Agricultural Experts?</h2>
            <p>Contact us today for custom machinery solutions or to visit our manufacturing facility</p>
            <div class="cta-buttons">
                <a href="{{ route('contact') }}" class="btn btn-primary">
                    <i class="fas fa-envelope me-2"></i>
                    <span>Contact Us</span>
                </a>
                <a href="{{ route('machineries') }}" class="btn btn-secondary">
                    <i class="fas fa-warehouse me-2"></i>
                    <span>View Products</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Certificate Modal -->
<div class="certificate-modal" id="certificateModal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal()" aria-label="Close modal">
            <i class="fas fa-times"></i>
        </button>
        <img id="modalImage" src="" alt="Certificate">
        <div class="modal-info">
            <h3 id="modalTitle"></h3>
            <a href="#" class="btn btn-download" id="downloadBtn" download>
                <i class="fas fa-download me-2"></i>
                <span>Download Certificate</span>
            </a>
        </div>
    </div>
</div>

<style>
/* ===== Modern About Hero ===== */
.modern-about-hero {
    background: linear-gradient(rgba(2, 36, 91, 0.9), rgba(2, 36, 91, 0.8)), 
                url('https://images.unsplash.com/photo-1515630771457-09367d0ae038?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    color: white;
    padding: 120px 0 60px;
    position: relative;
    overflow: hidden;
}

.modern-about-hero::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 150px;
    background: linear-gradient(transparent, rgba(2, 36, 91, 0.3));
}

.breadcrumb-nav {
    margin-bottom: 30px;
}

.breadcrumb {
    background: transparent;
    padding: 0;
    margin: 0;
}

.breadcrumb-item a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 500;
}

.breadcrumb-item.active {
    color: var(--primary);
}

.hero-title {
    font-size: 4rem;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 20px;
    color: green;
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
}

.hero-stats {
    display: flex;
    gap: 40px;
    margin-top: 60px;
    padding-top: 40px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    flex-wrap: wrap;
}

.stat-item {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: 3rem;
    font-weight: 800;
    color: var(--primary);
    line-height: 1;
}

.stat-label {
    font-size: 1rem;
    opacity: 0.8;
    margin-top: 10px;
}

/* ===== Company Overview ===== */
.company-overview {
    padding: 100px 0;
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
}

.overview-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.overview-text {
    font-size: 1.1rem;
    line-height: 1.8;
    color: var(--gray);
    margin-bottom: 40px;
}

.mission-vision {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
}

.mission-card, .vision-card {
    background: var(--light);
    padding: 30px;
    border-radius: var(--radius-lg);
    border-left: 4px solid var(--primary);
}

.card-icon {
    width: 60px;
    height: 60px;
    background: var(--primary);
    color: white;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin-bottom: 20px;
}

.mission-card h4, .vision-card h4 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 10px;
}

.mission-card p, .vision-card p {
    color: var(--gray);
    font-size: 0.95rem;
    line-height: 1.6;
}

.image-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
}

.main-image, .secondary-image {
    position: relative;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
}

.main-image img, .secondary-image img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.main-image:hover img, .secondary-image:hover img {
    transform: scale(1.05);
}

.image-badge {
    position: absolute;
    top: 20px;
    left: 20px;
    background: var(--primary);
    color: white;
    padding: 10px 15px;
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    font-size: 14px;
}

/* ===== Core Values ===== */
.core-values {
    padding: 100px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
}

.values-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
}

.value-card {
    background: white;
    padding: 40px 30px;
    border-radius: var(--radius-lg);
    text-align: center;
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
}

.value-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
}

.value-icon {
    width: 80px;
    height: 80px;
    background: var(--gradient-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 25px;
    color: white;
    font-size: 32px;
}

.value-card h4 {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 15px;
}

.value-card p {
    color: var(--gray);
    font-size: 0.95rem;
    line-height: 1.6;
    margin: 0;
}

/* ===== Statistics Showcase ===== */
.statistics-showcase {
    padding: 100px 0;
    background: var(--secondary);
    color: white;
}

.stats-grid {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 60px;
    align-items: center;
}

.stat-item-large {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: var(--radius-xl);
    padding: 40px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.stat-content h3 {
    font-size: 2rem;
    font-weight: 800;
    margin-bottom: 15px;
}

.stat-content p {
    opacity: 0.8;
    font-size: 1.1rem;
}

.stat-highlight {
    margin-top: 30px;
    text-align: center;
}

.highlight-number {
    display: block;
    font-size: 4rem;
    font-weight: 800;
    color: var(--primary);
    line-height: 1;
}

.highlight-label {
    font-size: 1.2rem;
    opacity: 0.9;
    margin-top: 10px;
}

.stat-items {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.stat-items .stat-item {
    background: rgba(255, 255, 255, 0.05);
    border-radius: var(--radius-lg);
    padding: 30px;
    display: flex;
    align-items: center;
    gap: 20px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
}

.stat-items .stat-item:hover {
    background: rgba(255, 255, 255, 0.1);
    transform: translateY(-5px);
}

.stat-items .stat-item i {
    font-size: 2.5rem;
    color: var(--primary);
}

.stat-items .stat-number {
    display: block;
    font-size: 2.5rem;
    font-weight: 800;
    line-height: 1;
    color: white;
}

.stat-items .stat-label {
    font-size: 0.9rem;
    opacity: 0.8;
    margin-top: 5px;
}

/* ===== Certifications Showcase ===== */
.certifications-showcase {
    padding: 100px 0;
    background: white;
}

.certifications-slider {
    position: relative;
    overflow: hidden;
    padding: 20px 0;
}

.slider-track {
    display: flex;
    gap: 30px;
    animation: slide 30s linear infinite;
    padding: 20px 0;
}

@keyframes slide {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(calc(-250px * {{ $certificates->count() }}));
    }
}

.certifications-slider:hover .slider-track {
    animation-play-state: paused;
}

.certificate-card {
    flex: 0 0 250px;
    background: var(--light);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
}

.certificate-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
}

.certificate-image {
    height: 200px;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 30px;
    position: relative;
    overflow: hidden;
}

.certificate-image img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.certificate-card:hover .certificate-image img {
    transform: scale(1.1);
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

.view-certificate {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: white;
    color: var(--primary);
    border: none;
    font-size: 20px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.view-certificate:hover {
    background: var(--primary);
    color: white;
    transform: scale(1.1);
}

.certificate-info {
    padding: 20px;
    text-align: center;
}

.certificate-info h5 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 5px;
}

.certificate-info p {
    color: var(--gray);
    font-size: 0.9rem;
    margin: 0;
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

/* ===== Team Section ===== */
.team-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
}

.team-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
}

.team-card {
    background: white;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
}

.team-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
}

.team-image {
    height: 250px;
    position: relative;
    overflow: hidden;
}

.team-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.team-card:hover .team-image img {
    transform: scale(1.1);
}

.team-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 94, 20, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.team-card:hover .team-overlay {
    opacity: 1;
}

.team-social {
    display: flex;
    gap: 15px;
}

.team-social a {
    width: 45px;
    height: 45px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
    font-size: 18px;
    transition: all 0.3s ease;
}

.team-social a:hover {
    background: var(--secondary);
    color: white;
    transform: translateY(-3px);
}

.team-info {
    padding: 25px;
    text-align: center;
}

.team-info h4 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 5px;
}

.team-position {
    color: var(--primary);
    font-weight: 600;
    margin-bottom: 15px;
    font-size: 0.9rem;
}

.team-expertise {
    display: flex;
    justify-content: center;
    gap: 10px;
    flex-wrap: wrap;
}

.expertise-tag {
    background: var(--light);
    color: var(--gray);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
}

/* ===== Why Choose Us ===== */
.why-choose-us {
    padding: 100px 0;
    background: white;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
}

.feature-item {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    padding: 25px;
    background: var(--light);
    border-radius: var(--radius-lg);
    border-left: 4px solid var(--primary);
    transition: all 0.3s ease;
}

.feature-item:hover {
    transform: translateX(10px);
    box-shadow: var(--shadow-md);
}

.feature-icon {
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

.feature-content h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 8px;
}

.feature-content p {
    color: var(--gray);
    font-size: 0.9rem;
    line-height: 1.6;
    margin: 0;
}

/* ===== CTA Section ===== */
.about-cta {
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

/* ===== Certificate Modal ===== */
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

.modal-content {
    max-width: 800px;
    margin: 50px auto;
    background: white;
    border-radius: var(--radius-lg);
    overflow: hidden;
    position: relative;
    animation: modalSlideIn 0.3s ease;
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

.modal-content img {
    width: 100%;
    height: auto;
    display: block;
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
    text-decoration: none;
}

.btn-download:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
}

/* ===== Responsive Design ===== */
@media (max-width: 1200px) {
    .values-grid,
    .team-grid,
    .features-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
}

@media (max-width: 992px) {
    .hero-title {
        font-size: 3rem;
    }
    
    .overview-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .mission-vision {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .stat-items {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .slider-track {
        animation-duration: 20s;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .values-grid,
    .team-grid,
    .features-grid,
    .stat-items {
        grid-template-columns: 1fr;
    }
    
    .hero-stats {
        flex-direction: column;
        gap: 20px;
        text-align: center;
    }
    
    .cta-buttons {
        flex-direction: column;
    }
    
    .cta-buttons .btn {
        width: 100%;
    }
    
    .slider-controls {
        display: none;
    }
}

@media (max-width: 576px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .modern-about-hero,
    .company-overview,
    .core-values,
    .statistics-showcase,
    .certifications-showcase,
    .team-section,
    .why-choose-us,
    .about-cta {
        padding: 60px 0;
    }
    
    .stat-item-large {
        padding: 30px 20px;
    }
    
    .highlight-number {
        font-size: 3rem;
    }
}

/* ===== Animations ===== */
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animated counters
    const counters = document.querySelectorAll('.stat-number[data-count]');
    
    counters.forEach(counter => {
        const target = parseInt(counter.dataset.count);
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;
        
        const updateCounter = () => {
            current += increment;
            if (current >= target) {
                counter.textContent = target;
                return;
            }
            
            counter.textContent = Math.floor(current);
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
    });
    
    // Certificate modal functions
    function openCertificate(imageSrc, title) {
        const modal = document.getElementById('certificateModal');
        const modalImage = document.getElementById('modalImage');
        const modalTitle = document.getElementById('modalTitle');
        const downloadBtn = document.getElementById('downloadBtn');
        
        modalImage.src = imageSrc;
        modalTitle.textContent = title;
        downloadBtn.href = imageSrc;
        downloadBtn.download = title.replace(/\s+/g, '-').toLowerCase() + '.jpg';
        
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
    
    function closeModal() {
        const modal = document.getElementById('certificateModal');
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
    
    // Close modal on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
    
    // Close modal when clicking outside
    document.getElementById('certificateModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
    
    // Slider controls
    const sliderPrev = document.querySelector('.slider-prev');
    const sliderNext = document.querySelector('.slider-next');
    const sliderTrack = document.querySelector('.slider-track');
    
    let slideIndex = 0;
    const slideWidth = 250 + 30; // card width + gap
    
    sliderPrev?.addEventListener('click', () => {
        slideIndex = Math.max(slideIndex - 1, 0);
        sliderTrack.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
    });
    
    sliderNext?.addEventListener('click', () => {
        const maxSlides = {{ $certificates->count() }};
        slideIndex = Math.min(slideIndex + 1, maxSlides - 1);
        sliderTrack.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
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