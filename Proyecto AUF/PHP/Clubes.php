
<?php
require '../config.php';

CLass Clubes {
    private string $NombreClub;
    private string $CategoriaNombre;
    private string $Ciudad;
    private string $Departamento;

    public function __construct($NombreClub, $CategoriaNombre, $Ciudad, $Departamento){
  
        $this->NombreClub = $NombreClub;
        $this->CategoriaNombre = $CategoriaNombre;
        $this->Ciudad = $Ciudad;
        $this->Departamento = $Departamento;
    }
 
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $NombreClub = $_POST['NombreClub'];
    $Ciudad = $_POST['Ciudad'];
    $Departamento = $_POST['Departamento'];
    $CategoriaNombre = $_POST['CategoriaNombre'];

    $sql = "INSERT INTO clubes ( NombreClub, CategoriaNombre, Ciudad, Departamento) VALUES (:NombreClub, :CategoriaNombre, :Ciudad, :Departamento)";
    $stmt = $pdo->prepare($sql);
    try {
        $stmt->execute([
            'NombreClub' => $NombreClub,
            'CategoriaNombre' => $CategoriaNombre,
            'Ciudad' => $Ciudad,
            'Departamento' => $Departamento
        ]);
              header("Location: AgregarClubes.php?mensaje=" . urlencode("Club registrado exitosamente"));
        exit;
    
    }
    catch (PDOException $e) {
        if ($e->getCode() == 23000) {
             header("Location: AgregarClubes.php?mensaje=" . urlencode("El club ya existe."));
        exit;
        } else {
            header("Location: AgregarClubes.php?mensaje=" . urlencode("Error al registrar el club: " . $e->getMessage()));
        exit;
        }
    }
}

?>