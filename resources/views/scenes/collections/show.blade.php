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

  <div class="row">
    <div class="col s12 m6">
      <a href="/collection/{{$collection->id}}/edit" class="btn">Modify</a>
    </div>
    <div class="col s12 m6">
      <form action="/collection/{{$collection->id}}" method="post">
        <input name="_method" type="hidden" value="delete">
        <input class="btn red lighten-2" type="submit" value="Delete Collection">
        {{ csrf_field() }}
      </form>
    </div>
  </div>

@endsection

<style>

  h1 {
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

</style>