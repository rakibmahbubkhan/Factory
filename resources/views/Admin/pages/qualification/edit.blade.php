@extends('Admin.Partials.head')
@section('content')

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container-fluid page-body-wrapper">
        <div class="content-wrapper">
            <div class="col-md-6 grid-margin stretch-card mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Qualification</h4>
                        <form action="{{ route('qualification.update', $qualification->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('Admin.pages.qualification.form')
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
