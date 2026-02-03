@extends('Admin.Partials.head')

@section('content')
    <div class="container pt-md-0" style="padding-top: 6rem;">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Team Members
                        <a style="position: relative; left: 50%" href="{{ route('teams.create') }}" class="btn btn-warning mb-3">Add New Member</a>
                    </h4>

                    <div class="table-responsive">
                        <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($teams as $team)
                                    <tr>
                                        <td>{{ $team->name }}</td>
                                        <td>{{ $team->designation }}</td>
                                        <td>
                                            @if ($team->image)
                                                <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}" class="img-thumbnail" width="100">
                                            @endif
                                        </td>
                                        <td>
                                            {{--                        <a href="{{ route('teams.show', $team->id) }}" class="btn btn-info btn-sm">View</a>--}}
                                            <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                    </div>


                </div>
            </div>
        </div>


    </div>
@endsection
