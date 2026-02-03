@extends('Admin.Partials.head')
@section('content')
    <div class="container-fluid page-body-wrapper pt-3 pt-md-0">
        <div class="content-wrapper">
            <div class="col-md-6 grid-margin stretch-card mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h1>{{ $product->product_name }}</h1>

                        <div class="mb-4">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Description</h5>
                                <p class="card-text">{{ $product->description }}</p>

                                <h5 class="card-title">Price</h5>
                                <p class="card-text">৳{{ $product->price }}</p>

                                <h5 class="card-title">Category</h5>
                                <p class="card-text">{{ $product->category }}</p>

                                <h5 class="card-title">Contact</h5>
                                <p class="card-text">{{ $product->contact }}</p>

                                <h5 class="card-title">Images</h5>
                                <div class="row">
                                    @if ($product->image1)
                                        <div class="col-md-3">
                                            <img src="{{ asset('storage/' . $product->image1) }}" class="img-fluid img-thumbnail" alt="Image 1">
                                        </div>
                                    @endif
                                    @if ($product->image2)
                                        <div class="col-md-3">
                                            <img src="{{ asset('storage/' . $product->image2) }}" class="img-fluid img-thumbnail" alt="Image 2">
                                        </div>
                                    @endif
                                    @if ($product->image3)
                                        <div class="col-md-3">
                                            <img src="{{ asset('storage/' . $product->image3) }}" class="img-fluid img-thumbnail" alt="Image 3">
                                        </div>
                                    @endif
                                    @if ($product->image4)
                                        <div class="col-md-3">
                                            <img src="{{ asset('storage/' . $product->image4) }}" class="img-fluid img-thumbnail" alt="Image 4">
                                        </div>
                                    @endif
                                </div>

                                <h5 class="card-title">Status</h5>
                                <p class="card-text">{{ $product->isActive ? 'Active' : 'Inactive' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
