<?php

$pass = $_GET["recordar"];

//Connexió a mysql
        $mysql = mysqli_connect("sfabregat.cesnuria.com", "sfabregat_root","rootroot", "sfabregat_pruebamydb");
        if(!$mysql){
            //echo 'no puc establir la connexió';
            //Ara he de construir a ma la direcció
            $err='Error intern. No es pot establir la connexió. Torni a probar-ho més tard';
            echo $err;        
        }
        //Selecció de la base de dades apropiada
        $selected =  mysqli_select_db($mysql, "sfabregat_pruebamydb");
        if(!$selected){
            $err='Error intern. No es pot seleccionar la base de dades. Torni a intentar-ho més tard';
            echo $err;
        }

            $query="select password from usuarios where email = '".$pass."'";
            $result=  mysqli_query($mysql, $query);


        if(!$result){
            $err='Error no es pot afegir verifiqui les dades';
            echo $err;  
        }else{

        $array = mysqli_fetch_assoc($result);

		foreach ($array as &$valor) {  
		}
    }
            $query="select nombre from usuarios where email = '".$pass."'";
            $result=  mysqli_query($mysql, $query);


        if(!$result){
            $err='Error no es pot afegir verifiqui les dades';
            echo $err;  
        }else{

        $array = mysqli_fetch_assoc($result);

		foreach ($array as &$valor_name) {  
		}
    }

$asunto = "Recuperacion de password"; 
$cuerpo = ' 
<html> 
<head> 
   <title>Recuperacion de password</title> 
</head> 
<body> 
<p> 
Hola <b>'.$valor_name.'</b> tu password es <b>'.$valor.'</b>. No te la olvides mas :)
</p> 
</body> 
</html> 
'; 

$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: TicEmocionat\r\n"; 

if (mail($pass,$asunto,$cuerpo,$headers,'-fdireccion@origen.com')){
    echo "Mensaje de recuperacion de contraseña enviado.";
    echo "<br><br><a href='../'>Volver</a>";
}else
{
    echo "Error: Usuario No existe";
    echo "<br><br><a href='../'>Volver</a>";
}

?>