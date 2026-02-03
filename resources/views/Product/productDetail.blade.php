@include('Templates.header')

<!-- Product Detail Hero -->
<section class="product-hero">
    <div class="container">
        <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('machineries') }}">
                        <i class="fas fa-tractor"></i> Machinery
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-info-circle"></i> {{ $product->product_name }}
                </li>
            </ol>
        </nav>
        
        <div class="product-header">
            <div class="product-title-section">
                <div class="product-badges">
                    @if($product->isFeatured)
                    <span class="badge badge-featured">
                        <i class="fas fa-star"></i>
                        <span>Featured</span>
                    </span>
                    @endif
                    
                    @if($product->isNew)
                    <span class="badge badge-new">
                        <i class="fas fa-bolt"></i>
                        <span>New Arrival</span>
                    </span>
                    @endif
                    
                    <span class="badge badge-category">
                        <i class="fas fa-{{ getCategoryIcon($product->category) }}"></i>
                        <span>{{ $product->category }}</span>
                    </span>
                </div>
                
                <h1 class="product-title">{{ $product->product_name }}</h1>
                
                <div class="product-actions-mobile">
                    <button class="btn btn-primary" onclick="openQuoteModal()">
                        <i class="fas fa-envelope me-2"></i>
                        <span>Get Quote</span>
                    </button>
                    <button class="btn btn-secondary" onclick="shareProduct()">
                        <i class="fas fa-share-alt me-2"></i>
                        <span>Share</span>
                    </button>
                </div>
            </div>
            
            <div class="product-actions-desktop">
                <button class="btn btn-primary" onclick="openQuoteModal()">
                    <i class="fas fa-envelope me-2"></i>
                    <span>Request Quote</span>
                </button>
                <button class="btn btn-secondary" onclick="shareProduct()">
                    <i class="fas fa-share-alt me-2"></i>
                    <span>Share Product</span>
                </button>
                <button class="btn-action" onclick="toggleFavorite()" aria-label="Add to favorites">
                    <i class="far fa-heart"></i>
                </button>
                <button class="btn-action" onclick="printPage()" aria-label="Print page">
                    <i class="fas fa-print"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Product Content -->
<section class="product-content-section">
    <div class="container">
        <div class="product-layout">
            <!-- Product Gallery -->
            <div class="product-gallery">
    <!-- Main Image -->
    <div class="main-image-container">
        <div class="main-image-wrapper">
            @if($product->image1)
            <img id="mainProductImage" 
                 src="{{ asset('storage/' . $product->image1) }}" 
                 alt="{{ $product->product_name }}"
                 class="main-image"
                 loading="eager">
            @endif
            
            <!-- Image Zoom (Hidden by default) -->
            <div class="image-zoom" id="imageZoom" style="display: none;">
                <div class="zoom-container">
                    <img id="zoomImage" src="" alt="Zoom view">
                </div>
            </div>
            
            <!-- Image Controls -->
            <div class="image-controls">
                <button class="control-btn zoom-in" id="zoomInBtn" aria-label="Zoom in">
                    <i class="fas fa-search-plus"></i>
                </button>
                <button class="control-btn fullscreen" id="fullscreenBtn" aria-label="Fullscreen view">
                    <i class="fas fa-expand"></i>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Thumbnail Gallery -->
    <div class="thumbnail-gallery">
        <div class="thumbnail-track" id="thumbnailTrack">
            @if($product->image1)
            <div class="thumbnail-wrapper active" data-image="{{ asset('storage/' . $product->image1) }}">
                <img src="{{ asset('storage/' . $product->image1) }}" 
                     alt="Image 1" 
                     loading="lazy">
            </div>
            @endif
            
            @if($product->image2)
            <div class="thumbnail-wrapper" data-image="{{ asset('storage/' . $product->image2) }}">
                <img src="{{ asset('storage/' . $product->image2) }}" 
                     alt="Image 2" 
                     loading="lazy">
            </div>
            @endif
            
            @if($product->image3)
            <div class="thumbnail-wrapper" data-image="{{ asset('storage/' . $product->image3) }}">
                <img src="{{ asset('storage/' . $product->image3) }}" 
                     alt="Image 3" 
                     loading="lazy">
            </div>
            @endif
            
            @if($product->image4)
            <div class="thumbnail-wrapper" data-image="{{ asset('storage/' . $product->image4) }}">
                <img src="{{ asset('storage/' . $product->image4) }}" 
                     alt="Image 4" 
                     loading="lazy">
            </div>
            @endif
        </div>
        
        @if(($product->image2 ? 1 : 0) + ($product->image3 ? 1 : 0) + ($product->image4 ? 1 : 0) > 3)
        <div class="thumbnail-controls">
            <button class="thumb-prev" id="thumbPrevBtn" aria-label="Previous thumbnails">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="thumb-next" id="thumbNextBtn" aria-label="Next thumbnails">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        @endif
    </div>
    
    <!-- Image Counter -->
    <div class="image-counter">
        <i class="fas fa-images"></i>
        <span id="currentImage">1</span> / 
        <span id="totalImages">{{ ($product->image1 ? 1 : 0) + ($product->image2 ? 1 : 0) + ($product->image3 ? 1 : 0) + ($product->image4 ? 1 : 0) }}</span>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize variables
    const mainImage = document.getElementById('mainProductImage');
    const thumbnails = document.querySelectorAll('.thumbnail-wrapper');
    const currentImageSpan = document.getElementById('currentImage');
    const zoomImage = document.getElementById('zoomImage');
    const imageZoom = document.getElementById('imageZoom');
    const zoomInBtn = document.getElementById('zoomInBtn');
    const fullscreenBtn = document.getElementById('fullscreenBtn');
    const thumbnailTrack = document.getElementById('thumbnailTrack');
    const thumbPrevBtn = document.getElementById('thumbPrevBtn');
    const thumbNextBtn = document.getElementById('thumbNextBtn');
    
    let currentImageIndex = 0;
    const images = [];
    
    // Collect all available images
    thumbnails.forEach((thumb, index) => {
        const imgUrl = thumb.dataset.image;
        if (imgUrl) {
            images.push(imgUrl);
            // Add click event to each thumbnail
            thumb.addEventListener('click', function() {
                setActiveImage(index);
                scrollThumbnailIntoView(index);
            });
        }
    });
    
    // Set initial state
    function setActiveImage(index) {
        if (index < 0 || index >= images.length) return;
        
        currentImageIndex = index;
        
        // Update main image
        if (mainImage) {
            mainImage.src = images[index];
            mainImage.alt = `Image ${index + 1}`;
        }
        
        // Update zoom image
        if (zoomImage) {
            zoomImage.src = images[index];
        }
        
        // Update thumbnails
        thumbnails.forEach((thumb, i) => {
            if (thumb) {
                thumb.classList.toggle('active', i === index);
            }
        });
        
        // Update counter
        if (currentImageSpan) {
            currentImageSpan.textContent = index + 1;
        }
    }
    
    // Scroll thumbnail into view
    function scrollThumbnailIntoView(index) {
        if (thumbnails[index] && thumbnailTrack) {
            const thumbnail = thumbnails[index];
            const trackRect = thumbnailTrack.getBoundingClientRect();
            const thumbRect = thumbnail.getBoundingClientRect();
            
            if (thumbRect.left < trackRect.left) {
                thumbnailTrack.scrollLeft -= (trackRect.left - thumbRect.left + 10);
            } else if (thumbRect.right > trackRect.right) {
                thumbnailTrack.scrollLeft += (thumbRect.right - trackRect.right + 10);
            }
        }
    }
    
    // Initialize with first image
    if (images.length > 0) {
        setActiveImage(0);
    }
    
    // Zoom functionality
    let zoomLevel = 1;
    const maxZoomLevel = 3;
    const zoomStep = 0.5;
    
    if (zoomInBtn && mainImage) {
        zoomInBtn.addEventListener('click', function() {
            if (zoomLevel < maxZoomLevel) {
                zoomLevel += zoomStep;
            } else {
                zoomLevel = 1;
            }
            
            if (zoomImage) {
                zoomImage.style.transform = `scale(${zoomLevel})`;
                zoomImage.style.transformOrigin = 'center center';
            }
            
            // Show zoom effect on main image
            mainImage.style.transform = `scale(${zoomLevel})`;
            mainImage.style.transformOrigin = 'center center';
            mainImage.style.transition = 'transform 0.3s ease';
            
            // Reset after animation
            setTimeout(() => {
                mainImage.style.transform = 'scale(1)';
            }, 300);
        });
    }
    
    // Mouse hover zoom for desktop
    if (mainImage && window.innerWidth > 768) {
        mainImage.addEventListener('mouseenter', function() {
            if (imageZoom && zoomImage) {
                zoomImage.src = this.src;
                imageZoom.style.display = 'block';
                
                // Position the zoom container
                const rect = this.getBoundingClientRect();
                imageZoom.style.top = `${rect.top}px`;
                imageZoom.style.left = `${rect.right + 20}px`;
            }
        });
        
        mainImage.addEventListener('mousemove', function(e) {
            if (!imageZoom || !zoomImage) return;
            
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const xPercent = (x / this.offsetWidth) * 100;
            const yPercent = (y / this.offsetHeight) * 100;
            
            zoomImage.style.transformOrigin = `${xPercent}% ${yPercent}%`;
            zoomImage.style.transform = `scale(${zoomLevel})`;
        });
        
        mainImage.addEventListener('mouseleave', function() {
            if (imageZoom) {
                imageZoom.style.display = 'none';
            }
        });
    }
    
    // Fullscreen functionality
    if (fullscreenBtn) {
        fullscreenBtn.addEventListener('click', function() {
            openFullscreenViewer();
        });
    }
    
    function openFullscreenViewer() {
        const viewer = document.createElement('div');
        viewer.className = 'fullscreen-viewer';
        viewer.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: zoom-out;
        `;
        
        const img = document.createElement('img');
        img.src = images[currentImageIndex];
        img.alt = `Fullscreen view - Image ${currentImageIndex + 1}`;
        img.style.cssText = `
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
            cursor: default;
        `;
        
        // Close button
        const closeBtn = document.createElement('button');
        closeBtn.innerHTML = '<i class="fas fa-times"></i>';
        closeBtn.style.cssText = `
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 94, 20, 0.9);
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
        `;
        closeBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            document.body.removeChild(viewer);
            document.body.style.overflow = 'auto';
        });
        
        // Navigation buttons
        if (images.length > 1) {
            // Previous button
            const prevBtn = document.createElement('button');
            prevBtn.innerHTML = '<i class="fas fa-chevron-left"></i>';
            prevBtn.style.cssText = `
                position: absolute;
                left: 20px;
                top: 50%;
                transform: translateY(-50%);
                background: rgba(255, 255, 255, 0.2);
                color: white;
                border: none;
                width: 60px;
                height: 60px;
                border-radius: 50%;
                font-size: 24px;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                backdrop-filter: blur(10px);
                z-index: 10000;
            `;
            prevBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                let newIndex = currentImageIndex - 1;
                if (newIndex < 0) newIndex = images.length - 1;
                setActiveImage(newIndex);
                img.src = images[currentImageIndex];
            });
            
            // Next button
            const nextBtn = document.createElement('button');
            nextBtn.innerHTML = '<i class="fas fa-chevron-right"></i>';
            nextBtn.style.cssText = `
                position: absolute;
                right: 20px;
                top: 50%;
                transform: translateY(-50%);
                background: rgba(255, 255, 255, 0.2);
                color: white;
                border: none;
                width: 60px;
                height: 60px;
                border-radius: 50%;
                font-size: 24px;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                backdrop-filter: blur(10px);
                z-index: 10000;
            `;
            nextBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                let newIndex = currentImageIndex + 1;
                if (newIndex >= images.length) newIndex = 0;
                setActiveImage(newIndex);
                img.src = images[currentImageIndex];
            });
            
            viewer.appendChild(prevBtn);
            viewer.appendChild(nextBtn);
        }
        
        // Counter display
        const counter = document.createElement('div');
        counter.textContent = `${currentImageIndex + 1} / ${images.length}`;
        counter.style.cssText = `
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
            text-align: center;
            color: white;
            font-size: 18px;
            font-weight: 600;
            z-index: 10000;
        `;
        
        viewer.appendChild(img);
        viewer.appendChild(closeBtn);
        viewer.appendChild(counter);
        
        // Close on escape key
        document.addEventListener('keydown', function closeOnEscape(e) {
            if (e.key === 'Escape') {
                document.body.removeChild(viewer);
                document.body.style.overflow = 'auto';
                document.removeEventListener('keydown', closeOnEscape);
            }
        });
        
        // Close on background click
        viewer.addEventListener('click', function(e) {
            if (e.target === viewer) {
                document.body.removeChild(viewer);
                document.body.style.overflow = 'auto';
            }
        });
        
        document.body.appendChild(viewer);
        document.body.style.overflow = 'hidden';
    }
    
    // Thumbnail navigation
    if (thumbPrevBtn && thumbNextBtn && thumbnailTrack) {
        const scrollAmount = 120;
        
        thumbPrevBtn.addEventListener('click', function() {
            thumbnailTrack.scrollLeft -= scrollAmount;
        });
        
        thumbNextBtn.addEventListener('click', function() {
            thumbnailTrack.scrollLeft += scrollAmount;
        });
    }
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') {
            let newIndex = currentImageIndex - 1;
            if (newIndex < 0) newIndex = images.length - 1;
            setActiveImage(newIndex);
        } else if (e.key === 'ArrowRight') {
            let newIndex = currentImageIndex + 1;
            if (newIndex >= images.length) newIndex = 0;
            setActiveImage(newIndex);
        }
    });
    
    // Touch/swipe support for mobile
    let touchStartX = 0;
    let touchEndX = 0;
    
    if (mainImage) {
        mainImage.addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        });
        
        mainImage.addEventListener('touchend', function(e) {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });
    }
    
    function handleSwipe() {
        const minSwipeDistance = 50;
        const distance = touchStartX - touchEndX;
        
        if (Math.abs(distance) < minSwipeDistance) return;
        
        if (distance > 0) {
            // Swipe left - next image
            let newIndex = currentImageIndex + 1;
            if (newIndex >= images.length) newIndex = 0;
            setActiveImage(newIndex);
        } else {
            // Swipe right - previous image
            let newIndex = currentImageIndex - 1;
            if (newIndex < 0) newIndex = images.length - 1;
            setActiveImage(newIndex);
        }
    }
    
    // Update thumbnail controls visibility based on content
    function updateThumbnailControls() {
        if (thumbnailTrack && thumbPrevBtn && thumbNextBtn) {
            const hasOverflow = thumbnailTrack.scrollWidth > thumbnailTrack.clientWidth;
            
            if (hasOverflow) {
                thumbPrevBtn.style.display = 'flex';
                thumbNextBtn.style.display = 'flex';
            } else {
                thumbPrevBtn.style.display = 'none';
                thumbNextBtn.style.display = 'none';
            }
        }
    }
    
    // Check on load and resize
    window.addEventListener('load', updateThumbnailControls);
    window.addEventListener('resize', updateThumbnailControls);
    
    // Initial check
    setTimeout(updateThumbnailControls, 100);
});
</script>
            
            <!-- Product Details -->
            <div class="product-details">
                <!-- Specifications -->
                <div class="specifications-section">
                    <h3 class="section-title">
                        <i class="fas fa-cogs me-2"></i>
                        <span>Specifications</span>
                    </h3>
                    
                    <div class="specifications-grid">
                        @if($product->power)
                        <div class="spec-item">
                            <div class="spec-icon">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <div class="spec-content">
                                <span class="spec-label">Power</span>
                                <span class="spec-value">{{ $product->power }}</span>
                            </div>
                        </div>
                        @endif
                        
                        @if($product->capacity)
                        <div class="spec-item">
                            <div class="spec-icon">
                                <i class="fas fa-weight"></i>
                            </div>
                            <div class="spec-content">
                                <span class="spec-label">Capacity</span>
                                <span class="spec-value">{{ $product->capacity }}</span>
                            </div>
                        </div>
                        @endif
                        
                        @if($product->fuel_type)
                        <div class="spec-item">
                            <div class="spec-icon">
                                <i class="fas fa-gas-pump"></i>
                            </div>
                            <div class="spec-content">
                                <span class="spec-label">Fuel Type</span>
                                <span class="spec-value">{{ $product->fuel_type }}</span>
                            </div>
                        </div>
                        @endif
                        
                        @if($product->weight)
                        <div class="spec-item">
                            <div class="spec-icon">
                                <i class="fas fa-weight-hanging"></i>
                            </div>
                            <div class="spec-content">
                                <span class="spec-label">Weight</span>
                                <span class="spec-value">{{ $product->weight }}</span>
                            </div>
                        </div>
                        @endif
                        
                        @if($product->dimensions)
                        <div class="spec-item">
                            <div class="spec-icon">
                                <i class="fas fa-ruler-combined"></i>
                            </div>
                            <div class="spec-content">
                                <span class="spec-label">Dimensions</span>
                                <span class="spec-value">{{ $product->dimensions }}</span>
                            </div>
                        </div>
                        @endif
                        
                        <div class="spec-item">
                            <div class="spec-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="spec-content">
                                <span class="spec-label">Added</span>
                                <span class="spec-value">{{ \Carbon\Carbon::parse($product->created_at)->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Description -->
                <div class="description-section">
                    <h3 class="section-title">
                        <i class="fas fa-file-alt me-2"></i>
                        <span>Product Description</span>
                    </h3>
                    
                    <div class="description-content">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
                
                <!-- Contact Information -->
                <div class="contact-section">
                    <h3 class="section-title">
                        <i class="fas fa-phone-alt me-2"></i>
                        <span>Contact Information</span>
                    </h3>
                    
                    <div class="contact-info">
                        @if($product->contact)
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-content">
                                <span class="contact-label">Phone Number</span>
                                <a href="tel:{{ $product->contact }}" class="contact-value">{{ $product->contact }}</a>
                            </div>
                        </div>
                        @endif
                        
                        @if($product->email)
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-content">
                                <span class="contact-label">Email Address</span>
                                <a href="mailto:{{ $product->email }}" class="contact-value">{{ $product->email }}</a>
                            </div>
                        </div>
                        @endif
                        
                        @if($product->location)
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-content">
                                <span class="contact-label">Location</span>
                                <span class="contact-value">{{ $product->location }}</span>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="quick-actions">
                    <button class="btn btn-primary btn-lg" onclick="openQuoteModal()">
                        <i class="fas fa-envelope me-2"></i>
                        <span>Request Custom Quote</span>
                    </button>
                    
                    <a href="tel:{{ $product->contact ?? $company->main_contact ?? '' }}" class="btn btn-secondary btn-lg">
                        <i class="fas fa-phone-alt me-2"></i>
                        <span>Call Now</span>
                    </a>
                    
                    <button class="btn btn-outline" onclick="shareProduct()">
                        <i class="fas fa-share-alt me-2"></i>
                        <span>Share</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
@if(isset($relatedProducts) && $relatedProducts->count() > 0)
<section class="related-products-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <i class="fas fa-tractor me-3"></i>
                <span>Related Machinery</span>
            </h2>
            <p class="section-description">
                Explore similar agricultural equipment from our collection
            </p>
        </div>
        
        <div class="related-products-grid">
            @foreach($relatedProducts->take(3) as $related)
            <div class="related-product-card">
                <a href="{{ route('products.show', $related->id) }}" class="related-image">
                    @if($related->image1)
                    <img src="{{ asset('storage/' . $related->image1) }}" 
                         alt="{{ $related->product_name }}" 
                         loading="lazy">
                    @endif
                    <div class="related-overlay">
                        <span>View Details</span>
                    </div>
                </a>
                <div class="related-content">
                    <h4>{{ $related->product_name }}</h4>
                    <p class="related-category">{{ $related->category }}</p>
                    <div class="related-specs">
                        @if($related->power)
                        <span><i class="fas fa-bolt"></i> {{ $related->power }}</span>
                        @endif
                        @if($related->capacity)
                        <span><i class="fas fa-weight"></i> {{ $related->capacity }}</span>
                        @endif
                    </div>
                    <a href="{{ route('products.show', $related->id) }}" class="btn btn-sm">
                        <i class="fas fa-eye me-2"></i>
                        <span>View Product</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Quote Modal -->
<div class="quote-modal" id="quoteModal">
    <div class="modal-container">
        <button class="modal-close" onclick="closeQuoteModal()" aria-label="Close modal">
            <i class="fas fa-times"></i>
        </button>
        
        <div class="modal-content">
            <h2>Request Quote for {{ $product->product_name }}</h2>
            <form id="productQuoteForm">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="product_name" value="{{ $product->product_name }}">
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="quoteName">Full Name *</label>
                        <input type="text" id="quoteName" name="name" required placeholder="Enter your full name">
                    </div>
                    
                    <div class="form-group">
                        <label for="quoteEmail">Email Address *</label>
                        <input type="email" id="quoteEmail" name="email" required placeholder="Enter your email">
                    </div>
                    
                    <div class="form-group">
                        <label for="quotePhone">Phone Number *</label>
                        <input type="tel" id="quotePhone" name="phone" required placeholder="Enter your phone number">
                    </div>
                    
                    <div class="form-group">
                        <label for="quoteCompany">Company / Farm Name</label>
                        <input type="text" id="quoteCompany" name="company" placeholder="Enter your company name">
                    </div>
                    
                    <div class="form-group full-width">
                        <label for="quoteMessage">Specific Requirements</label>
                        <textarea id="quoteMessage" name="message" rows="4" 
                                  placeholder="Tell us about your specific needs, quantity required, or any customization needed..."></textarea>
                    </div>
                    
                    <div class="form-group full-width">
                        <div class="form-check">
                            <input type="checkbox" id="quoteNewsletter" name="newsletter">
                            <label for="quoteNewsletter">
                                Send me updates about new machinery and offers
                            </label>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-paper-plane me-2"></i>
                    <span>Send Quote Request</span>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Fullscreen Image Viewer -->
<div class="fullscreen-viewer" id="fullscreenViewer">
    <button class="viewer-close" onclick="closeFullscreen()" aria-label="Close fullscreen">
        <i class="fas fa-times"></i>
    </button>
    
    <div class="viewer-content">
        <img id="fullscreenImage" src="" alt="Fullscreen view">
        
        <div class="viewer-controls">
            <button class="control-btn" onclick="prevImage()" aria-label="Previous image">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="control-btn" onclick="nextImage()" aria-label="Next image">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        
        <div class="viewer-info">
            <span id="viewerCaption">{{ $product->product_name }}</span>
            <span id="viewerCounter">1/4</span>
        </div>
    </div>
</div>

<style>
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
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
    --radius-xl: 20px;
    --transition: all 0.3s ease;
}

/* ===== Product Hero ===== */
.product-hero {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    padding: 40px 0 20px;
    border-bottom: 1px solid var(--light-gray);
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
    color: var(--gray);
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
    font-weight: 600;
}

.product-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 30px;
}

.product-title-section {
    flex: 1;
}

.product-badges {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-bottom: 15px;
}

.badge {
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.badge-featured {
    background: var(--primary);
    color: white;
}

.badge-new {
    background: var(--accent);
    color: white;
}

.badge-category {
    background: var(--light);
    color: var(--secondary);
    border: 1px solid var(--light-gray);
}

.product-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--secondary);
    line-height: 1.2;
    margin-bottom: 20px;
}

.product-actions-desktop {
    display: flex;
    gap: 15px;
    align-items: center;
}

.product-actions-mobile {
    display: none;
    gap: 15px;
    margin-top: 20px;
}

.btn {
    padding: 12px 24px;
    border-radius: var(--radius-md);
    font-weight: 600;
    font-size: 1rem;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: var(--transition);
    display: inline-flex;
    align-items: center;
    justify-content: center;
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

.btn-outline {
    background: transparent;
    color: var(--gray);
    border: 2px solid var(--light-gray);
}

.btn-outline:hover {
    border-color: var(--primary);
    color: var(--primary);
}

.btn-action {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: white;
    border: 2px solid var(--light-gray);
    color: var(--gray);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: var(--transition);
}

.btn-action:hover {
    background: var(--primary);
    color: white;
    border-color: var(--primary);
}

.btn-lg {
    padding: 16px 32px;
    font-size: 1.1rem;
}

.btn-sm {
    padding: 8px 16px;
    font-size: 0.9rem;
}

/* ===== Product Content ===== */
.product-content-section {
    padding: 60px 0;
    background: white;
}

.product-layout {
    display: grid;
    grid-template-columns: 1.2fr 0.8fr;
    gap: 60px;
}

/* ===== Product Gallery ===== */
.product-gallery {
    position: sticky;
    top: 100px;
    align-self: start;
}

.main-image-container {
    margin-bottom: 20px;
}

.main-image-wrapper {
    position: relative;
    border-radius: var(--radius-xl);
    overflow: hidden;
    background: var(--light);
    aspect-ratio: 4/3;
}

.main-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 20px;
    transition: transform 0.3s ease;
    cursor: zoom-in;
}

.image-zoom {
    position: absolute;
    top: 0;
    left: 100%;
    width: 400px;
    height: 400px;
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-2xl);
    overflow: hidden;
    display: none;
    z-index: 100;
    border: 1px solid var(--light-gray);
}

.zoom-container {
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.zoom-container img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transform-origin: 0 0;
}

.image-controls {
    position: absolute;
    bottom: 20px;
    right: 20px;
    display: flex;
    gap: 10px;
}

.control-btn {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(0, 0, 0, 0.1);
    color: var(--dark);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: var(--transition);
}

.control-btn:hover {
    background: var(--primary);
    color: white;
    transform: scale(1.1);
}

.thumbnail-gallery {
    position: relative;
    margin-bottom: 20px;
}

.thumbnail-track {
    display: flex;
    gap: 15px;
    overflow-x: auto;
    scrollbar-width: none;
    padding: 10px 0;
    scroll-behavior: smooth;
}

.thumbnail-track::-webkit-scrollbar {
    display: none;
}

.thumbnail-wrapper {
    flex: 0 0 100px;
    height: 100px;
    border-radius: var(--radius-md);
    overflow: hidden;
    border: 3px solid transparent;
    cursor: pointer;
    transition: var(--transition);
    opacity: 0.7;
}

.thumbnail-wrapper.active {
    border-color: var(--primary);
    opacity: 1;
    transform: scale(1.05);
}

.thumbnail-wrapper:hover:not(.active) {
    opacity: 0.9;
    transform: translateY(-2px);
}

.thumbnail-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.thumbnail-controls {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
    pointer-events: none;
    padding: 0 10px;
}

.thumb-prev, .thumb-next {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: white;
    border: 1px solid var(--light-gray);
    color: var(--dark);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    pointer-events: auto;
    transition: var(--transition);
    box-shadow: var(--shadow-md);
}

.thumb-prev:hover, .thumb-next:hover {
    background: var(--primary);
    color: white;
    border-color: var(--primary);
}

.image-counter {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--light);
    padding: 8px 16px;
    border-radius: 20px;
    color: var(--gray);
    font-weight: 600;
}

.image-counter i {
    color: var(--primary);
}

/* ===== Product Details ===== */
.product-details {
    display: flex;
    flex-direction: column;
    gap: 40px;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 20px;
    display: flex;
    align-items: center;
}

.specifications-section {
    background: var(--light);
    padding: 30px;
    border-radius: var(--radius-xl);
    border-left: 4px solid var(--primary);
}

.specifications-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.spec-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: white;
    border-radius: var(--radius-lg);
    transition: var(--transition);
}

.spec-item:hover {
    transform: translateX(5px);
    box-shadow: var(--shadow-md);
}

.spec-icon {
    width: 45px;
    height: 45px;
    background: var(--gradient-light);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
    flex-shrink: 0;
}

.spec-content {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.spec-label {
    font-size: 0.85rem;
    color: var(--gray);
    font-weight: 500;
}

.spec-value {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--secondary);
}

.description-section {
    padding: 30px;
    background: var(--light);
    border-radius: var(--radius-xl);
}

.description-content {
    line-height: 1.8;
    color: var(--dark);
    font-size: 1.05rem;
}

.contact-section {
    padding: 30px;
    background: var(--light);
    border-radius: var(--radius-xl);
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: white;
    border-radius: var(--radius-lg);
    transition: var(--transition);
}

.contact-item:hover {
    transform: translateX(5px);
    box-shadow: var(--shadow-md);
}

.contact-icon {
    width: 45px;
    height: 45px;
    background: var(--primary);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
    flex-shrink: 0;
}

.contact-content {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.contact-label {
    font-size: 0.85rem;
    color: var(--gray);
    font-weight: 500;
}

.contact-value {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--secondary);
    text-decoration: none;
    transition: var(--transition);
}

.contact-value:hover {
    color: var(--primary);
}

.quick-actions {
    display: flex;
    flex-direction: column;
    gap: 15px;
    padding: 30px;
    background: var(--light);
    border-radius: var(--radius-xl);
    text-align: center;
}

.quick-actions .btn {
    width: 100%;
}

/* ===== Related Products ===== */
.related-products-section {
    padding: 80px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    border-top: 1px solid var(--light-gray);
}

.section-header {
    text-align: center;
    margin-bottom: 50px;
}

.section-header .section-title {
    font-size: 2rem;
    justify-content: center;
    margin-bottom: 15px;
}

.section-description {
    color: var(--gray);
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto;
}

.related-products-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.related-product-card {
    background: white;
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    transition: var(--transition);
}

.related-product-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
}

.related-image {
    display: block;
    height: 200px;
    position: relative;
    overflow: hidden;
}

.related-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.related-product-card:hover .related-image img {
    transform: scale(1.1);
}

.related-overlay {
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
    color: white;
    font-weight: 600;
    font-size: 1.1rem;
}

.related-product-card:hover .related-overlay {
    opacity: 1;
}

.related-content {
    padding: 25px;
}

.related-content h4 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 8px;
}

.related-category {
    color: var(--primary);
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 15px;
}

.related-specs {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.related-specs span {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--light);
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    color: var(--gray);
}

.related-specs i {
    color: var(--primary);
}

/* ===== Modals ===== */
.quote-modal, .fullscreen-viewer {
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
    max-width: 800px;
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

.quote-modal .modal-container {
    max-width: 600px;
}

.modal-content {
    padding: 40px;
}

.modal-close, .viewer-close {
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

.modal-close:hover, .viewer-close:hover {
    background: var(--primary-dark);
    transform: rotate(90deg);
}

.modal-content h2 {
    text-align: center;
    margin-bottom: 30px;
    color: var(--secondary);
    font-size: 1.8rem;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 0;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: var(--secondary);
}

.form-group input,
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid var(--light-gray);
    border-radius: var(--radius-md);
    font-size: 1rem;
    transition: var(--transition);
}

.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {
    border-color: var(--primary);
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 94, 20, 0.1);
}

.form-check {
    display: flex;
    align-items: center;
    gap: 10px;
}

.form-check input {
    width: auto;
}

.form-check label {
    margin-bottom: 0;
    font-weight: normal;
}

/* Fullscreen Viewer */
.fullscreen-viewer .viewer-content {
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

#fullscreenImage {
    max-width: 90%;
    max-height: 90%;
    object-fit: contain;
}

.viewer-controls {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
    padding: 0 40px;
    pointer-events: none;
}

.viewer-controls .control-btn {
    pointer-events: auto;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white;
    width: 60px;
    height: 60px;
    font-size: 24px;
}

.viewer-controls .control-btn:hover {
    background: var(--primary);
}

.viewer-info {
    position: absolute;
    bottom: 40px;
    left: 0;
    right: 0;
    text-align: center;
    color: white;
    display: flex;
    justify-content: space-between;
    padding: 0 40px;
    font-size: 1.1rem;
    opacity: 0.9;
}

/* ===== Responsive Design ===== */
@media (max-width: 1200px) {
    .product-layout {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .product-gallery {
        position: static;
    }
    
    .specifications-grid {
        grid-template-columns: repeat(3, 1fr);
    }
    
    .related-products-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 992px) {
    .product-title {
        font-size: 2rem;
    }
    
    .product-actions-desktop {
        display: none;
    }
    
    .product-actions-mobile {
        display: flex;
    }
    
    .specifications-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .form-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .product-title {
        font-size: 1.8rem;
    }
    
    .section-title {
        font-size: 1.3rem;
    }
    
    .specifications-grid {
        grid-template-columns: 1fr;
    }
    
    .related-products-grid {
        grid-template-columns: 1fr;
    }
    
    .image-zoom {
        display: none !important;
    }
    
    .modal-content {
        padding: 30px 20px;
    }
    
    .viewer-controls {
        padding: 0 20px;
    }
    
    .viewer-info {
        padding: 0 20px;
        flex-direction: column;
        gap: 10px;
        align-items: center;
    }
}

@media (max-width: 576px) {
    .product-hero,
    .product-content-section,
    .related-products-section {
        padding: 40px 0;
    }
    
    .product-title {
        font-size: 1.5rem;
    }
    
    .badge {
        padding: 6px 12px;
        font-size: 0.8rem;
    }
    
    .btn {
        padding: 10px 20px;
        font-size: 0.9rem;
    }
    
    .main-image-wrapper {
        aspect-ratio: 1/1;
    }
    
    .thumbnail-wrapper {
        flex: 0 0 80px;
        height: 80px;
    }
}

/* Add these styles to your existing CSS */
.product-gallery {
    position: relative;
}

.main-image-wrapper {
    position: relative;
    cursor: zoom-in;
}

.image-zoom {
    position: fixed;
    z-index: 1000;
    display: none;
    width: 400px;
    height: 400px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    overflow: hidden;
    border: 1px solid #e5e7eb;
}

.zoom-container {
    width: 100%;
    height: 100%;
}

.zoom-container img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transform-origin: 0 0;
    transition: transform 0.1s ease;
}

.image-controls {
    position: absolute;
    bottom: 15px;
    right: 15px;
    display: flex;
    gap: 10px;
    z-index: 10;
}

.control-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(0, 0, 0, 0.1);
    color: #1a202c;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.control-btn:hover {
    background: #FF5E14;
    color: white;
    transform: scale(1.1);
}

.thumbnail-gallery {
    position: relative;
    margin-top: 20px;
}

.thumbnail-track {
    display: flex;
    gap: 10px;
    overflow-x: auto;
    scroll-behavior: smooth;
    padding: 10px 5px;
    scrollbar-width: thin;
    scrollbar-color: #FF5E14 #f1f5f9;
}

.thumbnail-track::-webkit-scrollbar {
    height: 6px;
}

.thumbnail-track::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 3px;
}

.thumbnail-track::-webkit-scrollbar-thumb {
    background: #FF5E14;
    border-radius: 3px;
}

.thumbnail-wrapper {
    flex: 0 0 80px;
    height: 80px;
    border-radius: 8px;
    overflow: hidden;
    border: 2px solid transparent;
    cursor: pointer;
    transition: all 0.3s ease;
    opacity: 0.7;
}

.thumbnail-wrapper.active {
    border-color: #FF5E14;
    opacity: 1;
    transform: scale(1.05);
}

.thumbnail-wrapper:hover:not(.active) {
    opacity: 0.9;
    transform: translateY(-2px);
}

.thumbnail-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.thumbnail-controls {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
    padding: 0 5px;
    pointer-events: none;
}

.thumb-prev, .thumb-next {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: white;
    border: 1px solid #e5e7eb;
    color: #1a202c;
    display: none;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    pointer-events: auto;
    transition: all 0.3s ease;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    z-index: 10;
}

.thumb-prev:hover, .thumb-next:hover {
    background: #FF5E14;
    color: white;
    border-color: #FF5E14;
}

.image-counter {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #f8f9fa;
    padding: 6px 12px;
    border-radius: 20px;
    color: #6b7280;
    font-weight: 600;
    margin-top: 10px;
}

.image-counter i {
    color: #FF5E14;
}

/* Fullscreen viewer styles */
.fullscreen-viewer {
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .image-zoom {
        display: none !important;
    }
    
    .thumbnail-wrapper {
        flex: 0 0 70px;
        height: 70px;
    }
    
    .control-btn {
        width: 36px;
        height: 36px;
    }
}

@media (max-width: 576px) {
    .thumbnail-wrapper {
        flex: 0 0 60px;
        height: 60px;
    }
    
    .image-controls {
        bottom: 10px;
        right: 10px;
    }
}

/* ===== Helper function ===== */
<?php
function getCategoryIcon($category) {
    $category = strtolower($category);
    if (strpos($category, 'tractor') !== false) return 'tractor';
    if (strpos($category, 'harvester') !== false) return 'truck-loading';
    if (strpos($category, 'planter') !== false) return 'seedling';
    if (strpos($category, 'sprayer') !== false) return 'spray-can';
    if (strpos($category, 'tiller') !== false) return 'screwdriver';
    if (strpos($category, 'irrigation') !== false) return 'tint';
    if (strpos($category, 'loader') !== false) return 'dolly';
    return 'cog';
}
?>
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image gallery functionality
    const mainImage = document.getElementById('mainProductImage');
    const thumbnails = document.querySelectorAll('.thumbnail-wrapper');
    const currentImageSpan = document.getElementById('currentImage');
    const zoomImage = document.getElementById('zoomImage');
    const imageZoom = document.getElementById('imageZoom');
    const fullscreenImage = document.getElementById('fullscreenImage');
    const viewerCounter = document.getElementById('viewerCounter');
    
    let currentImageIndex = 0;
    const images = [];
    
    // Collect all image URLs
    thumbnails.forEach((thumb, index) => {
        const imgUrl = thumb.dataset.image;
        images.push(imgUrl);
        thumb.addEventListener('click', () => {
            setActiveImage(index);
        });
    });
    
    function setActiveImage(index) {
        currentImageIndex = index;
        mainImage.src = images[index];
        fullscreenImage.src = images[index];
        
        // Update thumbnails
        thumbnails.forEach((thumb, i) => {
            thumb.classList.toggle('active', i === index);
        });
        
        // Update counters
        currentImageSpan.textContent = index + 1;
        viewerCounter.textContent = `${index + 1}/${images.length}`;
    }
    
    // Image zoom functionality
    let zoomLevel = 1;
    let isZooming = false;
    
    mainImage.addEventListener('mousemove', function(e) {
        if (!isZooming) return;
        
        const rect = this.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        
        const xPercent = (x / this.width) * 100;
        const yPercent = (y / this.height) * 100;
        
        zoomImage.style.transform = `scale(${zoomLevel})`;
        zoomImage.style.transformOrigin = `${xPercent}% ${yPercent}%`;
    });
    
    mainImage.addEventListener('mouseenter', function() {
        if (window.innerWidth > 768) {
            zoomImage.src = this.src;
            imageZoom.style.display = 'block';
            isZooming = true;
        }
    });
    
    mainImage.addEventListener('mouseleave', function() {
        imageZoom.style.display = 'none';
        isZooming = false;
        zoomLevel = 1;
    });
    
    function zoomImage() {
        if (zoomLevel < 3) {
            zoomLevel += 0.5;
        } else {
            zoomLevel = 1;
        }
        zoomImage.style.transform = `scale(${zoomLevel})`;
    }
    
    // Fullscreen viewer
    function openFullscreen() {
        const viewer = document.getElementById('fullscreenViewer');
        viewer.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
    
    function closeFullscreen() {
        const viewer = document.getElementById('fullscreenViewer');
        viewer.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
    
    function prevImage() {
        let newIndex = currentImageIndex - 1;
        if (newIndex < 0) newIndex = images.length - 1;
        setActiveImage(newIndex);
    }
    
    function nextImage() {
        let newIndex = currentImageIndex + 1;
        if (newIndex >= images.length) newIndex = 0;
        setActiveImage(newIndex);
    }
    
    // Keyboard navigation for fullscreen viewer
    document.addEventListener('keydown', function(e) {
        const viewer = document.getElementById('fullscreenViewer');
        if (viewer.style.display === 'block') {
            if (e.key === 'Escape') {
                closeFullscreen();
            } else if (e.key === 'ArrowLeft') {
                prevImage();
            } else if (e.key === 'ArrowRight') {
                nextImage();
            }
        }
    });
    
    // Thumbnail slider
    const thumbnailTrack = document.getElementById('thumbnailTrack');
    const thumbPrev = document.querySelector('.thumb-prev');
    const thumbNext = document.querySelector('.thumb-next');
    
    if (thumbPrev && thumbNext) {
        thumbPrev.addEventListener('click', () => {
            thumbnailTrack.scrollLeft -= 115;
        });
        
        thumbNext.addEventListener('click', () => {
            thumbnailTrack.scrollLeft += 115;
        });
    }
    
    // Quote modal
    function openQuoteModal() {
        const modal = document.getElementById('quoteModal');
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
    
    function closeQuoteModal() {
        const modal = document.getElementById('quoteModal');
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
    
    // Share product
    function shareProduct() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $product->product_name }}',
                text: 'Check out this agricultural machinery: {{ $product->product_name }}',
                url: window.location.href
            });
        } else {
            // Fallback: Copy to clipboard
            navigator.clipboard.writeText(window.location.href).then(() => {
                alert('Link copied to clipboard!');
            });
        }
    }
    
    // Favorite toggle
    function toggleFavorite() {
        const btn = document.querySelector('.btn-action .fa-heart');
        btn.classList.toggle('far');
        btn.classList.toggle('fas');
        
        // Show notification
        const isFavorite = btn.classList.contains('fas');
        showNotification(isFavorite ? 'Added to favorites!' : 'Removed from favorites!', 'success');
    }
    
    // Print page
    function printPage() {
        window.print();
    }
    
    // Form submission
    document.getElementById('productQuoteForm')?.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(this);
        const data = Object.fromEntries(formData);
        
        // Here you would typically send this data to your server
        console.log('Quote request:', data);
        
        // Show success message
        showNotification('Quote request sent successfully!', 'success');
        
        // Close modal and reset form
        closeQuoteModal();
        this.reset();
    });
    
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
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }
    
    // Close modals when clicking outside
    document.getElementById('quoteModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeQuoteModal();
        }
    });
    
    document.getElementById('fullscreenViewer')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeFullscreen();
        }
    });
});
</script>

@include('Templates.footer')