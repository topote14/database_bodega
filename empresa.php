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

    $nombreEmp = $_POST["NombreEmpresa"];
    $cuilEmp = $_POST["CuilEmpresa"];
    $mailEmp = $_POST["MailEmpresa"];
    $calleEmp = $_POST["CalleEmpresa"];
    $nroCalleEmp = $_POST["NroCalleEmpresa"];
    $barrioEmp = $_POST["BarrioEmpresa"];



    $sql = "INSERT INTO `datos empresa`(NombreEmpresa, CuilEmpresa, MailEmpresa, CalleEmpresa, NroCalleEmpresa, BarrioEmpresa) 
    VALUES ('$nombreEmp','$cuilEmp','$mailEmp','$calleEmp','$nroCalleEmp','$barrioEmp')";

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
					<h2>Agregar datos de empresa</h2>
					
				</header>
				
			</div>
		</section>

	

<!-- Tabla -->


<?php

$sql = "SELECT * FROM `datos empresa`";
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
				<th>CUIL</th>
				<th>Mail</th>
				<th>Barrio</th>
				<th>Calle</th>
				<th>N°</th>
			</tr>
		</thead>
		<tbody>';
  while($row = $result->fetch_assoc()) {
   
	echo '<tr>
		<td>'. $row["idEmpresa"] . '</td>
		<td>'. $row["NombreEmpresa"] . '</td>
		<td>'. $row["CuilEmpresa"] . '</td>
		<td>'. $row["MailEmpresa"] . '</td>
		<td>'. $row["BarrioEmpresa"] . '</td>
		<td>'. $row["CalleEmpresa"] . '</td>
		<td>'. $row["NroCalleEmpresa"] . '</td>
	</tr>';
}
}
echo '</tbody>
</table>
</div>';
?>

		
<!-- Form -->
<h3>Agregar empresa</h3>
<form method="post" action="#">
	<div class="row uniform">
		<div class="6u 12u$(xsmall)">
			<input type="text" name="NombreEmpresa" id="NombreEmpresa" value="" placeholder="Nombre empresa" />
        </div>
        <div class="6u 12u(xsmall)">
			<input type="number" name="CuilEmpresa" id="CuilEmpresa" value="" placeholder="CUIL" />
        </div>
        <div class="6u 12u(xsmall)">
			<input type="email" name="MailEmpresa" id="MailEmpresa" value="" placeholder="E-Mail" />
        </div>
        <div class="6u 12u(xsmall)">
			<input type="text" name="BarrioEmpresa" id="BarrioEmpresa" value="" placeholder="Barrio" />
        </div>
        <div class="6u 12u(xsmall)">
			<input type="text" name="CalleEmpresa" id="CalleEmpresa" value="" placeholder="Calle" />
        </div>
		<div class="6u 12u(xsmall)">
			<input type="number" name="NroCalleEmpresa" id="NroCalleEmpresa" value="" placeholder="Numero de calle" />
        </div>
        <div class="12u">
            <ul class="actions">
			<button type="submit" name="enviar">Enviar</button>
            </ul>
        </div>
	</div>
</form>
</body>
</html>

