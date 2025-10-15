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
    <title>AgregarCategoria</title>
</head>

<body>
    <nav>
        <img class="Logo" src="../assets/AUF-Logo.png" alt="">
        <p>Menu de Navegación</p><a href="../index.php">Inicio</a> <a href="AgregarJugadores.php">Agregar
            Jugadores</a><a href="AgregarClubes.php"> Agregar Clubes</a> <a href="AgregarCategoria.php">Agregar
            Categorías</a> <a href="AgregarPartidos.php">Agregar Partidos</a> <a href="AgregarTorneos.php">Agregar
            Torneos</a> <img class="Logo" src="../assets/logotipo-de-instagram.png" alt=""> <img class="Logo"
            src="../assets/Logo-de-X.png" alt=""> <img class="Logo" src="../assets/Logo-de-facebook.png" alt="">
    </nav>
    <main>
        <section id="Jugadores">

            <h1>Agrege los datos de su Categoria</h1>
            <form id="FromCategoria" action="Categoria.php" method="POST" class="container">
                <label for="Nombre_Categoria">Nombre</label>
                <input type="text" name="Nombre_Categoria" id="Nombre_Categoria" placeholder="Nombre de la Categoria" required>
                <label for="Descripcion">Descripcion</label>
                <input type="text" name="Descripcion" id="Descripcion" placeholder="Descripcion de la Categoria" required>
                <button class="subirbutton" type="submit">></button>
<p class="Errormsg" id="Error" ></p>
            </form>

        </section>

    </main>
    <footer>
           <p> @ 2024 TODOS LOS DERECHOS RESERVADOS</p>
    </footer>
    <script src="../JAVA/DataCategoria.js"></script>
</body>

</html>