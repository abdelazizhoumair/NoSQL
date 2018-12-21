
<?php  

require 'vendor/autoload.php'; // include Composer's autoloader


$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->comedy->players;

$search_string=$_GET['term'];
$searchQuery = array('nom' => new MongoDB\BSON\Regex($search_string, 'i') );

$result = $collection->find( $searchQuery)->toArray();
$names=array();
foreach ($result as $entry) {
    array_push($names,$entry['nom']);   
}
echo json_encode($names);
// echo $result;

?>