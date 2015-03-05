<?php
require_once('Pelicula_View.php');

$view_manager = new Pelicula_View($vista);

$data['vista'] = $vista;	//$data contiene la info proveniente del controlador

$view_manager->carga_template($data);
?>