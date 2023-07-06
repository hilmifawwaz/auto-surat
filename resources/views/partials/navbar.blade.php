<header>
  <nav class="navbar navbar-light" style="background-color: #3C8DBC">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <img src="img/logo.png" alt="gambar_keren" width="100%" height="85" class="d-inline-block align-text-top">
      </a>
    </div>
  </nav>
  <nav class="navbar navbar-light" style="background-color: #186D9D">
    <div class="container-fluid">
      <a href="/how-to" class="btn btn-primary" id="btnTutor" style="background-color: #3C8DBC">
        <span class="bi bi-question-circle"></span>
        Cara Penggunaan
      </a>
      <a href="/" type="button" class="btn btn-primary" id="btnBack" style="background-color: #3C8DBC" style="display: none">
        <i class="bi bi-arrow-left-circle"></i>
        Kembali
      </a>
      <button class="btn btn-primary" style="background-color: #3C8DBC" onclick="login1()" id="btnLogin">
        <span class="bi bi-box-arrow-in-right"></span>
        LOGIN
      </button>
    </div>
  </nav>
</header>

{{-- <script>
  document.getElementById('btnBack').addEventListener('click', function() {
  // Kirim permintaan ke route untuk menghapus session
    fetch('/back')
        .then(function(response) {
      if (response.ok) {
          // Refresh halaman setelah session dihapus
          window.location = '/'
      }
    });
  });
</script> --}}
{{-- <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> --}}
