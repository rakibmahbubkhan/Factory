@extends('Admin.Partials.head')
@section('content')
    <div class="container">
        <h1>Client Feedbacks</h1>

        <a href="{{ route('clients-feedbacks.create') }}" class="btn btn-success mb-3">Add New Feedback</a>

        <table class="table">
            <thead>
            <tr>
                <th>Client Name</th>
                <th>Profession</th>
                <th>Image</th>
                <th>Feedback</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($clientsFeedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->client_name }}</td>
                    <td>{{ $feedback->profession }}</td>
                    <td>
                        @if ($feedback->image)
                            <img src="{{ asset('storage/' . $feedback->image) }}" alt="{{ $feedback->client_name }}" class="img-thumbnail" width="100">
                        @endif
                    </td>
                    <td>{{ Str::limit($feedback->feedback, 50) }}</td>
                    <td>{{ $feedback->isActive ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('clients-feedbacks.show', $feedback->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('clients-feedbacks.edit', $feedback->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('clients-feedbacks.destroy', $feedback->id) }}" method="POST" style="display:inline;">
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
@endsection
