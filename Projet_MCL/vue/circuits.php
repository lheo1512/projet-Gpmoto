<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include('Nav.php');
include('../dao/circuitsDAO.php');



Class circuits{
    private $nom_circuit;
    private $emplacement;
    private $date_construction;
    private $longueur;
    private $largeur;
    private $virages_gauche;
    private $virages_droite;


    public function __construct($nom_circuit, $emplacement,$date_construction,$longueur,$largeur,$virages_gauche,$virages_droite) {
        $this->nom_circuit = $nom_circuit;
        $this->emplacement = $emplacement;
        $this->date_construction = $date_construction;
        $this->longueur = $longueur;
        $this->largeur= $largeur;
        $this->virages_gauche = $virages_gauche;
        $this->virages_droite= $virages_droite;
    }

    public function getnom_circuit() {
        return $this->nom_circuit;;
    }

    public function getemplacement() {
        return $this->emplacement;
    }
    public function getdate_construction() {
        return $this->date_construction;
    }
    public function getlongueur() {
        return $this->longueur;
    }

    public function getlargeur() {
        return $this->largeur;
    }
    public function getvirages_gauche() {
        return $this->virages_gauche;
    }
    public function getvirages_droite() {
        return $this->virages_droite;
    }

}
try {
    // Initialize the pilotesDAO object
    $coursesDAO = new circuitsDAO();

    // Retrieve the list of pilots
    $lescircuits = $coursesDAO->getLescircuits();

    // Afficher les résultats dans un tableau HTML
    echo "<table border='1'>
    <tr>
    <th>Nom du circuits</th>
    <th>Pays</th>
    <th>Date de construction</th>
    <th>Longueur</th>
    <th>Largeur</th>
    <th>Virages a gauche</th>
    <th>Virages a droite</th>

    </tr>";

    foreach ($lescircuits as $circuits) {
        echo "<tr>";
        echo "<td>" . $circuits->getnom_circuit() . "</td>";
        echo "<td>" . $circuits->getemplacement() . "</td>";
        echo "<td>" . $circuits->getdate_construction() . "</td>";
        echo "<td>" . $circuits->getlongueur() . "</td>";
        echo "<td>" . $circuits->getlargeur() . "</td>";
        echo "<td>" . $circuits->getvirages_gauche() . "</td>";
        echo "<td>" . $circuits->getvirages_droite() . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
