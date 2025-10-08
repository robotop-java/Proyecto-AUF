<?php
require '../config.php';

class Torneos {
    private $Nombre_Torneo;
    private $ID_Partidos;
    private $Fecha_Inicio;
    private $Fecha_Fin;

    public function __construct($Nombre_Torneo, $ID_Partidos, $Fecha_Inicio, $Fecha_Fin) {
        $this->Nombre_Torneo = $Nombre_Torneo;
        $this->ID_Partidos = $ID_Partidos;
        $this->Fecha_Inicio = $Fecha_Inicio;
        $this->Fecha_Fin = $Fecha_Fin;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Nombre_Torneo = $_POST['Nombre_Torneo'];
    $ID_Torneo = $_POST['ID_Torneo'];
    $ID_Partidos = $_POST['ID_Partidos'];
    $Fecha_Inicio = $_POST['Fecha_Inicio'];
    $Fecha_Fin = $_POST['Fecha_Fin'];

    $sql = "INSERT INTO torneos (Nombre_Torneo, ID_Torneo, ID_Partidos, Fecha_Inicio, Fecha_Fin) VALUES (:Nombre_Torneo, :ID_Torneo, :ID_Partidos, :Fecha_Inicio, :Fecha_Fin)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            'Nombre_Torneo' => $Nombre_Torneo,
            'ID_Torneo' => $ID_Torneo,
            'ID_Partidos' => $ID_Partidos,
            'Fecha_Inicio' => $Fecha_Inicio,
            'Fecha_Fin' => $Fecha_Fin
        ]);
        header("Location: AgregarTorneos.php?mensaje=Torneo registrado con exito");
        exit();
    } catch (PDOException $e) {
        if ($e->getCode() === '23000') {
            header("Location: AgregarTorneos.php?mensaje=Error: El torneo ya existe.");
            exit();
        } else {
            header("Location: AgregarTorneos.php?mensaje=Error al registrar el torneo: " . $e->getMessage());
            exit();
        }
    }
}
?>
