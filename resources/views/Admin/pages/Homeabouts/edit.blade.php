@extends('Admin.Partials.head')
@section('content')

    <div class="container-fluid page-body-wrapper">
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
                        <h4 class="card-title">Add About</h4>
                        <h1>Edit About For Home</h1>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('homeabouts.update', $homeabout->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $homeabout->title) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="image1">Image 1</label>
                                @if($homeabout->image1)
                                    <div>
                                        <img src="{{ asset('images/' . $homeabout->image1) }}" alt="{{ $homeabout->title }}" width="100">
                                    </div>
                                @endif
                                <input type="file" name="image1" class="form-control" id="image1">
                            </div>

                            <div class="form-group">
                                <label for="image2">Image 2</label>
                                @if($homeabout->image2)
                                    <div>
                                        <img src="{{ asset('images/' . $homeabout->image2) }}" alt="{{ $homeabout->title }}" width="100">
                                    </div>
                                @endif
                                <input type="file" name="image2" class="form-control" id="image2">
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" class="form-control" id="content" rows="5" required>{{ old('content', $homeabout->content) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="experience">Experience (in years)</label>
                                <input type="number" name="experience" class="form-control" id="experience" value="{{ old('experience', $homeabout->experience) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="features">Features</label>
                                <textarea name="features" class="form-control" id="features" rows="3" required>{{ old('features', $homeabout->features) }}</textarea>
                                <small class="form-text text-muted">Enter features separated by new lines.</small>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $homeabout->email) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone', $homeabout->phone) }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
