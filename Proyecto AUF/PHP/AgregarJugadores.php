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

            <h1>Agrege los datos de su jugador</h1>
            <form id="FormJugador" action="Jugadores.php" method="POST" class="container">
                <label for="CI">CI</label>
                <input type="number" name="CI" id="CI" placeholder="5.123.456-7" pattern="\d{1}\.\d{3}\.\d{3}-\d{1}"
                 title="Formato: 1.234.567-8" required>
                <label for="Nombre">Nombre</label>
                <input type="text" name="Nombre" id="Nombre" placeholder="Nombre" required>
                <label for="Apellido">Apellido</label>
                <input type="text" name="Apellido" id="Apellido" placeholder="Apellido" required>
                <label for="Club_ID">Club</label>
                <select name="Club_ID" id="Club_ID" required>
                    <option value="">Seleccione un club</option>
                    <?php
                        require '../config.php';
                        $stmt = $pdo->query("SELECT ID_Club, NombreClub FROM clubes");
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$row['ID_Club']}'>{$row['NombreClub']}</option>";
                        }
                        ?>
                </select>
                <label for="Telefono">Telefono</label>
                <input type="number" name="Telefono" id="Telefono" placeholder="Telefono" required>
                <label for="Posicion">Posición</label>
                <select name="Posicion" id="Posicion" required>
                    <option value="">Seleccione una posición</option>
                    <option value="Delantero">Delantero</option>
                    <option value="Medio">Medio</option>
                    <option value="Defensa">Defensa</option>
                    <option value="Portero">Portero</option>
                    <option value="Centrocampista">Centrocampista</option>
                </select>
                <label for="Numero">Numero</label>
                <input type="number" name="Numero" id="Numero" placeholder="09" required>
                <label for="Goles">Goles</label>
                <input type="number" name="Goles" id="Goles" placeholder="0" required>
                <label for="Tarjetas">Tarjetas</label>
                <input type="number" name="Tarjetas" id="Tarjetas" placeholder="0" required>
                <label for="Partidos">Partidos</label>
                <input type="number" name="Partidos" id="Partidos" placeholder="0" required>
                <button class="subirbutton" type="submit">></button>
<p class="Errormsg" id="Error" ></p>
            </form>

        </section>

    </main>
    <footer>
   <p> @ 2024 TODOS LOS DERECHOS RESERVADOS</p>
    </footer>
    <script src="../JAVA/DataJugadores.js"> </script>
</body>

</html>