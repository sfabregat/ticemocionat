 <?php
		$dsn = 'mysql:dbname=sfabregat_pruebamydb;host=sfabregat.cesnuria.com';
		$usuario = 'sfabregat_root';
		$contrasena = 'rootroot';

		try {
		    $gbd = new PDO($dsn, $usuario, $contrasena);
		} catch (PDOException $e) {
		    echo 'Falló la conexión: '  . $e->getMessage();
		}finally{
			echo "PDO OK<br><br>";
		}

$sql = "SELECT nombre,password FROM usuarios";
foreach($gbd->query($sql) as $row){
    echo $row['nombre'];
}
?>
