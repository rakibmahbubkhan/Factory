@extends('Admin.Partials.head')

@section('content')
    <div class="container">
        <div class="col-lg-12 grid-margin stretch-card pt-md-0" style="padding-top: 6rem;">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Setting</h4>
                    @if ($company)
                        <h2>{{ $company->company_name }}</h2>
                        <p>{{ $company->address }}</p>
                        <p>Phones: @foreach ($company->phone as $phone)
                            {{ $phone }}
                            @endforeach
                        </p>
                        <p>Main Contact: {{ $company->main_contact }}</p>
                        <p>Email: {{ $company->email }}</p>
                        <!-- Display social media and other details -->
                        <p>Twitter: {{ $company->twitter }}</p>
                        <p>Facebook: {{ $company->facebook }}</p>
                        <p>LinkedIn: {{ $company->linkedin }}</p>
                        <p>Youtube: {{ $company->youtube }}</p>
                        <p>Map: {!! $company->map !!}</p>
                        <p>Opens From: {{ $company->opens_from }}</p>
                        <p>Ends In: {{ $company->ends_in }}</p>
                        <p>Opens At: {{ $company->opens_at }}</p>
                        <p>Ends At: {{ $company->ends_at }}</p>
                        <p>Copyright: {{ $company->copyright }}</p>

                        <a href="{{ route('Admin.setting.edit', $company->id) }}" class="btn btn-primary">Edit Company</a>
                    @else
                        <p>No company details available. <a href="{{ route('Admin.setting.create') }}" class="btn btn-primary">Create Company</a></p>
                    @endif


                </div>
            </div>
        </div>
    </div>
@endsection
