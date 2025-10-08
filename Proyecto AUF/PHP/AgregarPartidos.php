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
    <title>AgregarPartidos</title>
</head>

<body>
    <nav>
        <img class="Logo" src="../assets/AUF-Logo.png" alt="">
        <p>Menu de Navegación</p><a href="../index.php">Inicio</a> <a href="AgregarJugadores.php">Agregar
            Jugadores</a><a href="AgregarClubes.php"> Agregar Clubes</a> <a href="AgregarCategoria.php">Agregar Categorías</a> <a
            href="#">Agregar Partidos</a> <a href="AgregarTorneos.php">Agregar Torneos</a> <img class="Logo"
            src="../assets/logotipo-de-instagram.png" alt=""> <img class="Logo" src="../assets/Logo-de-X.png" alt="">
        <img class="Logo" src="../assets/Logo-de-facebook.png" alt="">
    </nav>
    <main>
        <section id="Jugadores">

            <h1>Agrege los datos de su Partido</h1>
            <form action="Partidos.php" method="POST" class="container">

                <label for="Nombre_Categoria">Categoría</label>
                <select name="Nombre_Categoria" id="Nombre_Categoria" required>
                    <?php
                        require '../config.php';
                        $stmt = $pdo->query("SELECT Nombre_Categoria, Descripcion FROM Categoria");
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$row['Nombre_Categoria']}'>{$row['Descripcion']}</option>";
                        }
                    ?>
                </select>
                <label for="ResultadoLocal">Resultado Local</label>
                <input type="number" name="ResultadoLocal" id="ResultadoLocal" required>
                <label for="ResultadoVisitante">Resultado Visitante</label>
                <input type="number" name="ResultadoVisitante" id="ResultadoVisitante" required>
                <label for="Condicion">Condición</label>
                <select name="Condicion" id="Condicion" required>
                    <option value="Local">Local</option>
                    <option value="Visitante">Visitante</option>
                    <option value="Neutral">Neutral</option>
                </select>
                <label for="Local">Club Local</label>
                <select name="Local" id="Local" required>
                    <option value="">Seleccione Club Local</option>
                    <?php
  $stmt = $pdo->query("SELECT NombreClub FROM clubes");
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo "<option value='{$row['NombreClub']}'>{$row['NombreClub']}</option>";
  }
  ?>
                </select>
                <label for="Visitante">Club Visitante</label>
                <select name="Visitante" id="Visitante" required>
                    <option value="">Seleccione Club Visitante</option>
                    <?php
  $stmt = $pdo->query("SELECT NombreClub FROM clubes");
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo "<option value='{$row['NombreClub']}'>{$row['NombreClub']}</option>";
  }
  ?>
                </select>
                <label for="Fecha">Fecha</label>
                <input type="date" name="Fecha" id="Fecha" required>
                <button class="subirbutton" type="submit">></button>

            </form>

        </section>

    </main>
</body>

</html>