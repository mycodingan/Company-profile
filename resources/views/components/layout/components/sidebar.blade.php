<style>
  /* Gaya CSS untuk konten berada di tengah */
  .main-content {
    margin-left: 250px; /* Sesuaikan dengan lebar sidebar */
    margin-right: 50px; /* Berikan margin kanan untuk memberikan ruang */
  }

  /* Gaya CSS untuk sidebar */
  .sidenav {
    width: 250px; /* Lebar sidebar */
  }
</style>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html" target="_blank">
      {{-- <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo"> --}}
      <span class="ms-1 font-weight-bold">Lejar Bhumi Immaculata</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      {{-- home --}}
      <li class="nav-item">
        <a class="nav-link active" href="/">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-home"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      {{-- about --}}
      <li class="nav-item">
        <a class="nav-link active" href="/about">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-info-circle"></i>
          </div>
          <span class="nav-link-text ms-1">About</span>
        </a>
      </li>
      {{-- gallery --}}
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('gallery.index') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-images"></i>
          </div>
          <span class="nav-link-text ms-1">Gallery</span>
        </a>
      </li>
      {{-- company --}}
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('company.index') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-building"></i>
          </div>
          <span class="nav-link-text ms-1">Company</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
