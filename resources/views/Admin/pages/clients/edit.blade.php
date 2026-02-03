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
                        <h4 class="card-title">Edit client</h4>
                        <form action="{{ route('clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $client->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="image1">Image</label>
                                <input type="file" name="image1" class="form-control">
                                @if ($client->image1)
                                    <img src="{{ asset('storage/' . $client->image1) }}" alt="Image" class="img-thumbnail mt-2" width="150">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" required>{{ $client->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
