<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('db.php');
require_once('../vue/pilotes.php');

class pilotesDAO {
    
    private $sgbd;
    public function __construct() {  
        $db = new Db();
        $this->sgbd = $db->getConnexion();
    }


    public function getLesPilotes() : array {
        $lesPilotes = array();
        $requete = "SELECT * FROM `pilote`";
        $result = $this->sgbd->prepare($requete);
        $result->execute();
        $lignes = $result->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($lignes as $ligne) {
            $pilote = new Pilote (
                $ligne['nom'],
                $ligne['prenom'],
                $ligne['nationalite'],
                $ligne['dateNaiss']
            );
            $lesPilotes[] = $pilote;
        }
        return $lesPilotes;
    }
}
    
?>