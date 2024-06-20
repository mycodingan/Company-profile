<div id="galery" class="container-fluid gallery">
    <h1 style="font-weight: bold">Gallery</h1>
    <div class="row grid justify-content-center">
        @foreach ($gallery as $gallerys)
        <div class="col-lg-3 col-md-4 col-sm-6 figure-container" data-aos="fade-up">
            <figure class="effect-ming" onclick="openModal('{{ $gallerys->title }}', '{{ $gallerys->content }}', '{{ $gallerys->caption }}')">
                @if ($gallerys->image)
                    <img src="{{ asset('storage/' . $gallerys->image) }}" alt="{{ $gallerys->title }}" class="img-fluid">
                @endif
                <figcaption class="figure-caption">
                    <h2>{{ $gallerys->title }}</h2>
                    <p class="gallery-content">{{ $gallerys->content }}</p>
                    <p class="gallery-caption">{{ $gallerys->caption }}</p>
                </figcaption>
            </figure>
        </div>
        @endforeach
    </div>
</div>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="modalImageContainer" style="display: none;"> 
            <img src="{{ asset('path/to/default/image.jpg') }}" alt="Default Image" id="modalImage" style="max-width: 100%; max-height: 80vh;">
          </div>
        <div class="modal-text">
            <h2 id="modalTitle"></h2>
            <p id="modalContent"></p>
            <p id="modalCaption"></p>
        </div>
    </div>
</div>

<script>
    function openModal(title, content, caption) {
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalContent').textContent = content;
        document.getElementById('modalCaption').textContent = caption;
        document.querySelector('.modal').style.display = "block";
    }

    function closeModal() {
        document.querySelector('.modal').style.display = "none";
    }

    // AOS.init({
    //     duration: 1000,
    //     easing: 'ease',
    //     once: true
    // });
</script>
