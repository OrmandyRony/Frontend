<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
		integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
		integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
		integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
		integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
		crossorigin="anonymous"></script>

	<title>CINELLA - HOME</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/style2.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/style3.css" type="text/css" media="all" />
	<!--[if IE 6]>
		<link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" />
	<![endif]-->
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-func.js"></script>
</head>
<script>
	function getParametro(pelicula) {
		return (window.location.search.match(new RegExp('[?&]' + pelicula + '=([^&]+)')) || [, null])[1];
	}

</script>

<body>
	<!-- Shell -->
	<div id="shell">
		<!-- Header -->
		<div id="header">
			<h1> CINELLA </h1>
			<div class="social">
				<span>FOLLOW US ON:</span>
				<ul>
					<li><a class="twitter" href="#">twitter</a></li>
					<li><a class="facebook" href="#">facebook</a></li>
					<li><a class="vimeo" href="#">vimeo</a></li>
					<li><a class="rss" href="#">rss</a></li>
				</ul>
			</div>

			<!-- Navigation -->
			<div id="navigation">
				<ul>
					<li><a href="inicioCliente.php">CARTELERA</a></li>
					<li><a class="active" href="resenasCliente.php">RESEÑAS</a></li>
					<li><a href="funcionesCliente.php">FUNCIONES</a></li>
					<li><a href="perfilCliente.php">PERFIL</a></li>
					<li><a  onclick="cerrar()">CERRAR SESION</a></li>
				</ul>
			</div>
			<!-- end Navigation -->

			<!-- Sub-menu -->
			<div id="sub-navigation">
				<ul>

				</ul>

			</div>
			<!-- end Sub-Menu -->

		</div>
		<!-- end Header -->

		<!-- Main -->
		<div id="main">
			<!-- Content -->
			<div id="content">

				<!-- Box -->
				<div class="box">
					<div class="head">
						<h2>LATEST TRAILERS</h2>
						<p class="text-right"><a href="#">See all</a></p>
					</div>

					<!-- Movie -->
					<div id="portada">
					</div>
					<div>
						
					</div>
					<!-- end Movie -->




					<div class="cl">&nbsp;</div>
				</div>
				<!-- end Box -->
					<div id="mensajes">
					</div>

<script>
	if(sessionStorage.getItem("usuario") == null)
	{
		window.location.href = "./index.php"  
	}
	metodo();
	mensajes();
	function metodo(){
		let xhr = new XMLHttpRequest();
		var ruta = 'https://proyectocinella.herokuapp.com/obtenerPeliculas';	
		xhr.open('GET', ruta);
		xhr.send()
		xhr.onreadystatechange = (e) => {
			var peliculas = JSON.parse(xhr.responseText);
			var html = ''
			for (var i = 0; i < peliculas.length; i++) {
				
				if (peliculas[i].id == getParametro("pelicula")) {
					
					html += '<div class="movie"><div class="movie-image">'
					html += '<a href="#"><span class="play"><span class="name">' + peliculas[i].pelicula + '</span></span><img src="' + peliculas[i].url_imagen + '" alt="movie" /></a></div><div class="rating">'
					html += '<p>Puntuacion:' + peliculas[i].puntuacion + '</p><div class=""><div class=""></div></div><span></span></div></div>'
					html += `<div>
						<h1>`+ peliculas[i].pelicula + `</h1>
						<p>`+ peliculas[i].sinopsis + `</p>
					</div>`
					}
				}
			
				document.getElementById("portada").innerHTML = html
				
			}
	}

	function mensajes(){
		let xhr = new XMLHttpRequest();
		var ruta = 'https://proyectocinella.herokuapp.com/obtenerResena';
		xhr.open('GET', ruta);
		xhr.send()
		xhr.onreadystatechange = (e) => {
		var resenas = JSON.parse(xhr.responseText);
		var mensajes= ""
		for (var i = 0; i < resenas.length; i++) {
				if (resenas[i].id == getParametro("pelicula")) {

					mensajes += `<div id="left">
						<form>
							<h3>`+resenas[i].nombre+`</h3>
							<h5>`+ resenas[i].comentario + `</h5>
						</form>
					</div>`
				}
			}
			document.getElementById("mensajes").innerHTML = mensajes
		}
	}

	function cerrar(){
		sessionStorage.removeItem("usuario")
		window.location.href = "./index.php"   

	}
		
			
			
</script>

					
				<!-- Reseñas-->
				<div class="cuadro">

				</div>
				<div id="left">
					<form>
						<div class="inputs">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Agregar reseña</span>
								</div>
								<textarea class="form-control" id="resena" aria-label="With textarea"></textarea>
							</div>
						</div>
						<div class="inputs">
							<button type="button" onclick="ingresarResena()" class="btn btn-warning">Enviar</button>
						</div>
					</form>
				</div>

				<!-- end Reseñas-->
			</div>
			<!-- end Content -->

			<!-- end Coming -->
			<div class="cl">&nbsp;</div>
		</div>
		<!-- end Main -->

		<!-- Footer -->
		<div id="footer">
			<p>
				<a href="#">CARTELERA</a> <span>|</span>
				<a href="#">RESEÑAS</a> <span>|</span>
				<a href="#">FUNCIONES</a> <span>|</span>
			</p>
			<p> &copy; CINELLA <a href="" target="_blank" title=""></a></p>
		</div>
		<!-- end Footer -->
	</div>
	<!-- end Shell -->
	<script>
		function ingresarResena() {
			let xhr = new XMLHttpRequest();
			var ruta = 'https://proyectocinella.herokuapp.com/ingresarResena';
			let json = JSON.stringify({
				nombre: sessionStorage.getItem("usuario"),
				comentario: document.getElementById("resena").value,
				id: getParametro("pelicula")
			})
			xhr.open("POST", ruta)
			xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8')
			xhr.send(json)
			document.getElementById("resena").value = "";
		
		}
	</script>
</body>


</html>