<?php

/*require_once("yaml/yaml.php");
$data=yaml_parse_file('pages/yaml/competence.yaml');
//print_array($data);

echo "<p>".$data["domaine"]."</p>";
echo "<p>".$data["competence"]."</p>";
echo "<p>".$data["legende"]."</p>";
*/


$serveur = "localhost";     // Serveur de la base de données (souvent 'localhost')
$utilisateur = "root";      // Nom d'utilisateur (par défaut 'root' sur XAMPP ou MAMP)
$mot_de_passe = "";         // Mot de passe de l'utilisateur (souvent vide en local)
$base_de_donnees = "portfolio";  // Nom de la base de données que vous voulez utiliser

// Créer une connexion à MySQL en utilisant la fonction mysqli_connect (procédural)
$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier si la connexion échoue
if (!$connexion) {
    die("Échec de la connexion à la base de données : " . mysqli_connect_error());
}

$sql = "SELECT * FROM `domaine`";


$resultat = mysqli_query($connexion, $sql);
while ($row = mysqli_fetch_assoc($resultat)) {
    echo "<br>";
    echo "<strong>".$row['nom']." :"."</strong>"."<br><br>";
    $sql = "SELECT * FROM `competence` WHERE domId=".$row['domId'];
    $resultat2 = mysqli_query($connexion, $sql);
    while ($row2 = mysqli_fetch_assoc($resultat2)){
        echo $row2['nom']." : ".$row2['niveau']."<br>";
    }
}





// Fermer la connexion
mysqli_close($connexion);

?>