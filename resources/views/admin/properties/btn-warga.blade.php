<form action="#" id="form-button">
  @csrf
  <a href="#" data-id="{{ $data->id_warga }}" class="btn btn-primary btn-sm edit" id="btnEdit{{ $data->id_warga }}">
    <i class="bi bi-pencil-square"></i>
    
  </a>
  <a href="#" data-id="{{ $data->id_warga }}" class="btn btn-danger btn-sm delete" id="btnDelete{{ $data->id_warga }}">
    <i class="bi bi-trash"></i>
  </a>
</form>