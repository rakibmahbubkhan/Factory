@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sliders</h1>
        <a href="{{ route('sliders.create') }}" class="btn btn-primary">Add Slider</a>
        <table class="table table-bordered mt-3">
            <thead>
            <tr>
                <th>ID</th>
                <th>Sup Title</th>
                <th>Title</th>
                <th>Image</th>
                <th>Link</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sliders as $slider)
                <tr>
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->sup_title }}</td>
                    <td>{{ $slider->title }}</td>
                    <td>
                        @if($slider->image)
                            <img src="{{ asset('images/' . $slider->image) }}" alt="{{ $slider->title }}" width="100">
                        @endif
                    </td>
                    <td>{{ $slider->link }}</td>
                    <td>
                        <a href="{{ route('sliders.show', $slider->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
