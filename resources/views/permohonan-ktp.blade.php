@extends('layout.main')

@section('main-content')
<div class="container">
  <div class="text-center mt-3">
    <p class="fw-bold fs-2">Formulir Permohonan KTP</p>
  </div>
  <form action="/surat" method="POST" id="formData" enctype="multipart/form-data">
    @csrf
    <p class="fw-bold fs-3">Data Diri</p>
    <div class="form-group">
      <label for="nama" class="control-label" style="font-weight:bold">Nama Lengkap</label>
      <input type="text" class="form-control" name="nama" id="nama" placeholder="Tuliskan Nama Anda" readonly>
      <input type="hidden" name="id_surat" id="id_surat" readonly>
    </div>
    <div class="form-group mt-2">
      <label for="nik" class="control-label fw-bold">NIK</label>
      <input type="text" class="form-control" name="nik" id="nik" placeholder="Tuliskan NIK Anda" readonly>
    </div>
    <div class="form-group mt-2">
      <label for="no_kk" class="fw-bold">Nomor KK</label>
      <input type="text" class="form-control" name="no_kk" name="no_kk" id="no_kk" placeholder="Tuliskan Nomor KK Anda" readonly>
    </div>
    <div class="form-group mt-2">
      <label for="alamat" class="fw-bold">Alamat</label>
      <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Tuliskan Alamat Anda">
    </div>
    <div class="form-group mt-2">
      <label for="rt" class="fw-bold">RT</label>
      <input type="text" class="form-control" name="rt" id="rt" placeholder="Tuliskan RT Tempat Tinggal Anda" readonly>
    </div>
    <div class="form-group mt-2">
      <label for="rw" class="fw-bold">RW</label>
      <input type="text" class="form-control" name="rw" id="rw" placeholder="Tuliskan RW Tempat Tinggal Anda" readonly>
    </div>
    <div class="form-group mt-2">
      <label for="dusun" class="fw-bold">Dusun</label>
      <input type="text" class="form-control" name="dusun" id="dusun" placeholder="Tuliskan Dusun Tempat Tinggal Anda" readonly>
    </div>
    <div class="form-group mt-2">
      <label for="kelurahan" class="fw-bold">Kelurahan</label>
      <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Tuliskan Kelurahan Tempat Tinggal Anda" value="Tegaltirto" readonly>
    </div>
    <div class="form-group mt-2">
      <label for="kecamatan" class="fw-bold">Kecamatan</label>
      <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Tuliskan Kecamatan Tempat Tinggal Anda" value="Berbah" readonly>
    </div>
    <div class="form-group mt-2">
      <label for="kota" class="fw-bold">Kabupaten/Kota</label>
      <input type="text" class="form-control" name="kota" id="kota" placeholder="Tuliskan Kabupaten/Kota Tempat Tinggal Anda" value="Sleman" readonly>
    </div>
    <div class="form-group mt-2">
      <label for="provinsi" class="fw-bold">Provinsi</label>
      <input type="text" class="form-control" name="propinsi" id="propinsi" placeholder="Tuliskan Provinsi Tempat Tinggal Anda" value="Daerah Istimewa Yogyakarta" readonly>
    </div>
    <div class="form-group mt-2">
      <label for="kode_pos" class="fw-bold">Kode Pos</label>
      <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Tuliskan Kode Pos Tempat Tinggal Anda" value="55573" readonly>
    </div>
    <div class="form-group">
      <label for="alasan" class="fw-bold">Alasan Permohonan</label>
      <select name="alasan" id="alasan" class="form-control">
        <option value="0" selected disabled>Pilih Alasan Permohonan</option>  
        <option value="1">Baru</option>
        <option value="2">Perpanjangan</option>
        <option value="3">Penggantian</option>
      </select>
    </div>

    <div class="col-md-12 mt-2">
      <button type="submit" class="btn btn-primary" id="btnSubmit" style="background-color: #3C8DBC; font-weight:bold; width: 100%">Buat</button>
    </div>
  </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $('#btnTutor').hide();
    $('#btnBack').show();
    $('#btnLogin').hide();

    $.ajax({
      type: "GET",
      url: "/get-session",
      dataType: "JSON",

      success: function(response){
        if(response > 0){
          $('#nama').val(response.nama);
          $('#nik').val(response.nik);
          $('#id_surat').val(response.id_surat);

          warga(response.nik);
        } else {
          window.location = "/"
        }
      }
    })
  })

  function warga(id){
    if(id > 0){
      $.ajax({
        type: "GET",
        url: "/data-warga/" + id,
        dataType: "JSON",

        success: function(response){
          console.log(response)
          $('#no_kk').val(response.no_kk);
          $('#rt').val(response.rt);
          $('#rw').val(response.rw);
          $('#dusun').val(response.dusun);
          $('#alamat').val(response.dusun + ' RT ' + response.rt + ' RW ' + response.rw + ', Tegaltirto, Berbah, Sleman');
          // anggota(response.no_kk);
        }
      })
    } else {
      window.location = "/"
    }
  }
</script>