@extends('components.master')

@section('body')

  <div class="card-panel center-align">
    <h1>Scan Label</h1>
  </div>

  <div class="card-panel center-align">
    <video id="preview"></video>
  </div>

  <form action="/scan" method="post">
    <input type="hidden" name="code" id="code" value="">
    <input type="submit">
    {{ csrf_field() }}
  </form>

@endsection

<style>

  h1 {
    font-size: 28px !important;
    margin: 0 !important;
  }

  input[type="submit"] {
    display: none;
  }

</style>

@section('additional-scripts')
  <script src="{{ asset('js/instascan.min.js') }}"></script>

  <script type="text/javascript">
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (code) {
      $("#code").attr("value", code);
      $("form").submit();
    });
    Instascan.Camera.getCameras().then(function (cameras) {
      if (cameras.length > 0) {
        scanner.start(cameras[0]);
      } else {
        Materialize.toast('No cameras found.', 4000)
      }
    }).catch(function (e) {
      Materialize.toast('Ran into an error, please try again', 4000)
      console.error(e);
    });
  </script>
@endsection