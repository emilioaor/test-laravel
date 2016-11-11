@extends('template.main')
@section('title','Publica lo que quieras!')
@section('h3','TUS PUBLICACIONES EN ESTA WEB.')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<a href="{{ url('/') }}"> << Volver a Todas las Publicaciones</a><hr>
		</div>
		@foreach($publications as $publication)
			@if( !is_null( \Request::cookie('plq'.$publication->id) ) )
				<div class="col-md-12">
					<div class="publication">
						<h4><a href="{{ url('/'.$publication->id) }}">{{ $publication->title }}</a></h4>
						<p>
							<strong>Autor:</strong> {{ $publication->author }}
							@if( !is_null(\Request::cookie('plq'.$publication->id) ) )
								| <a href='' class="btn btn-success">Hecha por ti</a>
							@endif
						</p>
						<p>
							<strong>Categorias: </strong>
							@foreach($publication->categories as $category) <small> | {{ $category->category }}</small>  @endforeach
						</p>
						<p>{!! str_limit($publication->publication,100) !!}</p>
						<a href="{{ url('/'.$publication->id) }}">Leer...</a>
					</div>
				</div>
			@endif
		@endforeach
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			{{ $publications->render() }}
		</div>
	</div>
@endsection