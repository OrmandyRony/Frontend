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
	<!--[if IE 6]>
		<link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" />
	<![endif]-->
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-func.js"></script>
	<script>


	</script>
	<!-- Page Wrapper -->
	<div id="wrapper">

</head>
<script>
	function getParametro(pelicula) {
	  return (window.location.search.match(new RegExp('[?&]' + pelicula + '=([^&]+)')) || [, null])[1];
	}

	function apartarAsientos(id) {
	                 
					 if(registroAsistentes(sessionStorage.getItem('usuario'), getParametro('pelicula')))
					 {
						 let xhr = new XMLHttpRequest();
						   var ruta = 'https://proyectocinella.herokuapp.com/apartarAsientos';
						   let json = JSON.stringify({
						 sala: getParametro("pelicula"),
						 identificador: id
					   })
					 
					   xhr.open("POST", ruta)
					   xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8')
					   xhr.send(json)
					   registrarAsistente(sessionStorage.getItem('usuario'));
					   alert('Apartado')
					   window.location.href = "./funcionesCliente.php"
					 }	
					 else
					 {
						 alert("Usted ya esta registrado en esta funcion")
					 }
			 
			 
				 
				 }
	
	function registroAsistentes(usuario, sala){
		let xhr = new XMLHttpRequest();
        var ruta = 'https://proyectocinella.herokuapp.com/obtenerRegistro';
        xhr.open('GET', ruta);
        xhr.send()
        
        xhr.onreadystatechange = (e) => {
        var asistentes = JSON.parse(xhr.responseText)
		var existe = true
        for(var i = 0; i < asistentes.length; i++)
        { 
          if(asistentes[i].usuario == usuario){
			  alert(asistentes[i].pelicula)
			  if(asistentes[i].pelicula == sala)
			  {
				existe = false
			  }
            
          }
        }
		return existe
      }
	
      
	}

	function registrarAsistente(usuario)
	{
		let xhr = new XMLHttpRequest();
	  		var ruta = 'https://proyectocinella.herokuapp.com/registroAsistente';
	  		let json = JSON.stringify({
			usuario: usuario,
			pelicula: getParametro('pelicula')
	  	})
		xhr.open("POST", ruta)
	  	xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8')
	  	xhr.send(json)
	
	}
	

  
	function apartado() {
	  alert("Este asiento no está disponible")
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
				<div id="search">
					<form action="home_submit" method="get" accept-charset="utf-8">
						<label for="search-field">SEARCH</label>
						<input type="text" name="search field" value="Enter search here" id="search-field"
							title="Enter search here" class="blink search-field" />
						<input type="submit" value="GO!" class="search-button" />
					</form>
				</div>
			</div>
			<!-- end Sub-Menu -->


		</div>
		<!-- end Header -->

		<!-- Main -->
		<!-- DataTales Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-danger">Seleccicone el lugar donde desea sentarse</h6>
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

</body>
<script>
metodo()
function metodo()
{
	let xhr = new XMLHttpRequest();
    var ruta = 'https://proyectocinella.herokuapp.com/obtenerSala?pelicula=' + getParametro("pelicula");
    xhr.open('GET', ruta);
    xhr.send()
    xhr.onreadystatechange = (e) => {
      var asientos = JSON.parse(xhr.responseText);

      var html = "<h1></h1>";
      html += '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><thead><tr><th></th><th>A</th><th>B</th><th>C</th></tr></thead>'

      html += '<tbody>'
      var fila = 1;
      for (var i = 0; i < asientos.length; i++) {
        var x = i + 1;
        if (x == 1) {
          html += '<tr><td>' + fila + '</td>';
        } else if (i % 3 == 0) {
          fila++;
          html += '</tr><tr><td>' + fila + '</td>';
        }
        if (asientos[i].disponible) {
          html += `<td><center><button type="button" onclick="apartarAsientos(${asientos[i].identificador})" class="btn btn-success">Asistir</button></center></td>`
        } else {
          html += `<td><center><button type="button" onclick="apartado()" class="btn btn-secondary">OCUPADO</button></center></td>`
        }
        if (x == asientos.length) {
          html += '</tr>'
        }
      }
      html += '</tbody></table>'
      document.getElementById("tabla").innerHTML = html;

}
    
    }
	function cerrar(){
		sessionStorage.removeItem("usuario")
		window.location.href = "./index.php"   
	}


</script>


</html>