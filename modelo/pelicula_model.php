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
		
		//Metodos de acceso
		public function get_id_peliculaIn() { return $this->id_peliculaIn; }
    public function get_tituloVc() { return $this->tituloVc; }
    public function get_generoVc() { return $this->generoVc; }
		public function get_anioSi() { return $this->anioSi; }
    public function get_clasificacionVc() { return $this->clasificacionVc; }
		public function get_directorVc() { return $this->directorVc; }
		public function get_existenciaIn() { return $this->existenciaIn; }
		public function get_codigoRentaCh() { return $this->codigoRentaCh; }
		public function get_disponibleSi() { return $this->disponibleSi; }
		

    ################################# MÉTODOS ##################################
    # Traer datos de una película
    public function read($datos_pelicula=array()) {
        if((array_key_exists('id_peliculaIn', $datos_pelicula) && 
						($id = $datos_pelicula['id_peliculaIn']) != '')) {
            $this->query = "
                SELECT id_peliculaIn, tituloVc, generoVc, anioSi, clasificacionVc,
											directorVc, existenciaIn, codigoRentaCh, disponibleSi
                FROM   pelicula 
                WHERE  id_peliculaIn = '$id'
            ";

            $this->get_results_from_query();
        }

        if(count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }	
            $this->mensaje_db = 'Película encontrada:';
        } else {
            $this->mensaje_db = 'No hubo coincidencias';
        }
    }
		#Para verificar parcialmente que no exista la pelicula.
		public function read_titulo_director($titulo='', $director='') {
        if($titulo != '' && $director != '') {
            $this->query = "
                SELECT id_peliculaIn, tituloVc, generoVc, anioSi, clasificacionVc,
											directorVc, existenciaIn, codigoRentaCh, disponibleSi
                FROM   pelicula 
                WHERE  tituloVc = '$titulo' AND directorVc = '$director'
            ";

            $this->get_results_from_query();
        }

        if(count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }	
            $this->mensaje_db = 'Película encontrada:';
        } else {
            $this->mensaje_db = 'No hubo coincidencias';
        }
    }
		
		public function read_buscar($datos_pelicula=array(), $limit='') {
        if(array_key_exists('tituloVc', $datos_pelicula) || 
				array_key_exists('anioSi', $datos_pelicula) ||
				array_key_exists('clasificacionVc', $datos_pelicula) ||
				array_key_exists('directorVc', $datos_pelicula) ||
				array_key_exists('generoVc', $datos_pelicula)) {
            $this->query = "
                SELECT id_peliculaIn, tituloVc, generoVc, anioSi, clasificacionVc,
												directorVc, existenciaIn, codigoRentaCh, disponibleSi
                FROM   pelicula 
                WHERE  
								tituloVc = '".$datos_pelicula['tituloVc']."' OR 
								anioSi = '".$datos_pelicula['anioSi']."' OR 
								clasificacionVc = '".$datos_pelicula['clasificacionVc']."' OR 
								generoVc = '".$datos_pelicula['generoVc']."' OR 
								directorVc = '".$datos_pelicula['directorVc']."'
            ";
						if(!empty($limit))
							$this->query .= "$limit";
            $this->get_results_from_query();
        }

        if(count($this->rows) >= 1) {
						$peliculas = array();
            foreach ($this->rows as $pelicula) {
                $peliculas[] = $pelicula;
            }
            $this->mensaje_db = 'Película(s) encontrada(s):';
						return $peliculas;
        } else {
            $this->mensaje_db = 'No hubo coincidencias';
        }
    }

    # Crear un nueva película
    public function create($datos_pelicula=array()) {
        if(array_key_exists('tituloVc', $datos_pelicula) && !empty($datos_pelicula['tituloVc']) &&
						array_key_exists('directorVc', $datos_pelicula) && !empty($datos_pelicula['directorVc']) &&
						array_key_exists('generoVc', $datos_pelicula) && !empty($datos_pelicula['generoVc']) &&
						array_key_exists('anioSi', $datos_pelicula) && !empty($datos_pelicula['anioSi']) &&
						array_key_exists('existenciaIn', $datos_pelicula) && !empty($datos_pelicula['existenciaIn']) &&
						array_key_exists('codigoRentaCh', $datos_pelicula) && !empty($datos_pelicula['codigoRentaCh']) &&
						array_key_exists('clasificacionVc', $datos_pelicula) && !empty($datos_pelicula['clasificacionVc']) &&
						array_key_exists('disponibleSi', $datos_pelicula) && !empty($datos_pelicula['disponibleSi'])) {
            $this->read_titulo_director($datos_pelicula['tituloVc'], $datos_pelicula['directorVc']);
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
								
                $this->execute_single_query();
                $this->mensaje_db = 'Película agregada exitosamente';
            } else {
                $this->mensaje_db = 'La película ya existe';
            }
        } else {
            $this->mensaje_db = 'No se ha agregado la película, verificar que los campo no est&eacute;n vac&iacute;os';
        }
    }

    # Modificar un película
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

    # Eliminar una película
    public function delete($id='') {
        $this->query = "
                DELETE FROM  pelicula
                WHERE       id = '$id'
        ";
        $this->execute_single_query();
        $this->mensaje_db = 'Pelicula eliminada';
    }

	#lista todos las películas
	public function list_items($limit='') {
		$this->query = "
				SELECT id_peliculaIn, tituloVc, generoVc, anioSi, clasificacionVc,
								directorVc, existenciaIn, codigoRentaCh, disponibleSi
				FROM   pelicula 
		";
		if(!empty($limit))
			$this->query .= "$limit";
		
		$this->get_results_from_query();
		
		//si no hubo error

		if(count($this->rows) >= 1) {
			$peliculas = array();			
			foreach ($this->rows as $pelicula) {
					$peliculas[] = $pelicula;
			}
			$this->mensaje_db = 'Lista de películas';			
			return $peliculas;
		} else {
			$this->mensaje_db = 'Lista vacía';
		}
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
