@extends('Admin.Partials.head')
@section('content')

    <div class="container-fluid page-body-wrapper">
        <div class="content-wrapper">
            <div class="col-md-6 grid-margin stretch-card mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Statistic</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('statistics.update', $statistic->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="experience">Experience (years)</label>
                                <input type="number" name="experience" class="form-control" value="{{ $statistic->experience }}" required>
                            </div>

                            <div class="form-group">
                                <label for="members">Members</label>
                                <input type="number" name="members" class="form-control" value="{{ $statistic->members }}" required>
                            </div>

                            <div class="form-group">
                                <label for="clients">Clients</label>
                                <input type="number" name="clients" class="form-control" value="{{ $statistic->clients }}" required>
                            </div>

                            <div class="form-group">
                                <label for="projects">Projects</label>
                                <input type="number" name="projects" class="form-control" value="{{ $statistic->projects }}" required>
                            </div>

                            <div class="form-group">
                                <label for="updated_by">Updated By</label>
                                <input type="number" name="updated_by" class="form-control" value="{{ $statistic->updated_by }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Statistic</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
