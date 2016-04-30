<?php

	/**
	 * Insertar una nueva meta en la Bd
	 */

	require 'Meta.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
		//Decodificando el formato Json
		$body = json_decode(file_get_contents("php://input"), true);

		//Insertar Meta

		$retorno = Meta::insert($body['titulo'], $body['descripcion'], $body['fechaLim'], $body['categoria'], $body['prioridad']);

		if ($retorno) 
		{
			print json_encode(array(

				'estado' => '1';
				'mensaje' => 'Creación exitosa'

				));
		}
		else
		{
			print json_encode(array(

				'estado' => '2',
				'mensaje' => 'Creación fallida'

				));
		}
	}

?>