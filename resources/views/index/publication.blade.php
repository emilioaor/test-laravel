@extends('template.main')
@section('title','Publicacion: '.$publication->title)
@section('h3')
	{{ $publication->title }}
	@if( !is_null(\Request::cookie('plq'.$publication->id) ) )
		<a href='{{ url('my/publications') }}' class="btn btn-success">Hecha por ti</a>
	@endif
@endsection
@section('content')
	<a href="{{ url('/') }}"> << Volver a Todas las Publicaciones</a><hr>
	<div class="row">
		<div class="col-md-12">
			<p>
				<strong>Categorias: </strong>
				@foreach($publication->categories as $category )
					| {{ $category->category }}
				@endforeach |
			</p><br>
		</div>
		<div class="col-md-12">
			{!! $publication->publication !!}
		</div>
	</div>
	<hr><h3>Comentarios</h3><hr>
	<form action="{{ url('comment/send') }}" id="formComment" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="publication_id" id="publication_id" value="{{ $publication->id }}">
		<div class="form-group">
			<label for="name">Nombre</label>
			<input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
		</div>
		<div class="form-group">
			<label for="comment">Comentario</label>
			<textarea name="comment" id="comment" class="form-control" cols="30" rows="5" placeholder="Comentario" required></textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-default">Enviar</button>
		</div>
	</form><hr>
	<div class="spaceComments" id="spaceComments">
		@foreach($comments as $comment)
			<div class="comments">
				<p><strong>Fecha:</strong> <small>{{ $comment->created_at }}</small></p>
				<p><strong>{{ $comment->name }} dice:</strong> {{ $comment->comment }}</p>
			</div>
		@endforeach
	</div>
@endsection