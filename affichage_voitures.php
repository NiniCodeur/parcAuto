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

// Requête SQL pour récupérer tous les véhicules
$sql = "SELECT * FROM vehicules";

$result = $conn->query($sql);

?>
 <style>
    nav>a {

text-decoration: none;
padding: 8px 16px;
border-radius: 20px;
color: rgba(255, 255, 255, 0, 8);
text-transform: uppercase;
font-size: 10px;
letter-spacing: 3px;
padding-left: 10px;
}

nav>a:hover {
transition: 0.25s;
background: rgb(56, 130, 209);
color: black;
background: pink;
}
 </style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des Voitures</title>
    <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="styles.css">
     
</head>

<body>
    
<div class="container">
<div>
        <nav>
            <a href="nini.php">Accueil
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
                    <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z" />
                </svg>
            </a>

        </nav>
    </div>
        
    <?php
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
        echo "Aucun véhicule trouvé.";
    }
    ?>

    
</body>

</html>

<?php
$conn->close();
?>