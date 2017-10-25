@extends('components.master')

@section('body')

  @if( count($collections) > 0 )
    <div class="row">
      @foreach($collections as $collection)
        @include('components.card')
      @endforeach
    </div>
  @else
    <p class="flow-text">You currently don't have any collections or items. Click the button in the view to add some!</p>
  @endif

  @include('components.fab')

@endsection