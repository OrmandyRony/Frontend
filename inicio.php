<!DOCTYPE html>

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
	<script src="js/jspdf.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-func.js"></script>
	<script type="text/javascript" src="js/jspdf.min.js"></script>
    <script type="text/javascript" src="js/jspdf.plugin.autotable.js"></script>
    <script type="text/javascript" src="js/jspdf.plugin.autotable.min.js"></script>
</head>
<script>
		function generar() {
				var pdf = new jsPDF();
				pdf.text(20, 20, "Mostrando una Tabla con JsPDF y el Plugin AutoTable");

				var columns = ["Id", "Nombre", "Email", "Pais"];
				var data = [
					[1, "Hola", "hola@gmail.com", "Mexico"],
					[2, "Hello", "hello@gmail.com", "Estados Unidos"],
					[3, "Otro", "otro@gmail.com", "Otro"]];

				pdf.autoTable(columns, data,
					{ margin: { top: 25 } }
				);

				pdf.save('mipdf.pdf');
				
			}
</script>
<body>
	<!-- Shell -->
	<div id="shell">
		<!-- Header -->
		<div id="header">
			<h1> CINELLA </h1>

			<!-- Navigation -->
			<div id="navigation">
			<ul>

				<li><a class="active"  href="inicio.php">CARGAR PELICULAS</a></li>
				<li><a  href="agregarFuncion.php">AGREGAR FUNCION</a></li>
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
			
			<!-- end Sub-Menu -->

		</div>
		<!-- end Header -->

		<!-- Main -->
		<div id="main">
			<!-- Content -->
			<div id="content">

				<!-- Box -->

				<div class="box">
					<input class="btn btn-primary" type="file" accept="text/plain" onchange="abrirArchivo(event)"
						class="btn btn-warning" value="Cargar Peliculas">

						
				</div>
				<!-- end Box -->
				
				<script>
					var abrirArchivo = function (event) {
						var archivo = event.target;
						var reader = new FileReader();
						reader.onload = function () {
							var contenido = reader.result;
							
							json_peticion = JSON.stringify({ contenido: contenido })
							let respuesta = fetch('https://proyectocinella.herokuapp.com/leerArchivo', {
								method: 'POST',
								body: json_peticion,
								headers: { 'Content-Type': 'application/json' }
							})
							alert("Peliculas Ingresadas")
						};
						reader.readAsText(archivo.files[0])
					};
				</script>

<input  type="submit"  onclick="documentPDF()" class="btn btn-warning" value="Pdf">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-danger">Funciones</h6>
					</div>
					<div class="card-body">
						<div id="tabla" class="table-responsive">

						</div>
					</div>
				</div>

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

			let xhr = new XMLHttpRequest();
			var ruta = 'https://proyectocinella.herokuapp.com/obtenerPeliculas';
			xhr.open('GET', ruta);
			xhr.send()
			xhr.onreadystatechange = (e) => {
				var peliculas = JSON.parse(xhr.responseText);
				var html = '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><thead><tr><th>Título</th><th>Eliminar</th><th>Editar</th></tr></thead>'
				html += '<tbody>'
				for (var i = 0; i < peliculas.length; i++) {
					html += '<tr>'
					html += '<td>' + peliculas[i].pelicula + '</td>'


					html += `<td><center><button type="button" onclick="eliminarPelicula(${i})" class="btn btn-danger">Eliminar</button></center></td>`
					html += `<td><center><a class="btn btn-primary" href="./editarPeliculas.php?pelicula=${peliculas[i].id}" role="button">Editar</a></center></td>`
					html += '<tr>'
				}
				html += '</tbody></table>'
		
				document.getElementById("tabla").innerHTML = html
			}
			function eliminarPelicula(id) {
				let xhr = new XMLHttpRequest();
				var ruta = 'https://proyectocinella.herokuapp.com/eliminarPelicula';

				let json = JSON.stringify({
					identificador: id
				})
				xhr.open("POST", ruta)
				xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8')
				xhr.send(json)

				alert("Pelicula eliminada")
				window.location.href = "./inicio.php"
			}

			function cerrar(){
		sessionStorage.removeItem("usuario")
		window.location.href = "./index.php"   

	}



		</script>


<script>
  function documentPDF() {
    var pdf = new jsPDF();
    var columns = ["Titulo", "Imagen", "Puntuación", "Duracion", "Sinopsis"];
    var data = [];
    pdf.text(20,20,"Listado de peliculas");
    //data.push([1,"Hola","mundo","dadfafd"]);
    fetch("https://proyectocinella.herokuapp.com/obtenerPeliculas")
        .then((response) => response.json())
        .then((response) => {
          console.log(response);
          
          
          for (var i in response) {
            
           data.push([response[i].pelicula ,response[i].url_imagen, response[i].puntuacion, response[i].duracion, response[i].sinopsis ])
           console.log(data)
          }
          
          pdf.autoTable(columns,data,
          { margin:{ top: 25 }}
          );

          pdf.save('Peliculas.pdf');
         
        });

        
    }
      
    </script>
</body>

</html>