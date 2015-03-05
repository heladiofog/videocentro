<?php
require_once('Cliente_View.php');

$view_manager = new Cliente_View($vista);

$data['vista'] = $vista;	//$data contiene la info proveniente del controlador

$view_manager->carga_template($data);

?>