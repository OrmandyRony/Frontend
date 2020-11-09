<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Login</title>

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
          <input type="text" class="form-control" id="usuario" placeholder="Usuario" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" id="contrasena" minlength="1" maxlength="16" placeholder="Contraseña">
        </div>
        <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
        </label>
        <input class="btn btn-primary btn-lg btn-block"  onclick="login()" value="login"/>
        
        <a class="btn btn-info btn-lg btn-block"  id="signup_submit" name="registrarse" type="submit" href="signup.php">Registrarse</a>
  
        
      </div>
    </form>
    <div class="text-right">
    </div>
  </div>

  <script>
    let xhr = new XMLHttpRequest();
    var ruta = 'https://proyectocinella.herokuapp.com/obtenerUsuarios';
       
    function login()
    {
      sessionStorage.setItem('usuario', document.getElementById("usuario").value)
      xhr.open('GET', ruta);
      xhr.send()
      xhr.onreadystatechange = (e) => {
      var usuarios = JSON.parse(xhr.responseText)
      var consulta = true;
      for(var i = 0; i < usuarios.length; i++)
      {
        if(usuarios[i].usuario == document.getElementById("usuario").value && usuarios[i].contrasena == document.getElementById("contrasena").value){
          consulta = false
            alert("Bienvenido!!")
          if(usuarios[i].tipo == "Administrador")
          {
            window.location.href = "./inicio.php"
            consulta = false
            break;
          }
          if(usuarios[i].tipo == "Cliente")
          {
            window.location.href = "./inicioCliente.php"
            consulta = false
            break
          }
          alert("Bienvenido")
        }
      }
      if(consulta)
      {
        alert("El usuario o contraseñan son invalidos")
      }   
    }

    }  
  </script>
</body>

</html>
