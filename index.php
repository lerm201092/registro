<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/materialize.min.css">
		<link rel="stylesheet" href="css/sweetalert.min.css">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<style>
			#contenedor{
			    margin-left: 300px;	
				
			}

			form{
				background-color:rgba(0,0,0,.7);border:1px solid black;padding:15px;margin-top:10px;
			}

			body{
				background-attachment: fixed;
				background-repeat: no-repeat;
				background-size: cover;
			}
			
			
			@media screen and (max-width: 1000px) {
				#contenedor{
					margin-left: 0;
				}
			}
			
		</style>
	</head>
	<body background="img/votos.jpg">
		<div id="top" class="grey darken-3" style="height: 25px"></div>
		<div id="menu">
			<nav>
				<div class="nav-wrapper red darken-3">
					<a href="#!" class="brand-logo">Registro</a>
					<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
					<h5>Registro de Votantes &nbsp;&nbsp;</h5>
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
						<li><a href="mobile.html">Administrador</a></li>
						<li><a href="mobile.html">Lideres</a></li>
						<li class="divider"></li>
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
						<li><a href="mobile.html">Administrador</a></li>
						<li><a href="mobile.html">Lideres</a></li>
						<li class="divider"></li>
					</ul>
				</div>
			</nav>
		</div>
		<div id="contenedor" background="img/votos.jpg">
				 <!-- Formulario Login-->
				 <form method="POST" action="return false" onsubmit="return false" class="center container col s12 " style="background-color:rgba(0,0,0,.5);border:1px solid black;padding:15px;margin-top:30px;
				 " >
					<h5 class="white-text">Login</h5>
						<div class="row">
							
							<div style="color:white" class="input-field col s12 m10 l6 offset-m1 offset-l3">
								<i class="material-icons prefix blue-text text-lighten-2" style="bottom: 28px;left:10px;">fingerprint</i>
								<select  onchange="imprimirValor();" id="rol" style="color:white">
									<option style="color:white" value="0" disabled selected>Escoja una Opción</option>
									<option style="color:white" value="1">Administrador</option>
									<option style="color:white" value="2">Lider</option>
								</select>
								<label>Rol</label>
							</div>

							<div class="input-field col s12 m10 l6 offset-m1 offset-l3">
								<i class=" material-icons prefix blue-text text-lighten-2" id="sumama" style="bottom: 28px;">account_circle</i>
								<input style="color:white" id="user" type="text" class="validate" name="user">
								<label for="user">Identificacion</label>
							</div>
		
							<div class="input-field col s12 m10 l6 offset-m1 offset-l3">
									<i class="material-icons prefix blue-text text-lighten-2" style="bottom: 28px;">https</i>
								<input style="color:white" id="pass" type="password" class="validate" name="pass">
								<label for="pass">Contraseña</label>
							</div>

								
							
		
							<div class="input-field col s12 m10 l6 offset-m1 offset-l3">
									<button id="btn" class="btn waves-effect waves-light col s12 btn red darken-4" type="submit" name="submit" onclick="Validar(document.getElementById('user').value, document.getElementById('pass').value);">Ingresar</button>
							</div>
						</div>
					</form>
		
					
					
				</div>		
		</div>

		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/materialize.js"></script>
		<script src="js/sweetalert.js"></script>
		<script>
		var rol="0";
			function Validar(user, pass)
			{
				rol=""+imprimirValor();
				if(rol=="0"){
					swal("Error!", "Seleccione su rol !!! ", "warning");
				}else{
					$.ajax({
					url: "php/ValidarLogin.php",
					type: "POST",
					data: "rol="+rol+"&user="+user+"&pass="+pass,
					success: function(resp)
					{
						if(resp==2){
							swal("Error!", "Usuario y/o contraseña Incorrectos", "warning");
						}
						if(resp==3){
							swal("Error !", "Complete los campos", "warning");
						}
						if(resp==1){
							if(rol=="1"){
								swal("Error!", "Falta pagina de administrador", "warning");
							}else{
								location.href="index2lider.php";	
							}
							
						}	
					}
				});
				}
				
			}
			
			$( document ).ready(function(){
				$(".button-collapse").sideNav();
				$('select').material_select();
			});

		

			function imprimirValor(){
			var select = document.getElementById("rol");
			var options=document.getElementsByTagName("option");
			console.log(select.value);
			console.log(options[select.value].innerHTML)

			return select.value;
			}
			
		</script>

	</body>

</html>