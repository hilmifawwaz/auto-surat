@extends('layout.main')
{{-- @include('{{ asset('./js/index') }}'); --}}
<style>
  .container {
  width: 300px;
  height: 400px;
  overflow: auto;
  }

  .card{
    width: 100%;
    height: auto;
    text-decoration:none;
  }

  .card-1 {
  width: 100%;
  height: auto;
  }
</style>
@section('main-content')
  <div class="card mt-3 mb-5 card-1">
    <div class="card-header text-light text-bold" style="background-color: #3C8DBC">
      <b>Papan Informasi</b>
    </div>
    <div class="card-body" style="width: 100%; height: 100%">
      <div class="container-fluid">
        @foreach ($datap as $p)
        <a href="/" class="card mt-2 text-muted">
          <div class="card-body">
            <h5>{{ $p->judul }}</h5>
            <p>{{ $p->isi }}</p>
          </div>
        </a>
        @endforeach
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      @foreach($datas as $s)
      <div class="col-md-3 mb-3">
        <a href="#surat" class="card tombol-surat" id="btnPengajuan" onclick="pengajuan({{ $s->id_surat }})">
          <div class="card-body" style="background-color: #3C8DBC">
            <b class="text-light">{{ $s->nama_surat }}</b>
          </div>
          <div class="card-footer text-center text-light" style="background-color: #186D9D; height: 20%">
            Ajukan
            <i class="bi bi-arrow-right-circle-fill"></i>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
  {{-- @include('admin.layout.footer') --}}

@endsection

{{-- MODAL AUTH --}}
<div class="modal fade" id="modalData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST" id="formSurat">
          @csrf
          <div class="form-group col-md-12">
            <label for="nama" class="control-label" style="font-weight:bold">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap Sesuai KTP/KK">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="nik" class="control-label" style="font-weight:bold">NIK</label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK Sesuai KTP/KK">
          </div>
          <div class="form-group col-md-12 mt-2">
            {{-- <label for="id_surat" class="control-label" style="font-weight:bold">Keperluan</label> --}}
            <input type="hidden" class="form-control" name="id_surat" id="id_surat">
          </div>
        <div class="col-md-12">
          <button type="button" class="btn btn-primary mt-2" id="btnAuth" style="background-color: #3C8DBC; font-weight:bold; width: 100%" onclick="auth()">
            Selanjutnya
            <i class="bi bi-chevron-double-right"></i>
          </button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

{{-- MODAL PENGAJUAN --}}
<div class="modal fade" id="modalPengajuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Verifikasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/surat" method="POST" id="formPengajuan">
          @csrf
          <table class="table table-borderless" style="width: 100%">
            <tbody>
              <tr>
                <th>Nama Lengkap</th>
                <td>
                  <p id="nLengkap"></p>
                </td>
              </tr>
              <tr>
                <th>NIK</th>
                <td>
                  <p id="nikk"></p>
                </td>
              </tr>
              <tr>
                <th>Jenis Surat</th>
                <td>
                  <p id="surat_id"></p>
                </td>
              </tr>
              <tr>
                <th>Keperluan</th>
                <td>
                  <input type="text" class="form-control" name="keperluan" id="keperluan" placeholder="Tuliskan Keperluan Anda">
                </td>
              </tr>
            </tbody>
          </table>
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary mt-2" id="btnAuth" style="background-color: #3C8DBC; font-weight:bold; width: 100%" onclick="ajuan()">
              Ajukan
              <i class="bi bi-chevron-double-right"></i>
            </button>
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

{{-- <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script> --}}
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>
  const title = $('#modalTitle');
  const modal = $('#modalData');
  const formSurat = $('#formSurat');
  const modalLogin = $('#modalLogin');
  const formLogin = $('#formLogin');

  function pengajuan(id){
    formSurat[0].reset();
    $.ajax({
      type: "GET",
      url: "getSurat/" + id + "/edit",
      dataType: "JSON",

      success: function(response){
        $('#id_surat').val(response.id_surat)
        title.html('Pengajuan - ' + response.nama_surat);
        $('#modalData').modal('show');
        $('#btnAjukan').show();
        $('#surat_id').html(response.nama_surat);
      }
    })
  }

  function login1(){
    $('#modalLogin').modal('show');
    formLogin[0].reset();
  }

  function auth(){
    const id_surat = $('#id_surat').val();
    $.ajax({
      type: "POST",
      url: "/check",
      data: formSurat.serialize(),
      dataType: "JSON",

      beforeSend: function(){
        $('#btnAuth').attr('disabled', true);
        $('#btnAuth').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
      },

      complete: function(){
        $('#btnAuth').attr('disabled', false);
        $('#btnAuth').html('Selanjutnya <i class="bi bi-chevron-double-right"></i>');
      },

      success: function(response){
        if(response.exists){
          if(id_surat == 1){
            window.location = "/pengantar-kk"
          } else if(id_surat == 2){
            window.location = "/permohonan-ktp"
          } else if(id_surat == 3){
            window.location = "/dalam-kecamatan"
          } else if(id_surat == 4){
            window.location = "/antar-kecamatan"
          }
          else {
            window.location = "/develop"
          }
          $.ajax({
            type: "GET",
            url: "/get-session",
            dataType: "JSON",

            success: function(response){
              $('#nLengkap').html(response.nama);
              $('#nikk').html(response.nik);
            }
          })
          
          // $('#modalData').modal('hide');
          // $('#modalPengajuan').modal('show');
          
        } else{
          Swal.fire({
            icon: 'error',
            title: 'Data Tidak Ditemukan',
            text: 'Perika Kembali NIK dan Nama Lengkap Anda!',
            showConfirmButton: false,
            timer: 1500
          })
          formSurat[0].reset();
        }
      }
    })
  }

  function login(){
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
          window.location = "/dashboard";
        }
        else{
          Swal.fire({
            icon: 'error',
            title: 'Login Gagal!',
            text: 'Periksa kembali Username dan Password Anda!',
            showConfirmButton: false,
            timer: 1500
          })
        }
      }
    })
  }

  $('.tombol-surat').on('click', function(){
    $.ajax({
      type: "GET",
      url: "/getSurat",
      dataType: "JSON",

      success: function(response){
        $('#id_surat').val(response.id_surat)
      }
    })
  })

  $(document).ready(function(){
    $('#btnTutor').show();
    $('#btnBack').hide();
  })
</script>