<?php

class ControladorUsuarios
{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	public function ctrIngresoUsuario()
	{

		if (isset($_POST["ingUsuario"])) {

			if (
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])
			) {

				$encriptar = crypt($_POST["ingPassword"], '$2a$07$usesomesillystringforsalt$');

				$tabla = "usuarios";

				$item = "usuario";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar) {

					$_SESSION["iniciar"] = "ok";
					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["nombre"] = $respuesta["nombre"];
					$_SESSION["usuario"] = $respuesta["usuario"];
					$_SESSION["foto"] = $respuesta["foto"];
					$_SESSION["perfil"] = $respuesta["perfil"];

					echo '<script>

						window.location = "homepage";

					</script>';
				} else {

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
				}
			}
		}
	}

	/*=============================================
	CREAR USUARIO
	=============================================*/

	static public function ctrCrearUsuario()
	{


		if (isset($_POST["nuevoUsuario"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',  $_POST["nuevoNombre"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoContraseña"])
			) {

				// VALIDAR IMAGEN

				$ruta = "";

				if (isset($_FILES["nuevaFoto"]["tmp_name"])) {


					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					// CREAR DIRECTORIO

					$directorio = "src/view/img/usuarios/" . $_POST["nuevoUsuario"];

					mkdir($directorio, 0775);

					// TIPOS DE DATOS EN FUNCION DEL ARCHIVO CON PHP

					if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

						// GUARDAMOS IMAGEN EN EL DIRECTORIO

						$aleatorio = mt_rand(100, 999);

						$ruta =  "src/view/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);
					}

					if ($_FILES["nuevaFoto"]["type"] == "image/png") {

						// GUARDAMOS IMAGEN EN EL DIRECTORIO

						$aleatorio = mt_rand(100, 999);

						$ruta =  "src/view/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);
					}


					// var_dump(getimagesize($_FILES["nuevaFoto"]["tmp_name"]));
				}
			}
			$tabla = "usuarios";

			$encriptar = crypt($_POST["nuevoContraseña"], '$2a$07$usesomesillystringforsalt$');

			$datos = array(
				"nombre" => $_POST["nuevoNombre"],
				"usuario" => $_POST["nuevoUsuario"],
				"password" => $encriptar,
				"perfil" => $_POST["nuevoPerfil"],
				"estado" => $_POST["nuevoEstado"],
				"ruta" => $ruta
			);

			//$fecha = array ("ultimo_login" => $_POST["fecha"]);
			//$fecha = '2022-07-01 10:18:00';
			$fecha = Date('Y-m-d H:i:s');


			$respuesta = ModeloUsuarios::mdlIngresarUsuarios($tabla, $datos, $fecha);

			if ($respuesta == "ok") {
				echo "<script>
				Swal.fire(
					'Atención!',
					'El usuario a sido creado correctamente!',
					'success'
				).then((result)=>{
					if(result.value){
						window.location = 'user';
					}
				});
				</script>";
			} else {
				echo "<script>
				Swal.fire(
					'Atención!',
					'El usuario o contraseña no deben contener caracteres especiales!',
					'warning'
				).then((result)=>{
					if(result.value){
						window.location = 'user';
					}
				});
				</script>";
			}
		}
	}
	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor)
	{

		$tabla = "usuarios";
		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
	}


	/*=============================================
	EDITAR USUARIOS
	=============================================*/
	static public function ctrEditarUsuarios()
	{

		if (isset($_POST["editarUsuario"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',  $_POST["editarNombre"])
			) { // VALIDAR IMAGEN

				$ruta = $_POST["fotoActual"];

				if (isset($_FILES["editarFoto"]["tmp_name"])) {


					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					// CREAR DIRECTORIO

					$directorio = "src/view/img/usuarios/" . $_POST["editarUsuario"];

					// PREGUNTAR SI YA EXISTE UNA FOTO

					if (!empty($_POST["fotoActual"])) {
						unlink($_POST["fotoActual"]);
					} else {
						mkdir($directorio, 0775);
					}


					// TIPOS DE DATOS EN FUNCION DEL ARCHIVO CON PHP

					if ($_FILES["editarFoto"]["type"] == "image/jpeg") {

						// GUARDAMOS IMAGEN EN EL DIRECTORIO

						$aleatorio = mt_rand(100, 999);

						$ruta =  "src/view/img/usuarios/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);
					}

					if ($_FILES["editarFoto"]["type"] == "image/png") {

						// GUARDAMOS IMAGEN EN EL DIRECTORIO

						$aleatorio = mt_rand(100, 999);

						$ruta =  "src/view/img/usuarios/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);
					}


					// var_dump(getimagesize($_FILES["nuevaFoto"]["tmp_name"]));
				}
				$tabla = "usuarios";

				if ($_POST["editarUsuario"] != "") {

					if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarNombre"]) && 
						preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {

						$encriptar = crypt($_POST["ingPassword"], '$2a$07$usesomesillystringforsalt$');
					} else {
						echo "<script>
					Swal.fire(
						'Atención!',
						'La contraseña no deben contener caracteres especiales o estar vacios!',
						'warning'
					).then((result)=>{
						if(result.value){
							window.location = 'user';
						}
					});
					</script>";
					}
				} else {
					// $encriptar = $passwordActual;
				}
				$datos = array(
					"nombre" => $_POST["editarNombre"],
					"usuario" => $_POST["editarUsuario"],
					"password" => $encriptar,
					"perfil" => $_POST["editarPerfil"],
					"estado" => $_POST["editarEstado"],
					"ruta" => $ruta
				);

				$fecha = Date('Y-m-d H:i:s');

				$respuesta = ModeloUsuarios::mdlEditarUsuarios($tabla, $datos, $fecha);

				if ($respuesta == "ok") {
					echo "<script>
					Swal.fire(
						'Atención!',
						'El usuario a sido modificado correctamente!',
						'success'
					).then((result)=>{
						if(result.value){
							window.location = 'user';
						}
					});
					</script>";
				}
			}else{
				echo "<script>
				Swal.fire(
					'Atención!',
					'El nombre no puede ir vacio o tener caracteres especiales!',
					'success'
				).then((result)=>{
					if(result.value){
						window.location = 'user';
					}
				});
				</script>";
			}
		}
	}
}
