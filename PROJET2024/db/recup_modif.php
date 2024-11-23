
<!DOCTYPE html>
<html lang="fr">

<?php
session_start();
require('dbconfig.php'); 

// Connexion à la base de données avec MySQL
$connexion = new mysqli($dbConn['host'], $dbConn['user'], $dbConn['pass'], $dbConn['name']);
if ($connexion->connect_error) {
    die("Connexion non établie : " . $connexion->connect_error);
}


// Récupération des données de l'étiquette
$nom = $_POST['nom_etiquette'];
$position = $_POST['coord'];
$description = $_POST['description'];
$html = "none";
$catalog = 1; //$_POST['catalogId'];
$image = 1; //$_POST['imageId'];



// Préparation de la requête ATTENTION REQUETE FAUSSE CAR IL MANQUE DES CATALOGUES
$statement = $connexion->prepare("INSERT INTO label (catalogId, imageId, name, description, points, html) VALUES ( ?, ?, ?, ?, ?,?)");

//Lier les valeurs aux points d'interrogation dans la requête

$statement->bind_param("ssssss", $catalog, $image , $nom, $description, $position, $html);

$statement->execute();

// Fermer la requête et la connexion

$statement->close();
$connexion->close();
//renvoie à la page précédente après l'implémentation dans la base de donnée
if (isset($_SERVER['HTTP_REFERER'])) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
} else {
    header("Location: accueil.html");
    exit();
}
?>