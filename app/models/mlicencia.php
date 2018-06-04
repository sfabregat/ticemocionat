<?php

class mLicencia extends Model{

		function __construct(){
			parent::__construct();
		}	

		/**
      * upgradeli() : función que sirve para actualizar la licencia de la aplicación hace una consulta a nuestra base para saber si hay datos si no se insertan y entonces actualiza su base de datos para poder seguir insertando registros
      *
      * @param $licencia
      * @param $nombre nombre del cliente/empresa
	   *@param $cif cif de la empresa
	   *@param $address direccion de la empresa
	   *@param $cp codigo postal
	   *@param $cc cuenta corriente
	   *@param $phone telefono
	   *@param $ciudad  ciudad de la empresa
      *
    */
		function upgradeli($licencia,$nombre,$cif,$address,$cp,$cc,$phone,$ciudad){
			$dsn='mysql:host=localhost;dbname=pruebamydb';
			$usuari='root';
			$password='';
			$dbh= new PDO($dsn,$usuari,$password);
			//Hago una actualizacion en la base local para que el usuario pueda crear mas usuarios sumandole los que ha comprado
			if ($dbh->connect_error) {
    			die("Connection failed: " . $dbh->connect_error);
			}
			$query='UPDATE licencia SET numusuarios = numusuarios + :licencia;';
            $this->query($query);
            $this->bind(':licencia',$licencia);
            $this->execute();
            //Compruebo si el usuario existe en la base del negocio
            $stmt=$dbh->prepare("SELECT idClientes from Clientes where nombre=:name;");
            $stmt->bindParam(':name',$nombre);
			$stmt->execute();
			if($stmt->rowCount()==0){
				//Si no existe lo inserto y tambien compruebo la existencia de la ciudad y si no existe tambien se inserta
				 $stmt=$dbh->prepare("SELECT idCiudades from ciudades where nombre=:city;");
				 $stmt->bindParam(':city',$ciudad);
				$stmt->execute();
				if($stmt->rowCount()==0){
					//Inserto la ciudad en caso que no exista y si no cojo su id
					$stmt=$dbh->prepare('INSERT INTO `negocio`.`ciudades` (`nombre`) VALUES (:city);');
					$stmt->bindParam(':city',$ciudad);
					$stmt->execute();
					$city2=$dbh->lastInsertId();
				}
				else{
				$row = $stmt->fetchall(PDO::FETCH_ASSOC);
				$city2=(string)$row[0]['idCiudades'];
				}
				//Inserto el usuario en caso que no exista y si no cojo su id
				$stmt=$dbh->prepare('INSERT INTO clientes(nombre,CP,direccion,cif,Ciudades_idCiudades,telefono,cuentabanc) 
					VALUES(:nombre,:cp,:dir,:cif,:city,:phone,:cc)');
					$stmt->bindParam(':nombre',$nombre);
					$stmt->bindParam(':cp',$cp);
					$stmt->bindParam(':dir',$cc);
					$stmt->bindParam(':cif',$cif);
					$stmt->bindParam(':city',$city2);
					$stmt->bindParam(':phone',$phone);
					$stmt->bindParam(':cc',$cc);
					$stmt->execute();
					$cliente=$dbh->lastInsertId();
			}
			else{
				$row = $stmt->fetchall(PDO::FETCH_ASSOC);
				$cliente=(string)$row[0]['idClientes'];
			}
			//inserto el pedido y cojo la id para luego insertar la linea de pedido
            $stmt=$dbh->prepare('INSERT INTO pedidos(fecha,estado,Clientes_idClientes) VALUES(now(),"pendiente",:cliente)');
					$stmt->bindParam(':cliente',$cliente);
					$stmt->execute();
					$lastId = $dbh->lastInsertId();
					$stmt=$dbh->prepare("SELECT idPaquetes from paquetes where numero=:licencia");
					$stmt->bindParam(':licencia',$licencia);
					$stmt->execute();
					$row = $stmt->fetchall(PDO::FETCH_ASSOC);
					$paquete=(string)$row[0]['idPaquetes'];
			$stmt=$dbh->prepare('INSERT INTO pedido_linea(Pedidos_idPedidos,cantidad,Paquetes_idPaquetes) VALUES(:pedido,1,:paquete)');
					$stmt->bindParam(':pedido',$lastId);
					$stmt->bindParam(':paquete',$paquete);
					$stmt->execute();

		}
}

		?>