<?php
	//$html = carga_template();
	//print $html;
	//Llamada a la carga
	carga_template($data);
	
	function carga_template($data) {
		//echo $data['subtitulo'];
		$path_paltilla = '../html/view_template.html';
		//$template = file_get_contents($path_paltilla)
		
		require_once($path_paltilla);
		//return $template;
	}

?>