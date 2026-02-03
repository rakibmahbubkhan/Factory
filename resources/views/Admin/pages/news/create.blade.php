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
                        <h4 class="card-title">Create News</h4>
                        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="image3">Image 3</label>
                                <input type="file" name="image3" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" name="link" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
