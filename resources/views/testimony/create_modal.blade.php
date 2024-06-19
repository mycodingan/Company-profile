<div class="modal fade" id="createTestimonyModal" tabindex="-1" aria-labelledby="createTestimonyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTestimonyModalLabel">Add Testimony</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('testimony.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_pengisi" class="form-label">Nama Pengisi</label>
                        <input type="text" class="form-control" id="nama_pengisi" name="nama_pengisi">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_mengisi" class="form-label">Tanggal Mengisi</label>
                        <input type="date" class="form-control" id="tanggal_mengisi" name="tanggal_mengisi">
                    </div>
                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Testimoni</label>
                        <textarea class="form-control" id="isi" name="isi" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
