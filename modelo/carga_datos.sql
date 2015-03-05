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
VALUES (null, 'Mart�n Medina Cer�n', 'Reyes', '55555555', '98763', NOW(), 'karito@fdsfi.cd' );

INSERT INTO `helladyo_videocentro`.`cliente` (`id_clienteIn`, `nombreVc`, `telefonoVc`, `direccionVc`, `emailVc`, `cpCh`, `fechaRegistroDt`)
 VALUES (4, 'Homer Simpson', '32421233', 'EEUU', 'homers@simpson.ts', '77789', '2011-11-21');

INSERT INTO `helladyo_videocentro`.`cliente` (`id_clienteIn`, `nombreVc`, `telefonoVc`, `direccionVc`, `emailVc`, `cpCh`, `fechaRegistroDt`)
 VALUES (5, 'Marge Simpson', '31231231', 'EEUU', 'marges@simpaon.ts', '77789', '2011-11-21');

INSERT INTO `helladyo_videocentro`.`cliente` (`id_clienteIn`, `nombreVc`, `telefonoVc`, `direccionVc`, `emailVc`, `cpCh`, `fechaRegistroDt`) 
VALUES (6, 'Luis Ernesto', '98697977', 'Azcapotzalco', 'liu@dsdas.com', '78799', '2011-11-21');

INSERT INTO `helladyo_videocentro`.`cliente` (`id_clienteIn`, `nombreVc`, `telefonoVc`, `direccionVc`, `emailVc`, `cpCh`, `fechaRegistroDt`) 
VALUES (7, 'Xiute Pilli', '78978979', 'Tepoztlan', 'xiute@teozteco.mx', '00988', '2011-11-20');

