<div class="col s12 m6">
  <div class="card">
      <div class="card-image waves-effect waves-block waves-light">
        <img class="activator" src="https://images.unsplash.com/photo-1438824086897-500332bf6e9b?w=1655&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D">
      </div>
      <div class="card-content">
        <span class="card-title activator grey-text text-darken-4">{{$item->name}}<i class="material-icons right">more_vert</i></span>
      </div>
      <div class="card-reveal">
        <span class="card-title grey-text text-darken-4">{{$item->name}}<i class="material-icons right">close</i></span>
        <p>{{$item->description}}</p>
        <a href="" class="btn cyan">More</a>
      </div>
  </div>
</div>