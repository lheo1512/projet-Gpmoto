<!DOCTYPE html>
<link rel="stylesheet" href=".css/style.css">
<html>
    <body>
    
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include('Nav.php');
include('../dao/pilotesDAO.php');
include('../controller/PilotesController.php');


Class Pilote {
    private $image;
    private $nom;
    private $prenom;
    private $nationalite;
    private $dateNaiss;
    private $team;

    public function __construct($nom, $prenom, $nationalite, $dateNaiss) {

        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->nationalite = $nationalite;
        $this->dateNaiss = $dateNaiss;
    }
    
    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getNationalite() {
        return $this->nationalite;
    }

    public function getDateNaiss() {
        return $this->dateNaiss;
    }

    // Setter pour l'attribut team
    public function setTeam($team) {
        $this->team = $team;
    }

    // Getter pour l'attribut team
    public function getTeam() {
        return $this->team;
    }
}
try {
    // Initialize the pilotesDAO object
    $pilotesDAO = new pilotesDAO();

    // Retrieve the list of pilots
    $lesPilotes = $pilotesDAO->getLesPilotes();

    // Afficher les résultats dans un tableau HTML
    echo "<table border='1'>
    <tr>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Nationalité</th>
    <th>Date de Naissance</th>
    </tr>";

    foreach ($lesPilotes as $pilote) {
        echo "<tr>";
        echo "<td>" . $pilote->getNom() . "</td>";
        echo "<td>" . $pilote->getPrenom() . "</td>";
        echo "<td>" . $pilote->getNationalite() . "</td>";
        echo "<td>" . $pilote->getDateNaiss() . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<button id="openModal">Ouvrir le formulaire</button>
<div id="formulaire" class="formulaire">

<h2>Veuillez vous inscrire</h2>
<form>
  <div><label for="nom">Votre Nom<em>*</em></label><input type="text" name="nom" required autofocus placeholder="Mate"><img src="../0-Images/ok.gif" width="20"></div>
  <div><label for="prenom">Votre Prénom<em>*</em></label><input type="text" name="prenom" required autofocus placeholder="Yannick"><img src="../0-Images/ok.gif" width="20"></div>
  <div><label for="nationalite">Votre Nationalité<em>*</em></label>
  <select name="nationalite" id="nationalite">
      <option value="francaise">Française</option>
      <option value="allemande">Allemande</option>
      <option value="espagnole">Espagnole</option>
      <option value="italienne">Italienne</option>
      <option value="portugaise">Portugaise</option>
      <option value="américaine">Américaine</option>
      <div><label for="dateNaiss">Votre date de naissance<em>*</em></label><input type="date" name="dateNaiss" required autofocus placeholder="03/09/1900"><img src="../0-Images/ok.gif" width="20"></div>
   <input type='submit' name='exple2' value='Ajouter'>
</form>
</div>
<script>
    // JavaScript pour gérer l'affichage de la fenêtre modale

    // Récupérez le bouton et la fenêtre modale
    var openModalButton = document.getElementById("openModal");
    var modal = document.getElementById("formulaire");

    // Lorsque l'utilisateur clique sur le bouton, affichez la fenêtre modale
    openModalButton.addEventListener("click", function() {
        modal.style.display = "block";
    });

    // Lorsque l'utilisateur clique en dehors de la fenêtre modale, masquez-la
    window.addEventListener("click", function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
</script>
</body>
</html>