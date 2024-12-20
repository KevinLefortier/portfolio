<?php

require_once("yaml/yaml.php");
$data=yaml_parse_file('pages/yaml/acceuil.yaml');
//print_array($data);

echo "<p>".$data["prenom"]." ".$data["nom"]."</p>";
echo "<p>".$data["accroche"]."</p>";
echo "<p>".$data["paragraphe"]."</p>";
//echo '<img src="images/'.$data["photo"].'">';


?>