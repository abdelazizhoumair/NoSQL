<?php  

$team= $_POST['team'];
$player= $_POST['player'];
require 'vendor/autoload.php'; // include Composer's autoloader


$client = new MongoDB\Client("mongodb://localhost:27017");
$col_players = $client->comedy->players;
$col_teams = $client->comedy->teams;

$searchQuery = array('nom' => $player );
$searchQuery2 = array('_id' => 1 );

$result = $col_players->findone( $searchQuery,$searchQuery2);
// print_r($result);
// echo $result['_id'];

$updateQuery = array('nom' => $team );
$updateQuery2 = array('$push' =>  array('effectifs' => $result['_id']));

$res_up = $col_teams -> updateone($updateQuery,$updateQuery2);

if ($res_up) {
	echo $player .	" added to " . $team;
}
?>