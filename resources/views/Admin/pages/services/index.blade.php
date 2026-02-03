@extends('Admin.Partials.head')

@section('content')
    <div class="container">
        <div class="col-lg-12 grid-margin stretch-card pt-md-0" style="padding-top: 6rem;">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Services <a style="float: right;" href="{{ route('services.create') }}" class="btn btn-success">Add New Service</a></h4>
                    @if ($services->count())
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
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $service->title }}</td>
                                    <td>
                                        @if($service->image1)
                                            <img src="{{ asset('storage/' . $service->image1) }}" alt="Image" class="img-thumbnail" width="100">
                                        @endif
                                    </td>
                                    <td>{{ $service->description }}</td>
                                    <td>
                                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline-block;">
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
                            No services available. Please <a href="{{ route('services.create') }}">add a new service</a>.
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
@endsection
