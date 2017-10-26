@if( count($errors) > 0 )

	@foreach ( $errors->all() as $error )

		<div class="card-panel purple lighten-2 black-text">

			{{ $error }}

		</div>

	@endforeach

@endif