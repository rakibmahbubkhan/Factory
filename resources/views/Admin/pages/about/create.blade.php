@extends('Admin.Partials.head')
@section('content')

    <div class="container pt-3 pt-md-0">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>Create About Section</h2>
        <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image1">Image 1</label>
                <input type="file" name="image1" class="form-control">
            </div>
            <div class="form-group">
                <label for="image2">Image 2</label>
                <input type="file" name="image2" class="form-control">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="ckeditor-content" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="experience">Experience (in years)</label>
                <input type="number" name="experience" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="features">Features</label>
                <textarea name="features" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('ckeditor-content');
    </script>
@endsection
