<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "todo";
    
    $connection = mysqli_connect($host, $user, $pass,$db);  
    if(isset($_POST["nombrea"]) && isset($_POST["emaila"])){
    $nombre = $_POST['nombrea'];
    $email  = $_POST['emaila'];  
    
    $instruccion = "SELECT * FROM person WHERE email = '$email'";
    $instruccion = "SELECT * FROM person WHERE nombre = '$nombre'";
    $resultado = mysqli_query($connection,$instruccion);
    if (mysqli_num_rows($resultado) == 0) {
        // Si no existe un registro con el mismo correo electrónico, insertar el nuevo registro
        $instruccion = "INSERT INTO person (nombre,email) VALUES ('$nombre','$email')";
        $resultado = mysqli_query($connection,$instruccion);
      }
      else {
        // Si ya existe un registro con el mismo correo electrónico, mostrar un mensaje de error
        echo "El correo electrónico ya está registrado en la base de datos.";
      }
    }
?>
