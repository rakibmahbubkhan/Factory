@extends('Admin.Partials.head')

@section('content')
    <div class="container pt-md-0" style="padding-top: 6rem;">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">News <a style="float: right;" href="{{ route('news.create') }}" class="btn btn-success">Add New News</a></h4>
                    @if ($news->count())
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Image 1</th>
                                <th>Image 2</th>
                                <th>Image 3</th>
                                <th>Description</th>
                                <th>Link</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($news as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        @if ($item->image1)
                                            <img src="{{ asset('storage/' . $item->image1) }}" alt="Image 1" class="img-thumbnail" width="100">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->image2)
                                            <img src="{{ asset('storage/' . $item->image2) }}" alt="Image 2" class="img-thumbnail" width="100">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->image3)
                                            <img src="{{ asset('storage/' . $item->image3) }}" alt="Image 3" class="img-thumbnail" width="100">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($item->description, 100) }}</td>
                                    <td><a href="{{ $item->link }}" target="_blank">{{ $item->link }}</a></td>
                                    <td>
                                        <a href="{{ route('news.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this news?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No news found.</p>
                    @endif


                </div>
            </div>
        </div>
    </div>
@endsection
