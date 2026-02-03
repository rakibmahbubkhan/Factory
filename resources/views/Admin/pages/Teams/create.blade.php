@extends('Admin.Partials.head')

@section('content')
        <div class="container-fluid page-body-wrapper pt-3 pt-md-0">
            <div class="content-wrapper">
                <div class="col-md-6 grid-margin stretch-card mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Team Member</h4>
                            <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input type="text" name="designation" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" name="facebook" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" name="twitter" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" name="instagram" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="link">Personal Link</label>
                                    <input type="text" name="link" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Add Member</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
