<div class="col s12 m6">
  <div class="card">
    <div class="card-content">
      <span class="card-title teal-text">{{ $collection->name }}</span>
      <p>{{ $collection->description }}</p>
    </div>
    <div class="card-action">
      <a class="blue-grey-text" href="/collection/{{$collection->id}}">View</a>
    </div>
  </div>
</div>