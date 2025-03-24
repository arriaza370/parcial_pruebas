<?php

session_start();
if(!isset($_SESSION['email'])){
    header("location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio Usuario</title>
    <link rel="stylesheet" href="style.css"
</head>
<body style="background: #fff">
<div class="box">
    <h1>Bienvenido, <span><?= $_SESSION['name']; ?></span></h1>
    <p>Esta es la página de <span>Usuario</span></p>
    <button onclick="window.location.href='logout.php'">Cerrar Sesión</button>
</div>
</body>
</html>