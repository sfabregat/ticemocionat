<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
	<meta charset="UTF-8">
	<link href='https://fonts.googleapis.com/css?family=Lato|Raleway|Indie+Flower' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Noto+Sans|PT+Sans+Narrow' rel='stylesheet' type='text/css'>
    <link rel="stylesheet"  type="text/css" href="<?= APP_W.'pub/css/final.css'; ?>">
    <script src="<?= APP_W.'pub/js/jquery.min.js'; ?>"></script>
    <script src="<?= APP_W.'pub/js/jquery-ui.min.js'; ?>"></script>
    <script src="<?= APP_W.'pub/js/parallax.min.js'; ?>"></script>
    <script src="<?= APP_W.'pub/js/app.js'; ?>"></script>
</head>
<body>
	<header>
	        <div class="head-column">
	            <div>
	                <a href="<?= APP_W; ?>"><h1>TICemocionat</h1><img src="/M-master/pub/images/logo.png" /></a>
	            </div>
		<?php 
			if(isset($_SESSION['user']) == FALSE){
				echo '<div id="black-screen"></div>
					  <div id="dialog-login" title="Accede">
							<div class="box">
								<h3>Entra en tu cuenta</h3>
								
								<form class="form-log form" action="../M-master/home/login" method="POST">
									<fieldset>
										<div class="row">
											<input type="text" class="login" name="email" placeholder="Usuario" />
										</div>
										<div class="row">
											<input type="password" class="password" name="password" placeholder="Contraseña"/>
										</div>	
										<div class="recordar">Recordar contraseña</div>
										<div class="row">
											<input id="ingresar" type="submit" value="Ingresar" />
										</div>
									</fieldset>
								</form>	
							</div>
					</div>

				<div id="user-account">
	                <div id="login">INICIA SESIÓN</div>
	            </div>
	            <div id="login-img"><img src="../M-master/pub/images/user.png" /></div>
	            ';

			}else{
				echo '<div id="user-account">
	                	<a href="/M-master/perfil"><span>'.$_SESSION['user'].'</span></a>
	            	</div><a id="logout" href="/M-master/home/logout">Salir</a>';
			}
		?>		
		</div>
	</header>