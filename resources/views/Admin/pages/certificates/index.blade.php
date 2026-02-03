@extends('Admin.Partials.head')

@section('content')
    <div class="container">
        <div class="col-lg-12 grid-margin stretch-card pt-md-0" style="padding-top: 6rem;">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Certificates <a style="float: right;" href="{{ route('certificates.create') }}" class="btn btn-success">Add New Service</a></h4>
                    @if ($certificates->count())
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
                            @foreach ($certificates as $certificate)
                                <tr>
                                    <td>{{ $certificate->title }}</td>
                                    <td>
                                        @if($certificate->image)
                                            <img src="{{ asset('storage/' . $certificate->image) }}" alt="Image" class="img-thumbnail" width="100">
                                        @endif
                                    </td>
                                    <td>{{ $certificate->description }}</td>
                                    <td>
                                        <a href="{{ route('certificates.edit', $certificate->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('certificates.destroy', $certificate->id) }}" method="POST" style="display:inline-block;">
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
                            No certificates available. Please <a href="{{ route('certificates.create') }}">add a new certificate</a>.
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
@endsection
