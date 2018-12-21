<!-- //this  file is responsible for adding a player to our mongodb (collection palyers) -->

<?php

require 'vendor/autoload.php'; // include Composer's autoloader

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->comedy->players;


$result = $collection->insertOne( [ 'nom' => $_POST["nom"], 'prenom' => $_POST["prenom"], 'aniv' => $_POST["aniv"], 'taille' => $_POST["taille"], 'poids' => $_POST["poids"], 'poste' => $_POST["poste"] ] );

echo "this is the selet value " . $_POST['poste'];
?>

