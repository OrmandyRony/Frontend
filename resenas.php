<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
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
		<li><a href="inicio.html">CARGAR PELICULAS</a></li>
		<li><a href="agregarFuncion.html">AGREGAR FUNCION</a></li>
		<li><a href="resenas.html">RESEÑAS</a></li>
		<li><a href="funciones.html">FUNCIONES</a></li>
		<li><a href="usuarios.html">USUARIOS</a></li>
		<li><a href="registrar">REGISTRAR USUARIO</a></li>
		<li><a class="active"  href="perfil.html">PERFIL</a></li>
		<li><a href="index.html">CERRAR SESION</a></li>
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
			<input type="text" name="search field" value="Enter search here" id="search-field" title="Enter search here" class="blink search-field"  />
			<input type="submit" value="GO!" class="search-button" />
		</form>
	</div>
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
		<div id="cartelera">

		</div>	
		<!-- end Movie -->		

		<div class="cl">&nbsp;</div>
	</div>
	<!-- end Box -->
	
</div>
<!-- end Content -->

<!-- end Coming -->
<div class="cl">&nbsp;</div>
</div>
<!-- end Main -->
	<!-- Footer -->
	<div id="footer">
		<p>
			<a href="#">HOME</a> <span>|</span>
			<a href="#">NEWS</a> <span>|</span>
			<a href="#">IN THEATERS</a> <span>|</span>
			<a href="#">COMING SOON </a> <span>|</span>
			<a href="#">LATERS TRAILERS</a> <span>|</span>
			<a href="#">TOP RATED TRAILERS</a> <span>|</span>
			<a href="#">MOST COMMENTED TRAILERS</a> <span>|</span>
			<a href="#">ADVERTISE</a> <span>|</span>
			<a href="#">CONTACT </a>
		</p>
		<p> &copy; 2009 Movie Hunter, LLC. All Rights Reserved.  Designed by <a href="http://chocotemplates.com" target="_blank" title="The Sweetest CSS Templates WorldWide">ChocoTemplates.com</a></p>
	</div>
	<!-- end Footer -->
</div>
<!-- end Shell -->
<script>
	let xhr = new XMLHttpRequest();
	var ruta = 'http://localhost:5000/obtenerPeliculas';
	
	  xhr.open('GET', ruta);
	  xhr.send()
	  xhr.onreadystatechange = (e) => {
	  var peliculas = JSON.parse(xhr.responseText);
	  console.log(peliculas)
	  var html = ''

	  for(var i = 0; i < peliculas.length; i++)
	  {
		html += '<div class="movie"><div class="movie-image">'
		html += '<a href="./resenaPelicula.html?pelicula='+peliculas[i].pelicula+'"><span class="play"><span class="name">'+peliculas[i].pelicula+'</span></span><img src="'+peliculas[i].url_imagen+'" alt="movie" /></a></div><div class="rating">'
		html += '<p>Puntuacion:'+peliculas[i].puntuacion+'</p><div class=""><div class=""></div></div><span class="comments">12</span></div></div>'
	  }
	  
	  document.getElementById("cartelera").innerHTML = html
	}
</script>
</body>
</html>