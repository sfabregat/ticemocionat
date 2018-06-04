<?php

	function GetDB(){
		$dsn = 'mysql:dbname=pruebamydb;host=loclahost';
		$usuario = 'root';
		$contrasena = '';

		try {
		    $gbd = new PDO($dsn, $usuario, $contrasena);
		} catch (PDOException $e) {
		    echo 'Falló la conexión: '  . $e->getMessage();
		}
		return $gbd;
	}
	