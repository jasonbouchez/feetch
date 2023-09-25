<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fetch";

$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Récupérez nom et prénom depuis $_POST
if (isset($_POST['nom']) && isset($_POST['prenom'])) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    // requête en base de données
    $sql = "INSERT INTO name (nom, prenom) VALUES (:nom, :prenom)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);

   
    if ($stmt->execute()) {
        $response = array("message" => "Données insérées avec succès");
    } else {
        $response = array("message" => "Erreur lors de l'insertion des données");
    }
} else {
    $response = array("message" => "Données manquantes dans la requête POST");
}


// réponse au format JSON
header('Content-Type: application/json');
echo json_encode($response);