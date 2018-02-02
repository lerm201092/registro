<?php
    session_start();
    if (!@$_SESSION['id_lider']) {
        header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/materialize.css">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<link rel="stylesheet" href="css/sweetalert.min.css">
		<meta charset="UTF-8">		
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title>Registro</title>
		<style>
			#contenedor{
			    margin-left: 300px;					
			}
			
			#cont1{
				margin: 10px;
			}
			table > tr > td{
				height:15px;
			}

			@media screen and (max-width: 1000px) {
				#contenedor{
					margin-left: 0;
				}

			}
			
		</style>
	</head>
	<body onload="verDivs(1);">
		<div id="top" class="grey darken-3" style="height: 25px"></div>
		<div id="menu">
			<nav>
				<div class="nav-wrapper red darken-3">
					<a href="#!" class="brand-logo">Registro</a>
					<a href="#!" id="menu_add" onclick="verDivs('1');" class="brand-logo right"><i class="material-icons hide-on-large-only">add_circle</i></a>
					<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
					<ul class="left hide-on-med-and-down">
					<h5 style="margin-left:330px;float:left;margin-top:20px;">Registro de Votantes &nbsp;&nbsp;</h5>

					</ul>
					<ul class="right hide-on-med-and-down">
					<li  style="float:right;right:0"><a href="php/desconectar.php" id="closeSesion"> <i class="material-icons">person_pin</i> </a></li>

					<li  style="float:right;right:0"><a href="#!" id="closeSesion"> <?php echo $_SESSION['nom_lider']; ?> </a></li>
	
				</ul>


					<ul class="side-nav" id="mobile-demo">
					<br>
					<li><a href="#!"><img src="img/logo.png" alt="" width="100%"></a></li>
					<br>
					<li class="divider"></li>
					<li><a href="sass.html">Perfil</a></li>
					<li><a href="badges.html">Misión</a></li>
					<li><a href="collapsible.html">Visión</a></li>
					<li class="divider"></li>
					<li><a href="#!" onclick="verDivs('1');">Agregar</a></li>
					<li><a href="#!" onclick="verDivs('2');">Listar</a></li>
					<li class="divider"></li>
					<li><a href="php/desconectar.php">Cerrar Sesion</a></li>
					</ul>

					<ul class="fixed side-nav" id="mobile-demo">
						<br>
						<li><a href="#!"><img src="img/logo.png" alt="" width="100%"></a></li>
						<br>
						<li class="divider"></li>
						<li><a href="sass.html">Perfil</a></li>
						<li><a href="badges.html">Misión</a></li>
						<li><a href="collapsible.html">Visión</a></li>
						<li class="divider"></li>
						<li><a href="#!" onclick="verDivs('1');">Agregar</a></li>
						<li><a href="#!" onclick="verDivs('2');">Listar</a></li>
						<li class="divider"></li>
					</ul>
				</div>
			</nav>
		</div>

		<div id="contenedor" class="row" background="img/votos.jpg">
			<div id="cont1" class="col s11 m10 l4" >
                <div class="row">
                    <div class="col s12">
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                                <span class="card-title">Card Title</span>
                                <p>I am a very simple card. I am good at containing small bits of information.
                                    I am convenient because I require little markup to use effectively.</p>
                            </div>
                            <div class="card-action">
                                <a href="#">This is a link</a>
                                <a href="#">This is a link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

		    <div id="cont2" class="col s11 m10 l4 " style="margin:10px">
            </div>

		</div>

		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/materialize.js"></script>
		<script src="JS/sweetalert.js"></script>


	
	</body>

</html>