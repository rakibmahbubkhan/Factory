@extends('Admin.Partials.head')

@section('content')
<div class="container-fluid px-2 px-md-4 py-3 py-md-4">
    <!-- Header Section -->
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center mb-4 gap-3">
        <div>
            <h2 class="fw-bold mb-1" style="color: #2c3e50;">Products</h2>
            <p class="text-muted small mb-0">Manage your product catalog</p>
        </div>
        <a href="{{ route('products.create') }}" class="btn btn-primary rounded-pill px-4">
            <span style="font-size: 1.1rem; margin-right: 8px;">+</span> Add New Product
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted small">Total Products</span>
                            <h3 class="mb-0 fw-bold">{{ $products->total() }}</h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 rounded-3 p-2">
                            <span style="font-size: 1.5rem;">📦</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted small">Active Products</span>
                            <h3 class="mb-0 fw-bold">{{ $products->where('isActive', 1)->count() }}</h3>
                        </div>
                        <div class="bg-success bg-opacity-10 rounded-3 p-2">
                            <span style="font-size: 1.5rem;">✓</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted small">Categories</span>
                            <h3 class="mb-0 fw-bold">4</h3>
                        </div>
                        <div class="bg-info bg-opacity-10 rounded-3 p-2">
                            <span style="font-size: 1.5rem;">🏷️</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted small">Avg. Price</span>
                            <h3 class="mb-0 fw-bold">৳{{ number_format($products->avg('price') ?? 0, 0) }}</h3>
                        </div>
                        <div class="bg-warning bg-opacity-10 rounded-3 p-2">
                            <span style="font-size: 1.5rem;">💰</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Card -->
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="width: 80%;justify-self: center;">
        <!-- Search and Filter Bar -->
        <div class="card-header bg-white border-0 p-4 pb-0">
            <form action="{{ route('products.index') }}" method="GET" id="search-sort-form">
                <div class="row g-3 align-items-end">
                    <div class="col-12 col-md-4">
                        <label class="form-label fw-semibold small text-muted">SEARCH</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 rounded-start-3">
                                🔍
                            </span>
                            <input type="text" name="search" class="form-control border-start-0 rounded-end-3" 
                                   placeholder="Search by name..." value="{{ request('search') }}" 
                                   style="padding-left: 0.5rem;">
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label fw-semibold small text-muted">SORT BY</label>
                        <select name="sort_by" class="form-select rounded-3">
                            <option value="product_name" {{ request('sort_by') == 'product_name' ? 'selected' : '' }}>Product Name</option>
                            <option value="price" {{ request('sort_by') == 'price' ? 'selected' : '' }}>Price</option>
                            <option value="category" {{ request('sort_by') == 'category' ? 'selected' : '' }}>Category</option>
                            <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Date Added</option>
                        </select>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label fw-semibold small text-muted">ORDER</label>
                        <select name="sort_order" class="form-select rounded-3">
                            <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Ascending ↑</option>
                            <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Descending ↓</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-2">
                        <button type="submit" class="btn btn-primary w-100 rounded-pill">
                            ⚡ Apply
                        </button>
                    </div>
                </div>
                
                <!-- Active Filters Display -->
                @if(request('search') || request('sort_by') || request('sort_order'))
                    <div class="mt-3 d-flex flex-wrap gap-2 align-items-center">
                        <span class="text-muted small">Active filters:</span>
                        @if(request('search'))
                            <span class="badge bg-secondary bg-opacity-10 text-dark rounded-pill px-3 py-2">
                                Search: {{ request('search') }}
                                <a href="{{ route('products.index', array_merge(request()->except('search'), ['page' => 1])) }}" class="text-danger ms-2 text-decoration-none">✕</a>
                            </span>
                        @endif
                        @if(request('sort_by'))
                            <span class="badge bg-secondary bg-opacity-10 text-dark rounded-pill px-3 py-2">
                                Sort: {{ request('sort_by') }} ({{ request('sort_order') == 'asc' ? '↑' : '↓' }})
                                <a href="{{ route('products.index', array_merge(request()->except(['sort_by', 'sort_order']), ['page' => 1])) }}" class="text-danger ms-2 text-decoration-none">✕</a>
                            </span>
                        @endif
                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-link text-danger p-0 ms-2">Clear all</a>
                    </div>
                @endif
            </form>
        </div>

        <div class="card-body p-0">
            <!-- Desktop Table View -->
            <div class="d-none d-md-block">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4" style="width: 80px;">Image</th>
                                <th>Product Name</th>
                                <th style="width: 120px;">Price</th>
                                <th style="width: 150px;">Category</th>
                                <th style="width: 100px;">Status</th>
                                <th style="width: 140px;" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td class="ps-4">
                                        @if ($product->image1)
                                            <img src="{{ asset('storage/' . $product->image1) }}" alt="{{ $product->product_name }}" 
                                                 class="rounded-3 shadow-sm" width="55" height="55" style="object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded-3 d-flex align-items-center justify-content-center" style="width: 55px; height: 55px;">
                                                <span style="font-size: 1.5rem;">🖼️</span>
                                            </div>
                                        @endif
                                     </td>
                                    <td>
                                        <span class="fw-semibold">{{ Str::limit($product->product_name, 40) }}</span>
                                        @if($product->description)
                                            <div class="text-muted small">{{ Str::limit(strip_tags($product->description), 50) }}</div>
                                        @endif
                                     </td>
                                    <td>
                                        <span class="fw-bold text-primary">৳{{ number_format($product->price, 2) }}</span>
                                     </td>
                                    <td>
                                        @php
                                            $categoryIcons = [
                                                'Pre-Harvest' => '🌾',
                                                'Post-Harvest' => '📦',
                                                'Cattle' => '🐄',
                                                'Fertilizer' => '🌱'
                                            ];
                                            $icon = $categoryIcons[$product->category] ?? '🏷️';
                                        @endphp
                                        <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                                            {{ $icon }} {{ $product->category }}
                                        </span>
                                     </td>
                                    <td>
                                        @if($product->isActive)
                                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2">
                                                <span style="margin-right: 4px;">✅</span> Active
                                            </span>
                                        @else
                                            <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-2">
                                                <span style="margin-right: 4px;">⛔</span> Inactive
                                            </span>
                                        @endif
                                     </td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-info rounded-circle" 
                                               style="width: 32px; height: 32px; padding: 0;" title="View">
                                                👁️
                                            </a>
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-primary rounded-circle" 
                                               style="width: 32px; height: 32px; padding: 0;" title="Edit">
                                                ✏️
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger rounded-circle delete-btn" 
                                                    style="width: 32px; height: 32px; padding: 0;" title="Delete"
                                                    data-id="{{ $product->id }}" data-name="{{ $product->product_name }}">
                                                🗑️
                                            </button>
                                            <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                     </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <span style="font-size: 3rem;">📭</span>
                                        <p class="mt-2 text-muted">No products found</p>
                                        <a href="{{ route('products.create') }}" class="btn btn-primary rounded-pill mt-2">
                                            <span style="margin-right: 5px;">+</span> Add your first product
                                        </a>
                                     </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Mobile Card View -->
            <div class="d-md-none p-3">
                <div class="vstack gap-3">
                    @forelse ($products as $product)
                        <div class="card border rounded-3 shadow-sm overflow-hidden">
                            <div class="position-relative">
                                @if ($product->image1)
                                    <img src="{{ asset('storage/' . $product->image1) }}" alt="{{ $product->product_name }}" 
                                         class="w-100" style="height: 180px; object-fit: cover;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 180px;">
                                        <span style="font-size: 3rem;">🖼️</span>
                                    </div>
                                @endif
                                <div class="position-absolute top-0 end-0 m-2">
                                    @if($product->isActive)
                                        <span class="badge bg-success rounded-pill px-3 py-2">✅ Active</span>
                                    @else
                                        <span class="badge bg-danger rounded-pill px-3 py-2">⛔ Inactive</span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="fw-bold mb-1">{{ $product->product_name }}</h6>
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <span class="badge bg-light text-dark rounded-pill">
                                        @php
                                            $icons = ['Pre-Harvest' => '🌾', 'Post-Harvest' => '📦', 'Cattle' => '🐄', 'Fertilizer' => '🌱'];
                                            echo $icons[$product->category] ?? '🏷️';
                                        @endphp
                                        {{ $product->category }}
                                    </span>
                                    <span class="fw-bold text-primary">৳{{ number_format($product->price, 2) }}</span>
                                </div>
                                @if($product->description)
                                    <p class="text-muted small mb-3">{{ Str::limit(strip_tags($product->description), 80) }}</p>
                                @endif
                                <div class="d-flex gap-2">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-info flex-grow-1 rounded-pill">
                                        👁️ View
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-primary flex-grow-1 rounded-pill">
                                        ✏️ Edit
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-danger rounded-pill px-3 delete-btn-mobile" 
                                            data-id="{{ $product->id }}" data-name="{{ $product->product_name }}">
                                        🗑️
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">
                            <span style="font-size: 3rem;">📭</span>
                            <p class="mt-2 text-muted">No products found</p>
                            <a href="{{ route('products.create') }}" class="btn btn-primary rounded-pill">
                                <span style="margin-right: 5px;">+</span> Add your first product
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Pagination -->
        @if($products->hasPages())
            <div class="card-footer bg-white border-0 p-4 pt-0">
                <div class="d-flex justify-content-center">
                    {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
                <div class="text-center text-muted small mt-3">
                    Showing {{ $products->firstItem() ?? 0 }} to {{ $products->lastItem() ?? 0 }} of {{ $products->total() }} products
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-danger">⚠️ Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete <strong id="deleteProductName"></strong>?</p>
                <p class="text-muted small mb-0">This action cannot be undone.</p>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger rounded-pill px-4" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<style>
    .table > :not(caption) > * > * {
        padding: 1rem 0.75rem;
    }
    .btn-outline-info:hover, .btn-outline-primary:hover, .btn-outline-danger:hover {
        transform: scale(1.05);
        transition: transform 0.2s ease;
    }
    .btn-outline-info, .btn-outline-primary, .btn-outline-danger {
        transition: all 0.2s ease;
    }
    .pagination .page-link {
        border-radius: 8px !important;
        margin: 0 3px;
        color: #0d6efd;
    }
    .pagination .page-item.active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
    @media (max-width: 768px) {
        .table-responsive {
            border-radius: 0;
        }
    }
    .badge {
        font-weight: normal;
    }
    .btn-outline-info, .btn-outline-primary, .btn-outline-danger {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
</style>

<script>
    // Auto-submit on input change
    document.querySelectorAll('#search-sort-form input, #search-sort-form select').forEach(function(element) {
        if (element.type !== 'text') {
            element.addEventListener('change', function() {
                document.getElementById('search-sort-form').submit();
            });
        }
    });

    // Search with debounce
    let searchTimeout;
    const searchInput = document.querySelector('input[name="search"]');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                document.getElementById('search-sort-form').submit();
            }, 500);
        });
    }

    // Delete modal handling
    let deleteId = null;
    
    document.querySelectorAll('.delete-btn, .delete-btn-mobile').forEach(btn => {
        btn.addEventListener('click', function() {
            deleteId = this.dataset.id;
            document.getElementById('deleteProductName').textContent = this.dataset.name;
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        });
    });
    
    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        if (deleteId) {
            document.getElementById(`delete-form-${deleteId}`).submit();
        }
    });
</script>

@endsection