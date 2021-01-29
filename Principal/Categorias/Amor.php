<?php
$conexion=mysqli_connect('localhost','root','','ciberseguridad');

$sql="SELECT * FROM entradas WHERE categoria='Amor'";
$resultado=mysqli_query($conexion,$sql);
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <title> Basic SQL injection </title>
</head>
<body>



<div class="menu">
  <nav><ul>
    <li><a href="../Principal.php">Inicio</a></li>
    <li><a href="../Formulario.php">Crear Secreto</a></li>
    <li><a href="#">Categorias</a>
        <ul><li><a href="\Principal\Categorias\Amor.php">Amor</a></li>
          <li><a href="\Principal\Categorias\Random.php">Random</a></li>
        <li><a href="\Principal\Categorias\Paranormal.php">Paranormal</a></li></ul>
        </li>
    <li><<a href="\logout.php">Cerrar session</a></li>
    </ul></nav>
</div>
<?php
while ($fila = mysqli_fetch_array($resultado)) {

?>
<div class="contenedor">
  <tr>
  <form action="#" target="" method="POST" name="formDatosPersonales">

  	<p class="mostrar">Nombre:</p>
    <p class="dato"><?php echo $fila['Nombre']?></p>
    <p class="mostrar">Fecha:</p>
    <p class="dato"><?php echo $fila['fecha']?></p>
  	<p class="mostrar">Sexo:</p>
    <p class="dato"><?php echo $fila['sexo']?></p>
  	<p class="mostrar">Categoria:</p>
    <p class="dato"><?php echo $fila['categoria']?></p>
    <p>Secreto:</p>
    <p class="secret"><?php echo $fila['texto']?></p>
    <br>
    <br>

  </form>
  <?php
  }
  ?>
</div>


</body>
</html>

</body>
</html>
