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
			<div id="cont1" class="col s11 m10 l4 card-panel" >
			<form  style="padding:15px 15px;box-sizing:border-box">

					
					
					<div class="input-field col s12">
						<input style="font-size:14px;" id="nombres" type="text" class="validate" autocomplete="on">
						<label for="nombres" >Nombres</label>
					</div>
	
					<div class="input-field col s12">
						<input style="font-size:14px;" id="apellidos" type="text" class="validate">
						<label for="apellidos">Apellidos</label>
					</div>
	
					<div class="input-field col s6">
						<input style="font-size:14px;" id="id" type="number" class="validate">
						<label for="id">Cedula</label>
					</div>

					<div class="input-field col s6">
						<input style="font-size:14px;" id="telefono" type="number" class="validate">
						<label for="telefono">Telefono</label>
					</div>
	
					<div class="input-field col s12">
						<input style="font-size:14px;" id="email" type="email" class="validate">
						<label for="email">Correo</label>
					</div>
					
					<div class="input-field col s6">
						<input style="font-size:14px;" id="direccion" type="text" class="validate">
						<label for="direccion">Direccion</label>
					</div>
					<div class="input-field col s6">
						<input style="font-size:14px;" id="barrio" type="text" class="validate">
						<label for="barrio">Barrio</label>
					</div>
					<div class="input-field col s12">
						<input style="font-size:14px;" id="ciudad" type="text" class="validate">
						<label for="ciudad">Ciudad</label>
					</div>
	
					<a style="margin-top:15px;margin-bottom:20px;" class="waves-effect waves-light btn col s12 red darken-3" id="btAnadir" onclick="ejecutar();">Añadir Votante</a>
					<a  style="margin-top:15px;margin-bottom:20px;display:none" class="waves-effect waves-light btn col s12 red darken-3" id="btCancelar" onclick="limpiar();">Cancelar</a>

	
			</form>
		</div>

		<div id="cont2" class="col s11 m10 l7 " style="margin:10px">
		
			<div class="right input-field col s6 col m4">
					<input id="va_buscar" type="text" class="validate" onkeyup="tabla()">
					<label for="va_buscar">Buscar por Cedula</label>
			</div>
				<table id="tabla2" class="striped"> </table>
		</div>

		</div>

		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/materialize.js"></script>
		<script src="JS/sweetalert.js"></script>


		<script>			
			var fun="1";
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
				$('select').material_select();
				tabla();

				
			});

			function verDivs(idDiv) {

				if (idDiv=="1")
				{	
				
				limpiar();
				fun=1;
				if($(window).width()>1000){
					document.getElementById("cont2").style.display = 'block';
				}else{
					document.getElementById("cont2").style.display = 'none';
				}

				document.getElementById("menu_add").style.display = 'none';
				document.getElementById("cont1").style.display = 'block';
				document.getElementById("btCancelar").style.display = 'none';
				
				document.getElementById("btCancelar").style.width = '48%';
				document.getElementById("btAnadir").style.width = '100%';
				$("#btAnadir").html("Añadir Votante");
				}else if(idDiv=="2"){	
					document.getElementById("menu_add").style.display = 'block';			
				document.getElementById("cont1").style.display = 'none';
				document.getElementById("cont2").style.display = 'block';
				if($(window).width()>1000){
					alert("Escritorio");
					document.getElementById("cont1").style.display = 'block';
				}
				}else if(idDiv=="3"){
					fun=2;
					document.getElementById("menu_add").style.display = 'block';
					document.getElementById("cont1").style.display = 'block';			
					document.getElementById("btCancelar").style.display = 'block';
					document.getElementById("cont2").style.display = 'none';
					document.getElementById("btCancelar").style.width = '48%';
					document.getElementById("btAnadir").style.width = '48%';
					document.getElementById("btCancelar").style.float = 'left';
					document.getElementById("btCancelar").style.marginLeft = '4%';	
					document.getElementById("btAnadir").style.float = 'left';
					$("#btAnadir").html("Actualizar");
				
				}

			}

			//Saber que funcion se ejecuta
			function ejecutar() {
				if(fun=="2" ){
					Actualizar();	

					fun="1";

				}else{
					guardar();
					fun="1";
				}
				
			}
			//Guardar
			function guardar(){
				
				var datos = {
					"id": $("#id").val(),
					"nombre" : $("#nombres").val(),
					"apellido": $("#apellidos").val(),
					"telefono" : $("#telefono").val(),
					"email" : $("#email").val(),
					"ciudad" : $("#ciudad").val(),
					"barrio" : $("#barrio").val(),
					"direccion" : $("#direccion").val()
				}
				
				$.ajax({
					url: "php/guardar.php",
					type: "POST",
					data: datos,
					success: function(resp)        
					{
						if (resp=="0"){
							swal("Error !", "Esta identificacion, ya se encuentra registrada en nuestra base de datos",  "warning");
						}else{
							swal("Buen Trabajo!", "Usuario Registrado",  "success"); 	
						}
						
						tabla();
						limpiar();
					}       
				});


			}



			//Refrescar la tabla
			function tabla(){				
				var i=0;
				var valor=$("#va_buscar").val().toString();
				if(valor==""){
					i=0;
				}
				else
				{       
					i=1;        
				}			

				$.ajax({
					url: "php/listarVotantes.php",
					type: "POST",
					data: "i="+i+"&valor="+valor,
					success: function(resp)        
					{
						document.getElementById("tabla2").innerHTML = resp;

						$(".btEliminar").click( function(){
							var valores="";
							var i="0";
							var idVotante;
							$(this).parents("tr").find("td").each(function(){
								if(i=="0"){
									idVotante=$(this).html();
								}
								i+=1;	
							});						
							eliminar(idVotante);
						});

						$(".btEditar").click( function(){
							var valores="";
							var i="0";
							var idVotante;
							$(this).parents("tr").find("td").each(function(){
								if(i=="0"){
									idVotante=$(this).html();
								}
								i+=1;	
							});						
							asignartxt(idVotante);
							verDivs('3');
						});


					}       
				});
			}

			//Retirar a una persona
			function eliminar(id){	
				var ced=id;	

				swal({
					title: 'REGISTRO',
					text: 'Desea RETIRAR esta persona de su lista !!!',
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Si, Retirar !',
					cancelButtonText: 'Cancelar',
					timer: 120000,
					onOpen: function () {
						swal.hideLoading()
					}
				}).then(
					function () {
						$.ajax({
							url: "php/eliminar.php",
							type: "POST",
							data: "id="+id,
							success: function(resp)        
							{
								

								swal("Buen Trabajo!", "Persona Retirada de la lista",  "success");
								tabla();
							}       
						});
					},function (dismiss) {
						if (dismiss === 'timer') {
						}
						if (dismiss === 'cancel') {
						}
					}
				);				
		 	}
				 
			 function asignartxt(id){
				

				$.ajax({
							url: "php/asignarTxt.php",
							type: "POST",
							data: "id="+id,
							success: function(resp)        
							{
								var json         = eval("(" + resp + ")");
								var id2          = json.id;
								var nombre       = json.nombre;
								var apellido     = json.apellido;
								var email        = json.email;              
								var telefono     = json.telefono;
								var direccion    = json.direccion;
								var barrio    = json.barrio;		
								var ciudad       = json.ciudad;	

								$("#id").val(id2);
								$("#nombres").val(nombre);				
								$("#apellidos").val(apellido);
								$("#email").val(email);
								$("#telefono").val(telefono);
								$("#direccion").val(direccion);
								$("#ciudad").val(ciudad);
								$("#barrio").val(barrio);

								$("#id").focus();								
								$("#apellidos").focus();
								$("#email").focus();
								$("#telefono").focus();
								$("#direccion").focus();
								$("#ciudad").focus();
								$("#barrio").focus();
								$("#nombres").focus();

								$("#id").prop('disabled',true);
								fun="2";
								tabla();
							}       
						});



			 }

			 function limpiar() {
				$("#id").val("");
				$("#nombres").val("");				
				$("#apellidos").val("");
				$("#email").val("");
				$("#telefono").val("");
				$("#direccion").val("");
				$("#ciudad").val("");
				$("#barrio").val("");

				$("#id").focus();
				$("#barrio").focus();								
				$("#apellidos").focus();
				$("#email").focus();
				$("#telefono").focus();
				$("#direccion").focus();
				$("#ciudad").focus();
				$("#nombres").focus();

				$("#id").prop('disabled',false);
				$("#id").focus();	
				
				document.getElementById("btCancelar").style.display = 'none';
				document.getElementById("cont2").style.display = 'block';
				document.getElementById("btAnadir").style.width = '100%';
				$("#btAnadir").html("Añadir Votante");	

				$("#va_buscar").focus();	
				verDivs('2');
			 }

			 function Actualizar(){
				
				var datos = {
					"id": $("#id").val(),
					"nombre" : $("#nombres").val(),
					"apellido": $("#apellidos").val(),
					"telefono" : $("#telefono").val(),
					"email" : $("#email").val(),
					"ciudad" : $("#ciudad").val(),
					"barrio" : $("#barrio").val(),
					"direccion" : $("#direccion").val()
				}
				
				$.ajax({
					url: "php/actualizar.php",
					type: "POST",
					data: datos,
					success: function(resp)        
					{
						swal("Buen Trabajo!", "Datos Actualizados",  "success");
						tabla();
						limpiar();
					}       
				});


			}
			
		</script>

	</body>

</html>