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
                        <h4 class="card-title">Add New Feedback</h4>
                        <form action="{{ route('clients-feedbacks.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="client_name">Client Name</label>
                                <input type="text" name="client_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="profession">Profession</label>
                                <input type="text" name="profession" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="feedback">Feedback</label>
                                <textarea name="feedback" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="isActive">Active</label>
                                <input type="checkbox" name="isActive" value="1" checked>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Feedback</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
