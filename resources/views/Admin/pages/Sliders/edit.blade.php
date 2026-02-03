@extends('Admin.Partials.head')
@section('content')


    <div class="container-fluid page-body-wrapper">
        <div class="content-wrapper">
            <div class="col-md-6 grid-margin stretch-card mx-auto">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h4 class="card-title">Edit Slider</h4>
                        <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="sup_title">Sup Title</label>
                                <input type="text" name="sup_title" class="form-control" id="sup_title" value="{{ $slider->sup_title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" value="{{ $slider->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                                @if($slider->image)
                                    <img src="{{ asset('images/'.$slider->image) }}" alt="{{ $slider->title }}" width="100">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" name="link" class="form-control" id="link" value="{{ $slider->link }}" required>
                            </div>
                            {{--            <div class="form-group">--}}
                            {{--                <label for="updated_by">Updated By</label>--}}
                            {{--                <input type="number" name="updated_by" class="form-control" id="updated_by" value="{{ $slider->updated_by }}" required>--}}
                            {{--            </div>--}}
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
