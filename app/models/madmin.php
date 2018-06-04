<?php

	class mAdmin extends Model{

		function __construct(){
			parent::__construct();
			
		}

		/**
	  * selectall() : Sacamos numero de usuarios
	  *
	  * 
	  *
  	*/
		function selectall(){
			try{
				$sql = "SELECT * FROM usuarios";
				$this -> query($sql);
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
	  * selectuser() : Seleccionamos todos los usuarios
	  *
	  * 
	  *	@param le pasamos $pag para saber el numero de paginas
	  *
  	*/
		function selectuser($pag){
			try{
				if($pag == NULL){
					$sql = "SELECT * FROM usuarios LIMIT 0,10";
				}else{
					$sql = "SELECT * FROM usuarios LIMIT "+$pag*10+",10";
				}
				$this -> query($sql);
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
	  * deluser() : Borramos a un usuario
	  *
	  * 
	  *	@param $user le pasamos que es la id de usuario
	  *
  	*/
		function deluser($user){
			try{
				$sql = "DELETE FROM usuarios WHERE id_usuario=:user";
				$this -> query($sql);
				$this -> bind(":user",$user);
				$this -> execute();
		    }catch(PDOException $e){
		       echo "Error:".$e->getMessage();
		   }
		}

		/**
	  * upuser() : Actualizamos a un usuario cualquier campo
	  *
	  * 
	  *	@param $email email a actualizar
	  * @param $nombre nombre a actualizar
	  * @param $rol_user rol a actualizar
	  * @param $user id del usuario que va a actualizar
	  *
  	*/
		function upuser($email,$nombre,$rol_user,$user){
			try{
				if($email != NULL){//Revisa que no sean campos NULL y va realizando sentencias sql de UPDATE de cada campo
					$sql = "UPDATE usuarios SET email=:email WHERE id_usuario=:user ";
					$this -> query($sql);
					$this -> bind(":email",$email);
					$this -> bind(":user",$user);
					$this -> execute();
				}
				if($nombre != NULL){
					$sql = "UPDATE usuarios SET nombre=:nombre WHERE id_usuario=:user ";
					$this -> query($sql);
					$this -> bind(":user",$user);
					$this -> bind(":nombre",$nombre);
					$this -> execute();
				}
				if($rol_user != NULL){
					$rol_sql = "SELECT id_rol FROM rol WHERE nombre=:rol";
					$this -> query($rol_sql);
					$this -> bind(':rol',$rol_user);
					$this -> execute();
					$rol = $this -> single();

					$sql = "UPDATE usuarios SET rol=:rol WHERE id_usuario=:user ";
					$this -> query($sql);
					$this -> bind(":user",$user);
					$this -> bind(":rol",$rol[0]['id_rol']);
					$this -> execute();
				}
		    }catch(PDOException $e){
		       echo "Error:".$e->getMessage();
		   }
		}

		/**
	  * adduser() : Añade a un usuario
	  * 
	  *	@param $nombre insertar del nuevo usuario
	  * @param $password a insertar del nuevo usuario 
	  * @param $email a insertar del nuevo usuario 
	  * @param $poblacion a insertar del nuevo usuario
	  * @param $rol_user a insertar del nuevo usuario 
	  *
  	*/
		function adduser($nombre,$password,$email,$poblacion,$rol_user){
			try{
				$sql = "SELECT * FROM usuarios WHERE email=:email";
				$this -> query($sql);
				$this -> bind(':email',$email);
				$this -> execute();
		     if($this -> rowCount() == 0){
		     	   $pob_sql = "SELECT id_poblacion FROM poblacion WHERE nombre=:nombre";//Compara texto desde Input con texto de base de datos, retorna id
				   $this -> query($pob_sql);
				   $this -> bind(':nombre',$poblacion);
				   $this -> execute();
				   $pob = $this -> single();

				   $rol_sql = "SELECT id_rol FROM rol WHERE nombre=:rol";//Compara texto desde Input con texto de base de datos, retorna id
				   $this -> query($rol_sql);
				   $this -> bind(':rol',$rol_user);
				   $this -> execute();
				   $rol = $this -> single();

				    $add = "INSERT INTO usuarios(poblacion,rol,nombre,password,email,puntos) VALUES(:poblacion,:rol,:nombre,:password,:email,0)";//insertamos al usuario
					$this -> query($add);
					$this -> bind(':nombre',$nombre);
					$this -> bind(':password',$password);
					$this -> bind(':email',$email);
					$this -> bind(':poblacion',$pob[0]['id_poblacion']);
					$this -> bind(':rol',$rol[0]['id_rol']);
					$this -> execute();
		           return TRUE;
		     }
		     else {
		          return FALSE;
		      }
		    }catch(PDOException $e){
		       echo "Error:".$e->getMessage();
		   }
		}
	}