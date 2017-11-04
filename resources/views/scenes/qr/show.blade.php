@extends('components.master')

@section('body')

  <div class="card-panel center-align">
    <h1>Your Current QR Label</h1>
  </div>

  <div class="card-panel center-align">
    <img alt="generated_qr_code" src="data:image/png;base64, {{ base64_encode(QrCode::encoding('UTF-8')->format('png')->margin(1)->size(220)->generate($qr_code)) }}">
  </div>

  <div class="card-panel center-align">
    <p>
      This is your existing QR label. You can download this to your device or print it out and post it on the physical collection container.
    </p>
    <p>
      Everytime you scan it in our application, it will automatically take you to the associated collection!
    </p>
    <p>
      You can always generate a new QR code from the collection view. Doing so will disable all older QR codes, such as this one.
    </p>
    <p>
      You can always come here to redownload the same QR code that you may have used before. If you generate a new qr code every time however, all older qr codes will stop working!
    </p>
  </div>

@endsection

<style>

  h1 {
    font-size: 28px !important;
    margin: 0 !important;
  }

</style>