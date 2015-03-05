<?php
# Importar modelo de abstracción de base de datos
require_once('../core/db_abstract_model.php');


class Pelicula extends DBAbstractModel {

    ############################### PROPIEDADES ################################
    private $id_peliculaIn;
    private $tituloVc;
    private $generoVc;
		private $anioSi;
    private $clasificacionVc;
		private $directorVc;
		private $existenciaIn;			//cantidad de peliculas en el sistema
		private $codigoRentaCh;			//costo de la renta
		private $disponibleSi;				//cantidad de peliculas disponibles

    ################################# MÉTODOS ##################################
    # Traer datos de una película
    public function read($id='') {
        if($id != '') {
            $this->query = "
                SELECT id_peliculaIn, tituloVc, generoVc, anioSi, clasificacionVc,
											directorVc, existenciaIn, codigoRentaCh, disponibleSi
                FROM   pelicula p
                WHERE  id_peliculaIn = '$id'
            ";
            $this->get_results_from_query();
        }
				//echo "sad / ",count($this->rows);

        if(count($this->rows) == 1) {
						echo "count >> ", count($this->rows);
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje_db = 'Película encontrada';
        } else {
            $this->mensaje_db = 'Película no encontrada';
        }
    }
		
		public function readTituloDirector($tituloVc, $directorVc) {
        if($tituloVc != '' && directorVc != '') {
            $this->query = "
                SELECT id_peliculaIn, tituloVc, generoVc, anioSi, clasificacionVc,
												directorVc, existenciaIn, codigoRentaCh, disponibleSi
                FROM   pelicula 
                WHERE  tituloVc = '$tituloVc' AND directorVc = '$directorVc'
            ";
            $this->get_results_from_query();
        }
				//echo "sad / ",count($this->rows);

        if(count($this->rows) == 1) {
						echo "count >> ", count($this->rows);
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje_db = 'Película encontrada';
        } else {
            $this->mensaje_db = 'Película no encontrada';
        }
    }

    # Crear un nueva película
    public function create($datos_pelicula=array()) {
        if(array_key_exists('tituloVc', $datos_pelicula) &&
						array_key_exists('directorVc', $datos_pelicula)) {
            $this->read($datos_pelicula['tituloVc'],$datos_pelicula['directorVc']);
            if($datos_pelicula['tituloVc'] != $this->tituloVc &&
								$datos_pelicula['directorVc'] != $this->directorVc) {
                foreach ($datos_pelicula as $campo=>$valor) {
                    $$campo = $valor;
                }
                $this->query = "
									INSERT INTO pelicula 
										(id_peliculaIn, tituloVc, generoVc, anioSi,  
										clasificacionVc, directorVc, existenciaIn,  
										codigoRentaCh,  disponibleSi)
									VALUES
										(null,'$tituloVc', '$generoVc', $anioSi, 
										'$clasificacionVc', '$directorVc', $existenciaIn,
										'$codigoRentaCh', $disponibleSi)
                ";
								//echo $this->query;
                $this->execute_single_query();
                $this->mensaje_db = 'Usuario agregado exitosamente';
            } else {
                $this->mensaje_db = 'El usuario ya existe';
            }
        } else {
            $this->mensaje_db = 'No se ha agregado al usuario';
        }
    }

    # Modificar un usuario
    public function update($datos_pelicula=array()) {
        foreach ($datos_pelicula as $campo=>$valor) {
            $$campo = $valor;
        }
				
        $this->query = "
					UPDATE pelicula
					SET tituloVc = '$tituloVc',
							generoVc '$generoVc', 
							anioSi = '$anioSi', 
							clasificacionVc = '$clasificacionVc',
							directorVc = '$directorVc', 
							existenciaIn = '$existenciaIn', 
							codigoRentaCh = '$codigoRentaCh', 
							disponibleSi = '$disponibleSi'
					WHERE  id_peliculaIn = '$id_peliculaIn'
        ";
        $this->execute_single_query();
        $this->mensaje_db = 'Pelicula modificada';
    }

    # Eliminar un usuario
    public function delete($id='') {
        $this->query = "
                DELETE FROM  pelicula
                WHERE       id = '$id'
        ";
        $this->execute_single_query();
        $this->mensaje_db = 'Pelicula eliminada';
    }

	#lista todos los usuarios o varios
	public function list_items() {
		$this->query = "
				SELECT id_peliculaIn, tituloVc, generoVc, anioSi, clasificacionVc,
								directorVc, existenciaIn, codigoRentaCh, disponibleSi
				FROM   pelicula 
		";
		
		$this->get_results_from_query();
		$this->mensaje_db = 'Lista de usuarios';
		return $this->rows;
	}
    # Método constructor
    function __construct() {
			$this->db_name = 'helladyo_videocentro';
    }

    # Método destructor del objeto
    function __destruct() {
        unset($this);
    }
}
?>
