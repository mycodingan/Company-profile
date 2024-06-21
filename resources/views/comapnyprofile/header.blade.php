
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow custom-navbar">
    <a class="navbar-brand logo" href="#" style="color: green">{{ $company->website_name }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#galery">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#product">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#testi">Testimony</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="#visi">Visi Misi</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Video container -->
<div class="video-container">
    <video id="headerVideo" src="{{ asset('vidio/header2.mp4') }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen muted></video>
    <div class="overlay"></div>
    <div class="welcome-message">
        Selamat Datang di Website <br>{{ $company->website_name }}
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        var video = document.getElementById('headerVideo');
        video.autoplay = true;
        video.loop = true;
        video.load();
    });

    window.addEventListener('scroll', function() {
        var navbar = document.querySelector('.navbar');
        if (window.scrollY > 0) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
    $(document).ready(function() {
        // Handler untuk setiap klik pada item navbar
        $('.navbar-nav a.nav-link').on('click', function(event) {
            // Cegah default anchor link behavior
            event.preventDefault();

            // Ambil target scroll dari atribut href
            var target = $(this).attr('href');

            // Animasikan scroll ke target
            $('html, body').animate({
                scrollTop: $(target).offset().top
            }, 800, function() {
                // Ubah URL jika perlu menggunakan history API
                window.location.hash = target;
            });
        });
    });
</script>
