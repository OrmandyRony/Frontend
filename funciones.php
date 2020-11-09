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
	function eliminarFuncion(id)
    {	
        let xhr = new  XMLHttpRequest();
        var ruta = 'https://proyectocinella.herokuapp.com/eliminarFuncion';
		
        let json = JSON.stringify({
            pelicula: id
        })
		xhr.open("POST", ruta)
        xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8')
        xhr.send(json)

        alert("Funcion eliminada")
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
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
		  <h6 class="m-0 font-weight-bold text-danger">Funciones</h6>
		</div>
		<div class="card-body">
		  <div id="tabla" class="table-responsive">
		   
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

<script>
           
	let xhr = new XMLHttpRequest();
	var ruta = 'https://proyectocinella.herokuapp.com/obtenerFunciones';
	
	  xhr.open('GET', ruta);
	  xhr.send()
	  xhr.onreadystatechange = (e) => {
	  var funciones = JSON.parse(xhr.responseText);
	  console.log(funciones)
	  var html = '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><thead><tr><th>Nombre</th><th>Horario</th><th>Sala</th><th>Disponible</th><th>Eliminar</th><th>Editar</th></tr></thead>'
	  
	  html += '<tbody>'
	  for(var i = 0; i < funciones.length; i++)
	  {
		html += '<tr>'
		html += '<td>'+funciones[i].pelicula +'</td>'
		html += '<td>'+funciones[i].horario +'</td>'
		html += '<td>'+funciones[i].sala +'</td>'
		html += '<td>'+funciones[i].disponible +'</td>'
		if(funciones[i].disponible){
		    html += `<td><center><button type="button" onclick="hola(${i})" class="btn btn-danger">Eliminar</button></center></td>`
			html += `<td><center><a class="btn btn-primary" href="./editarFuncion.php?pelicula=${funciones[i].pelicula}" role="button">Editar</a></center></td>`
		}else {
			html += '<td> No disponible </td>'
		}
		html += '<tr>'
	  }
	  html += '</tbody></table>'
	  document.getElementById("tabla").innerHTML = html
	}
	function hola(id)
	{
		let xhr = new  XMLHttpRequest();
        var ruta = 'https://proyectocinella.herokuapp.com/eliminarFuncion';
		
        let json = JSON.stringify({
            identificador: id
        })
		xhr.open("POST", ruta)
        xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8')
        xhr.send(json)

        alert("Funcion eliminada")
		window.location.href = "./funciones.php"   
	}
	function cerrar(){
		sessionStorage.removeItem("usuario")
		window.location.href = "./index.php"   

	}
</script>

</body>
</html>