@extends('components.master')

@section('body')

  <h1 class="card-panel">New Collection</h1>

  <form action="/collection" method="post">

    {{ csrf_field() }}

    <div class="input-field card-panel">
      <input name="collection_name" id="collection_name" type="text" class="validate">
      <label for="collection_name">Collection Name</label>
    </div>

    <div class="input-field card-panel">
      <textarea name="collection_description" id="collection_description" class="materialize-textarea" data-length="15000"></textarea>
      <label for="collection_description">Collection Description</label>
    </div>

    <input class="btn" type="submit" value="Create">

  </form>

@endsection

<style>

  h1 {
    font-size: 28px !important;
    text-align: center;
  }

  label {
    margin: 25px;
  }

  input[type=submit] {
    width: 100%;
  }

</style>