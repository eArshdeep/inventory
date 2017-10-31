@extends('components.master')

@section('body')

  <h1 class="card-panel center-align">Modify {{$item->name}}</h1>

  <form action="/item/{{$item->id}}" method="post">

    {{ csrf_field() }}

    <input name="_method" type="hidden" value="put">

    <div class="input-field card-panel">
      <input name="name" value="{{ old('name', $item->name) }}" id="name" type="text" class="validate">
      <label for="name">Item Name</label>
    </div>

    <div class="input-field card-panel">
      <textarea name="description" id="description" class="materialize-textarea" data-length="15000">{{ old('description', $item->description) }}</textarea>
      <label for="description">Item Description</label>
    </div>

    <div class="input-field card-panel">
      <select name="parent_collection">
        <option value="" disabled>Select Parent Collection</option>
        @foreach( $collections as $collection )
          {{-- Is this collection's id the same one the user previously entered? For when server returns data. --}}
          @if ( $collection->id == old('parent_collection') )
            <option value="{{$collection->id}}" selected>{{$collection->name}}</option>
          {{-- Is this collection's id the one for the item being modified? For when the form is first loaded. --}}
          @elseif ( $collection->id == $item->collection_id && old('parent_collection') === null )
              <option value="{{$collection->id}}" selected>{{$collection->name}}</option>
          {{-- No match is found. For all other non selected options. --}}
          @else
            <option value="{{$collection->id}}">{{$collection->name}}</option>
          @endif
        @endforeach
      </select>
    </div>

    <div class="row">
      <div class="col s12 m6">
        <a class="btn grey darken-1" href="/item/{{$item->id}}">Nevermind</a>
      </div>
      <div class="col s12 m6">
        <input class="btn" type="submit" value="Update">
      </div>
    </div>

  </form>

@endsection

<style>

  h1 {
    font-size: 28px !important;
  }

  label {
    margin: 25px;
  }

  .btn {
    width: 100%;
    margin: 5px 0;
  }

</style>

@section('additional-scripts')
  <script>
    $(document).ready(function() {
      $('select').material_select();
    });
  </script>
@endsection