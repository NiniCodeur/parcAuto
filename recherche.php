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

// Récupération du terme de recherche
$term = $_POST['search_term'];

// Requête SQL pour la recherche
$sql = "SELECT * FROM vehicules WHERE marque LIKE '%$term%' OR modele LIKE '%$term%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Affichage des résultats
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<strong>Marque:</strong> " . $row['marque'] . "<br>";
        echo "<strong>Modèle:</strong> " . $row['modele'] . "<br>";
        echo "<strong>Kilométrage:</strong> " . $row['kilometrage'] . " km<br>";
        // Ajoutez ici le code pour afficher la photo si vous stockez le chemin de l'image dans la base de données
        echo "<img src='data:image/jpeg;base64," . base64_encode($row['photo']) . "' alt='Voiture Photo'><br>";
        echo "</div>";
    }
} else {
    echo "Aucun résultat trouvé.";
}

$conn->close();
?>
