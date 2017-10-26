@extends('components.master')

@section('body')

  <h1 class="card-panel center-align">Modify {{$collection->name}}</h1>

  <form action="/collection/{{$collection->id}}" method="post">

    {{ csrf_field() }}

    <input name="_method" type="hidden" value="put">

    <div class="input-field card-panel">
      <input name="collection_name" value="{{ old('collection_name', $collection->name) }}" id="collection_name" type="text" class="validate">
      <label for="collection_name">Collection Name</label>
    </div>

    <div class="input-field card-panel">
      <textarea name="collection_description" id="collection_description" class="materialize-textarea" data-length="15000">{{ old('collection_description', $collection->description) }}</textarea>
      <label for="collection_description">Collection Description</label>
    </div>

    <input class="btn" type="submit" value="Update">

  </form>

@endsection

<style>

  h1 {
    font-size: 28px !important;
  }

  label {
    margin: 25px;
  }

  input[type=submit] {
    width: 100%;
  }

</style>