<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
  "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
<head>
	<title>{modulo}: {subtitulo}</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="/videocentro/css/videocentro.css">
</head>
<body>
<div="pagina">
	<div id="cabecera">
		<h1>Videocentro</h1>
	</div>
	<div id="left_nav">
		<div id="menuV">
			<ul>
				<li><a href="/videocentro/pelis/">Peliculas</a>
					<ul><li>Captura</li></ul>
					<ul><li>Buscar</li></ul>
				</li>
				<li><a href="/videocentro/clientes/">Clientes</a></li>
			</ul>
		</div>
	</div>
	<div id="menu">
		<a href="/videocentro/clientes/{VIEW_LIST_USERS}" title="Listar Usuarios">Listar usuarios</a>
		<a href="/poo/book/mvc/{VIEW_SET_USER}" title="Nuevo usuario">Agregar usuario</a>
		<a href="/poo/book/mvc/{VIEW_GET_USER}" title="Buscar usuario">Buscar/editar usuario</a>
		<a href="/poo/book/mvc/{VIEW_DELETE_USER}" title="Borrar usuario">Borrar usuario</a>
	</div>
	<div id="contenido">
		<h2><?php echo $data['mensaje']; ?></h2>
		
		<div id="mensaje">
			Bienvenido
		</div>
	
		<div id="formulario">
			{formulario}
		</div>
	</div>
	<div id="pie">
			- Blockbuster -
			<?php echo "Inside"; ?>
		</div>
</div>
</body>
</html>
