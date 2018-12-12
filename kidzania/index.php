<?php
session_start();
?>
<html lang="es" >

<head>
  <meta charset="UTF-8">
  <title>Sistema de Pedidos Pan-Pan</title>
  
  
  
      <link rel="stylesheet" href="css/login.css">

  
</head>

<body>

  <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Ingresar </h2>
   

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img/logokidzania.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form role="form" name="login" action="php/login.php" method="post">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Nombre de usuario">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="Contrase&ntilde;a">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">He olvidado mi contraseña</a>
    </div>

  </div>
</div>
  
  

</body>

</html>