<?php		
class Pelicula_View {
	protected $vista_nombre;
	
	function __construct($vista) {
		$this->vista = $vista;
	}
	
	public function carga_template($data) {
		$path_paltilla = '../html/view_template.html';
		require_once($path_paltilla);
	}
}
?>