@extends('admin.layout.main')
@section('admin-content')
  <h3>Audit Log</h3>
  <div class="table-responsive">
    <table class="table table-striped table-sm" id="tabledashboard">
      <thead>
        <tr>
          <th class="text-center">No.</th>
          <th class="text-center">NIK</th>
          <th class="text-center">Nama Lengkap</th>
          <th class="text-center">Surat</th>
          <th class="text-center">Keperluan</th>
          <th class="text-center">Tanggal</th>
          <th class="text-center">Jam</th>
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
    $('#page-title').html('Dashboard');
    $('#btndashboard').addClass('active')
    $('#tabledashboard').DataTable();
  });
</script>