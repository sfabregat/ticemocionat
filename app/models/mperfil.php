<?php

class mPerfil extends Model{

		function __construct(){
			parent::__construct();
		}

		/**
      * select_user() : función para cargar los datos del usuario para la pagina del perfil
      *
      * @param $id id del usuario para poder cargar solo sus datos
      *
    */
		function select_user($id){
		    try{
				$sql = "SELECT * FROM usuarios WHERE id_usuario=:id"; 
				$this -> query($sql);
			    $this -> bind(":id",$id);
			    $this -> execute();
			     if($this -> rowCount() >= 1){
			           return $this -> resultSet();//lo pasamos como array al controller
			     }else {
			         	return FALSE;
			     }
		    }catch(PDOException $e){
		       echo "Error:".$e->getMessage();
		   }
		}

		/**
      * cambiarimg() : función para actualizar la imagen de perfil del usuario en la base de datos
      *
      * @param $fuente para poder actualizar su imagen
      *
    */
		function cambiarimg($fuente){
			try{
				 $id = $_SESSION['id_usuario'];
				 $query="INSERT INTO multimedia(fuente,nombre) VALUES(:fuente,:nombre)";
				 $this->query($query);
				 $this->bind(':fuente',$fuente);
				 $this->bind(':nombre',$id);
				 $this->execute();
				 $lastId = $this->db->lastInsertId();
				 $query="UPDATE detalle_imagen_usuario SET multimedia_idmultimedia = :idmult where usuarios_idusuarios = :iduser and foto_perfil=1;";
				 $this->query($query);
				 $this->bind(':idmult',$lastId);
				 $this->bind(':iduser',$id);
				 $this->execute();
				 $this->query($query);	 
			}
			catch(PDOException $e){
				echo "Error:".$e->getMessage();
			}
		}

		/**
      * imagenpaint() : función para poner las imagenes realizadas en el paint en el perfil
      *
      * @param $id para poder sacar immagenes solo de un usuario para su perfil
      *
    */
		function imagenpaint($id){
			try{
				$sql = "SELECT multimedia.fuente FROM ((usuarios INNER JOIN detalle_imagen_usuario ON usuarios.id_usuario=detalle_imagen_usuario.usuarios_idusuarios)INNER JOIN multimedia ON detalle_imagen_usuario.multimedia_idmultimedia=multimedia.idmultimedia) WHERE id_usuario=:id AND foto_perfil = FALSE"; 
				$this -> query($sql);
			    $this -> bind(":id",$id);
			    $this -> execute();
			     if($this -> rowCount() >= 1){
			           return $this -> resultSet();//lo pasamos como array al controller
			     }else {
			         	return FALSE;
			     }
		    }catch(PDOException $e){
		       echo "Error:".$e->getMessage();
		   }
		}

	}
?>	