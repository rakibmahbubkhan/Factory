@include('Templates.header')

<!-- Contact Hero -->
<section class="contact-hero">
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
                        <i class="fas fa-phone-alt"></i> Contact
                    </li>
                </ol>
            </nav>
            
            <h1 class="hero-title">
                <span class="hero-highlight">Get in Touch</span>
                <br>With Our Agricultural Experts
            </h1>
            
            <p class="hero-description">
                Have questions about our machinery? Need a custom quote? Our team is here to help you with all your agricultural equipment needs.
            </p>
        </div>
        
        <!-- Contact Stats -->
        <div class="contact-stats">
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <div class="stat-content">
                    <h3>24/7</h3>
                    <p>Support Available</p>
                </div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-content">
                    <h3>2 Hour</h3>
                    <p>Response Time</p>
                </div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-content">
                    <h3>100%</h3>
                    <p>Satisfaction Guaranteed</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Hero Background Elements -->
    <div class="hero-elements">
        <div class="element element-1">
            <i class="fas fa-tractor"></i>
        </div>
        <div class="element element-2">
            <i class="fas fa-cogs"></i>
        </div>
        <div class="element element-3">
            <i class="fas fa-seedling"></i>
        </div>
    </div>
</section>

<!-- Contact Overview -->
<section class="contact-overview">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">
                <i class="fas fa-comments"></i>
                <span>Let's Connect</span>
            </span>
            <h2 class="section-title">Multiple Ways to Reach Us</h2>
            <p class="section-description">
                Choose your preferred method to get in touch with our agricultural machinery experts
            </p>
        </div>
    </div>
</section>

<!-- Contact Methods -->
<section class="contact-methods-section">
    <div class="container">
        <div class="contact-methods-grid">
            <!-- Phone Contact -->
            <div class="contact-method-card">
                <div class="method-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <div class="method-content">
                    <h3>Phone Support</h3>
                    <p class="method-description">Speak directly with our agricultural machinery specialists</p>
                    
                    <div class="contact-numbers">
                        @if(isset($company->phone) && is_array($company->phone))
                            @foreach($company->phone as $phone)
                                <div class="phone-item">
                                    <i class="fas fa-phone"></i>
                                    <a href="tel:{{ $phone }}" class="phone-link">{{ $phone }}</a>
                                </div>
                            @endforeach
                        @elseif($company->main_contact)
                            <div class="phone-item">
                                <i class="fas fa-phone"></i>
                                <a href="tel:{{ $company->main_contact }}" class="phone-link">{{ $company->main_contact }}</a>
                            </div>
                        @endif
                    </div>
                    
                    <div class="method-actions">
                        <a href="tel:{{ $company->main_contact ?? '' }}" class="btn btn-primary">
                            <i class="fas fa-phone-alt me-2"></i>
                            <span>Call Now</span>
                        </a>
                        <button class="btn btn-secondary" onclick="requestCallback()">
                            <i class="fas fa-clock me-2"></i>
                            <span>Request Callback</span>
                        </button>
                    </div>
                    
                    <div class="method-hours">
                        <h4><i class="fas fa-clock"></i> Available Hours</h4>
                        <p>Mon - Sat: 8:00 AM - 8:00 PM</p>
                        <p>Sunday: 10:00 AM - 6:00 PM</p>
                    </div>
                </div>
            </div>
            
            <!-- Email Contact -->
            <div class="contact-method-card">
                <div class="method-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="method-content">
                    <h3>Email Support</h3>
                    <p class="method-description">Send us detailed inquiries about machinery specifications and quotes</p>
                    
                    <div class="contact-emails">
                        @if($company->email)
                            <div class="email-item">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:{{ $company->email }}" class="email-link">{{ $company->email }}</a>
                            </div>
                        @endif
                        
                        @if($company->support_email ?? '')
                            <div class="email-item">
                                <i class="fas fa-headset"></i>
                                <a href="mailto:{{ $company->support_email }}" class="email-link">{{ $company->support_email }}</a>
                            </div>
                        @endif
                    </div>
                    
                    <div class="method-actions">
                        <a href="mailto:{{ $company->email ?? '' }}" class="btn btn-primary">
                            <i class="fas fa-envelope me-2"></i>
                            <span>Send Email</span>
                        </a>
                        <button class="btn btn-secondary" onclick="openQuickInquiry()">
                            <i class="fas fa-question-circle me-2"></i>
                            <span>Quick Inquiry</span>
                        </button>
                    </div>
                    
                    <div class="method-response">
                        <h4><i class="fas fa-bolt"></i> Response Time</h4>
                        <p>Typically within 2 hours during business hours</p>
                    </div>
                </div>
            </div>
            
            <!-- Location -->
            <div class="contact-method-card">
                <div class="method-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="method-content">
                    <h3>Visit Our Facility</h3>
                    <p class="method-description">Schedule a visit to our manufacturing plant and showroom</p>
                    
                    <div class="contact-address">
                        <div class="address-item">
                            <i class="fas fa-map-pin"></i>
                            <div class="address-details">
                                <h4>Main Office</h4>
                                <p>{{ $company->address ?? 'Agricultural Machinery Manufacturing Facility' }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="method-actions">
                        <a href="{{ $company->map ?? 'https://maps.google.com' }}" 
                           target="_blank" 
                           class="btn btn-primary">
                            <i class="fas fa-map-marked-alt me-2"></i>
                            <span>Get Directions</span>
                        </a>
                        <button class="btn btn-secondary" onclick="scheduleVisit()">
                            <i class="fas fa-calendar-alt me-2"></i>
                            <span>Schedule Visit</span>
                        </button>
                    </div>
                    
                    <div class="method-visit">
                        <h4><i class="fas fa-door-open"></i> Visiting Hours</h4>
                        <p>Mon - Fri: 9:00 AM - 6:00 PM</p>
                        <p>Appointment recommended</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="contact-form-section">
    <div class="container">
        <div class="contact-form-wrapper">
            <div class="form-intro">
                <span class="form-subtitle">
                    <i class="fas fa-paper-plane"></i>
                    <span>Send Message</span>
                </span>
                <h2 class="form-title">Contact Our Agricultural Experts</h2>
                <p class="form-description">
                    Fill out the form below and our team will get back to you with detailed information about our machinery, pricing, and customized solutions for your agricultural needs.
                </p>
                
                <div class="form-features">
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Custom Machinery Quotes</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Technical Specifications</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Service & Maintenance</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Spare Parts Inquiry</span>
                    </div>
                </div>
            </div>
            
            <div class="form-container">
                <form action="{{ route('contact.store') }}" method="POST" id="contactForm">
                    @csrf
                    
                    <div class="form-header">
                        <h3>Send Your Inquiry</h3>
                        <p>Fields marked with * are required</p>
                    </div>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="contactName">
                                <i class="fas fa-user"></i>
                                <span>Full Name *</span>
                            </label>
                            <input type="text" 
                                   id="contactName" 
                                   name="name" 
                                   placeholder="Enter your full name"
                                   required
                                   class="form-control">
                            <div class="form-error" id="nameError"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="contactEmail">
                                <i class="fas fa-envelope"></i>
                                <span>Email Address *</span>
                            </label>
                            <input type="email" 
                                   id="contactEmail" 
                                   name="email" 
                                   placeholder="Enter your email address"
                                   required
                                   class="form-control">
                            <div class="form-error" id="emailError"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="contactPhone">
                                <i class="fas fa-phone"></i>
                                <span>Phone Number *</span>
                            </label>
                            <input type="tel" 
                                   id="contactPhone" 
                                   name="phone" 
                                   placeholder="Enter your phone number"
                                   required
                                   class="form-control">
                            <div class="form-error" id="phoneError"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="contactCompany">
                                <i class="fas fa-building"></i>
                                <span>Company / Farm Name</span>
                            </label>
                            <input type="text" 
                                   id="contactCompany" 
                                   name="company" 
                                   placeholder="Enter your company or farm name"
                                   class="form-control">
                        </div>
                        
                        <div class="form-group full-width">
                            <label for="contactSubject">
                                <i class="fas fa-tag"></i>
                                <span>Subject *</span>
                            </label>
                            <div class="subject-selector">
                                <select id="contactSubject" name="subject" required class="form-control">
                                    <option value="" disabled selected>Select inquiry type</option>
                                    <option value="Machinery Inquiry">Machinery Inquiry</option>
                                    <option value="Price Quote">Price Quote</option>
                                    <option value="Technical Support">Technical Support</option>
                                    <option value="Spare Parts">Spare Parts</option>
                                    <option value="Service Request">Service Request</option>
                                    <option value="Partnership">Partnership Inquiry</option>
                                    <option value="Other">Other</option>
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="form-error" id="subjectError"></div>
                        </div>
                        
                        <div class="form-group full-width">
                            <label for="contactMessage">
                                <i class="fas fa-comment-alt"></i>
                                <span>Your Message *</span>
                            </label>
                            <textarea id="contactMessage" 
                                      name="message" 
                                      rows="6" 
                                      placeholder="Please provide details about your agricultural machinery needs, specific requirements, or any questions you may have..."
                                      required
                                      class="form-control"></textarea>
                            <div class="char-counter">
                                <span id="charCount">0</span> / 1000 characters
                            </div>
                            <div class="form-error" id="messageError"></div>
                        </div>
                        
                        <div class="form-group full-width">
                            <div class="form-options">
                                <div class="form-check">
                                    <input type="checkbox" id="contactNewsletter" name="newsletter" checked>
                                    <label for="contactNewsletter">
                                        <i class="fas fa-newspaper"></i>
                                        <span>Subscribe to machinery updates and offers</span>
                                    </label>
                                </div>
                                
                                <div class="form-check">
                                    <input type="checkbox" id="contactCallback" name="callback">
                                    <label for="contactCallback">
                                        <i class="fas fa-phone"></i>
                                        <span>Request phone callback</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
                            <i class="fas fa-paper-plane me-2"></i>
                            <span>Send Message</span>
                            <div class="spinner" id="submitSpinner" style="display: none;"></div>
                        </button>
                        
                        <button type="reset" class="btn btn-secondary">
                            <i class="fas fa-redo me-2"></i>
                            <span>Clear Form</span>
                        </button>
                    </div>
                    
                    <div class="form-footer">
                        <p>
                            <i class="fas fa-shield-alt"></i>
                            <span>Your information is secure and will only be used to respond to your inquiry.</span>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <i class="fas fa-map-marked-alt me-3"></i>
                <span>Find Our Location</span>
            </h2>
            <p class="section-description">
                Visit our agricultural machinery manufacturing facility
            </p>
        </div>
        
        <div class="map-container">
            @if($company->map)
            <div class="map-wrapper">
                <iframe src="{{ $company->map }}" 
                        frameborder="0" 
                        style="border:0;" 
                        allowfullscreen="" 
                        aria-hidden="false" 
                        tabindex="0"
                        loading="lazy"
                        title="Company Location Map"></iframe>
                <div class="map-overlay">
                    <div class="map-info">
                        <h4><i class="fas fa-map-marker-alt"></i> Our Location</h4>
                        <p>{{ $company->address ?? 'Agricultural Machinery Manufacturing Facility' }}</p>
                        <a href="{{ $company->map ?? 'https://maps.google.com' }}" 
                           target="_blank" 
                           class="btn btn-sm">
                            <i class="fas fa-directions me-2"></i>
                            <span>Open in Maps</span>
                        </a>
                    </div>
                </div>
            </div>
            @endif
            
            <div class="location-details">
                <div class="location-card">
                    <div class="location-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="location-content">
                        <h4>Business Hours</h4>
                        <div class="timing-grid">
                            <div class="timing-item">
                                <span class="day">Monday - Friday</span>
                                <span class="time">9:00 AM - 6:00 PM</span>
                            </div>
                            <div class="timing-item">
                                <span class="day">Saturday</span>
                                <span class="time">9:00 AM - 4:00 PM</span>
                            </div>
                            <div class="timing-item">
                                <span class="day">Sunday</span>
                                <span class="time">10:00 AM - 2:00 PM</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="location-card">
                    <div class="location-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <div class="location-content">
                        <h4>Parking Information</h4>
                        <p>Ample parking available for trucks and trailers</p>
                        <div class="parking-features">
                            <span><i class="fas fa-check"></i> Truck Parking</span>
                            <span><i class="fas fa-check"></i> Trailer Space</span>
                            <span><i class="fas fa-check"></i> Security</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Contact -->
<section class="quick-contact-section">
    <div class="container">
        <div class="quick-contact-wrapper">
            <div class="quick-contact-content">
                <h2>Need Immediate Assistance?</h2>
                <p>Contact our agricultural machinery support team right away</p>
                <div class="quick-actions">
                    <a href="tel:{{ $company->main_contact ?? '' }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-phone-alt me-2"></i>
                        <span>Emergency Call</span>
                    </a>
                    <a href="https://wa.me/{{ str_replace('+', '', $company->main_contact ?? '') }}" 
                       target="_blank" 
                       class="btn btn-success btn-lg">
                        <i class="fab fa-whatsapp me-2"></i>
                        <span>WhatsApp Chat</span>
                    </a>
                </div>
            </div>
            
            <div class="quick-contact-info">
                <div class="info-item">
                    <i class="fas fa-headset"></i>
                    <div>
                        <h4>24/7 Support Line</h4>
                        <p>{{ $company->main_contact ?? 'Available upon request' }}</p>
                    </div>
                </div>
                
                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h4>Emergency Email</h4>
                        <p>{{ $company->email ?? 'support@agriculture.com' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Callback Modal -->
<div class="callback-modal" id="callbackModal">
    <div class="modal-container">
        <button class="modal-close" onclick="closeCallbackModal()" aria-label="Close modal">
            <i class="fas fa-times"></i>
        </button>
        
        <div class="modal-content">
            <h2>Request a Callback</h2>
            <p>We'll call you back at your preferred time</p>
            
            <form id="callbackForm">
                <div class="form-group">
                    <label for="callbackName">Your Name *</label>
                    <input type="text" id="callbackName" required placeholder="Enter your name">
                </div>
                
                <div class="form-group">
                    <label for="callbackPhone">Phone Number *</label>
                    <input type="tel" id="callbackPhone" required placeholder="Enter your phone number">
                </div>
                
                <div class="form-group">
                    <label for="callbackTime">Preferred Time</label>
                    <select id="callbackTime">
                        <option value="morning">Morning (9 AM - 12 PM)</option>
                        <option value="afternoon">Afternoon (12 PM - 4 PM)</option>
                        <option value="evening">Evening (4 PM - 7 PM)</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="callbackTopic">Topic of Discussion</label>
                    <textarea id="callbackTopic" rows="3" placeholder="Briefly describe what you'd like to discuss"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-phone me-2"></i>
                    <span>Request Callback</span>
                </button>
            </form>
        </div>
    </div>
</div>

<style>
/* ===== Contact Hero ===== */
.contact-hero {
    background: linear-gradient(rgba(2, 36, 91, 0.9), rgba(2, 36, 91, 0.85)),
                url('https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');
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
    transition: var(--transition);
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

.contact-stats {
    display: flex;
    gap: 40px;
    margin-top: 60px;
    padding-top: 40px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    flex-wrap: wrap;
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
    right: 10%;
    animation-delay: 0s;
}

.element-2 {
    top: 60%;
    left: 15%;
    animation-delay: -10s;
}

.element-3 {
    bottom: 20%;
    right: 20%;
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

/* ===== Contact Overview ===== */
.contact-overview {
    padding: 80px 0 40px;
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

/* ===== Contact Methods ===== */
.contact-methods-section {
    padding: 60px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
}

.contact-methods-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.contact-method-card {
    background: white;
    border-radius: var(--radius-xl);
    padding: 40px;
    box-shadow: var(--shadow-lg);
    transition: var(--transition);
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.contact-method-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-2xl);
}

.method-icon {
    width: 80px;
    height: 80px;
    background: var(--gradient-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 32px;
    margin-bottom: 25px;
}

.method-content {
    flex: 1;
    width: 100%;
}

.method-content h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 10px;
}

.method-description {
    color: var(--gray);
    margin-bottom: 25px;
    line-height: 1.6;
}

.contact-numbers,
.contact-emails,
.contact-address {
    margin-bottom: 25px;
    text-align: left;
}

.phone-item,
.email-item,
.address-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px;
    background: var(--light);
    border-radius: var(--radius-md);
    margin-bottom: 8px;
    transition: var(--transition);
}

.phone-item:hover,
.email-item:hover {
    background: rgba(255, 94, 20, 0.1);
}

.phone-item i,
.email-item i {
    color: var(--primary);
    font-size: 16px;
}

.phone-link,
.email-link {
    color: var(--secondary);
    text-decoration: none;
    font-weight: 600;
    transition: var(--transition);
}

.phone-link:hover,
.email-link:hover {
    color: var(--primary);
}

.address-details h4 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 4px;
}

.address-details p {
    color: var(--gray);
    font-size: 0.9rem;
    margin: 0;
    line-height: 1.5;
}

.method-actions {
    display: flex;
    gap: 10px;
    margin-bottom: 25px;
    flex-wrap: wrap;
    justify-content: center;
}

.method-actions .btn {
    flex: 1;
    min-width: 140px;
}

.method-hours,
.method-response,
.method-visit {
    background: var(--light);
    padding: 20px;
    border-radius: var(--radius-lg);
    text-align: left;
    margin-top: auto;
}

.method-hours h4,
.method-response h4,
.method-visit h4 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.method-hours p,
.method-response p,
.method-visit p {
    color: var(--gray);
    font-size: 0.9rem;
    margin: 5px 0;
    line-height: 1.5;
}

/* ===== Contact Form Section ===== */
.contact-form-section {
    padding: 100px 0;
    background: white;
}

.contact-form-wrapper {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 60px;
    align-items: start;
}

.form-intro {
    position: sticky;
    top: 100px;
}

.form-subtitle {
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

.form-title {
    font-size: 2.2rem;
    font-weight: 800;
    color: var(--secondary);
    margin-bottom: 20px;
    line-height: 1.3;
}

.form-description {
    color: var(--gray);
    line-height: 1.7;
    margin-bottom: 30px;
    font-size: 1.05rem;
}

.form-features {
    display: grid;
    gap: 12px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 10px;
    color: var(--gray);
}

.feature-item i {
    color: var(--success);
    font-size: 14px;
}

.form-container {
    background: white;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
    overflow: hidden;
}

.form-header {
    background: var(--gradient);
    color: white;
    padding: 30px;
    text-align: center;
}

.form-header h3 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 8px;
}

.form-header p {
    opacity: 0.9;
    font-size: 0.95rem;
    margin: 0;
}

.form-grid {
    padding: 40px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 25px;
}

.form-group {
    margin-bottom: 0;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-group label {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    color: var(--secondary);
    margin-bottom: 10px;
    font-size: 0.95rem;
}

.form-group label i {
    color: var(--primary);
    font-size: 16px;
}

.form-control {
    width: 100%;
    padding: 14px 16px;
    border: 2px solid var(--light-gray);
    border-radius: var(--radius-md);
    font-size: 1rem;
    transition: var(--transition);
    background: white;
}

.form-control:focus {
    border-color: var(--primary);
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 94, 20, 0.1);
}

.form-control::placeholder {
    color: var(--gray);
    opacity: 0.7;
}

.subject-selector {
    position: relative;
}

.subject-selector select {
    appearance: none;
    cursor: pointer;
    padding-right: 45px;
}

.subject-selector i {
    position: absolute;
    right: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gray);
    pointer-events: none;
}

textarea.form-control {
    resize: vertical;
    min-height: 120px;
    line-height: 1.5;
}

.char-counter {
    text-align: right;
    font-size: 0.85rem;
    color: var(--gray);
    margin-top: 5px;
}

#charCount {
    font-weight: 600;
    color: var(--secondary);
}

.form-error {
    color: #ef4444;
    font-size: 0.85rem;
    margin-top: 5px;
    min-height: 20px;
    display: none;
}

.form-options {
    display: grid;
    gap: 15px;
}

.form-check {
    display: flex;
    align-items: center;
    gap: 10px;
}

.form-check input[type="checkbox"] {
    width: 18px;
    height: 18px;
    accent-color: var(--primary);
}

.form-check label {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: normal;
    color: var(--dark);
    margin-bottom: 0;
    cursor: pointer;
}

.form-check label i {
    color: var(--gray);
    font-size: 14px;
}

.form-actions {
    display: flex;
    gap: 15px;
    padding: 0 40px 40px;
    flex-wrap: wrap;
}

.form-actions .btn {
    flex: 1;
    min-width: 160px;
}

.btn-lg {
    padding: 16px 32px;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.spinner {
    width: 20px;
    height: 20px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-top-color: white;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin-left: 10px;
}

@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}

.form-footer {
    padding: 20px 40px;
    border-top: 1px solid var(--light-gray);
    background: var(--light);
}

.form-footer p {
    display: flex;
    align-items: center;
    gap: 10px;
    color: var(--gray);
    font-size: 0.9rem;
    margin: 0;
}

.form-footer i {
    color: var(--success);
    font-size: 16px;
}

/* ===== Map Section ===== */
.map-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
}

.map-container {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 40px;
}

.map-wrapper {
    position: relative;
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-xl);
    height: 500px;
}

.map-wrapper iframe {
    width: 100%;
    height: 100%;
    border: none;
}

.map-overlay {
    position: absolute;
    bottom: 20px;
    left: 20px;
    right: 20px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: var(--radius-lg);
    padding: 20px;
    box-shadow: var(--shadow-md);
}

.map-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.map-info h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--secondary);
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 5px;
}

.map-info p {
    color: var(--gray);
    font-size: 0.9rem;
    margin: 0;
}

.location-details {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.location-card {
    background: white;
    border-radius: var(--radius-xl);
    padding: 30px;
    box-shadow: var(--shadow-lg);
    display: flex;
    gap: 20px;
    transition: var(--transition);
}

.location-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

.location-icon {
    width: 60px;
    height: 60px;
    background: var(--primary);
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 24px;
    flex-shrink: 0;
}

.location-content h4 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 15px;
}

.timing-grid {
    display: grid;
    gap: 10px;
}

.timing-item {
    display: flex;
    justify-content: space-between;
    padding-bottom: 10px;
    border-bottom: 1px solid var(--light-gray);
}

.timing-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.timing-item .day {
    color: var(--dark);
    font-weight: 500;
}

.timing-item .time {
    color: var(--primary);
    font-weight: 600;
}

.parking-features {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    margin-top: 15px;
}

.parking-features span {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--light);
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    color: var(--gray);
}

.parking-features i {
    color: var(--success);
    font-size: 12px;
}

/* ===== Quick Contact ===== */
.quick-contact-section {
    padding: 80px 0;
    background: var(--gradient);
    color: white;
}

.quick-contact-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

.quick-contact-content h2 {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 15px;
}

.quick-contact-content p {
    font-size: 1.1rem;
    opacity: 0.9;
    margin-bottom: 30px;
}

.quick-actions {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.btn-success {
    background: #25D366;
    color: white;
    border: none;
}

.btn-success:hover {
    background: #1da851;
    transform: translateY(-2px);
}

.quick-contact-info {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 25px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: var(--radius-xl);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: var(--transition);
}

.info-item:hover {
    background: rgba(255, 255, 255, 0.15);
    transform: translateX(10px);
}

.info-item i {
    font-size: 32px;
    color: var(--primary);
}

.info-item h4 {
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 5px;
}

.info-item p {
    opacity: 0.9;
    margin: 0;
    font-size: 1rem;
}

/* ===== Modals ===== */
.callback-modal {
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

@keyframes modalFadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.modal-container {
    max-width: 500px;
    margin: 50px auto;
    background: white;
    border-radius: var(--radius-xl);
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
    transition: var(--transition);
}

.modal-close:hover {
    background: var(--primary-dark);
    transform: rotate(90deg);
}

.modal-content {
    padding: 40px;
}

.modal-content h2 {
    text-align: center;
    margin-bottom: 10px;
    color: var(--secondary);
    font-size: 1.8rem;
}

.modal-content > p {
    text-align: center;
    color: var(--gray);
    margin-bottom: 30px;
}

.modal-content .form-group {
    margin-bottom: 20px;
}

.modal-content .form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: var(--secondary);
}

.modal-content .form-group input,
.modal-content .form-group select,
.modal-content .form-group textarea {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid var(--light-gray);
    border-radius: var(--radius-md);
    font-size: 1rem;
}

/* ===== Responsive Design ===== */
@media (max-width: 1200px) {
    .contact-methods-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .contact-form-wrapper {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .form-intro {
        position: static;
    }
    
    .map-container {
        grid-template-columns: 1fr;
    }
    
    .quick-contact-wrapper {
        grid-template-columns: 1fr;
        gap: 40px;
    }
}

@media (max-width: 992px) {
    .hero-title {
        font-size: 2.8rem;
    }
    
    .section-title {
        font-size: 2.2rem;
    }
    
    .contact-stats {
        flex-direction: column;
        gap: 20px;
    }
    
    .contact-methods-grid {
        grid-template-columns: 1fr;
    }
    
    .form-grid {
        grid-template-columns: 1fr;
    }
    
    .form-actions .btn {
        min-width: 100%;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.2rem;
    }
    
    .section-title {
        font-size: 1.8rem;
    }
    
    .form-title {
        font-size: 1.8rem;
    }
    
    .quick-contact-content h2 {
        font-size: 2rem;
    }
    
    .quick-actions {
        flex-direction: column;
    }
    
    .quick-actions .btn {
        width: 100%;
    }
    
    .method-actions {
        flex-direction: column;
    }
    
    .method-actions .btn {
        width: 100%;
    }
}

@media (max-width: 576px) {
    .contact-hero,
    .contact-overview,
    .contact-methods-section,
    .contact-form-section,
    .map-section,
    .quick-contact-section {
        padding: 60px 0;
    }
    
    .hero-title {
        font-size: 1.8rem;
    }
    
    .contact-method-card {
        padding: 30px 25px;
    }
    
    .form-grid,
    .form-actions,
    .form-footer {
        padding: 30px 25px;
    }
    
    .form-header {
        padding: 25px;
    }
    
    .map-wrapper {
        height: 350px;
    }
    
    .info-item {
        padding: 20px;
    }
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
    --success: #10B981;
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
    // Form validation
    const contactForm = document.getElementById('contactForm');
    const nameInput = document.getElementById('contactName');
    const emailInput = document.getElementById('contactEmail');
    const phoneInput = document.getElementById('contactPhone');
    const subjectSelect = document.getElementById('contactSubject');
    const messageTextarea = document.getElementById('contactMessage');
    const charCount = document.getElementById('charCount');
    const submitBtn = document.getElementById('submitBtn');
    const submitSpinner = document.getElementById('submitSpinner');
    
    // Character counter for message
    messageTextarea.addEventListener('input', function() {
        const length = this.value.length;
        charCount.textContent = length;
        
        if (length > 1000) {
            this.value = this.value.substring(0, 1000);
            charCount.textContent = 1000;
        }
    });
    
    // Form validation
    function validateForm() {
        let isValid = true;
        
        // Reset errors
        document.querySelectorAll('.form-error').forEach(error => {
            error.style.display = 'none';
            error.textContent = '';
        });
        
        // Validate name
        if (!nameInput.value.trim()) {
            showError('nameError', 'Please enter your name');
            isValid = false;
        }
        
        // Validate email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailInput.value.trim()) {
            showError('emailError', 'Please enter your email address');
            isValid = false;
        } else if (!emailRegex.test(emailInput.value)) {
            showError('emailError', 'Please enter a valid email address');
            isValid = false;
        }
        
        // Validate phone
        const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
        const phoneValue = phoneInput.value.replace(/[^\d+]/g, '');
        if (!phoneInput.value.trim()) {
            showError('phoneError', 'Please enter your phone number');
            isValid = false;
        } else if (!phoneRegex.test(phoneValue)) {
            showError('phoneError', 'Please enter a valid phone number');
            isValid = false;
        }
        
        // Validate subject
        if (!subjectSelect.value) {
            showError('subjectError', 'Please select a subject');
            isValid = false;
        }
        
        // Validate message
        if (!messageTextarea.value.trim()) {
            showError('messageError', 'Please enter your message');
            isValid = false;
        } else if (messageTextarea.value.trim().length < 10) {
            showError('messageError', 'Message should be at least 10 characters');
            isValid = false;
        }
        
        return isValid;
    }
    
    function showError(elementId, message) {
        const errorElement = document.getElementById(elementId);
        if (errorElement) {
            errorElement.textContent = message;
            errorElement.style.display = 'block';
            
            // Scroll to first error
            if (document.querySelectorAll('.form-error[style*="display: block"]').length === 1) {
                errorElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }
    }
    
    // Form submission
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (!validateForm()) {
            return;
        }
        
        // Show loading state
        submitBtn.disabled = true;
        submitSpinner.style.display = 'block';
        submitBtn.querySelector('span').textContent = 'Sending...';
        
        // Simulate API call (replace with actual form submission)
        setTimeout(() => {
            // In production, use fetch or axios to submit the form
            console.log('Form submitted:', {
                name: nameInput.value,
                email: emailInput.value,
                phone: phoneInput.value,
                company: document.getElementById('contactCompany').value,
                subject: subjectSelect.value,
                message: messageTextarea.value,
                newsletter: document.getElementById('contactNewsletter').checked,
                callback: document.getElementById('contactCallback').checked
            });
            
            // Show success message
            showNotification('Message sent successfully! We\'ll get back to you soon.', 'success');
            
            // Reset form
            contactForm.reset();
            charCount.textContent = '0';
            
            // Reset button state
            submitBtn.disabled = false;
            submitSpinner.style.display = 'none';
            submitBtn.querySelector('span').textContent = 'Send Message';
            
        }, 1500);
    });
    
    // Callback modal functions
    function requestCallback() {
        const modal = document.getElementById('callbackModal');
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
    
    function closeCallbackModal() {
        const modal = document.getElementById('callbackModal');
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
    
    // Callback form submission
    document.getElementById('callbackForm')?.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const name = document.getElementById('callbackName').value;
        const phone = document.getElementById('callbackPhone').value;
        const time = document.getElementById('callbackTime').value;
        const topic = document.getElementById('callbackTopic').value;
        
        console.log('Callback requested:', { name, phone, time, topic });
        
        showNotification('Callback requested! We\'ll call you at your preferred time.', 'success');
        closeCallbackModal();
        this.reset();
    });
    
    // Other modal functions
    function openQuickInquiry() {
        // Set subject to Machinery Inquiry
        document.getElementById('contactSubject').value = 'Machinery Inquiry';
        
        // Scroll to form
        document.getElementById('contactForm').scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
        });
        
        // Focus on message field
        document.getElementById('contactMessage').focus();
    }
    
    function scheduleVisit() {
        // Set subject to Visit Request
        document.getElementById('contactSubject').value = 'Other';
        
        // Pre-fill message
        document.getElementById('contactMessage').value = 'I would like to schedule a visit to your facility. Please suggest available dates and times.';
        
        // Scroll to form
        document.getElementById('contactForm').scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
        });
        
        // Focus on name field
        document.getElementById('contactName').focus();
    }
    
    // Notification function
    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 25px;
            background: ${type === 'success' ? '#10B981' : '#EF4444'};
            color: white;
            border-radius: 8px;
            z-index: 9999;
            animation: slideIn 0.3s ease;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            max-width: 400px;
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }
    
    // Add CSS for animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
    
    // Close modals on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeCallbackModal();
        }
    });
    
    // Close modals when clicking outside
    document.getElementById('callbackModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeCallbackModal();
        }
    });
    
    // Phone number formatting
    phoneInput.addEventListener('input', function() {
        let value = this.value.replace(/\D/g, '');
        
        if (value.length > 10) {
            value = value.slice(0, 10);
        }
        
        if (value.length > 6) {
            value = value.slice(0, 6) + '-' + value.slice(6);
        }
        if (value.length > 3) {
            value = value.slice(0, 3) + '-' + value.slice(3);
        }
        
        this.value = value;
    });
    
    // Initialize form with sample data for testing (remove in production)
    if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
        nameInput.value = 'John Farmer';
        emailInput.value = 'john@example.com';
        phoneInput.value = '123-456-7890';
        document.getElementById('contactCompany').value = 'Green Acres Farm';
        subjectSelect.value = 'Machinery Inquiry';
        messageTextarea.value = 'I\'m interested in your agricultural machinery. Could you please send me more information about your tractor models and pricing?';
        charCount.textContent = messageTextarea.value.length;
    }
});
</script>

@include('Templates.footer')