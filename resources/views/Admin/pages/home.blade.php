@extends('Admin.Partials.head')
@section('content')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }

        thead, tbody tr {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        tbody {
            display: block;
            max-height: 500px;
            min-height: 500px;
            overflow: auto;
            width: 100%;
        }
    </style>

    <div class="container-fluid pt-md-0" style="padding-top: 6rem;">
        <div class="row pt-5">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sliders <a href="{{ route('sliders.create') }}" style="position: relative;left: 50%;" class="btn btn-primary mb-2">Add Slider</a></h4>
                        <div class="table-responsive">

                            <table class="table table-striped">
                                <thead>
                                <tr class="table-success">
                                    <th class="text-center" style="width: 5%;">ID</th>
                                    <th class="text-center" style="width: 15%;">Sup Title</th>
                                    <th class="text-center" style="width: 25%;">Description</th>
                                    <th class="text-center" style="width: 12%;">Image</th>
                                    <th class="text-center" style="width: 10%;">Link</th>
                                    <th class="text-center" style="width: 33%;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sliders as $slider)
                                    <tr>
                                        <td class="text-center" style="width: 5%;">{{ $slider->id }}</td>
                                        <td class="text-center" style="width: 15%;">{{ $slider->sup_title }}</td>
                                        <td class="text-center" style="width: 25%;">{{ $slider->title }}</td>
                                        <td class="text-center" style="width: 12%;">
                                            @if($slider->image)
                                                <img src="{{ asset('images/' . $slider->image) }}" alt="{{ $slider->title }}" width="100">
                                            @endif
                                        </td>
                                        <td class="text-center" style="width: 10%;">{{ $slider->link }}</td>
                                        <td class="text-center" style="width: 33%;">
                                            {{--                                <a href="{{ route('sliders.show', $slider->id) }}" class="btn btn-info"><span class="mdi mdi-eye"></span></a>--}}
                                            <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-warning"><span class="mdi mdi-lead-pencil"></span></a>
                                            <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><span class="mdi mdi-delete"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if($homeabout)
                            <h4 class="card-title">About <a href="{{ route('homeabouts.edit', $homeabout->id) }}" class="btn btn-warning" style="float: right">Edit Homeabout</a></h4>
                            <div class="table-responsive">

                                <table class="table table-striped">
                                    <tr>
                                        <th style="width: 20%">Title</th>
                                        <td>{{ $homeabout->title }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20%">Image1</th>
                                        <td>
                                            @if($homeabout->image1)
                                                <img src="{{ asset('images/' . $homeabout->image1) }}" alt="{{ $homeabout->title }}" width="100">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20%">Image2</th>
                                        <td>
                                            @if($homeabout->image2)
                                                <img src="{{ asset('images/' . $homeabout->image2) }}" alt="{{ $homeabout->title }}" width="100">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20%">Content</th>
                                        <td>{{ $homeabout->content }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20%">Experience</th>
                                        <td>{{ $homeabout->experience }} years</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20%">Features</th>
                                        <td>{!! nl2br(e($homeabout->features)) !!}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20%">Email</th>
                                        <td>{{ $homeabout->email }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20%">Phone</th>
                                        <td>{{ $homeabout->phone }}</td>
                                    </tr>
                                </table>

                                @else
                                    <p>No About section created yet.</p>
                                    <a href="{{ route('homeabouts.create') }}" class="btn btn-primary">Add About</a>
                                @endif


                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Statistics </h4>
                        @if($statistic)
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Experience</th>
                                    <th>Members</th>
                                    <th>Clients</th>
                                    <th>Projects</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $statistic->experience }} years</td>
                                    <td>{{ $statistic->members }}</td>
                                    <td>{{ $statistic->clients }}</td>
                                    <td>{{ $statistic->projects }}</td>
                                    <td>
                                        <a href="{{ route('statistics.edit', $statistic->id) }}" class="btn btn-warning">Edit</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        @else
                            <a href="{{ route('statistics.create') }}" class="btn btn-primary">Create Statistic</a>
                        @endif


                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Client Feedback <a href="{{ route('clients-feedbacks.create') }}" class="btn btn-success mb-3"  style="float: right">Add New Feedback</a></h4>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Client Name</th>
                                <th>Profession</th>
                                <th>Feedback</th>
                                <th>Active</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clientsFeedbacks as $feedback)
                                <tr>
                                    <td>
                                        @if ($feedback->image)
                                            <img src="{{ asset('storage/' . $feedback->image) }}" alt="{{ $feedback->client_name }}" class="img-thumbnail" width="100">
                                        @endif
                                    </td>
                                    <td>{{ $feedback->client_name }}</td>
                                    <td>{{ $feedback->profession }}</td>
                                    <td>{{ $feedback->feedback }}</td>
                                    <td>{{ $feedback->isActive ? 'Yes' : 'No' }}</td>
                                    <td>
                                        <a href="{{ route('clients-feedbacks.edit', $feedback->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('clients-feedbacks.destroy', $feedback->id) }}" method="POST" class="d-inline">
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
                </div>
            </div>

        </div>

        <div class="row pt-5">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if ($qualification)
                            <h4 class="card-title">Why Us <a href="{{ route('qualification.edit', $qualification->id) }}" class="btn btn-primary">Edit</a>
                            </h4>
                            <div class="table-responsive">


                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Title</th>
                                            <td>{{ $qualification->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td>{{ $qualification->description }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tile 1</th>
                                            <td>{{ $qualification->Tile1 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tile Description 1</th>
                                            <td>{{ $qualification->{'Tile_description1'} }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tile 2</th>
                                            <td>{{ $qualification->Tile2 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tile Description 2</th>
                                            <td>{{ $qualification->{'Tile_description2'} }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tile 3</th>
                                            <td>{{ $qualification->Tile3 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tile Description 3</th>
                                            <td>{{ $qualification->{'Tile_description3'} }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tile 4</th>
                                            <td>{{ $qualification->Tile4 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tile Description 4</th>
                                            <td>{{ $qualification->{'Tile_description4'} }}</td>
                                        </tr>
                                        <tr>
                                            <th>Thumbnail</th>
                                            <td><img src="{{ asset('storage/' . $qualification->thumbnail) }}" alt="Thumbnail" width="100"></td>
                                        </tr>
                                        <tr>
                                            <th>Video Link</th>
                                            <td>{{ $qualification->video_link }}</td>
                                        </tr>
                                    </table>

                                    {{-- Edit Button --}}

                                @else
                                    <p>No Qualification record found.</p>

                                    {{-- Create Button --}}
                                    <a href="{{ route('qualification.create') }}" class="btn btn-success">Create New Qualification</a>
                                @endif


                            </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
