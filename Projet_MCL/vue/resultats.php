<?php include 'header.php'; ?> <!-- Contenu de la page Pilotes --> <?php include 'footer.php'; ?>

<?php
require_once 'dao/db.php'; // Incluez le fichier de connexion à la base de données
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
// Incluez ici le code pour gérer les différentes pages en fonction des paramètres d'URL
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') { // Incluez ici le code pour gérer les formulaires soumis
}
?>
<!DOCTYPE html> <html lang="fr"> <head>
<meta charset="UTF-8">
<title>Application Moto GP</title>
<!-- Incluez ici vos liens vers les fichiers CSS et JS -->
</head>
 <body>
<?php include 'vue/nav.php'; ?> <div id="content">
<!-- Le contenu de la page sera inclus ici en fonction des actions de l'utilisateur --> </div>
</body> 
</html> 