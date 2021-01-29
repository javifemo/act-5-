<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
    header("location: Principal.php");
    exit;
}

// Include config file
require_once "../db.php";

$Nombre = $texto = $fecha = $sexo = $categoria ="";
$fecha_err = $sexo_err = $Nombre_err = $texto_err = $categoria_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["Nombre"]))){
      $Nombre_err = "Inserte nombre.";
    } else{
      $Nombre = trim($_POST["Nombre"]);
    }

    if(empty(trim($_POST["texto"]))){
      $texto_err = "Inserte texto.";
    }else{
      $texto = trim($_POST["texto"]);
    }

    if(empty(trim($_POST["fecha"]))){
      $fecha_err = "Inserte fecha.";
    }else{
      $fecha = trim($_POST["fecha"]);
    }

    if(empty(trim($_POST["sexo"]))){
      $sexo_err = "Inserte sexo.";
    }else{
      $sexo = trim($_POST["sexo"]);
    }
    if(empty(trim($_POST["categoria"]))){
      $categoria_err = "Inserte categoria.";
    }else{
      $categoria = trim($_POST["categoria"]);
    }

    if(empty($Nombre_err) && empty($texto_err) && empty($fecha_err) && empty($sexo_err) && empty($categoria_err)){
      $sql = "INSERT INTO `entradas` (Nombre, texto, fecha, sexo, categoria) VALUES ('$Nombre','$texto','$fecha','$sexo','$categoria')";
            $q = $conn->query($sql);
      mysqli_close($conn);
    }else{
      echo "ERROR";
    }

  }



?>
<html>

<head>
  <title> Formulario </title>
  <link rel="stylesheet" type="text/css" href="Formulario.css"
</head>
<body>
  <div class="menu">
    <nav><ul>
      <li><a href="Principal.php">Inicio</a></li>
      <li><a href="Formulario.php">Crear Secreto</a></li>
      <li><a href="#">Categorias</a>
          <ul><li><a href="\Principal\Categorias\Amor.php">Amor</a></li>
            <li><a href="\Principal\Categorias\Random.php">Random</a></li>
          <li><a href="\Principal\Categorias\Paranormal.php">Paranormal</a></li></ul>
          </li>
      <li><<a href="\logout.php">Cerrar session</a></li>
      </ul></nav>
  </div>
  <br>
  <br>
  <form action="#" target="" method="POST" name="formDatosPersonales">

  	<label for="Nombre">Nombre</label>
  	<input type="text" name="Nombre" for="Nombre" id="nombre" placeholder="Escribe tu nombre"/>

    <label for="fecha">Fecha</label>
  	<input type="text" name="fecha" for="fecha" id="Fecha" placeholder="año-mes-dia"/>

  	<p class="sexo">Sexo:
      <select name="sexo" for="sexo" id="sexo">
         <option value="Hombre">Hombre</option>
         <option value="Mujer">Mujer</option>
      </select>
  </p>

  	<p>Categoria:
<select name="categoria" for="categoria" id="categoria">
   <option value="Amor">Amor</option>
   <option value="Random">Random</option>
   <option value="Paranormal">Paranormal</option>
</select>
</p>
  	<label for="texto">Mensaje</label>
  	<textarea name="texto" for="texto" placeholder="Comparte tu secreto en menos de 300 caracteres" maxlength="300"></textarea>

  	<input type="submit" name="enviar" value="Publicar"/>
  </form>
</body>
</html>
