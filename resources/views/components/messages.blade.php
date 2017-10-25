@if ( session('success') )

	<div class="card-panel teal accent-2 black-text">

		{{ session('success') }}

	</div>

@endif


@if ( session('error') )

	<div class="card-panel red lighten-1 black-text">

		{{ session('error') }}

	</div>

@endif


@if( count($errors) > 0 )

	@foreach ( $errors->all() as $error )

		<div class="card-panel purple lighten-2 black-text">

			{{ $error }}

		</div>

	@endforeach

@endif