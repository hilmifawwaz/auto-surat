@extends('admin.layout.main')
@section('admin-content')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="row">
    <div class="col-md-3">
      <button class="btn btn-primary mb-3" id="btnplus" onclick="addsurat()">
        <span class="bi bi-plus"></span>
        Tambah Surat
      </button>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-sm" id="tablesurat" style="width: 100%">
      <thead>
        <tr>
          <th class="text-center">No.</th>
          <th class="text-center">Nama Surat</th>
          <th class="text-center">Keterangan</th>
          <th class="text-center">File Template</th>
          <th class="text-center">Status</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>

  {{-- ADD SURAT --}}
  <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Tambah Surat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="#" method="POST" id="formAdd" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-12">
              <label for="nama" class="control-label" style="font-weight:bold">Nama Surat</label>
              <input type="text" class="form-control" name="nama_surat" id="nama_surat" placeholder="Masukkan Nama Surat">
            </div>
            <div class="form-group col-md-12 mt-2">
              <label for="desk" class="control-label" style="font-weight:bold">Keterangan</label>
              <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan">
            </div>
            <div class="form-group col-md-12 mt-2">
              <label for="template" class="control-label" style="font-weight:bold">File Template Surat</label>
              <input type="file" class="form-control" name="template" id="template" placeholder="Masukkan File Surat">
            </div>
          </form>
          <div class="col-md-12">
            <button type="button" class="btn btn-primary" id="btnAddSurat" style="background-color: #3C8DBC; font-weight:bold; width: 100%" onclick="save()">Simpan</button>
            <button type="button" class="btn btn-primary edit-surat" id="btnEditSurat" style="background-color: #3C8DBC; font-weight:bold; width: 100%">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>
<script>
  // GLOBAT SETUP
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $(document).ready( function () {
    $('#page-title').html('Data Surat');
    $('#btnsurat').addClass('active');
    $('#tablesurat').DataTable({
      "responsive": true,
      "processing": true,
      "serverside": true,
      "ajax": {
        "url": "/getSurat",
        "type": "GET",
      },
      "columns":[
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
        {data: 'nama_surat', name: 'Surat'},
        {data: 'keterangan', name: 'Keterangan'},
        {data: 'template', name: 'File Template'},
        {data: 'statuss', name: 'Status'},
        {data: 'aksi', name: 'Aksi'}
      ],
      "columnDefs": [
        { "targets": [0, 4], "className": "text-center" },
      ],
      "language": {
        "processing": '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
      }
    });
  });

  function addsurat(){
    const modalAdd = $('#modalAdd');
    const formAdd = $('#formAdd');
    
    modalAdd.modal('show');
    $('#btnEditSurat').hide();
    $('#btnAddSurat').show();
    formAdd[0].reset();
  }

  function save(){
    var formAdd = $('#formAdd')[0];
    const modalAdd = $('#modalAdd');

    $.ajax({
      type: "POST",
      url: "postSurat",
      data: new FormData(formAdd),
      dataType: "JSON",
      contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
      processData: false,
      cache: false,

      beforeSend: function(){
        $('#btnAddSurat').attr('disabled', true);
        $('#btnAddSurat').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
      },

      complete: function(){
        $('#btnAddSurat').attr('disabled', false);
        $('#btnAddSurat').html('Simpan');
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
          $('#tablesurat').DataTable().ajax.reload();
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

  function saveedit(id){
    $.ajax({
      type: "PUT",
      url: "getSurat/" + id,
      data: $('#formAdd').serialize(),
      dataType: "JSON",
      
      beforeSend: function(){
        $('#btnEditSurat').attr('disabled', true);
        $('#btnEditSurat').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
      },

      complete: function(){
        $('#btnEditSurat').attr('disabled', false);
        $('#btnEditSurat').html('Simpan');
      },

      success: function(response){
        if(response.status = 'success'){
          $('#tablesurat').DataTable().ajax.reload();
          Swal.fire({
            icon: 'success',
            title: 'Data Berhasil Diubah!',
            showConfirmButton: false,
            timer: 1500
          });
          $('#modalAdd').modal('hide');
          $('#tablesurat').DataTable().ajax.reload();
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
    $('#btnAddSurat').hide();
    $('#btnEditSurat').show();
    $.ajax({
      type: "GET",
      url: "getSurat/"+ id + "/edit",
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
        $('#nama_surat').val(response.nama_surat);
        $('#keterangan').val(response.keterangan);
        $('#template').html(response.template);

        $('#btnEditSurat').click(function(){
          saveedit(id);
        })
      }
    })
  });

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
          url: "getSurat/" + id,
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
            $('#tablesurat').DataTable().ajax.reload();
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