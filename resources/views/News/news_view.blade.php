@include('Templates.header')

<!-- Workshop News Detail Section -->
<section class="workshop-news-detail-section">
    <div class="container">
        <!-- Workshop Breadcrumb -->
        <nav aria-label="breadcrumb" class="workshop-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">
                        <i class="fas fa-home"></i> Workshop Home
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('news') }}">
                        <i class="fas fa-newspaper"></i> Workshop Updates
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-industry"></i> News Detail
                </li>
            </ol>
        </nav>

        <!-- Main News Content -->
        <div class="workshop-news-container">
            <!-- News Header -->
            <div class="workshop-news-header">
                <div class="news-meta">
                    <span class="news-category">
                        <i class="fas fa-industry"></i> Workshop Update
                    </span>
                    <span class="news-date">
                        <i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($news->created_at)->format('F d, Y') }}
                    </span>
                    <span class="news-time">
                        <i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse($news->created_at)->format('h:i A') }}
                    </span>
                </div>
                
                <h1 class="workshop-news-title">
                    <i class="fas fa-tractor me-3"></i> {{ $news->title }}
                </h1>
                
                <div class="workshop-badge">
                    <i class="fas fa-hard-hat"></i> Agricultural Machinery News
                </div>
            </div>

            <!-- News Description -->
            <div class="workshop-news-description">
                <div class="description-content">
                    <div class="description-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <p class="description-text">{{ $news->description }}</p>
                </div>
            </div>

            <!-- Workshop Image Gallery -->
            <div class="workshop-gallery">
                <!-- Main Featured Image -->
                @if($news->image1)
                    <div class="featured-image-wrapper">
                        <div class="gallery-badge">
                            <i class="fas fa-image"></i> Featured Image
                        </div>
                        <img src="{{ asset('storage/' . $news->image1) }}" 
                             alt="Featured Workshop Image" 
                             class="featured-image">
                        <div class="image-overlay">
                            <button class="zoom-btn" onclick="openLightbox('{{ asset('storage/' . $news->image1) }}')">
                                <i class="fas fa-search-plus"></i>
                            </button>
                        </div>
                    </div>
                @endif

                <!-- Secondary Images Grid -->
                @if($news->image2 || $news->image3)
                    <div class="secondary-images-grid">
                        @if($news->image2)
                            <div class="secondary-image-wrapper">
                                <img src="{{ asset('storage/' . $news->image2) }}" 
                                     alt="Workshop Image 2" 
                                     class="secondary-image">
                                <div class="image-overlay">
                                    <button class="zoom-btn" onclick="openLightbox('{{ asset('storage/' . $news->image2) }}')">
                                        <i class="fas fa-search-plus"></i>
                                    </button>
                                </div>
                            </div>
                        @endif
                        
                        @if($news->image3)
                            <div class="secondary-image-wrapper">
                                <img src="{{ asset('storage/' . $news->image3) }}" 
                                     alt="Workshop Image 3" 
                                     class="secondary-image">
                                <div class="image-overlay">
                                    <button class="zoom-btn" onclick="openLightbox('{{ asset('storage/' . $news->image3) }}')">
                                        <i class="fas fa-search-plus"></i>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Image Counter -->
                @if($news->image1 || $news->image2 || $news->image3)
                    <div class="image-counter">
                        <i class="fas fa-images"></i>
                        <span>{{ ($news->image1 ? 1 : 0) + ($news->image2 ? 1 : 0) + ($news->image3 ? 1 : 0) }} Workshop Images</span>
                    </div>
                @endif
            </div>

            <!-- Workshop Actions -->
            <div class="workshop-actions">
                <div class="action-buttons">
                    @if($news->link)
                        <a href="{{ $news->link }}" target="_blank" class="btn btn-workshop-primary">
                            <i class="fas fa-external-link-alt me-2"></i> View Full Details
                        </a>
                    @endif
                    
                    <button class="btn btn-workshop-outline share-btn">
                        <i class="fas fa-share-alt me-2"></i> Share Update
                    </button>
                    
                    <button class="btn btn-workshop-outline print-btn" onclick="window.print()">
                        <i class="fas fa-print me-2"></i> Print
                    </button>
                </div>
                
                <div class="workshop-contact">
                    <h5><i class="fas fa-headset me-2"></i> Need More Information?</h5>
                    <p>Contact our workshop for details about this machinery update</p>
                    <a href="{{ route('contact') }}" class="btn btn-workshop-sm">
                        <i class="fas fa-envelope me-2"></i> Contact Workshop
                    </a>
                </div>
            </div>

            <!-- Workshop Navigation -->
            <div class="workshop-navigation">
                <a href="{{ route('news') }}" class="nav-btn prev-btn">
                    <i class="fas fa-arrow-left me-2"></i> Back to Updates
                </a>
                
                <div class="workshop-quick-links">
                    <h6><i class="fas fa-link me-2"></i> Quick Links</h6>
                    <div class="quick-links-grid">
                        <a href="{{ route('machineries') }}" class="quick-link">
                            <i class="fas fa-tractor"></i>
                            <span>Machinery</span>
                        </a>
                        <a href="{{ route('service') }}" class="quick-link">
                            <i class="fas fa-tools"></i>
                            <span>Services</span>
                        </a>
                        <a href="{{ route('about') }}" class="quick-link">
                            <i class="fas fa-industry"></i>
                            <span>Workshop</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Related News (Optional - if you have related news functionality) -->
            @if(isset($relatedNews) && $relatedNews->count() > 0)
                <div class="related-news-section">
                    <h3 class="related-title">
                        <i class="fas fa-newspaper me-3"></i> More Workshop Updates
                    </h3>
                    <div class="related-news-grid">
                        @foreach($relatedNews->take(3) as $related)
                            <div class="related-news-card">
                                @if($related->image1)
                                    <img src="{{ asset('storage/' . $related->image1) }}" 
                                         alt="{{ $related->title }}" 
                                         class="related-image">
                                @endif
                                <div class="related-content">
                                    <h6>{{ $related->title }}</h6>
                                    <p>{{ Str::limit($related->description, 80) }}</p>
                                    <a href="{{ route('news.show', $related->id) }}" class="btn btn-workshop-sm">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="imageLightbox" class="lightbox-modal">
    <span class="close-lightbox" onclick="closeLightbox()">&times;</span>
    <div class="lightbox-content">
        <img id="lightboxImage" src="" alt="Workshop Image">
        <div class="lightbox-caption">
            <span id="lightboxCaption"></span>
        </div>
    </div>
</div>

<style>
    /* ===== Workshop News Detail Styles ===== */
    :root {
        --workshop-primary: #FF5E14;
        --workshop-primary-dark: #E04A00;
        --workshop-secondary: #02245B;
        --workshop-accent: #F59E0B;
        --workshop-light: #F8F9FA;
        --workshop-dark: #1A202C;
        --workshop-steel: #4A5568;
        --workshop-success: #10B981;
        --workshop-gradient: linear-gradient(135deg, #FF5E14 0%, #02245B 100%);
    }

    .workshop-news-detail-section {
        padding: 40px 0 80px;
        background: var(--workshop-light);
        min-height: 100vh;
    }

    /* Workshop Breadcrumb */
    .workshop-breadcrumb {
        background: white;
        padding: 15px 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 30px;
    }

    .workshop-breadcrumb .breadcrumb {
        margin: 0;
        background: transparent;
    }

    .workshop-breadcrumb .breadcrumb-item a {
        color: var(--workshop-secondary);
        text-decoration: none;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .workshop-breadcrumb .breadcrumb-item.active {
        color: var(--workshop-primary);
        font-weight: 600;
    }

    .workshop-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
        content: '>';
        color: var(--workshop-steel);
    }

    /* Workshop News Container */
    .workshop-news-container {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    /* News Header */
    .workshop-news-header {
        background: var(--workshop-gradient);
        color: white;
        padding: 40px;
        position: relative;
        overflow: hidden;
    }

    .workshop-news-header::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .workshop-news-header::after {
        content: '';
        position: absolute;
        bottom: -30px;
        left: -30px;
        width: 150px;
        height: 150px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .news-meta {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .news-category, .news-date, .news-time {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.2);
        padding: 8px 15px;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 500;
        backdrop-filter: blur(10px);
    }

    .workshop-news-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        line-height: 1.3;
        position: relative;
        z-index: 1;
    }

    .workshop-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 10px 20px;
        border-radius: 50px;
        font-weight: 600;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    /* News Description */
    .workshop-news-description {
        padding: 40px;
        border-bottom: 1px solid var(--workshop-light);
    }

    .description-content {
        display: flex;
        gap: 20px;
        align-items: flex-start;
    }

    .description-icon {
        width: 60px;
        height: 60px;
        background: var(--workshop-light);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--workshop-primary);
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .description-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--workshop-dark);
        margin: 0;
    }

    /* Workshop Gallery */
    .workshop-gallery {
        padding: 40px;
    }

    .featured-image-wrapper {
        position: relative;
        border-radius: 15px;
        overflow: hidden;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .gallery-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        background: var(--workshop-primary);
        color: white;
        padding: 8px 15px;
        border-radius: 50px;
        font-weight: 600;
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .featured-image {
        width: 100%;
        height: 500px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .featured-image:hover {
        transform: scale(1.02);
    }

    .image-overlay {
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

    .featured-image-wrapper:hover .image-overlay {
        opacity: 1;
    }

    .zoom-btn {
        background: var(--workshop-primary);
        color: white;
        border: none;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .zoom-btn:hover {
        background: white;
        color: var(--workshop-primary);
        transform: scale(1.1);
    }

    /* Secondary Images Grid */
    .secondary-images-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }

    .secondary-image-wrapper {
        position: relative;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }

    .secondary-image {
        width: 100%;
        height: 300px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .secondary-image-wrapper:hover .secondary-image {
        transform: scale(1.05);
    }

    .secondary-image-wrapper .image-overlay {
        background: rgba(255, 94, 20, 0.9);
    }

    /* Image Counter */
    .image-counter {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: var(--workshop-light);
        padding: 10px 20px;
        border-radius: 50px;
        color: var(--workshop-steel);
        font-weight: 600;
    }

    .image-counter i {
        color: var(--workshop-primary);
    }

    /* Workshop Buttons */
    .btn-workshop-primary {
        background: var(--workshop-primary);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-workshop-primary:hover {
        background: var(--workshop-primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(255, 94, 20, 0.3);
        color: white;
    }

    .btn-workshop-outline {
        background: transparent;
        color: var(--workshop-primary);
        border: 2px solid var(--workshop-primary);
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-workshop-outline:hover {
        background: var(--workshop-primary);
        color: white;
        transform: translateY(-2px);
    }

    .btn-workshop-sm {
        background: transparent;
        color: var(--workshop-primary);
        border: 1px solid var(--workshop-primary);
        padding: 8px 20px;
        border-radius: 6px;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        text-decoration: none;
    }

    .btn-workshop-sm:hover {
        background: var(--workshop-primary);
        color: white;
    }

    /* Workshop Actions */
    .workshop-actions {
        padding: 40px;
        border-top: 1px solid var(--workshop-light);
        border-bottom: 1px solid var(--workshop-light);
    }

    .action-buttons {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 30px;
    }

    .workshop-contact {
        background: var(--workshop-light);
        padding: 25px;
        border-radius: 10px;
        border-left: 4px solid var(--workshop-primary);
    }

    .workshop-contact h5 {
        color: var(--workshop-secondary);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }

    .workshop-contact p {
        color: var(--workshop-steel);
        margin-bottom: 15px;
    }

    /* Workshop Navigation */
    .workshop-navigation {
        padding: 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .nav-btn {
        background: var(--workshop-light);
        color: var(--workshop-secondary);
        padding: 12px 25px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
    }

    .nav-btn:hover {
        background: var(--workshop-primary);
        color: white;
        transform: translateY(-2px);
    }

    .workshop-quick-links h6 {
        color: var(--workshop-secondary);
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }

    .quick-links-grid {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .quick-link {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        background: var(--workshop-light);
        padding: 15px;
        border-radius: 10px;
        text-decoration: none;
        color: var(--workshop-secondary);
        transition: all 0.3s ease;
        min-width: 100px;
    }

    .quick-link:hover {
        background: var(--workshop-primary);
        color: white;
        transform: translateY(-3px);
    }

    .quick-link i {
        font-size: 1.5rem;
    }

    .quick-link span {
        font-size: 0.9rem;
        font-weight: 500;
    }

    /* Related News Section */
    .related-news-section {
        padding: 40px;
        border-top: 1px solid var(--workshop-light);
    }

    .related-title {
        color: var(--workshop-secondary);
        margin-bottom: 30px;
        display: flex;
        align-items: center;
    }

    .related-news-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .related-news-card {
        background: var(--workshop-light);
        border-radius: 10px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .related-news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .related-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .related-content {
        padding: 20px;
    }

    .related-content h6 {
        color: var(--workshop-secondary);
        margin-bottom: 10px;
        font-size: 1rem;
        font-weight: 700;
    }

    .related-content p {
        color: var(--workshop-steel);
        font-size: 0.9rem;
        margin-bottom: 15px;
        line-height: 1.5;
    }

    /* Lightbox Modal */
    .lightbox-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        padding: 50px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        overflow: auto;
    }

    .close-lightbox {
        position: absolute;
        top: 20px;
        right: 40px;
        color: white;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .close-lightbox:hover {
        color: var(--workshop-primary);
    }

    .lightbox-content {
        margin: auto;
        display: block;
        max-width: 90%;
        max-height: 90%;
        animation: zoom 0.3s;
    }

    @keyframes zoom {
        from {transform: scale(0.8)}
        to {transform: scale(1)}
    }

    .lightbox-caption {
        text-align: center;
        color: white;
        padding: 10px 0;
        font-size: 1rem;
    }

    /* Responsive Design */
    @media (max-width: 991.98px) {
        .workshop-news-title {
            font-size: 2rem;
        }
        
        .featured-image {
            height: 400px;
        }
        
        .secondary-image {
            height: 250px;
        }
        
        .related-news-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 767.98px) {
        .workshop-news-header {
            padding: 30px 20px;
        }
        
        .workshop-news-title {
            font-size: 1.8rem;
        }
        
        .news-meta {
            flex-direction: column;
            gap: 10px;
        }
        
        .description-content {
            flex-direction: column;
            text-align: center;
        }
        
        .secondary-images-grid {
            grid-template-columns: 1fr;
        }
        
        .action-buttons {
            flex-direction: column;
        }
        
        .workshop-navigation {
            flex-direction: column;
            align-items: stretch;
        }
        
        .related-news-grid {
            grid-template-columns: 1fr;
        }
        
        .featured-image {
            height: 300px;
        }
        
        .secondary-image {
            height: 200px;
        }
    }

    @media (max-width: 575.98px) {
        .workshop-news-title {
            font-size: 1.5rem;
        }
        
        .workshop-news-header,
        .workshop-news-description,
        .workshop-gallery,
        .workshop-actions,
        .workshop-navigation,
        .related-news-section {
            padding: 25px 20px;
        }
        
        .quick-links-grid {
            flex-direction: column;
        }
    }

    /* Print Styles */
    @media print {
        .workshop-breadcrumb,
        .action-buttons,
        .workshop-contact,
        .workshop-navigation,
        .related-news-section {
            display: none;
        }
        
        .workshop-news-container {
            box-shadow: none;
            border: 1px solid #ddd;
        }
    }
</style>

<script>
    // Lightbox functionality
    function openLightbox(imageSrc) {
        const lightbox = document.getElementById('imageLightbox');
        const lightboxImage = document.getElementById('lightboxImage');
        
        lightboxImage.src = imageSrc;
        lightbox.style.display = 'block';
        
        // Disable body scroll
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        const lightbox = document.getElementById('imageLightbox');
        lightbox.style.display = 'none';
        
        // Enable body scroll
        document.body.style.overflow = 'auto';
    }

    // Close lightbox when clicking outside the image
    window.onclick = function(event) {
        const lightbox = document.getElementById('imageLightbox');
        if (event.target === lightbox) {
            closeLightbox();
        }
    }

    // Share functionality
    document.querySelector('.share-btn')?.addEventListener('click', function() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $news->title }}',
                text: '{{ $news->description }}',
                url: window.location.href
            })
            .then(() => console.log('Shared successfully'))
            .catch((error) => console.log('Error sharing:', error));
        } else {
            // Fallback for browsers that don't support Web Share API
            alert('Share this URL: ' + window.location.href);
        }
    });

    // Add animation on scroll
    document.addEventListener('DOMContentLoaded', function() {
        const observerOptions = {
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, observerOptions);

        // Observe elements for animation
        const animatedElements = document.querySelectorAll('.workshop-news-description, .workshop-gallery, .workshop-actions');
        animatedElements.forEach(el => observer.observe(el));
    });

    // Image lazy loading
    document.addEventListener('DOMContentLoaded', function() {
        const images = document.querySelectorAll('img');
        
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.add('loaded');
                    observer.unobserve(img);
                }
            });
        });

        images.forEach(img => {
            if (img.dataset.src) {
                imageObserver.observe(img);
            }
        });
    });
</script>

@include('Templates.footer')