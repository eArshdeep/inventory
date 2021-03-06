@extends('components.master')

@section('body')

  <div class="card-panel center-align">
    <p id="name-label" class="grey-text">collection</p>
    <h1>{{ $collection->name }}</h1>
  </div>

  <div class="card-panel center-align">
    <p class="grey-text">description</p>
    {{ $collection->description }}
  </div>

  @if( count($collection->items) > 0 )

    <div class="card-panel center-align item-header">
      <h2>Items</h2>
    </div>

    <div class="row">
      @foreach($collection->items as $item)
        @include('components.item-cards.text')
      @endforeach
    </div>

  @else
    <div class="divider"></div>
    <p class="center-align">No items to show. Lets add some!</p>
  @endif

  <div class="row">

    <div class="col s12 m6">
      <a href="/collection/{{$collection->id}}/edit" class="btn">Modify</a>
    </div>

    <div class="col s12 m6">
      <form action="/collection/{{$collection->id}}" method="post">
        <input name="_method" type="hidden" value="delete">
        <input class="btn red lighten-2" type="submit" value="Delete Collection" id="btnDelete">
        {{ csrf_field() }}
      </form>
    </div>

    <div class="col s12 m6">
      <form action="/collection/{{$collection->id}}/qr/create" method="post">
        {{ csrf_field() }}
        <input type="submit" value="Generate New QR Label" class="btn white black-text">
      </form>
    </div>

    <div class="col s12 m6">
      <form action="/collection/{{$collection->id}}/qr" method="post">
        {{ csrf_field() }}
        <input type="submit" value="View Current QR Label" class="btn white black-text">
      </form>
    </div>

  </div>

@endsection

<style>

  h1, h2 {
    font-size: 28px !important;
    margin: 0 !important;
  }

  #name-label {
    margin: 5px;
  }

  .btn {
    width: 100% !important;
    margin: 5px 0;
  }

  img {
    width: 200px;
    height: 200px;
  }

  .item-header {
    border: 2px solid #009588;
    font-family: sans-serif;
  }

</style>

@section('additional-scripts')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{ asset('js/deleteConfirmation.js') }}"></script>
@endsection