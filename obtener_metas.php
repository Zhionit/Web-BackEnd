<?php
	/**
	 * Obtener los metas de la Bd
	 */

	require "Meta.php";

	if ($_SERVER['REQUEST_METHOD'] == 'GET') 
	{
		$metas = Meta::getAll();

		if ($metas) 
		{
			$datos["estado"] = 1;
			$datos["metas"] = $metas;

			print json_encode($datos);
		}

		else
		{
			print json_encode(array(
				'estado' => '2',
				'mensaje' => 'Ha ocurrido un error, sorry!'
				));
		}
	}
?>