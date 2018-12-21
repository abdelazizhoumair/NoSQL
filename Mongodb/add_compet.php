
<?php  

$p1=$_POST['player_1'];
$p2=$_POST['player_2'];
$n1=$_POST['note_1'];   

$n1=array_map('intval', $n1);
$n2=$_POST['note_2'];
$n2=array_map('intval', $n2);

$notes1 = array();

$name=$_POST['name_compet'];
$date=$_POST['date_compet'];
$score1=$_POST['score_1'];
$team1=$_POST['team_1'];
$score2=$_POST['score_2'];
$team2=$_POST['team_2'];

for ($i=0; $i < count($p1); $i++) {
    array_push($notes1,array('player' => $p1[$i], 'note' => $n1[$i]));   
}
$notes2 = array();

for ($i=0; $i < count($p2); $i++) {
    array_push($notes2,array('player' => $p2[$i], 'note' => $n2[$i]));   
}
// echo $team1 . ' '. $team2.' ' . $score2;
require 'vendor/autoload.php'; // include Composer's autoloader

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->comedy->compets;

$data = array('nom' => $name,'date'=> $date,'team_dom'=>array('nom'=> $team1,'score'=> $score1,'notes'=>$notes1),'team_ext'=>array('nom'=>$team1,'score'=>$score1,'notes'=>$notes2));


$res_up = $collection -> insertOne($data);

if ($res_up) {
	echo $team1 .	" and " . $team2 . ' are added to '.$name;
}
?>