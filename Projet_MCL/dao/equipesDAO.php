<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('db.php');
require_once('../vue/equipes.php');

class equipesDAO {
    
    private $sgbd;
    public function __construct() {  
        $db = new Db();
        $this->sgbd = $db->getConnexion();
    }


    public function getLesEquipes() : array {
        $lesEquipes = array();
        $requete = "SELECT libelle, pays, modelemoto FROM `team`";

        $result = $this->sgbd->prepare($requete);
        $result->execute();
        $lignes = $result->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($lignes as $ligne) {
            $equipes = new equipes (
                $ligne['libelle'],
                $ligne['pays'],
                $ligne['modelemoto'],
                
            );
            $lesEquipes[] = $equipes;
        }
        return $lesEquipes;
    }
}
    
?>