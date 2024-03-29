@extends('admin.layout.main')
@section('admin-content')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="row">
    <div class="col-md-3">
      <button class="btn btn-primary mb-3" id="btnplus" onclick="addpengumuman()">
        <span class="bi bi-plus"></span>
        Tambah Pengumuman
      </button>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-sm" id="tablepengumuman" style="width: 100%">
      <thead>
        <tr>
          <th class="text-center">No.</th>
          <th class="text-center">Judul</th>
          <th class="text-center">Isi</th>
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
          <h5 class="modal-title" id="modalTitle">Tambah Pengumuman</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger d-none">
            <ul class="message">
            </ul>
          </div>
          <form action="#" method="POST" id="formAdd">
            @csrf
            <div class="form-group col-md-12">
              <label for="judul" class="control-label" style="font-weight:bold">Judul</label>
              <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul Pengumuman">
            </div>
            <div class="form-group col-md-12 mt-2">
              <label for="isi" class="control-label" style="font-weight:bold">Isi Pengumuman</label>
              {{-- <input type="text" class="form-control" name="isi" id="isi" placeholder="Masukkan Isi Pengumuman"> --}}
              <textarea name="isi" id="isi" placeholder="Masukkan Isi Pengumuman" class="form-control"></textarea>
            </div>
          </form>
          <div class="col-md-12">
            <button type="button" class="btn btn-primary" id="btnAddPengumuman" style="background-color: #3C8DBC; font-weight:bold; width: 100%" onclick="save()">Simpan</button>
            <button type="button" class="btn btn-primary edit-surat" id="btnEditPengumuman" style="background-color: #3C8DBC; font-weight:bold; width: 100%">Simpan</button>
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
    $('#page-title').html('Data Pengumuman');
    $('#btnpengumuman').addClass('active');
    $('#tablepengumuman').DataTable({
      "responsive": true,
      "processing": true,
      "serverside": true,
      "ajax": {
        "url": "/getPengumuman",
        "type": "GET",
      },
      "columns":[
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
        {data: 'judul', name: 'Judul'},
        {data: 'isi', name: 'Isi'},
        {data: 'aksi', name: 'Aksi'}
      ],
      "columnDefs": [
        { "targets": [0, 3], "className": "text-center" },
      ],
      "language": {
        "processing": '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
      }
    });
  });

  function addpengumuman(){
    const modalAdd = $('#modalAdd');
    const formAdd = $('#formAdd');
    
    modalAdd.modal('show');
    $('#btnEditPengumuman').hide();
    $('#btnAddPengumuman').show();
    formAdd[0].reset();
  }

  function save(){
    const formAdd = $('#formAdd');
    const modalAdd = $('#modalAdd');

    $.ajax({
      type: "POST",
      url: "getPengumuman",
      data: $('#formAdd').serialize(),
      dataType: "JSON",

      beforeSend: function(){
        $('#btnAddPengumuman').attr('disabled', true);
        $('#btnAddPengumuman').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
      },

      complete: function(){
        $('#btnAddPengumuman').attr('disabled', false);
        $('#btnAddPengumuman').html('Simpan');
      },

      success: function(response){
        if(response.success){
          Swal.fire({
            icon: 'success',
            title: 'Data Berhasil Ditambahkan!',
            showConfirmButton: false,
            timer: 1500
          });
          modalAdd.modal('hide');
          $('#tablepengumuman').DataTable().ajax.reload();
        } else {
          $('.message').empty();
          $('.alert-danger').removeClass('d-none');
          $.each(response.error, function(key,value){
            $('.message').append("<li>" + value + "</li>")
          });
        }
      }
    })
  }

  function saveedit(id){
    $.ajax({
      type: "PUT",
      url: "getPengumuman/" + id,
      data: $('#formAdd').serialize(),
      dataType: "JSON",
      
      beforeSend: function(){
        $('#btnEditPengumuman').attr('disabled', true);
        $('#btnEditPengumuman').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
      },

      complete: function(){
        $('#btnEditPengumuman').attr('disabled', false);
        $('#btnEditPengumuman').html('Simpan');
      },

      success: function(response){
        if(response.success){
          $('#tablepengumuman').DataTable().ajax.reload();
          Swal.fire({
            icon: 'success',
            title: 'Data Berhasil Diubah!',
            showConfirmButton: false,
            timer: 1500
          });
          $('#modalAdd').modal('hide');
          $('#tablepengumuman').DataTable().ajax.reload();
        } else {
          $('.message').empty();
          $('.alert-danger').removeClass('d-none');
          $.each(response.error, function(key,value){
            $('.message').append("<li>" + value + "</li>")
          });
        }
      }
    })
  }

  $(document).on('click','.edit', function(){
    const id = $(this).data('id');
    $('#btnAddPengumuman').hide();
    $('#btnEditPengumuman').show();
    $.ajax({
      type: "GET",
      url: "getPengumuman/"+ id + "/edit",
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
        $('#judul').val(response.judul);
        $('#isi').val(response.isi);
        // $('#template').html(response.template);
        $('.alert-danger').addClass('d-none');

        $('#btnEditPengumuman').click(function(){
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
          url: "getPengumuman/" + id,
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
            $('#tablepengumuman').DataTable().ajax.reload();
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