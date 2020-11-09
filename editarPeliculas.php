<!DOCTYPE html>
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
	  <!-- Latest compiled and minified CSS -->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	  <!-- Optional theme -->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	
	  <!-- Latest compiled and minified JavaScript -->
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	
	<title>CINELLA - HOME</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/style2.css" type="text/css" media="all" />
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


	function editarPelicula()
    {
        let xhr = new  XMLHttpRequest();
        var ruta = 'https://proyectocinella.herokuapp.com/editarPelicula';
        let json = JSON.stringify({
            identificador: getParametro("pelicula"),
			new_pelicula: document.getElementById("pelicula").value,
			new_url_imagen: document.getElementById("url").value,
			new_puntuacion: document.getElementById("puntuacion").value,
			new_duracion: document.getElementById("duracion").value,
			new_sinopsis: document.getElementById("sinopsis").value
        })
        xhr.open("POST", ruta)
        xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8')
        xhr.send(json)
        alert("Pelicula editada")
		
    }
	function cerrar(){
		sessionStorage.removeItem("usuario")
		window.location.href = "./index.php"   

	}
</script>
<body>
  <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

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

				<li><a  href="inicio.php">CARGAR PELICULAS</a></li>
				<li><a class="active" href="agregarFuncion.php">AGREGAR FUNCION</a></li>
				<li><a   href="resenas.php">RESEÑAS</a></li>
				<li><a href="funciones.php">FUNCIONES</a></li>
				<li><a href="usuarios.php">USUARIOS</a></li>
				<li><a href="signupUsuario.php">REGISTRAR USUARIO</a></li>
			    <li><a href="perfil.php">PERFIL</a></li>
			    <li><a onclick="cerrar()">CERRAR SESION</a></li>
			</ul>
		</div>
		<!-- end Navigation -->
		
		<!-- Sub-menu -->
		<div id="sub-navigation">
		</div>
		<!-- end Sub-Menu -->
		
	</div>
	<!-- end Header -->
	
	<!-- Main -->
	<div id="main">
		<div class="row">
			<div class="col-md-4">
                
                    <div class="form-group">
                        <label for="doc">Titulo</label>
                        <input type="text" class="form-control" id="pelicula">
                    </div>
                
                    <div class="form-group">
                        <label for="nombre">URL Imagen</label>
                        <input type="texr" class="form-control" id="url" >
                    </div>

                    <div class="form-group">
                        <label for="nombre">Puntuación</label>
                        <input type="text" class="form-control" id="puntuacion" >
                    </div>

                    <div class="form-group">
                        <label for="nombre">Duración</label>
                        <input type="text" class="form-control" id="duracion" >
                    </div>

                    <div class="form-group">
                        <label for="nombre">Sinopsis</label>
                        <input type="text" class="form-control" id="sinopsis" >
                    </div>

                    <center>
                        <button type="button" class="btn btn-success" onclick="editarPelicula()">Editare Pelicula</button>  
                    </center>                 
               
            </div>
        </div>
	</div>
 
	
	  
	

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
</body>
</html>