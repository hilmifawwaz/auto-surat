@extends('layout.main')
@section('main-content')
  <div class="container">
    <div class="text-center mt-3">
      <p class="fw-bold fs-2">Formulir Keterangan Pindah Antar Kecamatan</p>
    </div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="/surat" method="POST" id="formData" enctype="multipart/form-data">
      @csrf
      <p class="fw-bold fs-3">Data Diri</p>
      <div class="form-group">
        <label for="nama" class="control-label" style="font-weight:bold">Nama Lengkap</label>
        <input type="text" class="form-control" name="nama" id="nama" placeholder="Tuliskan Nama Anda" readonly required>
        <input type="hidden" name="id_surat" id="id_surat" readonly required>
      </div>
      <div class="form-group mt-2">
        <label for="nik" class="control-label fw-bold">NIK</label>
        <input type="text" class="form-control" name="nik" id="nik" placeholder="Tuliskan NIK Anda" readonly required>
      </div>
      <div class="form-group mt-2">
        <label for="no_kk" class="fw-bold">Nomor KK</label>
        <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="Tuliskan Nomor KK Anda" readonly required>
      </div>
      <div class="form-group mt-2">
        <label for="kepala_keluarga" class="fw-bold">Kepala Keluarga</label>
        <input type="text" class="form-control" name="kepala_keluarga" id="kepala_keluarga" placeholder="Tuliskan Kepala Keluarga Anda" readonly required>
      </div>
      {{-- ALAMAT LAMA --}}
      <p class="fw-bold fs-3 mt-2">Alamat Lama</p>
      <div class="form-group">
        <label for="alamat" class="fw-bold">Alamat</label>
        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Tuliskan Alamat Anda" required>
      </div>
      <div class="form-group mt-2">
        <label for="rt" class="fw-bold">RT</label>
        <input type="text" class="form-control" name="rt" id="rt" placeholder="Tuliskan RT Tempat Tinggal Anda" readonly required>
      </div>
      <div class="form-group mt-2">
        <label for="rw" class="fw-bold">RW</label>
        <input type="text" class="form-control" name="rw" id="rw" placeholder="Tuliskan RW Tempat Tinggal Anda" readonly required>
      </div>
      <div class="form-group mt-2">
        <label for="dusun" class="fw-bold">Dusun</label>
        <input type="text" class="form-control" name="dusun" id="dusun" placeholder="Tuliskan Dusun Tempat Tinggal Anda" readonly required>
      </div>
      <div class="form-group mt-2">
        <label for="kelurahan" class="fw-bold">Kelurahan</label>
        <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Tuliskan Kelurahan Tempat Tinggal Anda" value="Tegaltirto" readonly required>
      </div>
      <div class="form-group mt-2">
        <label for="kecamatan" class="fw-bold">Kecamatan</label>
        <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Tuliskan Kecamatan Tempat Tinggal Anda" value="Berbah" readonly required>
      </div>
      <div class="form-group mt-2">
        <label for="kota" class="fw-bold">Kabupaten/Kota</label>
        <input type="text" class="form-control" name="kota" id="kota" placeholder="Tuliskan Kabupaten/Kota Tempat Tinggal Anda" value="Sleman" readonly required>
      </div>
      <div class="form-group mt-2">
        <label for="provinsi" class="fw-bold">Provinsi</label>
        <input type="text" class="form-control" name="propinsi" id="propinsi" placeholder="Tuliskan Provinsi Tempat Tinggal Anda" value="Daerah Istimewa Yogyakarta" readonly required>
      </div>
      <div class="form-group mt-2">
        <label for="kode_pos" class="fw-bold">Kode Pos</label>
        <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Tuliskan Kode Pos Tempat Tinggal Anda" value="55573" readonly required>
      </div>
      <div class="form-grop mt-2">
        <label for="telepon" class="fw-bold">Nomor Telepon</label>
        <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Tuliskan Nomor Telepon Anda">
      </div>
      {{-- ALAMAT BARU --}}
      <p class="fw-bold fs-3 mt-2">Alamat Baru</p>
      <div class="form-group">
        <label for="provinsi" class="fw-bold">Provinsi</label>
        <select name="provinsi" id="provinsi" class="select2 form-control" style="width: 100%" required>
          <option value="0" selected disabled>Pilih Provinsi</option>
          @foreach ($prov as $p)
            <option value="{{ $p->provinsi }}">{{ $p->provinsi }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group mt-2">
        <label for="kota" class="fw-bold">Kabupaten/Kota</label>
        <select name="kota_2" id="kota_2" class="form-control select2" disabled required>
          <option value="0" selected disabled>Pilih Kabupaten/Kota</option>
        </select>
      </div>
      <div class="form-group mt-2">
        <label for="kecamatan" class="fw-bold">Kecamatan</label>
        <select name="kecamatan_2" id="kecamatan_2" class="form-control select2" disabled required>
          <option value="0" selected disabled>Pilih Kecamatan</option>
        </select>
      </div>
      <div class="form-group mt-2">
        <label for="kelurahan" class="fw-bold">Kelurahan</label>
        <select name="kelurahan_2" id="kelurahan_2" class="form-control select2" disabled required>
          <option value="0" selected disabled>Pilih Kelurahan</option>
        </select>
      </div>
      <div class="form-group mt-2">
        <label for="dusun" class="fw-bold">Dusun</label>
        <input type="text" class="form-control" name="dusun_2" id="dusun_2" placeholder="Tuliskan Dusun Tempat Tinggal Anda" disabled required>
      </div>
      <div class="form-group mt-2">
        <label for="rt" class="fw-bold">RT</label>
        <input type="text" class="form-control" name="rt_2" id="rt_2" placeholder="Tuliskan RT Tempat Tinggal Anda" disabled required>
      </div>
      <div class="form-group mt-2">
        <label for="rw" class="fw-bold">RW</label>
        <input type="text" class="form-control" name="rw_2" id="rw_2" placeholder="Tuliskan RW Tempat Tinggal Anda" disabled required>
      </div>
      <div class="form-group mt-2">
        <label for="kode_pos" class="fw-bold">Kode Pos</label>
        <input type="text" class="form-control" name="kode_pos" id="kode_pos_2" placeholder="Tuliskan Kode Pos Tempat Tinggal Anda" disabled required>
      </div>
      <div class="form-group mt-2">
        <label for="alamat" class="fw-bold">Alamat Lengkap</label>
        <input type="text" class="form-control" name="alamat_2" id="alamat_2" placeholder="Tuliskan Alamat Baru Anda" disabled required>
      </div>
      <div class="form-grop mt-2">
        <label for="telepon_2" class="fw-bold">Nomor Telepon</label>
        <input type="text" class="form-control" name="telepon_2" id="telepon_2" placeholder="Tuliskan Nomor Telepon Baru Anda">
      </div>
      {{-- INFORMASI TAMBAHAN --}}
      <p class="fw-bold fs-3 mt-2">Informasi Tambahan</p>
      <div class="form-group">
        <label for="alasan_pindah" class="fw-bold">Alasan Kepindahan</label>
        <select name="alasan_pindah" id="alasan_pindah" class="form-control" required>
          <option value="0" selected disabled>Pilih Alasan Kepindahan</option>  
          <option value="1">Pekerjaan</option>
          <option value="2">Pendidikan</option>
          <option value="3">Keamanan</option>
          <option value="4">Kesehatan</option>
          <option value="5">Perumahan</option>
          <option value="6">Keluarga</option>
          <option value="7">Lainnya</option>
        </select>
      </div>
      <div class="form-group">
        <label for="jenis" class="fw-bold">Jenis Kepindahan</label>
        <select name="jenis" id="jenis" class="form-control" required>
          <option value="0" selected disabled>Pilih Jenis Kepindahan</option>
          <option value="1">Kepala Keluarga</option>
          <option value="2">Kepala Keluarga dan Seluruh Anggota Keluarga</option>
          <option value="3">Kepala Keluarga dan Sebagian Anggota Keluarga</option>
          <option value="4">Anggota Keluarga</option>
        </select>
      </div>
      <div class="form-group">
        <label for="status_tidak_pindah" class="fw-bold">Status KK Bagi Yang Tidak Pindah</label>
        <select name="status_tidak_pindah" id="status_tidak_pindah" class="form-control" required>
          <option value="0" selected disabled>Pilih Status</option>
          <option value="1">Numpang KK</option>
          <option value="2">Membuat KK Baru</option>
          <option value="3">Nomor KK Tetap</option>
        </select>
      </div>
      <div class="form-group">
        <label for="status_pindah" class="fw-bold">Status KK Bagi Yang Pindah</label>
        <select name="status_pindah" id="status_pindah" class="form-control" required>
          <option value="0" selected disabled>Pilih Status</option>
          <option value="1">Numpang KK</option>
          <option value="2">Membuat KK Baru</option>
          <option value="3">Nomor KK Tetap</option>
        </select>
      </div>
      <p class="fw-bold fs-3 mt-2">Daftar Anggota Keluarga</p>
      <div class="form-group mt-2">
        <div class="row">
          <div class="col-md-1">
            <p class="fw-bold">1</p>
          </div>
          <div class="col-md-11">
            <select name="keluarga1" id="keluarga1" class="form-control keluarga" required>
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
    $('#btnLogin').hide();
    $('#btnBack').show();
    // $('#kota_2').attr('disabled', true);
    $('.select2').select2({
      theme: 'bootstrap-5'
    });

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

    $('#provinsi').change(function(){
      const val = $(this).val();
      $.ajax({
        url: "/get-kabupaten",
        dataType: "JSON",
        data: {provinsi: val},
        success: function(data) {
          $('#kota_2').attr('disabled', false);
          $('#kota_2').empty();
          $.each(data, function(key, value) {
              $('#kota_2').append('<option value="' + value.kabupaten + '">' + value.kabupaten + '</option>');
          });
          $('#kota_2').trigger('change');
        }
      })
    });

    $('#kota_2').change(function(){
      const val = $(this).val();
      $.ajax({
        url: "/get-kecamatan",
        dataType: "JSON",
        data: {kota: val},
        success: function(data){
          $('#kecamatan_2').attr('disabled', false);
          $('#kecamatan_2').empty();
          $.each(data, function(key, value) {
              $('#kecamatan_2').append('<option value="' + value.kecamatan + '">' + value.kecamatan + '</option>');
          });
          $('#kecamatan_2').trigger('change');
        }
      })
    });

    $('#kecamatan_2').change(function(){
      const val = $(this).val();
      $.ajax({
        url: "/get-kelurahan",
        dataType: "JSON",
        data: {kecamatan: val},
        success: function(data){
          $('#kelurahan_2').attr('disabled', false);
          $('#dusun_2').attr('disabled', false);
          $('#rt_2').attr('disabled', false);
          $('#rw_2').attr('disabled', false);
          $('#kode_pos_2').attr('disabled', false);
          $('#alamat_2').attr('disabled', false);
          $('#kelurahan_2').empty();
          $.each(data, function(key, value) {
              $('#kelurahan_2').append('<option value="' + value.kelurahan + '">' + value.kelurahan + '</option>');
          });
          $('#kelurahan_2').trigger('change');
        }
      })
    })
  })

  function warga(id){
    if(id > 0){
      $.ajax({
        type: "GET",
        url: "/data-warga/" + id,
        dataType: "JSON",

        success: function(response){
          // console.log(response)
          $('#no_kk').val(response.no_kk);
          $('#rt').val(response.rt);
          $('#rw').val(response.rw);
          $('#dusun').val(response.dusun);
          $('#alamat').val(response.dusun + ' RT ' + response.rt + ' RW ' + response.rw + ', Tegaltirto, Berbah, Sleman');

          kepala_keluarga(response.no_kk);
          anggota(response.no_kk);
        }
      })
    } else {
      window.location = "/"
    }
  }

  function kepala_keluarga(id){
    $.ajax({
      type: "GET",
      url: "/kepala-keluarga/" + id,
      dataType: "JSON",

      success: function(response){
        $('#kepala_keluarga').val(response);
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