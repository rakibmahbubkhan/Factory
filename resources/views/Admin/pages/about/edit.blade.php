@extends('Admin.Partials.head')
@section('content')
        <div class="container-fluid page-body-wrapper pt-3 pt-md-0">
            <div class="content-wrapper">
                <div class="col-md-6 grid-margin stretch-card mx-auto">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h4 class="card-title">Edit About Section</h4>
                            <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ $about->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="image1">Image 1</label>
                                    <input type="file" name="image1" class="form-control">
                                    @if ($about->image1)
                                        <img src="{{ asset('storage/' . $about->image1) }}" alt="Image 1" class="img-thumbnail mt-2" width="150">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="image2">Image 2</label>
                                    <input type="file" name="image2" class="form-control">
                                    @if ($about->image2)
                                        <img src="{{ asset('storage/' . $about->image2) }}" alt="Image 2" class="img-thumbnail mt-2" width="150">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea name="content" id="ckeditor-content" class="form-control">{{ $about->content }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="experience">Experience (in years)</label>
                                    <input type="number" name="experience" class="form-control" value="{{ $about->experience }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="features">Features</label>
                                    <textarea name="features" class="form-control">{{ $about->features }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $about->email }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $about->phone }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('ckeditor-content');
    </script>
@endsection
