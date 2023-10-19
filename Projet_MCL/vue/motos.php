<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('Nav.php');
require_once('../dao/motosDAO.php');

class motos {
    private $libelle;
    private $modelemoto;
   
    public function __construct($libelle, $modelemoto) {
        $this->libelle = $libelle;
        $this->modelemoto = $modelemoto;
    }

    public function getlibelle() {
        return $this->libelle;
    }

    public function getmodelemoto() {
        return $this->modelemoto;
    }
}

try {
    // Initialize the equipesDAO object
    $motosDAO = new motosDAO();

    // Retrieve the list of teams
    $lesMotos = $motosDAO->getLesMotos();

    // Display the results in an HTML table
    echo "<table border='1'>
    <tr>
    <th>libelle</th>
    <th>Modèle de Moto</th>
    </tr>";

    foreach ($lesMotos as $motos) {
        echo "<tr>";
        echo "<td>" . $motos->getlibelle() . "</td>";
        echo "<td>" . $motos->getmodelemoto() . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
