
<?php
require '../config.php';
Class Jugadores {
    private int $CI;
    private string $Nombre;
    private string $Apellido;
    private int $Club_ID;
     private int $Telefono;
    private string $Posicion; 
    private int $Numero;
    private int $Goles;
    private int $Tarjetas;
    private int $Partidos;

    public function __construct( $CI, $Nombre, $Apellido, $Club_ID, $Telefono, $Posicion, $Numero, $Goles, $Tarjetas, $Partidos){
        $this->CI = $CI;
        $this->Nombre = $Nombre;
        $this->Apellido = $Apellido;
        $this->Club_ID = $Club_ID;
         $this->Telefono = $Telefono;
        $this->Posicion = $Posicion;
        $this->Numero = $Numero;
        $this->Goles = $Goles;
        $this->Tarjetas = $Tarjetas;
        $this->Partidos = $Partidos;

    }


}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $CI = $_POST['CI'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Club_ID = $_POST['Club_ID'];
    $Telefono = $_POST['Telefono'];
    $Posicion = $_POST['Posicion'];
    $Numero = $_POST['Numero'];
    $Goles = $_POST['Goles'];
    $Tarjetas = $_POST['Tarjetas'];
    $Partidos = $_POST['Partidos'];


    $Posicion = substr(trim($Posicion), 0, 50); 

    $sql1 = "INSERT INTO jugadores (CI, Nombre, Apellido, Club_ID, Posicion, Numero, Goles, Tarjetas, Partidos) VALUES (:CI, :Nombre, :Apellido, :Club_ID, :Posicion, :Numero, :Goles, :Tarjetas, :Partidos)";
    $stmt = $pdo->prepare($sql1);

    try {
        $stmt->execute([
            'CI' => $CI,
            'Nombre' => $Nombre,
            'Apellido' => $Apellido,
            'Club_ID' => $Club_ID,
            'Posicion' => $Posicion,
            'Numero' => $Numero,
            'Goles' => $Goles,
            'Tarjetas' => $Tarjetas,
            'Partidos' => $Partidos
        ]);
         $sql2= "INSERT INTO jugador_telefono (Telefono, CI) VALUES (:Telefono, :CI)";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute([
            'Telefono' => $Telefono,
            'CI' => $CI
        ]);
       header("Location: AgregarJugadores.php?mensaje=" . urlencode("Jugador registrado exitosamente"));
       exit;
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            header("Location: AgregarJugadores.php?mensaje=" . urlencode("Jugador registrado exitosamente"));
        } else {
            header("Location: AgregarJugadores.php?mensaje=" . urlencode("Error al registrar el jugador: " . $e->getMessage()));
        }
    }
}

?>