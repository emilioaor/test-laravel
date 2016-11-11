@extends('template.main')
@section('title','Agrega una publicacion')
@section('h3','Agregar Nueva')
@section('content')
	<a href="{{ url('/') }}"> << Volver a Todas las Publicaciones</a><hr>
	<form action="{{ url('publication/store') }}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="title">Titulo</label>
			<input type="text" name="title" class="form-control" placeholder="Titulo" required>
		</div>
		<div class="form-group">
			<label for="author">Autor</label>
			<input type="text" name="author" class="form-control" placeholder="Autor" required>
		</div>
		<div class="form-group">
			<label for="categories">Categorias</label><br>
			@foreach($categories as $category)
				<input type="checkbox" name="categories[]" value="{{ $category->id }}"><small>{{ $category->category }}</small> |
			@endforeach
		</div>
		<div class="form-group">
			<script src="{{ url('ckeditor/ckeditor.js') }}"></script>
			<textarea name="publication" class="ckeditor"></textarea>
		</div>
		<button type="submit" class="btn btn-default">Agregar</button>
	</form>
@endsection