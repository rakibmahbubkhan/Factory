@extends('Admin.Partials.head')
@section('content')

    <div class="container-fluid page-body-wrapper pt-3 pt-md-0">
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
                            <form action="{{ route('Admin.setting.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" class="form-control" id="logo" name="logo">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" id="address" name="address" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Contacts</label>
                                    <div id="phone-fields">
                                        <input type="text" class="form-control mb-2" name="phone[]" required>
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-2" onclick="addPhoneField()">Add More</button>
                                </div>
                                <div class="form-group">
                                    <label for="main_contact">Main Contact</label>
                                    <input type="text" class="form-control" id="main_contact" name="main_contact" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" class="form-control" id="twitter" name="twitter">
                                </div>
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" class="form-control" id="facebook" name="facebook">
                                </div>
                                <div class="form-group">
                                    <label for="linkedin">LinkedIn</label>
                                    <input type="text" class="form-control" id="linkedin" name="linkedin">
                                </div>
                                <div class="form-group">
                                    <label for="youtube">YouTube</label>
                                    <input type="text" class="form-control" id="youtube" name="youtube">
                                </div>
                                <div class="form-group">
                                    <label for="map">Map Embed Code</label>
                                    <textarea class="form-control" id="map" name="map"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="opens_from">Opens From</label>
                                    <input type="text" class="form-control" id="opens_from" name="opens_from" required>
                                </div>
                                <div class="form-group">
                                    <label for="ends_in">Ends In</label>
                                    <input type="text" class="form-control" id="ends_in" name="ends_in" required>
                                </div>
                                <div class="form-group">
                                    <label for="opens_at">Opens At</label>
                                    <input type="time" class="form-control" id="opens_at" name="opens_at" required>
                                </div>
                                <div class="form-group">
                                    <label for="ends_at">Ends At</label>
                                    <input type="time" class="form-control" id="ends_at" name="ends_at" required>
                                </div>
                                <div class="form-group">
                                    <label for="copyright">Copyright</label>
                                    <input type="text" class="form-control" id="copyright" name="copyright">
                                </div>

                                <button type="submit" class="btn btn-primary">Create Company</button>
                            </form>
                    </div>
        </div>
    </div>
    </div>

        <script>
            function addPhoneField() {
                const phoneFields = document.getElementById('phone-fields');
                const newField = document.createElement('input');
                newField.type = 'text';
                newField.name = 'phone[]';
                newField.className = 'form-control mb-2';
                phoneFields.appendChild(newField);
            }
        </script>
@endsection
