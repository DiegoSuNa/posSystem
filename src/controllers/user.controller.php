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

				$tabla = "usuarios";

				$item = "usuario";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]) {

					$_SESSION["iniciar"] = "ok";

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

				$tabla = "usuarios";



				$datos = array(
					"nombre" => $_POST["nuevoNombre"],
					"usuario" => $_POST["nuevoUsuario"],
					"password" => $_POST["nuevoContraseña"],
					"perfil" => $_POST["nuevoPerfil"],
					"estado" => $_POST["nuevoEstado"]
				);

				$fecha = array ("ultimo_login" => $_POST["fecha"]);


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
				}
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
}
