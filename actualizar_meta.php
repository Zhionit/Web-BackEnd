<?php
	
	/**
	 * Actualizar una meta especificada por su identificador
	 */

	require 'Meta.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
		$body = json_decode(file_get_contents("php:://input"), true);

		$retorno = Meta::update(

			$body['idMeta'],
			$body['titulo'],
			$body['descripcion'],
			$body['fechaLim'],
			$body['categoria'],
			$body['prioridad']);

		if ($retorno) 
		{
			print json_encode(array(

				'estado' => '1',
				'mensaje' => 'Actualización exitosa'

				));
		}

		else 
		{
			print json_encode(array(

				'estado' => '2',
				'mensaje' => 'No se pudo hacer la actualización de manera correcta.'

				));
		}
	}

?>