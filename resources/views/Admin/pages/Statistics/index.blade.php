@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Statistics</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($statistics)
            <table class="table">
                <thead>
                <tr>
                    <th>Experience</th>
                    <th>Members</th>
                    <th>Clients</th>
                    <th>Projects</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $statistics->experience }} years</td>
                    <td>{{ $statistics->members }}</td>
                    <td>{{ $statistics->clients }}</td>
                    <td>{{ $statistics->projects }}</td>
                    <td>
                        <a href="{{ route('statistics.edit', $statistics->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
                </tbody>
            </table>
        @else
            <a href="{{ route('statistics.create') }}" class="btn btn-primary">Create Statistic</a>
        @endif
    </div>
@endsection
