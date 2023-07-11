<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="/dashboard" id="btndashboard">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/warga" id="btnwarga">
          <span data-feather="users"></span>
          Data Warga
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/data-surat" id="btnsurat">
          <span data-feather="file-text"></span>
          Data Surat
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/data-pengumuman" id="btnpengumuman">
          <span data-feather="send"></span>
          Data Pengumuman
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="/data-wilayah" id="btnwilayah">
          <span data-feather="map-pin"></span>
          Data Wilayah
        </a>
      </li> --}}
      <li class="nav-link">
        <form action="/logout" method="POST" class="text-left">
          @csrf
          <button type="submit" class="btn btn-danger">
            <i class="bi bi-box-arrow-left"></i>
            Logout
          </button>
        </form>
      </li>
    </ul>
  </div>
</nav>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
