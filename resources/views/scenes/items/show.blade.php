@extends('components.master')

@section('body')

  <div class="card-panel center-align">
    <p class="label-margin grey-text">item</p>
    <h1>{{ $item->name }}</h1>
    <p class="label-margin grey-text text-darken-2">in {{ strtolower($item->collection->name) }} collection</p>
  </div>

  <div class="card-panel center-align">
    <p class="grey-text">description</p>
    {{ $item->description }}
  </div>

  <div class="row">
    <div class="col s12 m6">
      <a href="/item/{{$item->id}}/edit" class="btn">Modify</a>
    </div>
    <div class="col s12 m6">
      <form action="/item/{{$item->id}}" method="post">
        <input name="_method" type="hidden" value="delete">
        <input class="btn red lighten-2" type="submit" value="Remove Item" id="btnDelete">
        {{ csrf_field() }}
      </form>
    </div>
  </div>

@endsection

<style>

  h1, h2 {
    font-size: 28px !important;
    margin: 0 !important;
  }

  .label-margin {
    margin: 5px;
  }

  .btn {
    width: 100% !important;
    margin: 5px 0;
  }

</style>

@section('additional-scripts')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{ asset('js/deleteConfirmation.js') }}"></script>
@endsection