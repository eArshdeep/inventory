@extends('components.master')

@section('body')

  <h1 class="card-panel">New Item</h1>

  <form action="/item" method="post">

    {{ csrf_field() }}

    <div class="input-field card-panel">
      <input name="item_name" value="{{ old('item_name') }}" id="item_name" type="text" class="validate">
      <label for="item_name">Item Name</label>
    </div>

    <div class="input-field card-panel">
      <textarea name="item_description" id="item_description" class="materialize-textarea" data-length="15000">{{ old('item_description') }}</textarea>
      <label for="item_description">Item Description</label>
    </div>

    <div class="input-field">
      <select name="item_parent_collection_id">
        <option value="" disabled selected>Select Parent Collection</option>
        @if( count($collections) > 0 )
          @foreach( $collections as $collection )
            <option value="{{$collection->id}}">{{$collection->name}}</option>
          @endforeach
        @endif
      </select>
    </div>

    <input class="btn" type="submit" value="Create Item">

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

@section('additional-scripts')
  <script>
    $(document).ready(function() {
      $('select').material_select();
    });
  </script>
@endsection