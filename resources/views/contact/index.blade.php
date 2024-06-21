@extends('components.admin.dhasboard')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Contact List</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-white">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Created At</th>
                    <th>Actions</th> <!-- Kolom untuk tombol edit dan delete -->
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>{{ $contact->created_at }}</td>
                        <td>
                            <!-- Tombol edit untuk menampilkan modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $contact->id }}">Edit</button>
                            
                            <!-- Tombol delete untuk menghapus data -->
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal untuk edit -->
                    <div class="modal fade" id="editModal{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $contact->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $contact->id }}">Edit Contact</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form untuk edit -->
                                    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="editName">Name</label>
                                            <input type="text" class="form-control" id="editName" name="name" value="{{ $contact->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="editMessage">Message</label>
                                            <textarea class="form-control" id="editMessage" name="message" rows="3" required>{{ $contact->message }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
