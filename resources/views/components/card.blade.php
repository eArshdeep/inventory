<div class="col s12 m6">
  <div class="card">
    <div class="card-content">
      <span class="card-title teal-text">{{ $collection->name }}</span>
      <p>{{ $collection->description }}</p>
      @if( count($collection->items) == 1 )
        <span class="badge new" data-badge-caption="item">{{count($collection->items)}}</span>
      @elseif( count($collection->items) > 1 )
        <span class="badge new" data-badge-caption="items">{{count($collection->items)}}</span>
      @else
        <span class="badge">no items</span>
      @endif
    </div>
    <div class="card-action">
      <a class="blue-grey-text" href="/collection/{{$collection->id}}">View</a>
    </div>
  </div>
</div>