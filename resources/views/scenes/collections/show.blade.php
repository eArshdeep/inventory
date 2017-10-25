@extends('components.master')

@section('body')

  <div class="card-panel center-align">
    <p id="collection-label" class="grey-text">collection</p>
    <h1>{{ $collection->name }}</h1>
  </div>

  <div class="card-panel center-align">
    <p class="grey-text">description</p>
    {{ $collection->description }}
  </div>

  <form action="/collection/{{$collection->id}}" method="post">
    <input name="_method" type="hidden" value="delete">
    <input class="btn red lighten-2" type="submit" value="Delete Collection">
    {{ csrf_field() }}
  </form>

@endsection

<style>

  h1 {
    font-size: 28px !important;
    margin: 0 !important;
  }

  #collection-label {
    margin: 5px;
  }

  input[type=submit] {
    width: 100%;
  }

</style>