@extends('Admin.Partials.head')
@section('content')
    <div class="container">

    <div class="col-lg-12 grid-margin stretch-card pt-md-0" style="padding-top: 6rem;">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">About Section</h4>
                <div class="table-responsive">
                    @if ($about)
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Image 1</th>
                            <th>Image 2</th>
                            <th>Content</th>
                            <th>Experience (Years)</th>
                            <th>Features</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $about->title }}</td>
                            <td>
                                @if($about->image1)
                                    <img src="{{ asset('storage/' . $about->image1) }}" alt="Image 1" class="img-thumbnail" width="100">
                                @endif
                            </td>
                            <td>
                                @if($about->image2)
                                    <img src="{{ asset('storage/' . $about->image2) }}" alt="Image 2" class="img-thumbnail" width="100">
                                @endif
                            </td>
                            <td>{!! $about->content !!}</td>
                            <td>{{ $about->experience }}</td>
                            <td>{!! nl2br(e($about->features)) !!}</td>
                            <td>{{ $about->email }}</td>
                            <td>{{ $about->phone }}</td>
                            <td>
                                <a href="{{ route('about.edit', $about->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    @else

                        <div class="alert alert-warning">
                            <p>No data found. Please <a class="btn btn-success" href="{{ route('about.create') }}">create</a> the about section.</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
