<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

				<li><a  href="inicio.html">CARGAR PELICULAS</a></li>
				<li><a class="active" href="agregarFuncion.html">AGREGAR FUNCION</a></li>
				<li><a   href="resenas.html">RESEÑAS</a></li>
				<li><a href="funciones.html">FUNCIONES</a></li>
				<li><a href="usuarios.html">USUARIOS</a></li>
				<li><a href="registrar">REGISTRAR USUARIO</a></li>
			    <li><a href="perfil.html">PERFIL</a></li>
			    <li><a href="index.html">CERRAR SESION</a></li>
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
                <form>
                    <div id="select" class="form-group">
                    </div>

                    <div class="form-group">
                        <label for="doc">Sala</label>
                        <input type="text" class="form-control" id="sala">
                    </div>
                
                    <div class="form-group">
                        <label for="nombre">Horario</label>
                        <input type="time" class="form-control" id="horario" >
                    </div>
                    <center>
                        <button type="button" class="btn btn-success" onclick="editarFuncion()">Editar Función</button>  
                    </center>                 
                </form>
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
<script>
           
    let xhr = new XMLHttpRequest();
    var ruta = 'http://localhost:5000/obtenerPeliculas';
    
      xhr.open('GET', ruta);
      xhr.send()
      xhr.onreadystatechange = (e) => {
      var nombres = JSON.parse(xhr.responseText);
      console.log(nombres)
      var html = '<select class="form-control" name="" id="new_pelicula">'

      for(var i = 0; i < nombres.length; i++)
      {
        html += "<option value="+ nombres[i].pelicula +">" + nombres[i].pelicula+"</option>"
       
      }
      html += '</select>'
      document.getElementById("select").innerHTML = html
    }
    
</script>

<script>
    function editarFuncion()
    {  
        let xhr = new XMLHttpRequest();
			var ruta= 'http://localhost:5000/editarFuncion';
			let json = JSON.stringify({
            pelicula: getParametro("pelicula"),
			new_pelicula: document.getElementById("new_pelicula").value,
            new_sala: document.getElementById("sala").value,
            new_horario: document.getElementById("horario").value
			})
			
			xhr.open("POST", ruta)
			xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8')
			xhr.send(json)
		
			alert("Funcion editada")
            window.location.href = "./funciones.html"       
    }
</script>

<!-- end Shell -->
</body>
</html>