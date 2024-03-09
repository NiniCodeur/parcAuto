<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PARC_FALL_AUTO";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Récupération des données du formulaire
$marque = $_POST['marque'];
$modele = $_POST['modele'];
$kilo = $_POST['kilometrage'];

// Traitement de l'upload de la photo
$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));

// Insertion des données dans la base de données
$sql = "INSERT INTO vehicules (marque, modele, kilometrage, photo) VALUES ('$marque', '$modele', $kilo, '$photo')";

if ($conn->query($sql) === TRUE) {
    echo "Véhicule ajouté avec succès.";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
