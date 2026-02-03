@extends('Admin.Partials.head')
@section('content')
    <div class="container pt-md-0" style="padding-top: 6rem;">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Products <a style="float: right;" href="{{ route('products.create') }}" class="btn btn-success">Add New Product</a></h4>

                    <!-- Search and Sort Form -->
                    <form action="{{ route('products.index') }}" method="GET" id="search-sort-form" class="mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <input style="padding: 4px;" type="text" name="search" class="form-control" placeholder="Search products..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-4">
                                <select name="sort_by" class="form-control">
                                    <option value="product_name" {{ request('sort_by') == 'product_name' ? 'selected' : '' }}>Sort by Name</option>
                                    <option value="price" {{ request('sort_by') == 'price' ? 'selected' : '' }}>Sort by Price</option>
                                    <option value="category" {{ request('sort_by') == 'category' ? 'selected' : '' }}>Sort by Category</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="sort_order" class="form-control">
                                    <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Ascending</option>
                                    <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Descending</option>
                                </select>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        @if ($product->image1)
                                            <img src="{{ asset('storage/' . $product->image1) }}" alt="{{ $product->product_name }}" class="img-thumbnail" width="100">
                                        @endif
                                    </td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->price }} BDT</td>
                                    <td>{{ $product->category }}</td>
                                    <td>{{ $product->isActive ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>


                </div>
            </div>
    </div>

        <!-- Pagination -->
    <div class="pagination d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>



    <!-- JavaScript to submit form on Enter key -->
    <script>
        document.querySelectorAll('#search-sort-form input, #search-sort-form select').forEach(function(element) {
            element.addEventListener('change', function() {
                document.getElementById('search-sort-form').submit();
            });

            element.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault(); // Prevent form submission on Enter key press within selects.
                    document.getElementById('search-sort-form').submit();
                }
            });
        });
    </script>

@endsection
