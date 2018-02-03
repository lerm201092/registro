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
			
			@media screen and (max-width: 1000px) {
				#contenedor{
					margin-left: 0;
				}

			}
			
		</style>
	</head>
	<body>
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

		<div id="contenedor" class="row">
			<div id="cont1" class="col s12">
                <div class="row">
                    <div class="col s12">
                        <div class="card grey lighten-4">
                            <div class="card-content ">
                                <span class="card-title">Votantes</span>
                                <p>Actualmente en nustra base de datos tenemos registrados a 165 personas</p>
                            </div>
                            <div class="card-action" style="text-align:right">
                                <a href="#" >Ver Lista</a>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row">
                    <div class="col s12">
                        <div class="card grey lighten-4">
                            <div class="card-content ">
                                <span class="card-title">Lideres</span>
                                <p>Pedro Luis Quintero : 100 Personas <br>Luis Eduardo Ramos : 85 personas <br> Breys Vega : 63 personas <br>. <br> . <br> John Montero : 10 personas <br></p>
                            </div>
                            <div class="card-action" style="text-align:right">
                                <a href="#" >Ver Lista</a>
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

		<script src="Chart.js"></script>
<div id="canvas-holder" style="text-align:center">
<canvas id="chart-area" width="300" height="300"></canvas>
</div>
<script>

function consultarPersonas() {
	$.ajax({
		url: "php/consultarPersonas.php",
		type: "POST",
		data: datos,
		success: function(resp)        
		{
			
		}       
	});
	
}
var pieData = [ {
					value: 100,
					color:"#0b82e7",
					highlight: "#0c62ab",
					label: "Pedro Luis Quintero"
				},
				{
					value: 85,
					color: "#e3e860",
					highlight: "#a9ad47",
					label: "Luis Eduardo"
				},
				{
					value: 65,
					color: "#eb5d82",
					highlight: "#b74865",
					label: "Brey Vega"
				},
				{
					value: 10,
					color: "#5ae85a",
					highlight: "#42a642",
					label: "John Montero"
				}
			];


var ctx = document.getElementById("chart-area").getContext("2d");
window.myPie = new Chart(ctx).Pie(pieData);	;
</script>
	
	</body>

</html>