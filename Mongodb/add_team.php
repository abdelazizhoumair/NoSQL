<!-- this  is the file tto add teams to databse -->
<?php 
require 'vendor/autoload.php'; // include Composer's autoloader

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->comedy->teams;

$colors = [ $_POST["color1"] , $_POST["color2"] , $_POST["color3"] , $_POST["color4"] ];
$result = $collection->insertOne( [ 'nom' => $_POST["nom"], 'stade' => $_POST["stade"], 'colors' => $colors ] );

// echo $result->getInsertedId();
echo "team added";

?>