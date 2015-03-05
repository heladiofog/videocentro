INSERT INTO pelicula (id_peliculaIn, tituloVc, generoVc,  anioSi,  clasificacionVc, 
		directorVc,  existenciaIn,  codigoRentaCh,  disponibleSi)
VALUES (null, 'Hellraiser II', 'Terror', 1988, 'PG', 'Clive Barker', '5', 'A', 5);


/*prueba de consultas*/

SELECT id_peliculaIn, tituloVc, generoVc, anioSi, clasificacionVc,
				directorVc, existenciaIn, codigoRentaCh, disponibleSi
FROM   pelicula 
WHERE  tituloVc = 'Hellraiser' AND directorVc = 'Clive Barker'
--WHERE  tituloVc = '$tituloVc' AND directorVc = '$directorVc'

--
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

--listado de todos
SELECT id_peliculaIn, tituloVc, generoVc, anioSi, clasificacionVc,
				directorVc, existenciaIn, codigoRentaCh, disponibleSi
FROM   pelicula;

/*************CLIENTES****************************************/
INSERT INTO Cliente (id_clienteIn, nombreVc, direccionVc, telefonoVc, cpCh, fechaRegistroDt, emailVc)
VALUES (null, 'Martín Medina Cerón', 'Reyes', '55555555', '98763', NOW(), 'karito@fdsfi.cd' );