@if(Session::has('alert'))
	<div class="container">
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="alert {{ Session::get('alert-type') }}">
					<p><strong>Atencion! </strong> {{ Session::get('alert') }}</p>
				</div>
			</div>
		</div>
	</div>
@endif