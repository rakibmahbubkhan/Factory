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
                        <h4 class="card-title">Edit News</h4>
                        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $news->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="image1">Image 1</label>
                                <input type="file" name="image1" class="form-control">
                                @if ($news->image1)
                                    <img src="{{ asset('storage/' . $news->image1) }}" alt="Image 1" class="img-thumbnail mt-2" width="150">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image2">Image 2</label>
                                <input type="file" name="image2" class="form-control">
                                @if ($news->image2)
                                    <img src="{{ asset('storage/' . $news->image2) }}" alt="Image 2" class="img-thumbnail mt-2" width="150">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image3">Image 3</label>
                                <input type="file" name="image3" class="form-control">
                                @if ($news->image3)
                                    <img src="{{ asset('storage/' . $news->image3) }}" alt="Image 3" class="img-thumbnail mt-2" width="150">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" required>{{ $news->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" name="link" class="form-control" value="{{ $news->link }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Publish</button>
                        </form>                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
