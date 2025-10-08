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
            Jugadores</a><a href="#"> Agregar Clubes</a> <a href="AgregarCategoria.php">Agregar Categorías</a> <a
            href="AgregarPartidos.php">Agregar Partidos</a> <a href="AgregarTorneos.php">Agregar Torneos</a> <img
            class="Logo" src="../assets/logotipo-de-instagram.png" alt=""> <img class="Logo"
            src="../assets/Logo-de-X.png" alt=""> <img class="Logo" src="../assets/Logo-de-facebook.png" alt="">
    </nav>
    <main>
        <section id="Jugadores">

            <h1>Agrege los datos de su Club</h1>
            <form action="Clubes.php" method="POST" class="container">
                <label for="NombreClub">Nombre</label>
                <input type="text" name="NombreClub" id="NombreClub" required>
                <label for="CategoriaNombre">Categoría</label>
                <select name="CategoriaNombre" id="CategoriaNombre" required>
                    <?php
                        require '../config.php';
                        $stmt = $pdo->query("SELECT Nombre_Categoria, Descripcion FROM Categoria");
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$row['Nombre_Categoria']}'>{$row['Descripcion']}</option>";
                        }
                    ?>
                </select>
                <label for="Departamento">Departamento</label>
                <select name="Departamento" id="Departamento">
                    <option value="">Seleccione un departamento</option>
                    <option value="Montevideo">Montevideo</option>
                    <option value="Salto">Salto</option>
                    <option value="Canelones">Canelones</option>
                    <option value="Paysandú">Paysandú</option>
                    <option value="Maldonado">Maldonado</option>
                    <option value="Colonia">Colonia</option>
                    <option value="San José">San José</option>
                    <option value="Rivera">Rivera</option>
                    <option value="Tacuarembó">Tacuarembó</option>
                    <option value="Río Negro">Río Negro</option>
                    <option value="Soriano">Soriano</option>
                    <option value="Durazno">Durazno</option>
                    <option value="Flores">Flores</option>
                    <option value="Florida">Florida</option>
                    <option value="Lavalleja">Lavalleja</option>
                    <option value="Artigas">Artigas</option>
                    <option value="Rocha">Rocha</option>
                </select>
                <label for="Ciudad">Ciudad</label>
                <select name="Ciudad" id="Ciudad">
                    <option value="">Seleccione una ciudad</option>
                    <option value="Canelones">Canelones</option>
                    <option value="Montevideo">Montevideo</option>
                    <option value="Salto">Salto</option>
                    <option value="Ciudad de la Costa">Ciudad de la Costa</option>
                    <option value="Paysandú">Paysandú</option>
                    <option value="Maldonado">Maldonado</option>
                    <option value="Colonia del Sacramento">Colonia del Sacramento</option>
                    <option value="San José de Mayo">San José de Mayo</option>
                    <option value="Rivera">Rivera</option>
                    <option value="Tacuarembó">Tacuarembó</option>
                    <option value="Fray Bentos">Fray Bentos</option>
                    <option value="Mercedes">Mercedes</option>
                    <option value="Durazno">Durazno</option>
                    <option value="Trinidad">Trinidad</option>
                    <option value="Florida">Florida</option>
                    <option value="Minas">Minas</option>
                    <option value="San Carlos">San Carlos</option>
                    <option value="Carmelo">Carmelo</option>
                    <option value="Artigas">Artigas</option>
                    <option value="Rocha">Rocha</option>
                </select>

                <button class="subirbutton" type="submit">></button>

            </form>

        </section>

    </main>
</body>

</html>