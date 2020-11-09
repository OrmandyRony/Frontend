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
		</div>
		<!-- end Sub-Menu -->
		
	</div>
	<!-- end Header -->
	
	<!-- Main -->
	<div id="main">
		<div class="row">
			<div class="col-md-4">
	
			  <form>
		  
			  <div class="form-group">
				<label for="doc">Nombre</label>
				<input type="text" class="form-control" id="nombre">
			  </div>
		  
			  <div class="form-group">
				  <label for="nombre">Apellido </label>
				  <input type="text" class="form-control" id="apellido" >
			  </div>
		  
			  <div class="form-group">
				  <label for="dir">Usuario </label>
				  <input type="text" class="form-control" id="usuario">
			  </div>
		  
			  <div class="form-group">
				  <label for="tel">Contraseña </label>
				  <input type="password" class="form-control" id="contrasena">
			  </div>

			  <div class="form-group">
				<label for="tel">Confirmar </label>
				<input type="password" class="form-control" id="confirmar">
			</div>
			<center>
				<button type="button" class="btn btn-success" onclick="signup()">Modificar perfil</button>  
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
	function existe_usuario(usuario)
    {
        let xhr = new XMLHttpRequest();
        var ruta = 'https://proyectocinella.herokuapp.com/obtenerUsuarios';
        xhr.open('GET', ruta);
        xhr.send()
        var existe = true
        xhr.onreadystatechange = (e) => {
        var usuarios = JSON.parse(xhr.responseText)
        for(var i = 0; i < usuarios.length; i++)
        { 
          if(usuarios[i].usuario == usuario){
            existe = false
            break
          }
        }
      }
      return existe
    }


    function signup()
    {
		

      if (document.getElementById("contrasena").value == document.getElementById("confirmar").value)
      {
		  if (existe_usuario(document.getElementById("usuario")))
		  {
			
			let xhr = new XMLHttpRequest();
			var ruta= 'https://proyectocinella.herokuapp.com/editar';
			let json = JSON.stringify({
			previous_usuario: sessionStorage.getItem("usuario"),
			nombre: document.getElementById("nombre").value,
			apellido: document.getElementById("apellido"). value,
			usuario: document.getElementById("usuario").value,
			contrasena: document.getElementById("contrasena").value,
			})
			
			xhr.open("POST", ruta)
			xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8')
			xhr.send(json)
		
			alert("Su perfil se a modificado con exito")
		  } else
		  {
			  alert("El nombre de usuario ya esta registrado")
		  }
        
      } else
      {
        alert("Las contraseñas son distintas.")
        document.getElementById("confirmar").value = "";
      }
    } 
	function cerrar(){
		sessionStorage.removeItem("usuario")
		window.location.href = "./index.php"   

	}
	
  </script>
<!-- end Shell -->
</body>
</html>