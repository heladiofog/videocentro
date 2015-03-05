<?php
	//Clase para la carga de las Vistas
	//$view_manager = new Pelicula_View($vista);
	//$view_manager->carga_template($data);
		
class Cliente_View {
	protected $vista_nombre;
	
	function __construct($vista) {
		$this->vista = $vista;
	}
	
	public function carga_template($data) {
		//echo "vi ", $data['vista'], " agregar ";
		$path_paltilla = '../html/view_template.html';
		
		require_once($path_paltilla);
	}
}
?>