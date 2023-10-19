<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('Nav.php');
require_once('../dao/equipesDAO.php');

class equipes {
    private $libelle;
    private $pays;
    private $modelemoto;
   
    public function __construct($libelle, $pays, $modelemoto) {
        $this->libelle = $libelle;
        $this->pays = $pays;
        $this->modelemoto = $modelemoto;
    }

    public function getlibelle() {
        return $this->libelle;
    }

    public function getpays() {
        return $this->pays;
    }

    public function getmodelemoto() {
        return $this->modelemoto;
    }
}

try {
    // Initialize the equipesDAO object
    $equipesDAO = new equipesDAO();

    // Retrieve the list of teams
    $lesEquipes = $equipesDAO->getLesEquipes();

    // Display the results in an HTML table
    echo "<table border='1'>
    <tr>
    <th>libelle</th>
    <th>Pays</th>
    <th>ModeleMoto</th>
    </tr>";

    foreach ($lesEquipes as $equipes) {
        echo "<tr>";
        echo "<td>" . $equipes->getlibelle() . "</td>";
        echo "<td>" . $equipes->getpays() . "</td>";
        echo "<td>" . $equipes->getmodelemoto() . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
