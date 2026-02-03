@include('Templates.header')

<!-- Machinery Hero Section -->
<section class="machinery-hero">
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
                        <i class="fas fa-tractor"></i> Machinery
                    </li>
                </ol>
            </nav>
            
            <h1 class="hero-title">
                <span class="hero-highlight">Agricultural</span>
                <br>Machinery Collection
            </h1>
            
            <p class="hero-description">
                Discover our range of high-performance agricultural machinery designed for modern farming efficiency
            </p>
            
            <!-- Hero Stats -->
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">{{ $products->count() }}+</span>
                    <span class="stat-label">Machines Available</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">{{ $categories->count() }}+</span>
                    <span class="stat-label">Categories</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Quality Assured</span>
                </div>
            </div>
        </div>
        
        <!-- Hero Background Elements -->
        <div class="hero-elements">
            <div class="element element-1">
                <i class="fas fa-cog"></i>
            </div>
            <div class="element element-2">
                <i class="fas fa-seedling"></i>
            </div>
            <div class="element element-3">
                <i class="fas fa-industry"></i>
            </div>
        </div>
    </div>
</section>

<!-- Machinery Overview -->
<section class="machinery-overview">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">
                <i class="fas fa-warehouse"></i>
                <span>Our Collection</span>
            </span>
            <h2 class="section-title">Premium Agricultural Equipment</h2>
            <p class="section-description">
                Explore our comprehensive range of machinery designed to enhance agricultural productivity
            </p>
        </div>
    </div>
</section>

<!-- Machinery Filter Section -->
<section class="machinery-filter-section">
    <div class="container">
        <!-- Filter Tabs -->
        <div class="filter-tabs" id="filterTabs">
            <button class="filter-tab active" data-filter="all">
                <i class="fas fa-border-all"></i>
                <span>All Machinery</span>
            </button>
            
            @foreach($categories as $category)
            <button class="filter-tab" data-filter="{{ ($category) }}">
                <span>{{ $category }}</span>
            </button>
            @endforeach
        </div>
        
        <!-- Search and Sort -->
        <div class="filter-controls">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Search machinery..." aria-label="Search machinery">
                <button class="search-clear" id="clearSearch" aria-label="Clear search">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="sort-controls">
                <select id="sortSelect" aria-label="Sort machinery">
                    <option value="default">Sort by: Default</option>
                    <option value="name-asc">Name: A to Z</option>
                    <option value="name-desc">Name: Z to A</option>
                    <option value="newest">Newest First</option>
                    <option value="featured">Featured First</option>
                </select>
                <div class="view-toggle">
                    <button class="view-btn active" data-view="grid" aria-label="Grid view">
                        <i class="fas fa-th-large"></i>
                    </button>
                    <button class="view-btn" data-view="list" aria-label="List view">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Active Filters Display -->
        <div class="active-filters" id="activeFilters">
            <!-- Active filters will be displayed here -->
        </div>
    </div>
</section>

<!-- Machinery Grid -->
<section class="machinery-grid-section">
    <div class="container">
        <!-- Loading State -->
        <div class="loading-state" id="loadingState">
            <div class="spinner"></div>
            <p>Loading machinery...</p>
        </div>
        
        <!-- No Results State -->
        <div class="no-results" id="noResults" style="display: none;">
            <i class="fas fa-search"></i>
            <h3>No Machinery Found</h3>
            <p>Try adjusting your search or filter criteria</p>
            <button class="btn btn-primary" onclick="resetFilters()">
                <i class="fas fa-redo"></i>
                <span>Reset Filters</span>
            </button>
        </div>
        
        <!-- Machinery Grid -->
        <div class="machinery-container">
            <div class="machinery-grid" id="machineryGrid" data-view="grid">
                @foreach($products as $product)
                <div class="machinery-card" 
                     data-category="{{ $product->category }}"
                     data-name="{{ strtolower($product->product_name) }}"
                     data-id="{{ $product->id }}"
                     data-featured="{{ $product->isFeatured ? 'true' : 'false' }}"
                     data-created="{{ $product->created_at }}">
                    <div class="card-badges">
                        @if($product->isFeatured)
                        <span class="badge badge-featured">
                            <i class="fas fa-star"></i>
                            <span>Featured</span>
                        </span>
                        @endif
                        
                        @if($product->isNew)
                        <span class="badge badge-new">
                            <i class="fas fa-bolt"></i>
                            <span>New</span>
                        </span>
                        @endif
                    </div>
                    
                    <div class="machinery-image">
                        @if($product->image1)
                        <img src="{{ asset('storage/' . $product->image1) }}" 
                             alt="{{ $product->product_name }}" 
                             loading="lazy"
                             class="lazy-load">
                        <div class="image-overlay">
                            <button class="quick-view" onclick="openQuickView('{{ $product->id }}')" aria-label="Quick view">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="add-to-cart" onclick="addToCart('{{ $product->id }}')" aria-label="Add to cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="machinery-content">
                        <div class="machinery-category">
                            <span>{{ $product->category }}</span>
                        </div>
                        
                        <h3 class="machinery-title">{{ $product->product_name }}</h3>
                        
                        <div class="machinery-specs">
                            @if($product->power)
                            <div class="spec-item">
                                <i class="fas fa-bolt"></i>
                                <span>{{ $product->power }}</span>
                            </div>
                            @endif
                            
                            @if($product->capacity)
                            <div class="spec-item">
                                <i class="fas fa-weight"></i>
                                <span>{{ $product->capacity }}</span>
                            </div>
                            @endif
                            
                            @if($product->fuel_type)
                            <div class="spec-item">
                                <i class="fas fa-gas-pump"></i>
                                <span>{{ $product->fuel_type }}</span>
                            </div>
                            @endif
                        </div>
                        
                        <div class="machinery-actions">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">
                                <i class="fas fa-info-circle"></i>
                                <span>View Details</span>
                            </a>
                            <button class="btn btn-secondary" onclick="openQuoteModal('{{ $product->id }}')">
                                <i class="fas fa-envelope"></i>
                                <span>Get Quote</span>
                            </button>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- Pagination -->
        @if($products->count() > 12)
        <div class="pagination" id="pagination">
            <button class="page-btn prev" disabled aria-label="Previous page">
                <i class="fas fa-chevron-left"></i>
            </button>
            
            <div class="page-numbers">
                <!-- Page numbers will be generated dynamically -->
            </div>
            
            <button class="page-btn next" aria-label="Next page">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        @endif
        
        <!-- Results Count -->
        <div class="results-count" id="resultsCount">
            Showing <span id="visibleCount">{{ $products->count() }}</span> of {{ $products->count() }} machinery
        </div>
    </div>
</section>

<!-- Category Highlights -->
@if($categories->count() > 0)
<section class="category-highlights">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">
                <i class="fas fa-tags"></i>
                <span>Browse Categories</span>
            </span>
            <h2 class="section-title">Explore by Machinery Type</h2>
        </div>
        
        <div class="categories-grid">
            @foreach($categories as $category)
            <div class="category-card" onclick="filterByCategory('{{ $category }}')">
                <div class="category-icon">
                </div>
                <h4>{{ $category }}</h4>
                <p class="category-count">
                    {{ $products->where('category', $category)->count() }} Machines
                </p>
                <button class="category-btn">
                    <span>Browse</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Featured Machinery -->
@if($products->where('isFeatured', true)->count() > 0)
<section class="featured-machinery">
    <div class="container">
        <div class="section-header">
            <span class="section-subtitle">
                <i class="fas fa-star"></i>
                <span>Featured</span>
            </span>
            <h2 class="section-title">Top Recommended Machinery</h2>
            <p class="section-description">
                Our most popular and highly rated agricultural equipment
            </p>
        </div>
        
        <div class="featured-slider">
            <div class="slider-track" id="featuredSlider">
                @foreach($products->where('isFeatured', true) as $product)
                <div class="featured-slide">
                    <div class="featured-card">
                        <div class="featured-image">
                            @if($product->image1)
                            <img src="{{ asset('storage/' . $product->image1) }}" 
                                 alt="{{ $product->product_name }}" 
                                 loading="lazy">
                            @endif
                            <div class="featured-badge">
                                <i class="fas fa-crown"></i>
                                <span>Featured</span>
                            </div>
                        </div>
                        <div class="featured-content">
                            <h4>{{ $product->product_name }}</h4>
                            <p class="featured-category">{{ $product->category }}</p>
                            <div class="featured-specs">
                                @if($product->power)
                                <span><i class="fas fa-bolt"></i> {{ $product->power }}</span>
                                @endif
                                @if($product->capacity)
                                <span><i class="fas fa-weight"></i> {{ $product->capacity }}</span>
                                @endif
                            </div>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                                <span>View Details</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="slider-controls">
                <button class="slider-prev" aria-label="Previous featured machine">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="slider-next" aria-label="Next featured machine">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Machinery CTA -->
<section class="machinery-cta">
    <div class="container">
        <div class="cta-content">
            <h2>Can't Find What You're Looking For?</h2>
            <p>We offer custom machinery solutions tailored to your specific agricultural needs</p>
            <div class="cta-buttons">
                <a href="{{ route('contact') }}" class="btn btn-primary">
                    <i class="fas fa-envelope me-2"></i>
                    <span>Request Custom Quote</span>
                </a>
                <a href="tel:{{ $company->main_contact ?? '' }}" class="btn btn-secondary">
                    <i class="fas fa-phone-alt me-2"></i>
                    <span>Call for Consultation</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Quick View Modal -->
<div class="quick-view-modal" id="quickViewModal">
    <div class="modal-container">
        <button class="modal-close" onclick="closeQuickView()" aria-label="Close modal">
            <i class="fas fa-times"></i>
        </button>
        
        <div class="modal-content" id="quickViewContent">
            <!-- Dynamic content will be loaded here -->
        </div>
    </div>
</div>

<!-- Quote Modal -->
<div class="quote-modal" id="quoteModal">
    <div class="modal-container">
        <button class="modal-close" onclick="closeQuoteModal()" aria-label="Close modal">
            <i class="fas fa-times"></i>
        </button>
        
        <div class="modal-content">
            <h2>Request Quote</h2>
            <form id="quoteForm">
                <input type="hidden" id="quoteProductId">
                
                <div class="form-group">
                    <label for="quoteName">Full Name *</label>
                    <input type="text" id="quoteName" required placeholder="Enter your full name">
                </div>
                
                <div class="form-group">
                    <label for="quoteEmail">Email Address *</label>
                    <input type="email" id="quoteEmail" required placeholder="Enter your email">
                </div>
                
                <div class="form-group">
                    <label for="quotePhone">Phone Number</label>
                    <input type="tel" id="quotePhone" placeholder="Enter your phone number">
                </div>
                
                <div class="form-group">
                    <label for="quoteMessage">Message</label>
                    <textarea id="quoteMessage" rows="4" placeholder="Tell us about your requirements"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane me-2"></i>
                    <span>Send Quote Request</span>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Helper function for category icons -->
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
    --warning: #F59E0B;
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
    --radius-2xl: 30px;
    --transition: all 0.3s ease;
}

/* ===== Machinery Hero ===== */
.machinery-hero {
    background: linear-gradient(rgba(2, 36, 91, 0.9), rgba(2, 36, 91, 0.85)),
                url('https://images.unsplash.com/photo-1625245487960-d5e5a9a4d2b5?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
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

.hero-stats {
    display: flex;
    gap: 40px;
    margin-top: 50px;
    padding-top: 40px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    flex-wrap: wrap;
}

.stat-item {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--primary);
    line-height: 1;
}

.stat-label {
    font-size: 0.9rem;
    opacity: 0.8;
    margin-top: 8px;
    display: block;
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

/* ===== Machinery Overview ===== */
.machinery-overview {
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

/* ===== Machinery Filter Section ===== */
.machinery-filter-section {
    padding: 40px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    position: sticky;
    top: 80px;
    z-index: 100;
    box-shadow: var(--shadow-sm);
}

.filter-tabs {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    justify-content: center;
    margin-bottom: 30px;
}

.filter-tab {
    padding: 12px 24px;
    background: white;
    border: 2px solid var(--light-gray);
    border-radius: var(--radius-xl);
    color: var(--gray);
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    display: flex;
    align-items: center;
    gap: 8px;
}

.filter-tab:hover {
    border-color: var(--primary);
    color: var(--primary);
    transform: translateY(-2px);
}

.filter-tab.active {
    background: var(--primary);
    border-color: var(--primary);
    color: white;
    box-shadow: var(--shadow-md);
}

.filter-controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.search-box {
    flex: 1;
    min-width: 300px;
    position: relative;
}

.search-box i {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gray);
}

.search-box input {
    width: 100%;
    padding: 12px 20px 12px 45px;
    border: 2px solid var(--light-gray);
    border-radius: var(--radius-lg);
    font-size: 1rem;
    transition: var(--transition);
}

.search-box input:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(255, 94, 20, 0.1);
    outline: none;
}

.search-clear {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: var(--gray);
    cursor: pointer;
    padding: 5px;
    display: none;
}

.sort-controls {
    display: flex;
    align-items: center;
    gap: 15px;
}

.sort-controls select {
    padding: 12px 20px;
    border: 2px solid var(--light-gray);
    border-radius: var(--radius-lg);
    font-size: 1rem;
    background: white;
    color: var(--dark);
    cursor: pointer;
    min-width: 200px;
}

.sort-controls select:focus {
    border-color: var(--primary);
    outline: none;
}

.view-toggle {
    display: flex;
    gap: 5px;
    background: white;
    border: 2px solid var(--light-gray);
    border-radius: var(--radius-lg);
    padding: 4px;
}

.view-btn {
    width: 40px;
    height: 40px;
    border: none;
    background: transparent;
    border-radius: var(--radius-md);
    color: var(--gray);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
}

.view-btn:hover {
    color: var(--primary);
}

.view-btn.active {
    background: var(--primary);
    color: white;
}

.active-filters {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    min-height: 30px;
}

.filter-tag {
    background: var(--primary);
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 8px;
}

.filter-tag button {
    background: none;
    border: none;
    color: white;
    cursor: pointer;
    padding: 0;
    display: flex;
    align-items: center;
}

/* ===== Machinery Grid Section ===== */
.machinery-grid-section {
    padding: 60px 0 100px;
    background: white;
}

.loading-state {
    text-align: center;
    padding: 60px;
}

.spinner {
    width: 50px;
    height: 50px;
    border: 3px solid var(--light-gray);
    border-top-color: var(--primary);
    border-radius: 50%;
    margin: 0 auto 20px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}

.no-results {
    text-align: center;
    padding: 60px;
}

.no-results i {
    font-size: 4rem;
    color: var(--light-gray);
    margin-bottom: 20px;
}

.no-results h3 {
    color: var(--secondary);
    margin-bottom: 10px;
}

.no-results p {
    color: var(--gray);
    margin-bottom: 30px;
}

.machinery-container {
    position: relative;
}

.machinery-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    transition: var(--transition);
}

.machinery-grid[data-view="list"] {
    grid-template-columns: 1fr;
    gap: 20px;
}

.machinery-grid[data-view="list"] .machinery-card {
    display: flex;
    flex-direction: row;
    max-height: 200px;
}

.machinery-grid[data-view="list"] .machinery-image {
    width: 300px;
    height: 200px;
    flex-shrink: 0;
}

.machinery-grid[data-view="list"] .machinery-content {
    padding: 25px;
}

.machinery-card {
    background: white;
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    transition: var(--transition);
    position: relative;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.machinery-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-2xl);
}

.card-badges {
    position: absolute;
    top: 15px;
    left: 15px;
    z-index: 2;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    backdrop-filter: blur(10px);
}

.badge-featured {
    background: rgba(255, 94, 20, 0.9);
    color: white;
}

.badge-new {
    background: rgba(245, 158, 11, 0.9);
    color: white;
}

.machinery-image {
    height: 250px;
    position: relative;
    overflow: hidden;
}

.machinery-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.machinery-card:hover .machinery-image img {
    transform: scale(1.1);
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
    gap: 15px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.machinery-card:hover .image-overlay {
    opacity: 1;
}

.quick-view, .add-to-cart {
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
    transition: var(--transition);
}

.quick-view:hover, .add-to-cart:hover {
    background: var(--primary);
    color: white;
    transform: scale(1.1);
}

.machinery-content {
    padding: 25px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.machinery-category {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--primary);
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 10px;
}

.machinery-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 15px;
    line-height: 1.4;
    flex-grow: 1;
}

.machinery-specs {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.spec-item {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--light);
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    color: var(--gray);
}

.spec-item i {
    color: var(--primary);
    font-size: 0.9rem;
}

.machinery-actions {
    display: flex;
    gap: 10px;
    margin-top: auto;
}

.machinery-actions .btn {
    flex: 1;
    min-width: 120px;
}

/* ===== Pagination ===== */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    margin-top: 60px;
}

.page-btn {
    width: 45px;
    height: 45px;
    border-radius: var(--radius-md);
    border: 2px solid var(--light-gray);
    background: white;
    color: var(--gray);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
}

.page-btn:hover:not(:disabled) {
    border-color: var(--primary);
    color: var(--primary);
}

.page-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.page-numbers {
    display: flex;
    gap: 5px;
}

.page-number {
    min-width: 45px;
    height: 45px;
    border-radius: var(--radius-md);
    border: 2px solid var(--light-gray);
    background: white;
    color: var(--gray);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    transition: var(--transition);
}

.page-number:hover {
    border-color: var(--primary);
    color: var(--primary);
}

.page-number.active {
    background: var(--primary);
    border-color: var(--primary);
    color: white;
}

.results-count {
    text-align: center;
    margin-top: 30px;
    color: var(--gray);
    font-size: 0.95rem;
}

.results-count span {
    font-weight: 700;
    color: var(--primary);
}

/* ===== Category Highlights ===== */
.category-highlights {
    padding: 100px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
}

.category-card {
    background: white;
    border-radius: var(--radius-xl);
    padding: 30px;
    text-align: center;
    box-shadow: var(--shadow-lg);
    transition: var(--transition);
    cursor: pointer;
}

.category-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-2xl);
}

.category-icon {
    width: 80px;
    height: 80px;
    background: var(--gradient-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: white;
    font-size: 32px;
}

.category-card h4 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 10px;
}

.category-count {
    color: var(--gray);
    font-size: 0.9rem;
    margin-bottom: 20px;
}

.category-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--primary);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: var(--radius-lg);
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
}

.category-btn:hover {
    background: var(--primary-dark);
    gap: 12px;
}

/* ===== Featured Machinery ===== */
.featured-machinery {
    padding: 100px 0;
    background: white;
}

.featured-slider {
    position: relative;
    overflow: hidden;
    padding: 20px 0;
}

.slider-track {
    display: flex;
    gap: 30px;
    animation: slide 40s linear infinite;
    padding: 20px 0;
}

@keyframes slide {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(calc(-400px * {{ $products->where('isFeatured', true)->count() }}));
    }
}

.featured-slider:hover .slider-track {
    animation-play-state: paused;
}

.featured-slide {
    flex: 0 0 380px;
}

.featured-card {
    background: white;
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    transition: var(--transition);
    height: 100%;
}

.featured-slider:hover .featured-card {
    transform: none;
}

.featured-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-2xl);
}

.featured-image {
    height: 220px;
    position: relative;
    overflow: hidden;
}

.featured-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.featured-card:hover .featured-image img {
    transform: scale(1.1);
}

.featured-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: var(--primary);
    color: white;
    padding: 8px 15px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 8px;
}

.featured-content {
    padding: 25px;
}

.featured-content h4 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 8px;
}

.featured-category {
    color: var(--primary);
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 15px;
}

.featured-specs {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.featured-specs span {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: var(--light);
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    color: var(--gray);
}

.featured-specs i {
    color: var(--primary);
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
    transition: var(--transition);
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

/* ===== Machinery CTA ===== */
.machinery-cta {
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

/* ===== Modals ===== */
.quick-view-modal, .quote-modal {
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
    max-width: 900px;
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

.quote-modal .modal-container {
    max-width: 500px;
}

.quote-modal .modal-content {
    padding: 40px;
}

.quote-modal h2 {
    text-align: center;
    margin-bottom: 30px;
    color: var(--secondary);
}

.form-group {
    margin-bottom: 20px;
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

/* ===== Responsive Design ===== */
@media (max-width: 1200px) {
    .machinery-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .categories-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .slider-track {
        animation-duration: 30s;
    }
}

@media (max-width: 992px) {
    .hero-title {
        font-size: 2.8rem;
    }
    
    .section-title {
        font-size: 2.2rem;
    }
    
    .filter-controls {
        flex-direction: column;
        align-items: stretch;
    }
    
    .search-box {
        min-width: 100%;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.2rem;
    }
    
    .machinery-grid {
        grid-template-columns: 1fr;
    }
    
    .machinery-grid[data-view="list"] .machinery-card {
        flex-direction: column;
        max-height: none;
    }
    
    .machinery-grid[data-view="list"] .machinery-image {
        width: 100%;
        height: 200px;
    }
    
    .categories-grid {
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
        font-size: 1.8rem;
    }
    
    .section-title {
        font-size: 1.8rem;
    }
    
    .machinery-hero,
    .machinery-overview,
    .machinery-filter-section,
    .machinery-grid-section,
    .category-highlights,
    .featured-machinery,
    .machinery-cta {
        padding: 60px 0;
    }
    
    .filter-tabs {
        gap: 5px;
    }
    
    .filter-tab {
        padding: 10px 15px;
        font-size: 0.9rem;
    }
    
    .machinery-image {
        height: 200px;
    }
    
    .featured-slide {
        flex: 0 0 calc(100% - 40px);
        margin: 0 20px;
    }
}

/* ===== Loading States ===== */
.lazy-load {
    
    transition: opacity 0.3s ease;
}

.lazy-load.loaded {
    opacity: 1;
}

/* ===== Smooth Scrolling ===== */
html {
    scroll-behavior: smooth;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize machinery data
    const machineryData = [
        @foreach($products as $product)
        {
            id: '{{ $product->id }}',
            name: '{{ $product->product_name }}',
            category: '{{ $product->category }}',
            categoryName: '{{ $product->category }}',
            image: '{{ $product->image1 }}',
            power: '{{ $product->power ?? "" }}',
            capacity: '{{ $product->capacity ?? "" }}',
            fuel_type: '{{ $product->fuel_type ?? "" }}',
            isFeatured: {{ $product->isFeatured ? 'true' : 'false' }},
            isNew: {{ $product->isNew ? 'true' : 'false' }},
            createdAt: '{{ $product->created_at }}'
        },
        @endforeach
    ];
    
    // DOM Elements
    const filterTabs = document.querySelectorAll('.filter-tab');
    const searchInput = document.getElementById('searchInput');
    const clearSearch = document.getElementById('clearSearch');
    const sortSelect = document.getElementById('sortSelect');
    const viewButtons = document.querySelectorAll('.view-btn');
    const machineryGrid = document.getElementById('machineryGrid');
    const loadingState = document.getElementById('loadingState');
    const noResults = document.getElementById('noResults');
    const activeFilters = document.getElementById('activeFilters');
    const resultsCount = document.getElementById('resultsCount');
    const visibleCount = document.getElementById('visibleCount');
    const pagination = document.getElementById('pagination');
    
    // Current state
    let currentFilter = 'all';
    let currentSearch = '';
    let currentSort = 'default';
    let currentView = 'grid';
    let currentPage = 1;
    const itemsPerPage = 9;
    
    // Initialize
    initMachineryGrid();
    
    // Filter tabs functionality
    filterTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const filter = tab.dataset.filter;
            setActiveFilter(filter);
            filterMachinery();
        });
    });
    
    // Search functionality
    searchInput.addEventListener('input', (e) => {
        currentSearch = e.target.value.toLowerCase();
        clearSearch.style.display = currentSearch ? 'block' : 'none';
        filterMachinery();
    });
    
    clearSearch.addEventListener('click', () => {
        searchInput.value = '';
        currentSearch = '';
        clearSearch.style.display = 'none';
        filterMachinery();
    });
    
    // Sort functionality
    sortSelect.addEventListener('change', (e) => {
        currentSort = e.target.value;
        filterMachinery();
    });
    
    // View toggle functionality
    viewButtons.forEach(button => {
        button.addEventListener('click', () => {
            const view = button.dataset.view;
            setActiveView(view);
        });
    });
    
    // Filter machinery function
    function filterMachinery() {
        loadingState.style.display = 'block';
        machineryGrid.style.opacity = '0.5';
        
        setTimeout(() => {
            let filteredMachinery = [...machineryData];
            
            // Apply category filter
            if (currentFilter !== 'all') {
                filteredMachinery = filteredMachinery.filter(machine => 
                    machine.category === currentFilter
                );
            }
            
            // Apply search filter
            if (currentSearch) {
                filteredMachinery = filteredMachinery.filter(machine =>
                    machine.name.toLowerCase().includes(currentSearch)
                );
            }
            
            // Apply sorting
            filteredMachinery.sort((a, b) => {
                switch(currentSort) {
                    case 'name-asc':
                        return a.name.localeCompare(b.name);
                    case 'name-desc':
                        return b.name.localeCompare(a.name);
                    case 'newest':
                        return new Date(b.createdAt) - new Date(a.createdAt);
                    case 'featured':
                        if (a.isFeatured && !b.isFeatured) return -1;
                        if (!a.isFeatured && b.isFeatured) return 1;
                        return 0;
                    default:
                        return 0;
                }
            });
            
            // Update UI
            updateActiveFilters();
            updateMachineryGrid(filteredMachinery);
            updateResultsCount(filteredMachinery.length);
            updatePagination(filteredMachinery.length);
            
            loadingState.style.display = 'none';
            machineryGrid.style.opacity = '1';
            
            // Show/hide no results
            if (filteredMachinery.length === 0) {
                noResults.style.display = 'block';
            } else {
                noResults.style.display = 'none';
            }
        }, 300);
    }
    
    // Update machinery grid
    function updateMachineryGrid(machinery) {
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const pageMachinery = machinery.slice(startIndex, endIndex);
        
        machineryGrid.innerHTML = '';
        
        pageMachinery.forEach(machine => {
            const card = createMachineryCard(machine);
            machineryGrid.appendChild(card);
        });
        
        // Update grid view
        machineryGrid.setAttribute('data-view', currentView);
    }
    
    // Create machinery card
    function createMachineryCard(machine) {
        const card = document.createElement('div');
        card.className = 'machinery-card';
        card.dataset.category = machine.category;
        card.dataset.name = machine.name.toLowerCase();
        card.dataset.id = machine.id;
        
        // Determine badges
        const badges = [];
        if (machine.isFeatured) {
            badges.push(`
                <span class="badge badge-featured">
                    <i class="fas fa-star"></i>
                    <span>Featured</span>
                </span>
            `);
        }
        if (machine.isNew) {
            badges.push(`
                <span class="badge badge-new">
                    <i class="fas fa-bolt"></i>
                    <span>New</span>
                </span>
            `);
        }
        
        // Create specs
        const specs = [];
        if (machine.power) {
            specs.push(`
                <div class="spec-item">
                    <i class="fas fa-bolt"></i>
                    <span>${machine.power}</span>
                </div>
            `);
        }
        if (machine.capacity) {
            specs.push(`
                <div class="spec-item">
                    <i class="fas fa-weight"></i>
                    <span>${machine.capacity}</span>
                </div>
            `);
        }
        if (machine.fuel_type) {
            specs.push(`
                <div class="spec-item">
                    <i class="fas fa-gas-pump"></i>
                    <span>${machine.fuel_type}</span>
                </div>
            `);
        }
        
        card.innerHTML = `
            <div class="card-badges">
                ${badges.join('')}
            </div>
            
            <div class="machinery-image">
                <img src="{{ asset('storage/') }}/${machine.image}" 
                     alt="${machine.name}" 
                     loading="lazy"
                     class="lazy-load">
                <div class="image-overlay">
                    <button class="quick-view" onclick="openQuickView('${machine.id}')" aria-label="Quick view">
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="add-to-cart" onclick="addToCart('${machine.id}')" aria-label="Add to cart">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
            </div>
            
            <div class="machinery-content">
                <div class="machinery-category">
                    <span>${machine.categoryName}</span>
                </div>
                
                <h3 class="machinery-title">${machine.name}</h3>
                
                <div class="machinery-specs">
                    ${specs.join('')}
                </div>
                
                <div class="machinery-actions">
                    <a href="{{ route('products.show', '') }}/${machine.id}" class="btn btn-primary">
                        <i class="fas fa-info-circle"></i>
                        <span>View Details</span>
                    </a>
                    <button class="btn btn-secondary" onclick="openQuoteModal('${machine.id}')">
                        <i class="fas fa-envelope"></i>
                        <span>Get Quote</span>
                    </button>
                </div>
            </div>
        `;
        
        return card;
    }
    
    // Update active filters display
    function updateActiveFilters() {
        activeFilters.innerHTML = '';
        
        if (currentFilter !== 'all') {
            const categoryName = document.querySelector(`[data-filter="${currentFilter}"] span`).textContent;
            const filterTag = document.createElement('div');
            filterTag.className = 'filter-tag';
            filterTag.innerHTML = `
                <span>Category: ${categoryName}</span>
                <button onclick="removeFilter('category')" aria-label="Remove category filter">
                    <i class="fas fa-times"></i>
                </button>
            `;
            activeFilters.appendChild(filterTag);
        }
        
        if (currentSearch) {
            const filterTag = document.createElement('div');
            filterTag.className = 'filter-tag';
            filterTag.innerHTML = `
                <span>Search: "${currentSearch}"</span>
                <button onclick="removeFilter('search')" aria-label="Remove search filter">
                    <i class="fas fa-times"></i>
                </button>
            `;
            activeFilters.appendChild(filterTag);
        }
    }
    
    // Update results count
    function updateResultsCount(count) {
        visibleCount.textContent = count;
    }
    
    // Update pagination
    function updatePagination(totalItems) {
        const totalPages = Math.ceil(totalItems / itemsPerPage);
        const pageNumbers = document.querySelector('.page-numbers');
        const prevBtn = document.querySelector('.page-btn.prev');
        const nextBtn = document.querySelector('.page-btn.next');
        
        if (totalPages <= 1) {
            pagination.style.display = 'none';
            return;
        }
        
        pagination.style.display = 'flex';
        
        // Update button states
        prevBtn.disabled = currentPage === 1;
        nextBtn.disabled = currentPage === totalPages;
        
        // Generate page numbers
        pageNumbers.innerHTML = '';
        
        // Show first page, current page, and last page
        const pagesToShow = [];
        
        if (totalPages <= 5) {
            for (let i = 1; i <= totalPages; i++) {
                pagesToShow.push(i);
            }
        } else {
            pagesToShow.push(1);
            
            if (currentPage > 3) {
                pagesToShow.push('...');
            }
            
            const start = Math.max(2, currentPage - 1);
            const end = Math.min(totalPages - 1, currentPage + 1);
            
            for (let i = start; i <= end; i++) {
                pagesToShow.push(i);
            }
            
            if (currentPage < totalPages - 2) {
                pagesToShow.push('...');
            }
            
            if (totalPages > 1) {
                pagesToShow.push(totalPages);
            }
        }
        
        // Create page number buttons
        pagesToShow.forEach(page => {
            const pageBtn = document.createElement('button');
            pageBtn.className = 'page-number';
            
            if (page === '...') {
                pageBtn.textContent = '...';
                pageBtn.disabled = true;
            } else {
                pageBtn.textContent = page;
                pageBtn.classList.toggle('active', page === currentPage);
                pageBtn.addEventListener('click', () => {
                    currentPage = page;
                    filterMachinery();
                    scrollToTop();
                });
            }
            
            pageNumbers.appendChild(pageBtn);
        });
        
        // Add event listeners to prev/next buttons
        prevBtn.onclick = () => {
            if (currentPage > 1) {
                currentPage--;
                filterMachinery();
                scrollToTop();
            }
        };
        
        nextBtn.onclick = () => {
            if (currentPage < totalPages) {
                currentPage++;
                filterMachinery();
                scrollToTop();
            }
        };
    }
    
    // Set active filter
    function setActiveFilter(filter) {
        currentFilter = filter;
        currentPage = 1; // Reset to first page
        
        filterTabs.forEach(tab => {
            tab.classList.toggle('active', tab.dataset.filter === filter);
        });
    }
    
    // Set active view
    function setActiveView(view) {
        currentView = view;
        
        viewButtons.forEach(button => {
            button.classList.toggle('active', button.dataset.view === view);
        });
        
        machineryGrid.setAttribute('data-view', view);
    }
    
    // Initialize machinery grid
    function initMachineryGrid() {
        filterMachinery();
        
        // Lazy load images
        const lazyImages = document.querySelectorAll('img.lazy-load');
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
    }
    
    // Featured slider functionality
    const featuredSlider = document.getElementById('featuredSlider');
    const featuredSliderPrev = document.querySelector('.featured-slider .slider-prev');
    const featuredSliderNext = document.querySelector('.featured-slider .slider-next');
    
    let featuredIndex = 0;
    const featuredSlideWidth = 380 + 30;
    
    featuredSliderPrev?.addEventListener('click', () => {
        const count = {{ $products->where('isFeatured', true)->count() }};
        featuredIndex = Math.max(featuredIndex - 1, 0);
        featuredSlider.style.transform = `translateX(-${featuredIndex * featuredSlideWidth}px)`;
    });
    
    featuredSliderNext?.addEventListener('click', () => {
        const count = {{ $products->where('isFeatured', true)->count() }};
        featuredIndex = Math.min(featuredIndex + 1, count - 1);
        featuredSlider.style.transform = `translateX(-${featuredIndex * featuredSlideWidth}px)`;
    });
    
    // Pause animation on hover
    featuredSlider?.addEventListener('mouseenter', () => {
        featuredSlider.style.animationPlayState = 'paused';
    });
    
    featuredSlider?.addEventListener('mouseleave', () => {
        featuredSlider.style.animationPlayState = 'running';
    });
});

// Global functions
function filterByCategory(category) {
    const tab = document.querySelector(`[data-filter="${category}"]`);
    if (tab) {
        tab.click();
        scrollToFilterSection();
    }
}

function resetFilters() {
    const allTab = document.querySelector('[data-filter="all"]');
    if (allTab) {
        allTab.click();
    }
    
    searchInput.value = '';
    sortSelect.value = 'default';
    
    const event = new Event('change');
    sortSelect.dispatchEvent(event);
    
    searchInput.dispatchEvent(new Event('input'));
}

function removeFilter(type) {
    switch(type) {
        case 'category':
            const allTab = document.querySelector('[data-filter="all"]');
            allTab.click();
            break;
        case 'search':
            searchInput.value = '';
            searchInput.dispatchEvent(new Event('input'));
            break;
    }
}

function openQuickView(productId) {
    // Implement quick view functionality
    console.log('Quick view for product:', productId);
    // You can implement a modal with detailed product information
}

function openQuoteModal(productId) {
    const modal = document.getElementById('quoteModal');
    const productIdInput = document.getElementById('quoteProductId');
    
    productIdInput.value = productId;
    modal.style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closeQuoteModal() {
    const modal = document.getElementById('quoteModal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

function addToCart(productId) {
    // Implement add to cart functionality
    console.log('Add to cart:', productId);
    // Show success message
    showNotification('Added to quote list!', 'success');
}

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

function scrollToTop() {
    window.scrollTo({
        top: document.querySelector('.machinery-grid-section').offsetTop - 100,
        behavior: 'smooth'
    });
}

function scrollToFilterSection() {
    window.scrollTo({
        top: document.querySelector('.machinery-filter-section').offsetTop - 100,
        behavior: 'smooth'
    });
}

// Close modals on ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeQuoteModal();
        const quickViewModal = document.getElementById('quickViewModal');
        if (quickViewModal.style.display === 'block') {
            quickViewModal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    }
});

// Close modals when clicking outside
document.getElementById('quoteModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeQuoteModal();
    }
});

// Submit quote form
document.getElementById('quoteForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Get form data
    const formData = {
        productId: document.getElementById('quoteProductId').value,
        name: document.getElementById('quoteName').value,
        email: document.getElementById('quoteEmail').value,
        phone: document.getElementById('quotePhone').value,
        message: document.getElementById('quoteMessage').value
    };
    
    // Here you would typically send this data to your server
    console.log('Quote request:', formData);
    
    // Show success message
    showNotification('Quote request sent successfully!', 'success');
    
    // Close modal and reset form
    closeQuoteModal();
    this.reset();
});

</script>

@include('Templates.footer')