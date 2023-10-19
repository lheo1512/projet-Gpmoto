<?php
include('../vue/pilotes.php');
include('../vue/db.php');
$db = new Db();
$pdo = $db->getConnexion();

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $nationalite = $_POST['nationalite'];
    $dateNaiss = $_POST['dateNaiss'];

    // Assurez-vous que les champs ne sont pas vides avant d'effectuer l'insertion
    if (!empty($nom)) {
        try {
            $sql = "INSERT INTO gpmotog1 (nom, prenom, nationalite, dateNaiss) VALUES (:nom, :prenom, :nationalite, :dateNaiss)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':nationalite', $nationalite);
            $stmt->bindParam(':dateNaiss', $dateNaiss);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    }
}

// Sélectionnez toutes les données depuis la table gpmotog1
try {
    $requete = "SELECT * FROM `pilote`";
} catch (PDOException $e) {
    echo "Erreur de sélection : " . $e->getMessage();
}
?>