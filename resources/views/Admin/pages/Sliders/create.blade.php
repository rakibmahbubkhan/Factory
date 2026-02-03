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
                        <h4 class="card-title">Add Slider</h4>
                        <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                            @csrf
                            <div class="form-group">
                                <label for="sup_title">Sup Title</label>
                                <input type="text" name="sup_title" class="form-control" id="sup_title" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control" id="image" required>
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" name="link" class="form-control" id="link" required>
                            </div>
                            {{--            <div class="form-group">--}}
                            {{--                <label for="created_by">Created By</label>--}}
                            {{--                <input type="number" name="created_by" class="form-control" id="created_by" required>--}}
                            {{--            </div>--}}
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
