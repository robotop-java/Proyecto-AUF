<?php
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    echo "<script>
            alert('". addslashes($mensaje) ."');
            setTimeout(() => { window.history.back(); }, 5000);
          </script>";
}
?>
<?php
if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];
    echo "<script>
            alert('". addslashes($mensaje) ."');
            setTimeout(() => { window.history.back(); }, 5000);
          </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="../css/Styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgregarTorneos</title>
</head>

<body>
    <nav>
        <img class="Logo" src="../assets/AUF-Logo.png" alt="">
        <p>Menu de Navegación</p><a href="../index.php">Inicio</a> <a href="AgregarJugadores.php">Agregar
            Jugadores</a><a href="AgregarClubes.php"> Agregar Clubes</a> <a href="AgregarCategoria.php">Agregar Categorías</a> <a
            href="AgregarPartidos.php">Agregar Partidos</a> <a href="AgregarTorneos.php">Agregar Torneos</a> <img
            class="Logo" src="../assets/logotipo-de-instagram.png" alt=""> <img class="Logo"
            src="../assets/Logo-de-X.png" alt=""> <img class="Logo" src="../assets/Logo-de-facebook.png" alt="">
    </nav>
    <main>
        <section id="Jugadores">

            <h1>Agrege los datos de su torneo</h1>
            <form action="Torneos.php" method="POST" class="container">
                <label for="Nombre_Torneo">Nombre del Torneo</label>
                <input type="text" name="Nombre_Torneo" id="Nombre_Torneo" required>
                <label for="ID_Partidos">Partidos</label>
                <select name="ID_Partidos" id="ID_Partidos" required>
                    <?php
require '../config.php';

$stmt = $pdo->query("SELECT ID_PARTIDOS, Fecha, Local, Visitante FROM Partidos");

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<option value='{$row['ID_PARTIDOS']}'>
        ID: {$row['ID_PARTIDOS']} - Fecha: {$row['Fecha']} - Local: {$row['Local']} - Visitante: {$row['Visitante']}
    </option>";
}
?>
                </select>
                <label for="Fecha_Inicio">Fecha de Inicio</label>
                <input type="date" name="Fecha_Inicio" id="Fecha_Inicio" required>
                <label for="Fecha_Fin">Fecha de Fin</label>
                <input type="date" name="Fecha_Fin" id="Fecha_Fin" required>
                <button class="subirbutton" type="submit">></button>

            </form>

        </section>

    </main>
</body>

</html>