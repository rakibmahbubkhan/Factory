@extends('Admin.Partials.head')

@section('content')
    <div class="container">
        <div class="col-lg-12 grid-margin stretch-card pt-md-0" style="padding-top: 6rem;">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Contacts</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td>{{ $contact->message }}</td>
                                <td>{{ $contact->is_replied ? 'Replied' : 'Pending' }}</td>
                                <td style="display: flex">
                                    <form action="{{ route('Admin.contact.updateStatus', $contact->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-info"><i class="{{ $contact->is_replied ? 'mdi mdi-read' : 'mdi mdi-eye-off' }}"></i> </button>
                                    </form>
                                    <a href="{{ route('Admin.contact.reply', $contact->id) }}" class="btn btn-primary"><i class="mdi mdi-message-reply-text"></i></a>
                                    <!-- Delete Button/Form -->
                                    <form action="{{ route('Admin.contact.destroy', $contact->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this contact?');"><i class="mdi mdi-delete"></i></button>
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
@endsection
