<form action="#" id="form-button">
  @csrf
  <a href="#" data-id="{{ $data->kode }}" class="btn btn-primary btn-sm edit" id="btnEdit{{ $data->kode }}">
    <i class="bi bi-pencil-square"></i>
    
  </a>
  <a href="#" data-id="{{ $data->kode }}" class="btn btn-danger btn-sm delete" id="btnDelete{{ $data->kode }}">
    <i class="bi bi-trash"></i>
  </a>
</form>