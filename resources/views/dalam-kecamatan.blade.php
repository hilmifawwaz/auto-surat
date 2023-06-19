@extends('layout.main')
@section('main-content')
  <div class="container">
    <div class="text-center mt-3">
      <p class="fw-bold fs-2">Formulir Keterangan Pindah Dalam Kecamatan</p>
    </div>
    <form action="/surat" id="formData" enctype="multipart/form-data">
      
    </form>
  </div>
@endsection

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $('#btnTutor').hide();
    $('#btnBack').show();

    $.ajax({
      type: "GET",
      url: "/get-session",
      dataType: "JSON",

      success: function(response){
        $('#nama').val(response.nama);
        $('#nik').val(response.nik);
        $('#id_surat').val(response.id_surat);

        warga(response.nik);
      }
    })
  })
</script>