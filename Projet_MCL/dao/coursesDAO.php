<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('db.php');
require_once('../vue/courses.php');

class coursesDAO {
    
    private $sgbd;
    public function __construct() {  
        $db = new Db();
        $this->sgbd = $db->getConnexion();
    }


    public function getLesCourses() : array {
        $lesCourses = array();
        $requete = "SELECT libelleGP, dateCourse FROM `course`";
        $result = $this->sgbd->prepare($requete);
        $result->execute();
        $lignes = $result->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($lignes as $ligne) {
            $courses = new Courses (
                $ligne['libelleGP'],
                $ligne['dateCourse']
            );
            $lesCourses[] = $courses;
        }
        return $lesCourses;
    }
}
    
?>