<?php

require_once "conexion.php";

class ModeloUsuarios
{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor)
	{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetch();

		$stmt->closeCursor();

		$stmt = null;
	}

	/*=============================================
	INGRESAR USUARIOS
	=============================================*/
	static public function mdlIngresarUsuarios($tabla, $datos, $fecha)
	{
		

		$fechaFormat = date("Y-m-d H:i:s", strtotime($fecha));
		echo $fechaFormat;

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,usuario,password,perfil,estado,ultimo_login) VALUES (:nombre,
		:usuario, :password, :perfil, :estado, :ultimo_login)");

		$stmt->bindParam("nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam("usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam("password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam("perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam("estado", $datos["estado"], PDO::PARAM_INT);
		$stmt->bindParam("ultimo_login",$fechaFormat, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->closeCursor();

		$stmt = null;
	}
}
