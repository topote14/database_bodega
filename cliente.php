<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = 'bodega';

try {
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	$con = new mysqli($servername, $username, $password, $database);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

if(isset($_POST['enviar'])){

$nombre = $_POST["NombreCliente"];
$apellido = $_POST["ApellidosCliente"];
$dni = $_POST["DniCliente"];
$mail = $_POST["mailCliente"];
$edad = $_POST["edadCliente"];
$calleC = $_POST["CalleCliente"];
$nroCalle = $_POST["NroCalle"];
$barrioC = $_POST["BarrioCliente"];
$telefonoC = $_POST["TelefonoCliente"];



$sql = "INSERT INTO `datos cliente`(NombreCliente, ApellidoCliente, DniCliente, mailCliente, edadCliente, CalleCliente, NroCalle, BarrioCliente, TelefonoCliente) 
VALUES ('$nombre','$apellido','$dni','$mail','$edad','$calleC','$nroCalle','$barrioC','$telefonoC')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
}

}

?>
<html>


	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
    <body class="subpage">

		<!-- Header -->
			 <header id="header">
				<div class="inner">
					<nav id="nav">
						<a href="index.html">Home</a>
						<a href="contacto.html">Contacto</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header> 

		<!-- Three -->
		<section id="three" class="wrapper">
			<div class="inner">
				<header class="align-center">
					<h2>Agregar cliente</h2>
					
				</header>
				
			</div>
		</section>

	

<!-- Tabla -->


<?php

$sql = "SELECT * FROM `datos cliente`";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
echo '<h3>Productos</h3>
<div class="table-wrapper">
	<table>
		<thead>
			<tr>
				<th>N°</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>DNI</th>
				<th>Mail</th>
				<th>Edad</th>
				<th>Barrio</th>
				<th>Calle</th>
				<th>Nro</th>
				<th>Telefono</th>
			</tr>
		</thead>
		<tbody>';
  while($row = $result->fetch_assoc()) {
   
	echo '<tr>
		<td>'. $row["idCliente"] . '</td>
		<td>'. $row["NombreCliente"] . '</td>
		<td>'. $row["ApellidoCliente"] . '</td>
		<td>'. $row["DniCliente"] . '</td>
		<td>'. $row["mailCliente"] . '</td>
		<td>'. $row["edadCliente"] . '</td>
		<td>'. $row["BarrioCliente"] . '</td>
		<td>'. $row["CalleCliente"] . '</td>
		<td>'. $row["NroCalle"] . '</td>
		<td>'. $row["TelefonoCliente"] . '</td>

	</tr>';
}
}
echo '</tbody>
</table>
</div>';
?>

	
<!-- Form -->
<h3>Agregar cliente</h3>
<form method="post" action="#">
	<div class="row uniform">
		<div class="6u 12u$(xsmall)">
			<input type="text" name="NombreCliente" id="NombreCliente" value="" placeholder="Nombre" />
        </div>
        <div class="6u$ 12u(xsmall)">
			<input type="text" name="ApellidosCliente" id="ApellidosCliente" value="" placeholder="Apellidos" />
        </div>
        <div class="6u 12u(xsmall)">
			<input type="number" name="DniCliente" id="DniCliente" value="" placeholder="DNI" />
        </div>
        <div class="6u 12u(xsmall)">
			<input type="email" name="mailCliente" id="mailCliente" value="" placeholder="E-Mail" />
        </div>
        <div class="6u$ 12u(xsmall)">
			<input type="number" name="edadCliente" id="edadCliente" value="" placeholder="Edad" />
		</div>
        <div class="6u 12u(xsmall)">
			<input type="text" name="BarrioCliente" id="BarrioCliente" value="" placeholder="Barrio" />
        </div>
        <div class="6u 12u(xsmall)">
			<input type="text" name="CalleCliente" id="CalleCliente" value="" placeholder="Calle" />
        </div>
		<div class="6u 12u(xsmall)">
			<input type="number" name="NroCalle" id="NroCalle" value="" placeholder="Numero de calle" />
        </div>

        <div class="6u 12u(xsmall)">
			<input type="number" name="TelefonoCliente" id="TelefonoCliente" value="" placeholder="Teléfono" />
        </div>
        <div class="12u$">
            <ul class="actions">
			<button type="submit" name="enviar">Enviar</button>
            </ul>
        </div>
	</div>
</form>
</body>
</html>

