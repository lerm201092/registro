
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
			.card-content{
				margin-top:-20px;
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
			<br>
			<div id="cont1" class="col s12">
                <div class="row">
                    <div class="col s12 m4">
                        <div class="card grey lighten-4">
                            <div class="card-content ">
                                <span class="card-title">Cantidad de Votantes</span>
                                <h5 class="center red-text text-lighten-1" id="cantPerson"></h5>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row">
                    <div class="col s12 m4">
                        <div class="card grey lighten-4">
                            <div class="card-content ">
                                <span class="card-title">Lideres Con Mas Votos</span>
                                <table class="striped" id="cantLider"></table>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row">
                    <div class="col s12 m4">
                        <div class="card grey lighten-4">
                            <div class="card-content " style="text-align:center">
                                <span class="card-title">Ciudades Mas Relevantes</span>
								<br>
                                <table style="display:none" class="striped" id="cantCiudad"></table>
								<canvas id="chart-area" width="250%" height="250%"></canvas>
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

</div>
<script>
// Documento Listo 
$( document ).ready(function(){
				$('.button-collapse').sideNav({
					menuWidth: 300, // Default is 300
					edge: 'left', // Choose the horizontal origin
					closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
					draggable: true, // Choose whether you can drag to open on touch screens,
					onOpen: function(el) { / Do Stuff / }, // A function to be called when sideNav is opened
					onClose: function(el) { / Do Stuff / }, // A function to be called when sideNav is closed
				  }
				);
				consultarPersonas();
				consultarLideres();
				consultarCiudad();
				
			});

			function consultarLideres() {
				$.ajax({
					url: "php/consultarLideres.php",
					type: "POST",
					data: "",
					success: function(resp)        
					{
						$("#cantLider").html(resp);
					}       
				});
				
			}
			function consultarCiudad() {
				$.ajax({
					url: "php/consultarCiudad.php",
					type: "POST",
					data: "",
					success: function(resp)        
					{
						$("#cantCiudad").html(resp);
						var ciudad1=$("#td11").html();
						var cant1=$("#td21").html();
						var ciudad2=$("#td12").html();
						var cant2=$("#td22").html();
						var ciudad3=$("#td13").html();
						var cant3=$("#td23").html();
						var ciudad4=$("#td14").html();
						var cant4=$("#td24").html();
						var ciudad5="Otros";
						var cant5=$("#cantPerson").html();
						cant5=parseInt(cant5);
						cant5= cant5 -parseInt(cant1)-parseInt(cant2)-parseInt(cant3)-parseInt(cant4);

						
						var pieData = [ {
								value:parseInt(cant1),
								label: ciudad1,
								color:"#0b82e7",
								highlight: "#0c62ab"
							},
							{
								value:parseInt(cant2),
								label: ciudad2,
								color: "#ea80fc",
								highlight: "#e040fb"
								
							},
							{
								value:parseInt(cant3),
								label: ciudad3,
								color: "#e3e860",
								highlight: "#a9ad47"
								
							},
							{
								value:parseInt(cant4),
								label: ciudad4,
								color: "#eb5d82",
								highlight: "#b74865"
							},
							{
								value:parseInt(cant5),
								label: ciudad5,
								color: "#5ae85a",
								highlight: "#42a642",
							}
						];


var ctx = document.getElementById("chart-area").getContext("2d");
window.myPie = new Chart(ctx).Pie(pieData);
					}       
				});
				
			}

function consultarPersonas() {
	$.ajax({
		url: "php/consultarVotantes.php",
		type: "POST",
		data: "",
		success: function(resp)        
		{
			$("#cantPerson").html(resp);
		}       
	});
	
}






</script>
	
	</body>

</html>