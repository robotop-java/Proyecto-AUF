<?php 
require '../config.php';
class Partidos {

    private string $Nombre_Categoria;
    private int $ResultadoLocal;
    private int $ResultadoVisitante;
    private string $Condicion;
    private string $Visitante;
    private string $Local;
    private string $Fecha;

    public function __construct($Nombre_Categoria, $ResultadoLocal, $ResultadoVisitante, $Condicion, $Visitante, $Local, $Fecha){
        $this->Nombre_Categoria = $Nombre_Categoria;
        $this->ResultadoLocal = $ResultadoLocal;
        $this->ResultadoVisitante = $ResultadoVisitante;
        $this->Condicion = $Condicion;
        $this->Visitante = $Visitante;
        $this->Local = $Local;
$this->Fecha = $Fecha;

    }


    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $Nombre_Categoria = $_POST['Nombre_Categoria'];
    $ResultadoLocal = $_POST['ResultadoLocal'];
    $ResultadoVisitante = $_POST['ResultadoVisitante'];
    $Condicion = $_POST['Condicion'];
    $Visitante = $_POST['Visitante'];
    $Local = $_POST['Local'];
    $Fecha = $_POST['Fecha'];
    
    $sql = "INSERT INTO partidos (Nombre_Categoria, ResultadoLocal, ResultadoVisitante, Condicion, Visitante, Local, Fecha) VALUES (:Nombre_Categoria, :ResultadoLocal, :ResultadoVisitante, :Condicion, :Visitante, :Local, :Fecha)";
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute([
            'Nombre_Categoria' => $Nombre_Categoria,
            'ResultadoLocal' => $ResultadoLocal,
            'ResultadoVisitante' => $ResultadoVisitante,
            'Condicion' => $Condicion,
            'Visitante' => $Visitante,
            'Local' => $Local,
            'Fecha' => $Fecha
        ]);
        
       header("Location: AgregarPartidos.php?mensaje=Partido registrado con exito");
       exit();
    }catch (PDOException $e) {
        if ($e->getCode() === 23000) {
            header("Location: AgregarPartidos.php?mensaje=Error: El partido ya existeeeeee.");
            exit();
        } else {
            header("Location: AgregarPartidos.php?mensaje=Error al registrar el partido: " . $e->getMessage());
            exit();
        }
    } 

}