<div class="modal fade" id="editTestimonyModal{{ $testimony->id }}" tabindex="-1" aria-labelledby="editTestimonyModalLabel{{ $testimony->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTestimonyModalLabel{{ $testimony->id }}">Edit Testimony</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('testimony.update', $testimony->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama_pengisi" class="form-label">Nama Pengisi</label>
                        <input type="text" class="form-control" id="nama_pengisi" name="nama_pengisi" value="{{ $testimony->nama_pengisi }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_mengisi" class="form-label">Tanggal Mengisi</label>
                        <input type="date" class="form-control" id="tanggal_mengisi" name="tanggal_mengisi" value="{{ $testimony->tanggal_mengisi }}">
                    </div>
                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Testimoni</label>
                        <textarea class="form-control" id="isi" name="isi" rows="3">{{ $testimony->isi }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
