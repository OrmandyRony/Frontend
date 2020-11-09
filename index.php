<!DOCTYPE html>
<html>
<title>Home-CINELLA</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<link rel="stylesheet" href="css/index.css">
<style>
 .bgimg {

    background-image: url("img/bg-1.jpg");
   
  }
</style>
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-padding w3-black">
    <div class="w3-col s3">
      <a href="login.html" class="w3-button w3-block w3-black">INICIO</a>
    </div>
    <div class="w3-col s3">
      <a href="signup.html" class="w3-button w3-block w3-black">REGISTRATE</a>
    </div>
  </div>
</div>

<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
    <span class="w3-tag">Open from 6am to 11pm</span>
  </div>
  <div class="w3-display-middle w3-center">
    <span class="w3-text-white" style="font-size:90px">CINELLA </span>
  </div>
  <div class="w3-display-bottomright w3-center w3-padding-large">
    <span class="w3-text-white">15 Adr street, 5015</span>
  </div>
</header>

<!-- Add a background color and large text to the whole page -->
<div class="w3-sand w3-grayscale w3-large">

<!-- About Container -->
<div class="w3-container" id="about">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">ACERCA DEL CINE</span></h5>
    <p>El cine fue fundado por el Sr. Miguel Angel en 1970 donde se presentaban, las mas recientes peliculas de la epoca.</p>
    <p>Nuestra mision es darle la mejor calidad y precio del mercado.</p>
    <div class="w3-panel w3-leftbar w3-light-grey">
      <p><i>"Shôko Nishimiya, una estudiante de primaria sorda, empieza a sentir el bullying de sus nuevos compañeros cuando se cambia de colegio.
      El peor de todos es Ishida Shôya, quien termina por forzar que Nishimiya se cambie de escuela. Años después, Ishida buscará la redención de sus malas 
      acciones.</i></p>
      <p>Director: Naoko Yamada</p>
    </div>
    <img src="img/Una%20voz%20silenciosa.png" style="width:100%;max-width:1000px" class="w3-margin-top">
    <p><strong>Opening hours:</strong> everyday from 6am to 5pm.</p>
    <p><strong>Address:</strong> 15 Adr street, 5015, NY</p>

    <div class="w3-panel w3-leftbar w3-light-grey">
      <p><i>"La historia se desenvuelve alrededor de las "Auto Memory Dolls"; personas que en un comienzo habían sido contratadas por un científico llamado Dr.
         Orland para asistir a su esposa Mollie en la tarea de escribir novelas, y que luego comenzaron a ser rentadas a otras personas que requerían sus 
         servicios. En la actualidad, el término se refiere a la industria de escribir para otros. La historia sigue a Violet Evergarden en su intento de 
         reintegrarse en la sociedad luego del final de la guerra, y de su búsqueda por un significado a la vida, ahora que no pertenece más al ejército."</i></p>
      <p>Director: 	Taichi Ishidate</p>
    </div>
    <img src="img/violet.jpg" style="width:100%;max-width:1000px" class="w3-margin-top">
    <p><strong>Opening hours:</strong> everyday from 6am to 5pm.</p>
    <p><strong>Address:</strong> 15 Adr street, 5015, NY</p>
  </div>
</div>



<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-48 w3-large">
  <p><a title="" target="_blank" class="w3-hover-text-green">CINELLA</a></p>
</footer>

<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();
</script>

</body>
</html>