    <div id="about" class="container mt-5">
        <div class="row">
            <div class="col-lg-12 text-center mb-4">
                <h2 class="judul" data-aos="fade-top">About</h2>
            </div>
            <div class="col-lg-6 about-section" data-aos="fade-right">
                <div class="about-content w-100">
                    <h1>{{ $about->title }}</h1>
                    <br>
                    <p class="content">{{ $about->content }}</p>
                </div>
            </div>
            
            <div class="col-lg-6 about-section" data-aos="fade-left">
                <div class="about-image w-100">
                    @if ($about->image)
                        <img src="{{ asset('storage/' . $about->image) }}" alt="About Image" class="img-fluid ">
                    @endif
                </div>
            </div>
        </div>
    </div>
