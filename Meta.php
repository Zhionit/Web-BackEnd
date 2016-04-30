<?php

	/**
	* Representa la estructura de los metadatos
	* La cual se almacena en la nase de datos
	**/

	require 'Database.php'

	class Metadata
	{
		function __construct()
		{

		}

		/**
	     * Retorna en la fila especificada de la tabla 'meta'
	     *
	     * @param $idMeta Identificador del registro
	     * @return array Datos del registro
	     */

		public static function getAll()
		{
			$consulta = "SELECT * FROM meta";

			try 
			{
				//Se prepara la sentencia
				$comando = Database::getInstance()->getDb()->prepare($consulta);
				// Ejecuta la sentencia preparada
				$comando->execute();

				return $comando->fetchAll(PDO::FETCH_ASSOC);
			} catch (Exception $e) {
				return false;
			}

		}

		/**
		* Obtiene los campos de una meta con un identificador determinado
		*
		* @param $idMeta Identificador de la meta
	    * @return mixed
		*
		**/
		public static function getById($idMeta)
		{
			$consulta = "SELECT idMeta, titulo, descripcion, propiedad, fechaLim, categoria FROM meta WHERE idMeta = ?";

			try 
			{
				$comando = Database::getInstance()->getDb()->prepare($consulta);
				$comando->execute(array($idMeta));
				$row = $comando->fetch(PDO::FETCH_ASSOC);
				return $row;
			} catch (PDException $e) {
				return -1;
			}
		}

		/**
		* Actualiza un registro de la base de datos usando los nuevos valores, basado en un único udentificador
		 * @param $idMeta      identificador
	     * @param $titulo      nuevo titulo
	     * @param $descripcion nueva descripcion
	     * @param $fechaLim    nueva fecha limite de cumplimiento
	     * @param $categoria   nueva categoria
	     * @param $prioridad   nueva prioridad
		*/

		public static function update($idMeta, $titulo, $descripcion, $fechaLim, $categoria, $prioridad)
		{
			//Creando la consulta a la bd

			$consulta = "UPDATE meta" . " SET titulo=?, descripcion=?, fechaLim=?, categoria=?, prioridad=? " . "WHERE idMeta=?"

			$comando = Database::getInstance()->getBd()->prepare($consulta);
			$comando->execute(array($titulo, $descripcion, $fechaLim, $categoria, $prioridad, $idMeta));

			return $consulta;
		}

		/**
		*	Inserción nueva a la bd
		*
	     * @param $titulo      titulo del nuevo registro
	     * @param $descripcion descripción del nuevo registro
	     * @param $fechaLim    fecha limite del nuevo registro
	     * @param $categoria   categoria del nuevo registro
	     * @param $prioridad   prioridad del nuevo registro
	     * @return PDOStatement
		*/

		public static function insert($titulo, $descripcion, $fechaLim, $categoria, $prioridad)
		{
			$consulta = "INSERT INTO meta ( " . "titulo, descripcion, fechaLim, categoria, prioridad) VALUES( ?,?,?,?,?)";

			$comando = Database::getInstance()->getDb()->prepare($consulta);
			$comando->execute(array($titulo, $descripcion, $fechaLim, $categoria, $prioridad));

			return $comando;

		}

		/**
		*	Eliminación de un regisstro de la Bd, por medio de un identificador  
		* 	 @param $idMeta identificador de la meta
     	*	 @return bool Respuesta de la eliminación
		*/

		public static function delete($idMeta)
		{
			$consulta = "DELETE FROM meta WHERE idMeta=?";

			$comando = Database::getInstance()->getDb()->prepare($consulta);
			$comando->execute(array($idMeta));

			return $comando;
		}

	}
?>