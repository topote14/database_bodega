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

    $empleado = $_POST["NombreEmpleado"];
    $apellidoEmp = $_POST["ApellidoEmpleado"];
    $horas = $_POST["HorasTrabajo"];


    $sql = "INSERT INTO `datos empleado`(NombreEmpleado, ApellidoEmpleado, HorasTrabajo) 
    VALUES ('$empleado','$apellidoEmp','$horas')";

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
					<h2>Administrar empleados</h2>
					
				</header>
				
			</div>
		</section>



		
<!-- Tabla -->


<?php

$sql = "SELECT * FROM `datos empleado`";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
echo '<h3>Empleados</h3>
<div class="table-wrapper">
	<table>
		<thead>
			<tr>
				<th>Legajo</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Horas</th>
			</tr>
		</thead>
		<tbody>';
  while($row = $result->fetch_assoc()) {
   
	echo '<tr>
		<td>'. $row["idEmpleado"] . '</td>
		<td>'. $row["NombreEmpleado"] . '</td>
		<td>'. $row["ApellidoEmpleado"] . '</td>
		<td>'. $row["HorasTrabajo"] . '</td>
	</tr>';
}
}
echo '</tbody>
</table>
</div>';
?>





<!-- agregar -->
<hr class="major" />
<h3>Agregar empleado</h3>
<form method="post" action="#">
	<div class="row uniform">
		<div class="6u 12u$(xsmall)">
			<input type="text" name="NombreEmpleado" id="NombreEmpleado" value="" placeholder="Nombre" />
        </div>
        <div class="6u$ 12u$(xsmall)">
			<input type="text" name="ApellidoEmpleado" id="ApellidoEmpleado" value="" placeholder="Apellidos" />
        </div>
        <div class="6u 12u$(xsmall)">
			<input type="number" name="HorasTrabajo" id="HorasTrabajo" value="" placeholder="Horas de trabajo" />
        </div>
        <div class="6u 12u$(xsmall)">
			<input type="text" name="SectorEmpleado" id="SectorEmpleado" value="" placeholder="Sector" />
        </div>
        <div class="12u$">
            <ul class="actions">
			<button type="submit" name="enviar">Enviar</button>
            </ul>
        </div>
	</div>
</form>
<hr class="major" />
</body>
</html>

