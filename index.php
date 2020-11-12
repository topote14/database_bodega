<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$database = 'mydb';

//me conecto al server

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


//Validamos que hayan llegado estas variables, y que no esten vacias:
if (isset($_POST["nombre"], $_POST["email"], $_POST["mensaje"]) and $_POST["nombre"] !="" and $_POST["email"]!="" and $_POST["mensaje"]!="" ){

//traspasamos a variables locales, para evitar complicaciones con las comillas:
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$mensaje = $_POST["mensaje"];

//ENVIAR DATOS A MYSQL

$sql = "INSERT INTO test (dato)
VALUES ('$nombre')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
}


}
else {
echo '<p>Por favor, complete el <a href="formulario.html">formulario</a></p>';
}

?>

