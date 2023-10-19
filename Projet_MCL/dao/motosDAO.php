<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('db.php');
require_once('../vue/motos.php');

class motosDAO {
    
    private $sgbd;
    public function __construct() {  
        $db = new Db();
        $this->sgbd = $db->getConnexion();
    }


    public function getLesMotos() : array {
        $lesMotos = array();
        $requete = "SELECT libelle, modelemoto FROM `team`";

        $result = $this->sgbd->prepare($requete);
        $result->execute();
        $lignes = $result->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($lignes as $ligne) {
            $motos = new motos (
                $ligne['libelle'],
                $ligne['modelemoto'],
                
            );
            $lesMotos[] = $motos;
        }
        return $lesMotos;
    }
}
    
?>