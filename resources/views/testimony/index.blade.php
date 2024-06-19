@extends('components.admin.dhasboard')

@section('content')
<style>
    .testimony-content {
        max-width: 400px; /* Ubah lebar maksimum sesuai kebutuhan */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>

<!-- JavaScript for auto-dismissing the alert -->
<script>
    window.onload = function () {
        setTimeout(function () {
            document.getElementById('alertMessage').style.display = 'none';
        }, 2000); // Menghilangkan alert setelah 2 detik (2000 milidetik)
    };
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Testimonies</div>

                <div class="card-body">
                    <!-- Alert for success message -->
                    @if (session('success'))
                        <div id="alertMessage" class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTestimonyModal">
                            Add Testimony
                        </button>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Pengisi</th>
                                <th>Tanggal Mengisi</th>
                                <th>Isi Testimoni</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($testimonies as $testimony)
                                <tr>
                                    <td>{{ $testimony->nama_pengisi }}</td>
                                    <td>{{ $testimony->tanggal_mengisi }}</td>
                                    <td class="testimony-content">{{ $testimony->isi }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="button" class="btn btn-sm btn-warning me-2" data-bs-toggle="modal" data-bs-target="#editTestimonyModal{{ $testimony->id }}">
                                                Edit
                                            </button>
                                            <form action="{{ route('testimony.destroy', $testimony->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this testimony?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No testimonies found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for creating testimonial -->
@include('testimony.create_modal')

<!-- Modals for editing testimonial -->
@foreach ($testimonies as $testimony)
    @include('testimony.edit_modal', ['testimony' => $testimony])
@endforeach

@endsection
