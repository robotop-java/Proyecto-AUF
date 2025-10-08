<?php
require '../config.php';
Class Categoria {
    private string $Nombre_Categoria;
    private string $Descripcion;

    public function __construct($Nombre_Categoria, $Descripcion){
        $this->Nombre_Categoria = $Nombre_Categoria;
        $this->Descripcion = $Descripcion;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Nombre_Categoria = $_POST['Nombre_Categoria'];
    $Descripcion = $_POST['Descripcion'];

    $sql = "INSERT INTO Categoria (Nombre_Categoria, Descripcion) VALUES (:Nombre_Categoria, :Descripcion)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            'Nombre_Categoria' => $Nombre_Categoria,
            'Descripcion' => $Descripcion
        ]);
        header("Location: AgregarCategoria.php?mensaje=" . urldecode("Categoría registrada exitosamente"));
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            header("Location: AgregarCategoria.php?mensaje=" . urldecode("La categoría ya existe."));
        } else {
            header("Location: AgregarCategoria.php?mensaje=" . urldecode("Error al registrar la categoría: " . $e->getMessage()));
        }
    }
}
?>