	@if(count($errors) > 0)
		<div class="alert alert-danger background-danger col-sm-12">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		        <i class="icofont icofont-close-line-circled text-white"></i>
		    </button>
		    @foreach($errors->all() as $error)
			    <strong>* {{ $error }}</strong><br>
			@endforeach
	    </div>
	@endif

	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			<strong>Success</strong> {{ Session::get('success') }}
		</div>
	@endif

	@if(Session::has('error'))
		<div class="alert alert-danger" role="alert">
			{{ Session::get('error') }}
		</div>
	@endif

	<!-- @if (count($errors) > 0)
		<div class="alert alert-danger" role="alert">
			<strong>Errors:</strong>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif -->
