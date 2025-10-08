<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/Styles.css">
    <link rel="icon" href="assets/AUF-Logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
</head>

<body>
    <nav>
        <img class="Logo" src="assets/AUF-Logo.png" alt="">
        <p>Menu de Navegación</p><a href="#">Inicio</a> <a href="PHP/AgregarJugadores.php">Agregar Jugadores</a><a
            href="PHP/AgregarClubes.php"> Agregar Clubes</a> <a href="PHP/AgregarCategoria.php">Agregar Categorías</a>
        <a href="PHP/AgregarPartidos.php">Agregar Partidos</a> <a href="PHP/AgregarTorneos.php">Agregar Torneos</a> <img
            class="Logo" src="assets/logotipo-de-instagram.png" alt=""> <img class="Logo" src="assets/Logo-de-X.png"
            alt=""> <img class="Logo" src="assets/Logo-de-facebook.png" alt="">
    </nav>

    <main>
        <h1>BIENVENIDOS A AUF</h1>
        <div>
            <img src="assets/AUF IMAGEN IMPORTANTE.png" alt="">
        </div>
        <div class="container">
            <h2>Jugadores Destacados</h2>
            <ul>
                <?php
            require 'config.php';
            $sql = "SELECT * FROM jugadores ORDER BY Goles DESC LIMIT 5";
            $stmt = $pdo->prepare ($sql);
            $stmt->execute();
            $jugadores = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($jugadores as $jugador) {
                echo "<li>{$jugador['Nombre']} {$jugador['Apellido']} - Goles: {$jugador['Goles']}</li>";
            }
            ?>
            </ul>
        </div>

    </main>
    <footer>
        <p> @ 2024 TODOS LOS DERECHOS RESERVADOS</p>
    </footer>
</body>

</html>