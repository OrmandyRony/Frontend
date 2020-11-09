<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <title>Signup</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input value="" type="text" maxlength="64" required="true" id="nombre" class="form-control" placeholder="Nombre" autofocus>
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="icon_profile"></i></span>
            <input type="text" class="form-control" required="true" id="apellido" placeholder="Apellido" autofocus>
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="icon_profile"></i></span>
            <input type="text" class="form-control" required="true" id="usuario" placeholder="Usuario" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" required="true" id="contrasena" minlength="8" maxlength="16" placeholder="Contraseña">
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="icon_key_alt"></i></span>
            <input type="password" class="form-control" required="true" id="confirmar" minlength="8" maxlength="16" placeholder="Confirmar Contraseña">
        </div>
        <a  class="btn btn-info btn-lg btn-block" type="submit" onclick="signup()">
          Registrarse
        </a>
    
      </div>
    </form>
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
         
        </div>
    </div>
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
      if (existe_usuario(document.getElementById("usuario").value))
      {
        if (document.getElementById("contrasena").value == document.getElementById("confirmar").value)
          {   
            
            let xhr = new XMLHttpRequest();
            var ruta= 'https://proyectocinella.herokuapp.com/signup';
            let json = JSON.stringify({
            nombre: document.getElementById("nombre").value,
            apellido: document.getElementById("apellido").value,
            usuario: document.getElementById("usuario").value,
            contrasena: document.getElementById("contrasena").value,
            tipo: "Cliente"
            })
            xhr.open("POST", ruta)
            xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8')
            xhr.send(json)
            alert("Usuario registrado")
            window.location.href = "./login.php"
          
          } else
          {
            alert("Las contraseñas son distintas.")
            document.getElementById("confirmar").value = "";
          }
      } 
      else if(!(existe_usuario(document.getElementById("usuario").value)))
      {
        alert("El nombre del usuario ya existe. Intente con otro nombre")
      }
      
    } 
  </script>

</body>

</html>
