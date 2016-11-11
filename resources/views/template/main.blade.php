<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/estilos.css') }}">
</head>
<body>
	<header>
		<div class="container">
			<h1>Publica lo que quieras!</h1>
			<p>Escribe lo que quieras y publicalo. Sin registro</p>
			<a href="{{ url('publication/create') }}">Publicar YA</a>
		</div>
	</header>
	<section class="main">
		@include('template.alert')
		<div class="container">
			<h3>@yield('h3')</h3><hr>
			@yield('content')
		</div>
	</section>
	<footer>
		<div class="container">
			<p class="text-center">Publica lo que quieras aqui by Emilio Ochoa</p>
		</div>
	</footer>
	<script src="{{ url('js/jquery.js') }}"></script>
	<script src="{{ url('js/bootstrap.min.js') }}"></script>
	<script src="{{ url('js/eventos.js') }}"></script>
</body>
</html>