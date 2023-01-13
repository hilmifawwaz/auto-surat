@extends('layout.main')
{{-- @include('{{ asset('./js/index') }}'); --}}
<style>
  .card{
    text-decoration:none;
  }
</style>
@section('main-content')
  <div class="card mt-3" style="width: 100%">
    <div class="card-header text-light text-bold" style="background-color: #3C8DBC">
      Papan Informasi
    </div>
    <div class="card-body">
      <div class="container-fluid">
        <a href="/" class="card mt-2 text-muted" style="width: 100%">
          <div class="card-body">
            <h5>Pengumuman 1</h5>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos vel voluptatem porro quisquam aspernatur atque doloribus totam provident! Totam, eum. Ipsa fuga laborum velit porro nobis voluptates. Dolor, minima quo.</p>
          </div>
        </a>
        <a href="/" class="card mt-2 text-muted" style="width: 100%">
          <div class="card-body">
            <h5>Pengumuman 2</h5>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos vel voluptatem porro quisquam aspernatur atque doloribus totam provident! Totam, eum. Ipsa fuga laborum velit porro nobis voluptates. Dolor, minima quo.</p>
          </div>
        </a>
        <a href="/" class="card mt-2 text-muted" style="width: 100%">
          <div class="card-body">
            <h5>Pengumuman 3</h5>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos vel voluptatem porro quisquam aspernatur atque doloribus totam provident! Totam, eum. Ipsa fuga laborum velit porro nobis voluptates. Dolor, minima quo.</p>
          </div>
        </a>
        <a href="/" class="card mt-2 text-muted" style="width: 100%">
          <div class="card-body">
            <h5>Pengumuman 4</h5>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos vel voluptatem porro quisquam aspernatur atque doloribus totam provident! Totam, eum. Ipsa fuga laborum velit porro nobis voluptates. Dolor, minima quo.</p>
          </div>
        </a>
      </div>
    </div>
  </div>

@endsection
<div class="modal fade " id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST" id="formLogin">
          <div class="form-group col-md-12">
            <label for="nama" class="control-label" style="font-weight:bold">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Lengkap">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="nik" class="control-label" style="font-weight:bold">NIK</label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK">
          </div>
        </form>
        <div class="col-md-12">
          <button type="button" class="btn btn-primary" style="background-color: #3C8DBC; font-weight:bold; width: 100%">Login</button>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script> --}}

{{-- <script src="{{ asset('js/index.js') }}" type="text/javascript"></script> --}}

<script>
  function login(){
    console.log('dah bisa!');
    $('#login').modal('show');
  }
</script>