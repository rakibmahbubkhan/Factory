@extends('Admin.Partials.head')
@section('content')
    <div class="container-fluid page-body-wrapper pt-3 pt-md-0">
        <div class="content-wrapper">
            <div class="col-md-6 grid-margin stretch-card mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Product</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" name="product_name" class="form-control" value="{{ old('product_name', $product->product_name) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image1">Image 1</label>
                                <input type="file" name="image1" class="form-control-file">
                                @if ($product->image1)
                                    <img style="width: 250px;" src="{{ asset('storage/' . $product->image1) }}" class="img-fluid img-thumbnail" alt="Image 1">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="image2">Image 2</label>
                                <input type="file" name="image2" class="form-control-file">
                                @if ($product->image2)
                                    <img style="width: 250px;" src="{{ asset('storage/' . $product->image2) }}" class="img-fluid img-thumbnail" alt="Image 2">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="image3">Image 3</label>
                                <input type="file" name="image3" class="form-control-file">
                                @if ($product->image3)
                                    <img style="width: 250px;" src="{{ asset('storage/' . $product->image3) }}" class="img-fluid img-thumbnail" alt="Image 3">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="image4">Image 4</label>
                                <input type="file" name="image4" class="form-control-file">
                                @if ($product->image4)
                                    <img style="width: 250px;" src="{{ asset('storage/' . $product->image4) }}" class="img-fluid img-thumbnail" alt="Image 4">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" class="form-control" required>
                                    <option value="Pre-Harvest" {{ old('category', $product->category) == 'Pre-Harvest' ? 'selected' : '' }}>Pre-Harvest</option>
                                    <option value="Post-Harvest" {{ old('category', $product->category) == 'Post-Harvest' ? 'selected' : '' }}>Post-Harvest</option>
                                    <option value="Cattle" {{ old('category', $product->category) == 'Cattle' ? 'selected' : '' }}>Cattle</option>
                                    <option value="Fertilizer" {{ old('category', $product->category) == 'Fertilizer' ? 'selected' : '' }}>Fertilizer</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" name="contact" class="form-control" value="{{ old('contact', $product->contact) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="isActive">Is Active</label>
                                <select name="isActive" class="form-control">
                                    <option value="1" {{ old('isActive', $product->isActive) == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ old('isActive', $product->isActive) == 0 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="updated_by">Updated By</label>--}}
{{--                                <input type="number" name="updated_by" class="form-control" value="{{ old('updated_by', $product->updated_by) }}" required>--}}
{{--                            </div>--}}

                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
