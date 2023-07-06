<?php 
if ($data->status == 'aktif') { ?>

{{-- <div class="badge bg-success text-wrap">
  Aktif
</div> --}}
<button type="button" class="btn btn-success btn-sm aktif" id="btn-aktif{{ $data->id_surat }}" data-id="{{ $data->id_surat }}">
  <b>Aktif</b>
</button>

<?php 
} else{
?>

{{-- <div class="badge bg-danger text-wrap">
  Nonaktif
</div> --}}
<button type="button" class="btn btn-danger btn-sm nonaktif" id="btn-nonaktif{{ $data->id_surat }}" data-id="{{ $data->id_surat }}">
  <b>Nonaktif</b>
</button>
<?php } ?>
