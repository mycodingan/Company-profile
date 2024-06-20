<style>
    .card {
        transition: transform 0.2s ease-in-out;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-img-top {
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        padding: 1.25rem;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #333;
    }

    .card-text {
        font-size: 1rem;
        color: #666;
        line-height: 1.5;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3; /* Jumlah baris yang ditampilkan sebelum terpotong */
        -webkit-box-orient: vertical;
    }
</style>

<div id="product" class="container-fluid p-5">
    <h1 class="text-center mb-4 mt-5 judul" style="color: rgb(15, 95, 15)">Product</h1>
    <div class="row justify-content-center">
        @foreach ($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card shadow rounded">
                <div class="card-img-top d-flex justify-content-center align-items-center border-bottom"
                    style="height: 250px;">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="card-body text-center d-flex flex-column justify-content-between border-top p-3">
                    <h5 class="card-title mb-3">{{ $product->title }}</h5>
                    <p class="card-text" id="content{{ $loop->index }}">{{ $product->content }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    // Mengatur tinggi maksimum untuk konten pada setiap card
    document.addEventListener('DOMContentLoaded', function () {
        let cardBodies = document.querySelectorAll('.card-body');
        cardBodies.forEach(function (cardBody) {
            let content = cardBody.querySelector('.card-text');
            let maxHeight = 100; // Tinggi maksimum dalam px
            if (content.offsetHeight > maxHeight) {
                content.style.maxHeight = maxHeight + 'px';
                content.style.overflow = 'hidden';
                content.style.textOverflow = 'ellipsis';
            }
        });
    });
</script>
