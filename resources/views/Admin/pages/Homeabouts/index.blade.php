@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Homeabout</h1>
        @if($homeabout)
            <a href="{{ route('homeabouts.edit', $homeabout->id) }}" class="btn btn-warning">Edit Homeabout</a>
            <table class="table table-bordered mt-3">
                <tr>
                    <th>Title</th>
                    <td>{{ $homeabout->title }}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        @if($homeabout->image)
                            <img src="{{ asset('images/' . $homeabout->image) }}" alt="{{ $homeabout->title }}" width="100">
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Content</th>
                    <td>{{ $homeabout->content }}</td>
                </tr>
                <tr>
                    <th>Experience</th>
                    <td>{{ $homeabout->experience }} years</td>
                </tr>
                <tr>
                    <th>Features</th>
                    <td>{!! nl2br(e($homeabout->features)) !!}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $homeabout->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $homeabout->phone }}</td>
                </tr>
            </table>
        @else
            <a href="{{ route('homeabouts.create') }}" class="btn btn-primary">Add Homeabout</a>
        @endif
    </div>
@endsection
