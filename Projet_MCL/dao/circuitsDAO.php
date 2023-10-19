<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('db.php');
require_once('../vue/circuits.php');

class circuitsDAO {
    
    private $sgbd;
    public function __construct() {  
        $db = new Db();
        $this->sgbd = $db->getConnexion();
    }


    public function getLescircuits() : array {
        $lescircuits = array();
        $requete = "SELECT nom_circuit, emplacement,date_construction,longueur,largeur,virages_gauche,virages_droite FROM `circuits`";
        $result = $this->sgbd->prepare($requete);
        $result->execute();
        $lignes = $result->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($lignes as $ligne) {
            $circuits = new circuits (
                $ligne['nom_circuit'],
                $ligne['emplacement'],
                $ligne['date_construction'],
                $ligne['longueur'],
                $ligne['largeur'],
                $ligne['virages_gauche'],
                $ligne['virages_droite']
            );
            $lescircuits[] = $circuits; 
        }
        return $lescircuits;
    }
}
    
?>