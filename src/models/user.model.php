<?php

require_once "conexion.php";

class ModeloUsuarios
{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
		}



		// $stmt->closeCursor();

		// $stmt = null;
	}

	/*=============================================
	INGRESAR USUARIOS
	=============================================*/
	static public function mdlIngresarUsuarios($tabla, $datos, $fecha)
	{


		$fechaFormat = date("Y-m-d H:i:s", strtotime($fecha));

		$fechaFormat;

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,usuario,password,perfil,estado,ultimo_login, foto) VALUES (:nombre,
		:usuario, :password, :perfil, :estado, :ultimo_login, :foto)");


		$stmt->bindParam("nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam("usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam("password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam("perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam("estado", $datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":foto", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam("ultimo_login", $fechaFormat, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->closeCursor();

		$stmt = null;
	}

	// MODULO EDITAR USUARIO

	public static function mdlEditarUsuarios($tabla, $datos, $fecha)
	{

		$fechaFormat = date("Y-m-d H:i:s", strtotime($fecha));

		$fechaFormat;

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, usuario = :usuario password = :password, ultimo_login = :ultimo_login
		perfil = :perfil, foto = :foto WHERE usuario = :usuario");

		$stmt->bindParam("nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam("usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam("password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam("perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam("estado", $datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam(":foto", $datos["ruta"], PDO::PARAM_STR);
		$stmt->bindParam("ultimo_login", $fechaFormat, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}
		$stmt->closeCursor();

		$stmt = null;
	}
}
