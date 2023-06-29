@extends('layout.main')

@section('main-content')
  <div class="container">
    <div class="text-center mt-3">
      <p class="fw-bold fs-2">Petunjuk Penggunaan</p>
    </div>
    <div class="mb-3">
      <embed src="tutorial/tutor.pdf" type="application/pdf" width="100%" height="100%">
    </div>
  </div>
@endsection

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $('#btnTutor').hide();
    $('#btnBack').show();
    $('#btnLogin').hide();

  })
</script>