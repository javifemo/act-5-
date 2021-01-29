<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

// Include config file
require_once "db.php";

$user = $passwd = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["user"]))){
      $username_err = "Please enter username.";
    } else{
      $user = trim($_POST["user"]);
    }

    if(empty(trim($_POST["passwd"]))){
      $password_err = "Please enter your password.";
    }else{
      $passwd = trim($_POST["passwd"]);
    }

    if(empty($username_err) && empty($password_err)){
      $sql = "INSERT INTO `login` (username, password) VALUES ('$user','$passwd')";
            $q = $conn->query($sql);
      mysqli_close($conn);
    }else{
      echo "ERROR";
    }

  }



?>
<html>
<head>
  <title> Basic SQL injection </title>
</head>
<body>
  <form action="Registro.php" method="post">
    <div>
      <label for="user"><b>Username</b></label>
      <input type="text" placeholder="Enter username" name="user" required>

      <label for="passwd"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="passwd" required>

      <button type="submit">Registrarse</button>
    </div>

    <div>
      <button type="button">Cancel</button>
    </div>
  </form>
</body>
</html>
