<?php

/*require_once("yaml/yaml.php");
$data=yaml_parse_file('pages/yaml/formation.yaml');
//print_array($data);

echo "<p>".$data["nomFormation"]."</p>";
echo "<p>".$data["etablissement"]."</p>";
echo "<p>".$data["debut"]."</p>";
echo "<p>".$data["fin"]."</p>";
echo "<p>".$data["lieu"]."</p>";
echo "<p>".$data["Contenu"]."</p>";
//echo '<a href="https://drive.google.com/file/d/1HuDgx22U5_89PC2D9Cf6m31TYHx8lB3q/view?usp=sharing'.$data["lienCV"].'">';
//echo '<img src="images/'.$data["photo"].'">';*/

$serveur = "localhost";     // Serveur de la base de données (souvent 'localhost')
$utilisateur = "root";      // Nom d'utilisateur (par défaut 'root' sur XAMPP ou MAMP)
$mot_de_passe = "";         // Mot de passe de l'utilisateur (souvent vide en local)
$base_de_donnees = "portfolio";  // Nom de la base de données que vous voulez utiliser

// Créer une connexion à MySQL en utilisant la fonction mysqli_connect
$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier si la connexion échoue
if (!$connexion) {
    die("Échec de la connexion à la base de données : " . mysqli_connect_error());
}

$sql = "SELECT * FROM `formation`";
$resultat = mysqli_query($connexion, $sql);
while ($row = mysqli_fetch_assoc($resultat)) {
    echo "<br><strong>Nom de la formation : </strong>".$row['nom']."<br><strong>Etablissement : </strong>".$row['etablissement']."<br><strong>Date de début : </strong>".$row['debut']."<br><strong>Date de fin : </strong>".$row['fin']."<br><strong>Lieu :</strong> ".$row['lieu']."<br><strong>Contenu : </strong>".$row['contenu']."<br>";
}


// Fermer la connexion
mysqli_close($connexion);

?>