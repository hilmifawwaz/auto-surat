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
  <table class="table table-striped table-bordered" id="tablewilayah" style="width: 100%">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">Kode</th>
        <th class="text-center">Kelurahan</th>
        <th class="text-center">Kecamatan</th>
        <th class="text-center">Kabupaten</th>
        <th class="text-center">Provinsi</th>
        <th class="text-center">Nama Wilayah</th>
        <th class="text-center">Pencarian Wilayah</th>
        <th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $('#page-title').html('Data Wilayah');
    $('#btnwilayah').addClass('active');

    $('#tablewilayah').DataTable({
      "responsive": true,
      "processing": true,
      "serverside": true,
      "ajax": {
        "url": "/get-wilayah",
        "type": "GET"
      },
      "columns": [
        {data: 'DT_RowIndex', nama: 'DR_RowIndex', orderable: false},
        {data: 'kode', name: 'Kode'},
        {data: 'kelurahan', name: 'Kelurahan'},
        {data: 'kecamatan', name: 'Kecamatan'},
        {data: 'kabupaten', name: 'Kabupaten'},
        {data: 'provinsi', name: 'Provinsi'},
        {data: 'nama_wilayah', name: 'Nama Wilayah'},
        {data: 'pencarian_wilayah', name: 'Pencarian Wilayah'},
        {data: 'aksi', name: 'Aksi'}
      ],
      "columnDefs": [
        { "targets": [0, 8], "className": "text-center" },
      ],
      "language": {
        "processing": '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
      }
    })
  })
</script>