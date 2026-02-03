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
                            <form action="{{ route('Admin.contact.reply', $contact->id) }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="email">Client's Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="message">Client's Message</label>
                                    <textarea class="form-control" id="message" rows="4" readonly>{{ $contact->message }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="reply">Your Reply</label>
                                    <textarea class="form-control" id="reply_message" name="reply_message" rows="4" required></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Send Reply</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
