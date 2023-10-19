<?php
class Db
{
    private PDO $connexion;
    public function __construct()
    {
        $servername = "localhost";
        $username = "gpmotog1";
        $password = "gpmotog1";
        $dbname = "gpmotog1";
        try {
            $this->connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }

    public function getConnexion(): PDO
    {
        return $this->connexion;
    }
}
?>
