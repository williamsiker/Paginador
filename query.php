<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmacia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$query = $_POST['query'];
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$resultsPerPage = isset($_POST['resultsPerPage']) ? $_POST['resultsPerPage'] : 5;


$offset = ($page - 1) * $resultsPerPage;
$limit = $resultsPerPage;

$sql = "SELECT * FROM medicamentos WHERE nombre LIKE '%".$query."%' LIMIT $offset, $limit";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Precio</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['precio'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    echo "</div>";
} else {
    echo "No se encontraron resultados";
}

$conn->close();
?>
