<?php
require_once '../dao/db.php'; // Incluez le fichier de connexion à la base de données require_once '../dao/PiloteDAO.php';
class CoursesController { private $dao;
public function __construct() {
$this->dao = new pilotesDAO($GLOBALS['conn']);
}
}
// Implémentez les actions pour CRUD sur les pilotes ici }
?>