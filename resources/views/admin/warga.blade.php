@extends('admin.layout.main')
@section('admin-content')
<div class="table-responsive">
  <table class="table table-striped table-sm" id="tablewarga">
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
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
  
@endsection

<script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>
<script>
  $(document).ready( function () {
    $('#page-title').html('Data Warga');
    $('#btnwarga').addClass('active');
    $('#tablewarga').DataTable();
  });
</script>