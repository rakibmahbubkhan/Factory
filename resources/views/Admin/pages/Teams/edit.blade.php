@extends('Admin.Partials.head')
@section('content')
        <div class="container-fluid page-body-wrapper pt-3 pt-md-0">
            <div class="content-wrapper">
                <div class="col-md-6 grid-margin stretch-card mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Team Member</h4>
                            <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $team->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input type="text" name="designation" class="form-control" value="{{ $team->designation }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @if ($team->image)
                                        <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}" class="img-thumbnail mt-2" width="100">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="url" name="facebook" class="form-control" value="{{ $team->facebook }}">
                                </div>
                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <input type="url" name="twitter" class="form-control" value="{{ $team->twitter }}">
                                </div>
                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <input type="url" name="instagram" class="form-control" value="{{ $team->instagram }}">
                                </div>
                                <div class="form-group">
                                    <label for="link">Personal Link</label>
                                    <input type="url" name="link" class="form-control" value="{{ $team->link }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Update Member</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
