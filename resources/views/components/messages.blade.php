@if ( session('success') )

	<script type="text/javascript">
    $( document ).ready(function() {
      Materialize.toast('{{ session('success') }}', 4000);
    });
	</script>

@endif

@if ( session('error') )

	<script type="text/javascript">
    $( document ).ready(function() {
      Materialize.toast('{{ session('error') }}', 8000, 'red accent-2');
    });
	</script>

@endif