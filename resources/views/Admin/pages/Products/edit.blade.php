@extends('Admin.Partials.head')

@section('content')
<div class="container-fluid px-2 px-md-4 py-3 py-md-4">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
            
            <!-- Header Section -->
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center mb-4 gap-3">
                <div>
                    <h2 class="fw-bold mb-1" style="color: #2c3e50;">✏️ Edit Product</h2>
                    <p class="text-muted small mb-0">Update product information and media</p>
                </div>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                    ← Back to Products
                </a>
            </div>

            <!-- Main Card -->
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
                    <ul class="nav nav-tabs card-header-tabs gap-2" id="productTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active rounded-3" id="basic-tab" data-bs-toggle="tab" data-bs-target="#basic" type="button" role="tab">
                                <i class="bi bi-info-circle me-1"></i> Basic
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-3" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab">
                                <i class="bi bi-list-ul me-1"></i> Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-3" id="media-tab" data-bs-toggle="tab" data-bs-target="#media" type="button" role="tab">
                                <i class="bi bi-images me-1"></i> Media
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link rounded-3" id="faq-tab" data-bs-toggle="tab" data-bs-target="#faq" type="button" role="tab">
                                <i class="bi bi-question-circle me-1"></i> FAQs
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="card-body p-4 p-md-5">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4" role="alert">
                            <div class="d-flex">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                <div>
                                    <strong>Please fix the following errors:</strong>
                                    <ul class="mb-0 mt-1 ps-3">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" id="productForm">
                        @csrf
                        @method('PUT')

                        <div class="tab-content">
                            <!-- BASIC INFO TAB -->
                            <div class="tab-pane fade show active" id="basic" role="tabpanel">
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Product Name <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0 rounded-start-3"><i class="bi bi-tag"></i></span>
                                        <input type="text" name="product_name" class="form-control border-start-0 rounded-end-3 ps-0" 
                                               value="{{ old('product_name', $product->product_name) }}" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Description</label>
                                    <textarea id="myeditorinstance" name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                                        <select name="category" class="form-select" required>
                                            <option value="Pre-Harvest" {{ old('category', $product->category) == 'Pre-Harvest' ? 'selected' : '' }}>🌾 Pre-Harvest</option>
                                            <option value="Post-Harvest" {{ old('category', $product->category) == 'Post-Harvest' ? 'selected' : '' }}>📦 Post-Harvest</option>
                                            <option value="Cattle" {{ old('category', $product->category) == 'Cattle' ? 'selected' : '' }}>🐄 Cattle</option>
                                            <option value="Fertilizer" {{ old('category', $product->category) == 'Fertilizer' ? 'selected' : '' }}>🌱 Fertilizer</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Price</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">$</span>
                                            <input type="number" step="0.01" name="price" class="form-control" 
                                                   value="{{ old('price', $product->price) }}" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 mt-1">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Contact <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="bi bi-phone"></i></span>
                                            <input type="text" name="contact" class="form-control" 
                                                   value="{{ old('contact', $product->contact) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Status</label>
                                        <select name="isActive" class="form-select">
                                            <option value="1" {{ old('isActive', $product->isActive) == 1 ? 'selected' : '' }}>✅ Active</option>
                                            <option value="0" {{ old('isActive', $product->isActive) == 0 ? 'selected' : '' }}>⛔ Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- DETAILS TAB -->
                            <div class="tab-pane fade" id="details" role="tabpanel">
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Key Features</label>
                                    <textarea name="key_features" class="form-control myeditorinstance" rows="4" 
                                              placeholder="Enter each feature on a new line or separate with commas">{{ old('key_features', $product->key_features ?? '') }}</textarea>
                                    <div class="form-text text-muted mt-1">
                                        <i class="bi bi-info-circle"></i> Separate items with commas or line breaks
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Applications</label>
                                    <textarea name="applications" class="form-control myeditorinstance" rows="4" 
                                              placeholder="Enter each application on a new line or separate with commas">{{ old('applications', $product->applications ?? '') }}</textarea>
                                    <div class="form-text text-muted mt-1">
                                        <i class="bi bi-info-circle"></i> Separate items with commas or line breaks
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Benefits</label>
                                    <textarea name="benefits" class="form-control myeditorinstance" rows="4" 
                                              placeholder="Enter each benefit on a new line or separate with commas">{{ old('benefits', $product->benefits ?? '') }}</textarea>
                                    <div class="form-text text-muted mt-1">
                                        <i class="bi bi-info-circle"></i> Separate items with commas or line breaks
                                    </div>
                                </div>
                            </div>

                            <!-- MEDIA TAB -->
                            <div class="tab-pane fade" id="media" role="tabpanel">
                                <div class="row g-4">
                                    @for ($i = 1; $i <= 4; $i++)
                                        <div class="col-sm-6 col-md-3">
                                            <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                                                <div class="position-relative bg-light" style="height: 160px;">
                                                    @if ($product->{'image'.$i})
                                                        <img src="{{ asset('storage/' . $product->{'image'.$i}) }}" 
                                                             class="w-100 h-100 object-fit-cover" alt="Image {{ $i }}">
                                                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2 rounded-circle" 
                                                                onclick="removeImage('image{{ $i }}')" style="width: 28px; height: 28px; padding: 0;">
                                                            <i class="bi bi-x"></i>
                                                        </button>
                                                    @else
                                                        <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                                            <i class="bi bi-image fs-1 opacity-25"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="card-body p-3 text-center">
                                                    <label class="btn btn-outline-primary btn-sm w-100 rounded-pill">
                                                        <i class="bi bi-upload me-1"></i> Upload Image {{ $i }}
                                                        <input type="file" name="image{{ $i }}" class="d-none" accept="image/*">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                                <div class="alert alert-info mt-4 rounded-3 small">
                                    <i class="bi bi-info-circle-fill me-2"></i> 
                                    Recommended image size: 800x800px. Max file size: 2MB per image.
                                </div>
                            </div>

                            <!-- FAQ TAB -->
                            <div class="tab-pane fade" id="faq" role="tabpanel">
                                <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                                    <label class="form-label fw-semibold mb-0">Frequently Asked Questions</label>
                                    <button type="button" class="btn btn-sm btn-primary rounded-pill px-3" onclick="addFaq()">
                                        <i class="bi bi-plus-lg me-1"></i> Add FAQ
                                    </button>
                                </div>
                                
                                <div id="faq-container" class="vstack gap-3">
                                    @forelse($product->faqs as $index => $faq)
                                        <div class="faq-item card border rounded-3 p-3">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <strong class="text-primary">FAQ #{{ $loop->iteration }}</strong>
                                                <button type="button" class="btn btn-sm btn-link text-danger p-0" onclick="this.closest('.faq-item').remove()">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="faqs[{{$index}}][question]" value="{{$faq->question}}" 
                                                   class="form-control mb-2" placeholder="Enter question...">
                                            <textarea name="faqs[{{$index}}][answer]" class="form-control" rows="2" 
                                                      placeholder="Enter answer...">{{$faq->answer}}</textarea>
                                        </div>
                                    @empty
                                        <div class="text-center text-muted py-4 bg-light rounded-3">
                                            <i class="bi bi-chat-dots fs-1 opacity-25"></i>
                                            <p class="mt-2 mb-0">No FAQs yet. Click "Add FAQ" to get started.</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="d-flex flex-column flex-sm-row justify-content-end gap-2 mt-4 pt-3 border-top">
                            <button type="reset" class="btn btn-light rounded-pill px-4 order-2 order-sm-1">
                                <i class="bi bi-arrow-repeat me-1"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary rounded-pill px-4 order-1 order-sm-2">
                                <i class="bi bi-check-lg me-1"></i> Update Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .object-fit-cover {
        object-fit: cover;
    }
    .nav-tabs .nav-link {
        border: none;
        color: #6c757d;
        font-weight: 500;
        padding: 0.6rem 1.2rem;
        transition: all 0.2s ease;
    }
    .nav-tabs .nav-link:hover {
        background-color: #f8f9fa;
        color: #0d6efd;
    }
    .nav-tabs .nav-link.active {
        background-color: #0d6efd;
        color: white;
    }
    .form-control:focus, .form-select:focus {
        box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.15);
        border-color: #86b7fe;
    }
    @media (max-width: 576px) {
        .card-body {
            padding: 1.25rem !important;
        }
        .nav-tabs .nav-link {
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
        }
    }
</style>

<script>
    // FAQ Management
    function addFaq() {
        const container = document.getElementById('faq-container');
        const emptyState = container.querySelector('.text-center');
        if (emptyState && emptyState.classList.contains('py-4')) {
            emptyState.remove();
        }
        
        const index = container.querySelectorAll('.faq-item').length;
        const html = `
            <div class="faq-item card border rounded-3 p-3">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <strong class="text-primary">FAQ #${index + 1}</strong>
                    <button type="button" class="btn btn-sm btn-link text-danger p-0" onclick="this.closest('.faq-item').remove()">
                        <i class="bi bi-trash3"></i>
                    </button>
                </div>
                <input type="text" name="faqs[${index}][question]" class="form-control mb-2" placeholder="Enter question...">
                <textarea name="faqs[${index}][answer]" class="form-control" rows="2" placeholder="Enter answer..."></textarea>
            </div>`;
        container.insertAdjacentHTML('beforeend', html);
    }

    // Image removal preview (optional - visual only, doesn't delete from server)
    function removeImage(imageName) {
        if (confirm('Remove this image? The file will still be in storage. To permanently delete, please update without selecting a new image.')) {
            // Find the card and clear the image preview
            const card = event.target.closest('.card');
            const imgContainer = card.querySelector('.position-relative');
            imgContainer.innerHTML = `
                <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                    <i class="bi bi-image fs-1 opacity-25"></i>
                </div>`;
            // Clear the file input value
            const fileInput = card.querySelector('input[type="file"]');
            if (fileInput) fileInput.value = '';
        }
    }

    // File input preview
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                const previewContainer = this.closest('.card').querySelector('.position-relative');
                reader.onload = function(ev) {
                    previewContainer.innerHTML = `
                        <img src="${ev.target.result}" class="w-100 h-100 object-fit-cover" alt="Preview">
                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2 rounded-circle" 
                                onclick="removeImagePreview(this)" style="width: 28px; height: 28px; padding: 0;">
                            <i class="bi bi-x"></i>
                        </button>`;
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    function removeImagePreview(btn) {
        const container = btn.closest('.position-relative');
        const card = container.closest('.card');
        container.innerHTML = `
            <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                <i class="bi bi-image fs-1 opacity-25"></i>
            </div>`;
        const fileInput = card.querySelector('input[type="file"]');
        if (fileInput) fileInput.value = '';
    }
</script>
@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '.myeditorinstance',
        height: 280,
        menubar: false,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | bullist numlist | link image | removeformat | help',
        content_style: 'body { font-family: system-ui, -apple-system, sans-serif; font-size: 15px; line-height: 1.6; }',
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });

    document.getElementById('productForm').addEventListener('submit', function() {
        tinymce.triggerSave();
    });
</script>
@endpush