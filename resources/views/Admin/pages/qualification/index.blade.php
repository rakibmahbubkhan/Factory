@extends('Admin.Partials.head')
@section('content')
    <div class="container">
        <h1>Homeabout</h1>
        @if ($qualification)
            <table class="table table-bordered">
                <tr>
                    <th>Title</th>
                    <td>{{ $qualification->title }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $qualification->description }}</td>
                </tr>
                <tr>
                    <th>Tile 1</th>
                    <td>{{ $qualification->Tile1 }}</td>
                </tr>
                <tr>
                    <th>Tile Description 1</th>
                    <td>{{ $qualification->{'Tile description1'} }}</td>
                </tr>
                <tr>
                    <th>Tile 2</th>
                    <td>{{ $qualification->Tile2 }}</td>
                </tr>
                <tr>
                    <th>Tile Description 2</th>
                    <td>{{ $qualification->{'Tile description2'} }}</td>
                </tr>
                <tr>
                    <th>Tile 3</th>
                    <td>{{ $qualification->Tile3 }}</td>
                </tr>
                <tr>
                    <th>Tile Description 3</th>
                    <td>{{ $qualification->{'Tile description3'} }}</td>
                </tr>
                <tr>
                    <th>Tile 4</th>
                    <td>{{ $qualification->Tile4 }}</td>
                </tr>
                <tr>
                    <th>Tile Description 4</th>
                    <td>{{ $qualification->{'Tile description4'} }}</td>
                </tr>
                <tr>
                    <th>Thumbnail</th>
                    <td>
                        @if ($qualification->thumbnail)
                            <img src="{{ asset('storage/' . $qualification->thumbnail) }}" alt="Thumbnail" class="img-thumbnail" width="150">
                        @else
                            No Thumbnail
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Video Link</th>
                    <td>{{ $qualification->video_link }}</td>
                </tr>
            </table>

            <a href="{{ route('qualification.edit', $qualification->id) }}" class="btn btn-primary">Edit</a>
        @else
            <p>No Qualification record found. <a href="{{ route('qualification.create') }}">Create one now</a>.</p>
        @endif
    </div>
@endsection
