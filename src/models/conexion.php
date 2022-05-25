<?php

class Conexion{

	public static function conectar(){

		$link = new PDO("mysql:host=127.0.0.1;dbname=replace",
			            "root",
			            "banjoK_");

		$link->exec("set names utf8");

		return $link;

	}

}