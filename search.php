<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmacia";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$keyword = $_POST['keyword'];

$sql = "SELECT * FROM medicamentos WHERE nombre LIKE '%".$keyword."%'";

$result = $conn->query($sql);

$datos = array();

while($fila = mysqli_fetch_assoc($result)) {
    $datos[] = $fila;
}

header('Content-Type: application/json'); 
echo json_encode($datos);
$conn->close();
?>