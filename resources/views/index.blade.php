@extends('layout.main')
{{-- @include('{{ asset('./js/index') }}'); --}}
<style>
  .card{
    text-decoration:none;
  }
</style>
@section('main-content')
  <div class="card mt-3 mb-5">
    <div class="card-header text-light text-bold" style="background-color: #3C8DBC">
      <b>Papan Informasi</b>
    </div>
    <div class="card-body" style="width: 100%; height: 100%">
      <div class="container-fluid">
        <a href="/" class="card mt-2 text-muted">
          <div class="card-body">
            <h5>Pengumuman 1</h5>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos vel voluptatem porro quisquam aspernatur atque doloribus totam provident! Totam, eum. Ipsa fuga laborum velit porro nobis voluptates. Dolor, minima quo.</p>
          </div>
        </a>
        <a href="/" class="card mt-2 text-muted">
          <div class="card-body">
            <h5>Pengumuman 2</h5>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos vel voluptatem porro quisquam aspernatur atque doloribus totam provident! Totam, eum. Ipsa fuga laborum velit porro nobis voluptates. Dolor, minima quo.</p>
          </div>
        </a>
        <a href="/" class="card mt-2 text-muted">
          <div class="card-body">
            <h5>Pengumuman 3</h5>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos vel voluptatem porro quisquam aspernatur atque doloribus totam provident! Totam, eum. Ipsa fuga laborum velit porro nobis voluptates. Dolor, minima quo.</p>
          </div>
        </a>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 mb-3">
        <a href="#surat" class="card" id="btnPengajuan" onclick="pengajuan()">
          <div class="card-body" style="background-color: #3C8DBC">
            <b class="text-light">Surat Keterangan Penelitian</b>
          </div>
          <div class="card-footer text-center text-light" style="background-color: #186D9D; height: 20%">
            Ajukan
            <i class="bi bi-arrow-right-circle-fill"></i>
          </div>
        </a>
      </div>
      <div class="col-md-3 mb-3">
        <a href="#surat" class="card" id="btnPengajuan" onclick="pengajuan()">
          <div class="card-body" style="background-color: #3C8DBC">
            <b class="text-light">Surat Keterangan Penelitian</b>
          </div>
          <div class="card-footer text-center text-light" style="background-color: #186D9D; height: 20%">
            Ajukan
            <i class="bi bi-arrow-right-circle-fill"></i>
          </div>
        </a>
      </div>
      <div class="col-md-3 mb-3">
        <a href="#surat" class="card" id="btnPengajuan" onclick="pengajuan()">
          <div class="card-body" style="background-color: #3C8DBC">
            <b class="text-light">Surat Keterangan Penelitian</b>
          </div>
          <div class="card-footer text-center text-light" style="background-color: #186D9D; height: 20%">
            Ajukan
            <i class="bi bi-arrow-right-circle-fill"></i>
          </div>
        </a>
      </div>
      <div class="col-md-3 mb-3">
        <a href="#surat" class="card" id="btnPengajuan" onclick="pengajuan()">
          <div class="card-body" style="background-color: #3C8DBC">
            <b class="text-light">Surat Keterangan Penelitian</b>
          </div>
          <div class="card-footer text-center text-light" style="background-color: #186D9D; height: 20%">
            Ajukan
            <i class="bi bi-arrow-right-circle-fill"></i>
          </div>
        </a>
      </div>
    </div>
  </div>

@endsection

{{-- MODAL --}}
<div class="modal fade" id="modalData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/surat" method="POST" id="formSurat">
          @csrf
          <div class="form-group col-md-12">
            <label for="nama" class="control-label" style="font-weight:bold">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Lengkap">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="nik" class="control-label" style="font-weight:bold">NIK</label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK">
          </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary mt-2" id="btnAjukan" style="background-color: #3C8DBC; font-weight:bold; width: 100%">Ajukan</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

{{-- LOGIN --}}
<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/surat" method="POST" id="formLogin">
          @csrf
          <div class="form-group col-md-12">
            <label for="username" class="control-label" style="font-weight:bold">Username</label>
            <input type="text" class="form-control" name="name" id="username" placeholder="Masukkan Username">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="passwd" class="control-label" style="font-weight:bold">Password</label>
            <input type="password" class="form-control" name="password" id="passwd" placeholder="Masukkan Password">
          </div>
        </form>
        <div class="col-md-12">
          <button type="button" class="btn btn-primary" id="btnLogin" style="background-color: #3C8DBC; font-weight:bold; width: 100%" onclick="login()">Login</button>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
<script>
  const title = $('#modalTitle');
  const modal = $('#modalData');
  const formSurat = $('#formSurat');
  const modalLogin = $('#modalLogin');
  const formLogin = $('#formLogin');

  function pengajuan(){
    $('#modalData').modal('show');
    title.html('Pengajuan');
    $('#btnAjukan').show();
  }

  function login1(){
    $('#modalLogin').modal('show');
    formLogin[0].reset();
  }

  function login(){
    // $.ajaxSetup({
    //   headers:{
    //     'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content');
    //   }
    // });

    $.ajax({
      type: "POST",
      url: "/login",
      data: formLogin.serialize(),

      beforeSend: function(){
        $('#btnLogin').attr('disabled', true);
        $('#btnLogin').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
      },

      complete: function(){
        $('#btnLogin').attr('disabled', false);
        $('#btnLogin').html('Login');
      },

      success: function(response){
        console.log(response);
        if(response.status == 'success'){
          window.location = "/admin";
        }
        else{
          Swal.fire({
            icon: 'error',
            title: 'Login Gagal!',
            showConfirmButton: false,
            timer: 1500
          })
        }
      }
    })
  }
</script>