<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>

  <div class="Bienvenida">
    <h1>Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido a este sitio web.</h1>
        <p>Cuenta tus secretos <button><a href="\Principal\Principal.php">Continuar</a></button></p>
          <a href="logout.php">Sign Out of Your Account</a>
  </div>



</body>
</html>
