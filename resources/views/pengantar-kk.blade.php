@extends('layout.main')

@section('main-content')
<div class="container">
  <div class="text-center mt-3">
    <p class="fw-bold fs-2">Formulir Pengantar KK</p>
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
    <div class="form-grop mt-2">
      <label for="telepon" class="fw-bold">Nomor Telepon</label>
      <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Tuliskan Nomor Telepon Anda">
    </div>
    <p class="fs-3 mt-2">Daftar Anggota Keluarga</p>
    <div class="form-group">
      <label for="alasan" class="fw-bold">Alasan Permohonan</label>
      <select name="alasan" id="alasan" class="form-control">
        <option value="0" selected disabled>Pilih Alsan Permohonan</option>  
        <option value="1">Karena Membentuk Rumah Tangga Baru</option>
        <option value="2">Karena KK Hilang/Rusak</option>
        <option value="3">Lainnya</option>
      </select>
    </div>
    <div class="form-group mt-2">
      <label for="jumlah" class="fw-bold">Jumlah Anggota Keluarga</label>
      <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Tuliskan Jumlah Anggota Keluarga">
    </div>
    <div class="form-group mt-2">
      <label for="anggota" class="fw-bold">Daftar Anggota Keluarga</label>
      <div class="row">
        <div class="col-md-1">
          <p class="fw-bold">1</p>
        </div>
        <div class="col-md-11">
          <select name="keluarga1" id="keluarga1" class="form-control keluarga">
            <option value="0" selected disabled>Pilih Anggota Keluarga</option>  
          </select>
        </div>
      </div>
    </div>

    <div class="form-group mt-2">
      <div class="row">
        <div class="col-md-1">
          <p class="fw-bold">2</p>
        </div>
        <div class="col-md-11">
          <select name="keluarga2" id="keluarga2" class="form-control keluarga">
            <option value="0" selected disabled>Pilih Anggota Keluarga</option>  
          </select> 
          <small>*kosongkan jika tidak perlu</small>
        </div>
      </div>
    </div>

    <div class="form-group mt-2">
      <div class="row">
        <div class="col-md-1">
          <p class="fw-bold">3</p>
        </div>
        <div class="col-md-11">
          <select name="keluarga3" id="keluarga3" class="form-control keluarga">
            <option value="0" selected disabled>Pilih Anggota Keluarga</option>  
          </select> 
          <small>*kosongkan jika tidak perlu</small>
        </div>
      </div>
    </div>

    <div class="form-group mt-2">
      <div class="row">
        <div class="col-md-1">
          <p class="fw-bold">4</p>
        </div>
        <div class="col-md-11">
          <select name="keluarga4" id="keluarga4" class="form-control keluarga">
            <option value="0" selected disabled>Pilih Anggota Keluarga</option>  
          </select> 
          <small>*kosongkan jika tidak perlu</small>
        </div>
      </div>
    </div>

    <div class="form-group mt-2">
      <div class="row">
        <div class="col-md-1">
          <p class="fw-bold">5</p>
        </div>
        <div class="col-md-11">
          <select name="keluarga5" id="keluarga5" class="form-control keluarga">
            <option value="0" selected disabled>Pilih Anggota Keluarga</option>  
          </select> 
          <small>*kosongkan jika tidak perlu</small>
        </div>
      </div>
    </div>

    <div class="form-group mt-2">
      <div class="row">
        <div class="col-md-1">
          <p class="fw-bold">6</p>
        </div>
        <div class="col-md-11">
          <select name="keluarga6" id="keluarga6" class="form-control keluarga">
            <option value="0" selected disabled>Pilih Anggota Keluarga</option>  
          </select> 
          <small>*kosongkan jika tidak perlu</small>
        </div>
      </div>
    </div>

    <div class="form-group mt-2">
      <div class="row">
        <div class="col-md-1">
          <p class="fw-bold">7</p>
        </div>
        <div class="col-md-11">
          <select name="keluarga7" id="keluarga7" class="form-control keluarga">
            <option value="0" selected disabled>Pilih Anggota Keluarga</option>  
          </select> 
          <small>*kosongkan jika tidak perlu</small>
        </div>
      </div>
    </div>

    <div class="form-group mt-2">
      <div class="row">
        <div class="col-md-1">
          <p class="fw-bold">8</p>
        </div>
        <div class="col-md-11">
          <select name="keluarga8" id="keluarga8" class="form-control keluarga">
            <option value="0" selected disabled>Pilih Anggota Keluarga</option>  
          </select> 
          <small>*kosongkan jika tidak perlu</small>
        </div>
      </div>
    </div>

    <div class="form-group mt-2">
      <div class="row">
        <div class="col-md-1">
          <p class="fw-bold">9</p>
        </div>
        <div class="col-md-11">
          <select name="keluarga9" id="keluarga9" class="form-control keluarga">
            <option value="0" selected disabled>Pilih Anggota Keluarga</option>  
          </select> 
          <small>*kosongkan jika tidak perlu</small>
        </div>
      </div>
    </div>

    <div class="form-group mt-2">
      <div class="row">
        <div class="col-md-1">
          <p class="fw-bold">10</p>
        </div>
        <div class="col-md-11">
          <select name="keluarga10" id="keluarga10" class="form-control keluarga">
            <option value="0" selected disabled>Pilih Anggota Keluarga</option>  
          </select> 
          <small>*kosongkan jika tidak perlu</small>
        </div>
      </div>
    </div>

    <div class="col-md-12">
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

    $.ajax({
      type: "GET",
      url: "/get-session",
      dataType: "JSON",

      success: function(response){
        $('#nama').val(response.nama);
        $('#nik').val(response.nik);
        $('#id_surat').val(response.id_surat);

        warga(response.nik);
      }
    })
  })

  function warga(id){
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
        anggota(response.no_kk);
      }
    })
  }

  function anggota(id){
    $.ajax({
      type: "GET",
      url: "/anggota-keluarga/" + id,
      dataType: "JSON",

      success: function(response) {
        $.each(response, function(key, value) {
          $('.keluarga').append('<option value="' + value + '">' + value + ' | ' + key + '</option>');
        });
      }
    })
  }
</script>