@extends('Admin.Partials.head')
@section('content')

    <div class="container-fluid page-body-wrapper">
        <div class="content-wrapper">
            <div class="col-md-6 grid-margin stretch-card mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Statistic</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('statistics.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="experience">Experience</label>
                                <input type="number" name="experience" class="form-control" id="experience" required>
                            </div>

                            <div class="form-group">
                                <label for="members">Members</label>
                                <input type="number" name="members" class="form-control" id="members" required>
                            </div>

                            <div class="form-group">
                                <label for="clients">Clients</label>
                                <input type="number" name="clients" class="form-control" id="clients" required>
                            </div>

                            <div class="form-group">
                                <label for="projects">Projects</label>
                                <input type="number" name="projects" class="form-control" id="projects" required>
                            </div>

                            <div class="form-group">
                                <label for="created_by">Created By</label>
                                <input type="number" name="created_by" class="form-control" id="created_by" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Statistic</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
