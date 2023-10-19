<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include('Nav.php');
include('../dao/coursesDAO.php');



Class Courses {
    private $libelleGP;
    private $dateCourse;


    public function __construct($libelleGP, $dateCourse) {
        $this->libelleGP = $libelleGP;
        $this->dateCourse = $dateCourse;
    }

    public function getLibelleGP() {
        return $this->libelleGP;
    }

    public function getDateCourse() {
        return $this->dateCourse;
    }
}
try {
    // Initialize the pilotesDAO object
    $coursesDAO = new coursesDAO();

    // Retrieve the list of pilots
    $lesCourses = $coursesDAO->getLesCourses();

    // Afficher les résultats dans un tableau HTML
    echo "<table border='1'>
    <tr>
    <th>Nom des courses</th>
    <th>Date des courses/th>
    </tr>";

    foreach ($lesCourses as $courses) {
        echo "<tr>";
        echo "<td>" . $courses->getLibelleGP() . "</td>";
        echo "<td>" . $courses->getDateCourse() . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
