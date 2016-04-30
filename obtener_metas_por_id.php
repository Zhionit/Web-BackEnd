<?php

	/**
	 * Obtiene el detalle de un meta dado un identificador
	 */


	require "Meta.php";

	if ($_SERVER['REQUEST_METHOD'] == 'GET') 
	{
		if (isset($_GET['idMeta'])) 
		{
			// Obtener parametro idMeta
			$parametro = $_GET['idMeta'];

			//Tratar retorno
			$retorno = Meta::getById($parametro);

			if ($retorno) 
			{
				$meta["estado"] = 1;
				$meta["meta"] = $retorno;

				print json_encode($meta);
			}

			else
			{
				print json_encode(array(

					'estado' => '2',
					'mensaje' => 'No se encontró el registro solicitado'

					));
			}
		}

		else
		{
			//Se envía respuesta de error si no hay identificador

			print json_encode(array(

				'estado' => '3',
				'mensaje' => 'Se necesita un identificador'

				));
		}
	}

?>