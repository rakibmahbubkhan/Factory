@extends('Admin.Partials.head')
@section('content')
    <div class="container-fluid page-body-wrapper pt-3 pt-md-0">
        <div class="content-wrapper">
            <div class="col-md-6 grid-margin stretch-card mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create New Product</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" name="product_name" class="form-control" value="{{ old('product_name') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" rows="4">.</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image1">Image 1</label>
                                <input type="file" name="image1" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label for="image2">Image 2</label>
                                <input type="file" name="image2" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label for="image3">Image 3</label>
                                <input type="file" name="image3" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label for="image4">Image 4</label>
                                <input type="file" name="image4" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" step="0.01" name="price" class="form-control" value="0">
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" class="form-control" required>
                                    <option value="" disabled selected>Select Category</option>
                                    <option value="Pre-Harvest" {{ old('category') == 'Pre-Harvest' ? 'selected' : '' }}>Pre-Harvest</option>
                                    <option value="Post-Harvest" {{ old('category') == 'Post-Harvest' ? 'selected' : '' }}>Post-Harvest</option>
                                    <option value="Cattle" {{ old('category') == 'Cattle' ? 'selected' : '' }}>Cattle</option>
                                    <option value="Fertilizer" {{ old('category') == 'Fertilizer' ? 'selected' : '' }}>Fertilizer</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" name="contact" class="form-control" value="{{ old('contact') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="isActive">Is Active</label>
                                <select name="isActive" class="form-control">
                                    <option value="1" {{ old('isActive') == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ old('isActive') == 0 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="created_by">Created By</label>--}}
{{--                                <input type="number" name="created_by" class="form-control" value="{{ old('created_by') }}" required>--}}
{{--                            </div>--}}

                            <button type="submit" class="btn btn-primary">Create Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
