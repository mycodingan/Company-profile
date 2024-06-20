<div class="container-fluid testi p-5" id="testi">
    <h2 class="mb-4 mt-3 text-center judul">Testimony</h2>
    <div class="row">
        @forelse ($testimonies as $testimony)
            <div class="col-md-4 mb-4">
                <div class="card testimonial-card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $testimony->nama_pengisi }}</h5>
                        <blockquote class="blockquote">
                            <p class="mb-0">{{ $testimony->isi }}</p>
                        </blockquote>
                        <div class="text-muted testimonial-date">
                            {{ $testimony->tanggal_mengisi }}
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Tidak ada testimonial yang tersedia.</p>
        @endforelse
    </div>
</div>


<style>
    .testi{
        background-color: #cbffeeac;
    }
    .card-container {
    width: 20%;
    text-align: center;
}

.testimonial-card {
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
    min-height: 150px;
}

.testimonial-card:hover {
    transform: translateY(-5px);
}

.blockquote {
    font-size: 18px;
    font-style: italic;
    border-left: 5px solid #288b6c;
    padding-left: 5px;
    margin-bottom: 0;
}   

.testimonial-date {
    font-size: 14px;
    color: #888;
    margin-top: 10px;
}

</style>