<?php 
require '../config.php';
$Seleccion = $_GET['Seleccion'] ?? "";
$Busqueda = $_GET['Busqueda'] ?? "";

$tablasPermitidas = ['jugadores', 'clubes', 'categorias', 'partidos', 'torneos'];
if (!in_array($Seleccion, $tablasPermitidas)) {
    die("Selección no válida.");
}


if (!empty($Busqueda)) {
    
    $columnas = $pdo->query("SHOW COLUMNS FROM $Seleccion")->fetchAll(PDO::FETCH_COLUMN);
    if (in_array('Nombre', $columnas)) {
        $sql = "SELECT * FROM $Seleccion WHERE Nombre LIKE ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["%$Busqueda%"]);
    } else {
      
        $sql = "SELECT * FROM $Seleccion WHERE CONCAT_WS(' ', " . implode(', ', $columnas) . ") LIKE ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["%$Busqueda%"]);
    }
} else {
    $sql = "SELECT * FROM $Seleccion";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}


$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="../css/Styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgregarJugadores</title>
</head>

<body>
    <nav>
        <img class="Logo" src="../assets/AUF-Logo.png" alt="">
        <p>Menu de Navegación</p><a href="../index.php">Inicio</a> <a href="#">Agregar Jugadores</a><a
            href="AgregarClubes.php"> Agregar Clubes</a> <a href="AgregarCategoria.php">Agregar Categorías</a> <a
            href="AgregarPartidos.php">Agregar Partidos</a> <a href="AgregarTorneos.php">Agregar Torneos</a> <img
            class="Logo" src="../assets/logotipo-de-instagram.png" alt=""> <img class="Logo"
            src="../assets/Logo-de-X.png" alt=""> <img class="Logo" src="../assets/Logo-de-facebook.png" alt="">
    </nav>
    <main>
        <section id="Jugadores">

            <h1> Resultado </h1>
            <form class="container">
           <div class="resultados">
            <?php
if (count($resultados) > 0) {
    foreach ($resultados as $resultado) {
        echo "<div class='resultado-item'>";
        foreach ($resultado as $clave => $valor) {
            echo"<p><strong>" . htmlspecialchars($clave) . ":</strong> " . htmlspecialchars($valor) . "</p>";
            
        }
        echo "</div>";
    }
}
?>
            </div>
            </form>

        </section>

    </main>
</body>

</html>