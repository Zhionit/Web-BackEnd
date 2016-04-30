<?php
	/**
	 * Se hace la eliminación de un meta de la Bd, usando un identificador
	 */

	requiere 'Meta.php';

	if ($_SERVER[REQUEST_METHOD] == 'POST') 
	{
		$body = json_decode(file_get_contents("php://input"), true);

		$restorno = Meta::delete($body['idMeta']);

		if($restorno)
		{
			print json_encode(array(

				'estado' => '1',
				'mensaje' => "Eliminación correcta"

				));
		}
		else
		{
			print json_encode(array(

				'estado' => '1',
				'mensaje' => 'No se pudo hacer la eliminación de manera correcta'

				));
		}
	}

?>