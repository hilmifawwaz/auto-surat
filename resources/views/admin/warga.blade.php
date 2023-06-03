@extends('admin.layout.main')
@section('admin-content')
<div class="row">
  <div class="col-md-3">
    <button type="button" class="btn btn-primary mb-3" id="btnplus" onclick="add()">
      <span class="bi bi-plus"></span>
      Tambah
    </button>
    <button type="button" class="btn btn-success mb-3" id="btnexcel" onclick="excel()">
      <i class="bi bi-file-earmark-excel"></i>
      Import Excel
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
        <th class="text-center">No. KK</th>
        <th class="text-center">Dusun</th>
        <th class="text-center">RT</th>
        <th class="text-center">RW</th>
        <th class="text-center">Pendidikan Terakhir</th>
        <th class="text-center">Pendidikan Ditempuh</th>
        <th class="text-center">Pekerjaan</th>
        <th class="text-center">Tanggal Lahir</th>
        <th class="text-center">Tempat Lahir</th>
        <th class="text-center">Kawin</th>
        <th class="text-center">Hubungan Keluarga</th>
        <th class="text-center">Nama Ayah</th>
        <th class="text-center">Nama Ibu</th>
        <th class="text-center">Status</th>
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
            <label for="no_kk" class="control-label" style="font-weight:bold">Nomor KK</label>
            <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="Masukkan Nomor Kartu Keluarga">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="dusun" class="control-label" style="font-weight:bold">Dusun</label>
            <input type="text" class="form-control" name="dusun" id="dusun" placeholder="Masukkan Dusun Tempat Tinggal">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="rt" class="control-label" style="font-weight:bold">RT</label>
            <input type="number" class="form-control" name="rt" id="rt" placeholder="Masukkan RT Tempat Tinggal">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="rw" class="control-label" style="font-weight:bold">RW</label>
            <input type="number" class="form-control" name="rw" id="rw" placeholder="Masukkan RW Tempat Tinggal">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="pend_terakhir" class="control-label" style="font-weight:bold">Pendidikan Terakhir</label>
            <input type="text" class="form-control" name="pend_terakhir" id="pend_terakhir" placeholder="Masukkan Pendidikan Terakhir">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="pend_skrg" class="control-label" style="font-weight:bold">Pendidikan Saat Ini</label>
            <input type="text" class="form-control" name="pendidikan_skrg" id="pendidikan_skrg" placeholder="Masukkan Pendidikan Saat Ini">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="pekerjaan" class="control-label" style="font-weight:bold">Pekerjaan</label>
            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Masukkan Pekerjaan Sesuai KTP">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="tgl_lahir" class="control-label" style="font-weight:bold">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="tempat_lahir" class="control-label" style="font-weight:bold">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="kawin" class="control-label" style="font-weight:bold">Kawin</label>
            <input type="text" class="form-control" name="kawin" id="kawin" placeholder="Masukkan Status Perkawinan">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="hub_keluarga" class="control-label" style="font-weight:bold">Hubungan Keluarga</label>
            <input type="text" class="form-control" name="hub_keluarga" id="hub_keluarga" placeholder="Masukkan Hubungan Keluarga Dalam KK">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="goldar" class="control-label" style="font-weight:bold">Golongan Darah</label>
            <input type="text" class="form-control" name="goldar" id="goldar" placeholder="Masukkan Golongan Darah">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="nama_ayah" class="control-label" style="font-weight:bold">Nama Ayah</label>
            <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Masukkan Nama Ayah">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="nama_ibu" class="control-label" style="font-weight:bold">Nama Ibu</label>
            <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Masukkan Nama Ibu">
          </div>
          <div class="form-group col-md-12 mt-2">
            <label for="status" class="control-label" style="font-weight:bold">Status</label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Masukkan Status Kependudukan">
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

{{-- IMPORT EXCEL --}}
<div class="modal fade" id="modalImport" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Import Data Warga</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('import') }}" id="formImport" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="import" class="control-label">Pilih File</label>
            <input type="file" class="form-control" name="import" id="import" placeholder="Pilih File Disini">
            <small>*Pastikan file berformat .xlx atau .xlsx</small>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary" id="btnImportExcel" style="background-color: #3C8DBC; font-weight:bold; width: 100%">Import</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  
@endsection

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
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
        {data: 'no_kk', name: 'No KK'},
        {data: 'dusun', name: 'Dusun'},
        {data: 'rt', name: 'RT'},
        {data: 'rw', name: 'RW'},
        {data: 'pendidikan', name: 'Pend Terakhir'},
        {data: 'pendidikan_ditempuh', name: 'Pend Saat Ini'},
        {data: 'pekerjaan', name: 'Pekerjaan'},
        {data: 'tgl_lhr', name: 'Tanggal Lahir'},
        {data: 'tempat_lahir', name: 'Tempat Lahir'},
        {data: 'kawin', name: 'Kawin'},
        {data: 'hub_keluarga', name: 'Hub Keluarga'},
        {data: 'nama_ayah', name: 'Ayah'},
        {data: 'nama_ibu', name: 'Ibu'},
        {data: 'status', name: 'Status'},
        {data: 'aksi', name: 'Aksi'}
      ],
      "columnDefs": [
        { "targets": [0, 17], "className": "text-center" },
        // { "targets": [4], width: 1 },
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

  function excel(){
    $('#modalImport').modal('show');
    $('#formImport')[0].reset();
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