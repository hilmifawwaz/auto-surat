@extends('admin.layout.main')
@section('admin-content')
<div class="row">
  <div class="col-md-3">
    <button type="button" class="btn btn-primary mb-3" id="btnplus" onclick="add()">
      <span class="bi bi-plus"></span>
      Tambah
    </button>
  </div>
</div>
<div class="table-responsive">
  <table class="table table-striped table-bordered" id="tablewarga" style="width: 100%">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">NIK</th>
        <th class="text-center">Nama Lengkap</th>
        <th class="text-center">TTL</th>
        <th class="text-center">Jenis Kelamin</th>
        <th class="text-center">Golongan Darah</th>
        <th class="text-center">Alamat</th>
        <th class="text-center">Agama</th>
        <th class="text-center">Status Perkawinan</th>
        <th class="text-center">Pekerjaan</th>
        <th class="text-center">Kewarganegaraan</th>
        <th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>

{{-- ADD WARGA --}}
<div class="modal fade" id="modalAdd" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Tambah Warga</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST" id="formAdd">
          @csrf
          <div class="form-group col-md-12">
            <label for="nik" class="control-label" style="font-weight:bold">NIK</label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="nama" class="control-label" style="font-weight:bold">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Lengkap">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="t4_lahir" class="control-label" style="font-weight:bold">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Masukkan Tempat Lahir (Kota/Kabupaten)">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="tgl_lahir" class="control-label" style="font-weight:bold">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Masukkan Tanggal Lahir">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="jk" class="control-label" style="font-weight:bold">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control">
              <option value="0" selected disabled>Pilih Jenis Kelamin</option>
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="goldar" class="control-label" style="font-weight:bold">Golongan Darah</label>
            <select name="goldar" id="goldar" class="form-control">
              <option value="0" selected disabled>Pilih Golongan Darah</option>
              <option value="A">A</option>
              <option value="AB">AB</option>
              <option value="B">B</option>
              <option value="O">O</option>
            </select>
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="alamat" class="control-label" style="font-weight:bold">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat Sesuai KTP">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="agama" class="control-label" style="font-weight:bold">Agama</label>
            <input type="text" class="form-control" name="agama" id="agama" placeholder="Masukkan Agama Sesuai KTP">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="kawin" class="control-label" style="font-weight:bold">Status Perkawinan</label>
            <select name="kawin" id="kawin" class="form-control">
              <option value="0" selected disabled>Pilih Status Perkawinan</option>
              <option value="Belum Kawin">Belum Kawin</option>
              <option value="Kawin">Kawin</option>
            </select>
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="pekerjaan" class="control-label" style="font-weight:bold">Pekerjaan</label>
            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Masukkan Pekerjaan Sesuai KTP">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="kwn" class="control-label" style="font-weight:bold">Kewarganegaraan</label>
            <select name="kwn" id="kwn" class="form-control">
              <option value="0" selected disabled>Pilih Kewarganegaraan</option>
              <option value="WNI">WNI</option>
              <option value="WNA">WNA</option>
            </select>
          </div>
        </form>
        <div class="col-md-12">
          <button type="button" class="btn btn-primary" id="btnAddWarga" style="background-color: #3C8DBC; font-weight:bold; width: 100%" onclick="save()">Simpan</button>
          <button type="button" class="btn btn-primary edit-surat" id="btnEditWarga" style="background-color: #3C8DBC; font-weight:bold; width: 100%">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>
  
@endsection

<script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>
<script>
  $(document).ready( function () {
    $('#page-title').html('Data Warga');
    $('#btnwarga').addClass('active');
    $('#tablewarga').DataTable({
      "responsive": true,
      "processing":true,
      "serverside": true,
      "ajax": {
        "url": "/getWarga",
        "type": "GET",
      },
      "columns": [
        {data: 'DT_RowIndex', nama: 'DR_RowIndex', orderable: false},
        {data: 'nik', name: 'NIK'},
        {data: 'nama_lengkap', name: 'Nama Lengkap'},
        {data: 'ttl', name: 'TTL'},
        {data: 'jk', name: 'Jenis Kelamin'},
        {data: 'goldar', name: 'Golongan Darah'},
        {data: 'alamat', name: 'Alamat'},
        {data: 'agama', name: 'Agama'},
        {data: 'sp', name: 'Status Perkawinan'},
        {data: 'pekerjaan', name: 'Pekerjaan'},
        {data: 'kwn', name: 'Kewarganegaraan'},
        {data: 'aksi', name: 'Aksi'}
      ],
      "columnDefs": [
        { "targets": [0, 11], "className": "text-center" },
        { "targets": [4], width: 1 },
      ],
      "language": {
        "processing": '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
      }
    });
  });

  function add(){
    $('#modalAdd').modal('show');
    $('#formAdd')[0].reset();
    $('#btnEditWarga').hide();
    $('#btnAddWarga').show();
  }

  function save(){
    const formAdd = $('#formAdd');
    const modalAdd = $('#modalAdd');
    $.ajax({
      type: "POST",
      url: "getWarga",
      data: $('#formAdd').serialize(),
      dataType: "JSON",

      beforeSend: function(){
        $('#btnAddWarga').attr('disabled', true);
        $('#btnAddWarga').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
      },

      complete: function(){
        $('#btnAddWarga').attr('disabled', false);
        $('#btnAddWarga').html('Simpan');
      },

      success: function(response){
        if(response.status = 'success'){
          Swal.fire({
            icon: 'success',
            title: 'Data Berhasil Ditambahkan!',
            showConfirmButton: false,
            timer: 1500
          });
          modalAdd.modal('hide');
          $('#tablewarga').DataTable().ajax.reload();
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Data Gagal Ditambahkan!',
            showConfirmButton: false,
            timer: 1500
          });
        }
      }
    })
  }

  $(document).on('click','.edit', function(){
    const id = $(this).data('id');
    $('#btnAddWarga').hide();
    $('#btnEditWarga').show();
    $.ajax({
      type: "GET",
      url: "getWarga/"+ id + "/edit",
      dataType: "JSON",
      beforeSend: function(){
        $('#btnEdit' + id).attr('disabled', true);
        $('#btnEdit' + id).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
      },

      complete: function(){
        $('#btnEdit' + id).attr('disabled', false);
        $('#btnEdit' + id).html('<i class="bi bi-pencil-square"></i>');
      },

      success: function(response){
        $('#modalAdd').modal('show');
        $('#nik').val(response.nik);
        $('#nama').val(response.nama_lengkap);
        $('#tempat').val(response.tempat_lahir);
        $('#tanggal').val(response.tgl_lahir);
        $("#jk option[value=" + '"' + response.jk + '"' + "]").attr("selected", "selected");
        $("#goldar option[value=" + '"' + response.goldar + '"' + "]").attr("selected", "selected");
        $('#alamat').val(response.alamat);
        $('#agama').val(response.agama);
        $("#kawin option[value=" + '"' + response.sp + '"' + "]").attr("selected", "selected");
        $('#pekerjaan').val(response.pekerjaan);
        $("#kwn option[value=" + '"' + response.kwn + '"' + "]").attr("selected", "selected");

        $('#btnEditWarga').click(function(){
          saveedit(id);
        })
      }
    })
  });

  function saveedit(id){
    $.ajax({
      type: "PUT",
      url: "getWarga/" + id,
      data: $('#formAdd').serialize(),
      dataType: "JSON",
      
      beforeSend: function(){
        $('#btnEditWarga').attr('disabled', true);
        $('#btnEditWarga').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
      },

      complete: function(){
        $('#btnEditWarga').attr('disabled', false);
        $('#btnEditWarga').html('Simpan');
      },

      success: function(response){
        if(response.status = 'success'){
          $('#tablewarga').DataTable().ajax.reload();
          Swal.fire({
            icon: 'success',
            title: 'Data Berhasil Diubah!',
            showConfirmButton: false,
            timer: 1500
          });
          $('#modalAdd').modal('hide');
          $('#tablewarga').DataTable().ajax.reload();
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Data Gagal Ditambahkan!',
            showConfirmButton: false,
            timer: 1500
          });
        }
      }
    })
  }

  $(document).on('click', '.delete', function(){
    const id = $(this).data('id');

    Swal.fire({
      title: 'Yakin hapus data ini?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya',
      cancelButtonText: `Tidak`,
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "DELETE",
          url: "getWarga/" + id,
          data: $("#form-button").serialize(),
          dataType: "JSON",

          beforeSend: function(){
            $('#btnDelete' + id).attr('disabled', true);
            $('#btnDelete' + id).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
          },

          complete: function(){
            $('#btnDelete' + id).attr('disabled', false);
            $('#btnDelete' + id).html('<i class="bi bi-trash"></i>');
          },

          success: function(response){
            $('#tablewarga').DataTable().ajax.reload();
            Swal.fire({
            icon: 'success',
            title: 'Data Berhasil Dihapus',
            showConfirmButton: false,
            timer: 1500
          });
          }
        });
      }
    });
  })
</script>