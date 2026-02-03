@extends('Admin.Partials.head')

@section('content')
    <div class="container">
        <div class="col-lg-12 grid-margin stretch-card pt-md-0" style="padding-top: 6rem;">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">clients <a style="float: right;" href="{{ route('clients.create') }}" class="btn btn-success">Add New client</a></h4>
                    @if ($clients->count())
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->title }}</td>
                                    <td>
                                        @if($client->image1)
                                            <img src="{{ asset('storage/' . $client->image1) }}" alt="Image" class="img-thumbnail" width="100">
                                        @endif
                                    </td>
                                    <td>{{ $client->description }}</td>
                                    <td>
                                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning">
                            No clients available. Please <a href="{{ route('clients.create') }}">add a new client</a>.
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
@endsection
