<?php


require 'vendor/autoload.php'; // include Composer's autoloader


$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->comedy->players;

$age=$_POST['age'];
$poste=$_POST['poste'];

// $date = "1996-12-18";
// echo Age($date);

 $searchQuery = array('poste' =>  $poste);

 $result = $collection->find( $searchQuery)->toArray();


// foreach ($result as $entry) {
// 	if (Age($entry['aniv'])<= $age){
// 		echo json_encode($entry);
// 	}   
// }

	
// Calcule l'âge à partir d'une date de naissance jj/mm/aaaa
function Age($date_naissance){
	$am = explode('-', $date_naissance);
	$an = explode('-', date('Y-m-d'));
	if(($am[1] < $an[1]) || (($am[1] == $an[1]) && ($am[2] <= $an[2]))) return $an[0] - $am[0];
	return $an[0] - $am[0] - 1;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" lang="fr">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.15/css/mdb.min.css" rel="stylesheet">
	<title></title>
</head>
<body >
	<nav class="navbar navbar-light bg-light">
	  <a class="navbar-brand" href="index.html">
	    <img src="football.svg" width="30" height="30" class="d-inline-block align-top" alt="">
	    TSE foot
	  </a>
		<form class="form-inline my-2 my-lg-0" method="post" action="search_players.php">
			<select class="custom-select form-control mr-sm-1 " name="poste">
			  	<option selected>post</option>
				<option value="milieu">milieu</option>
				<option value="défence">défence</option>
				<option value="attaque">attaque</option>
			</select>
			<input class="form-control mr-sm-1" type="text" placeholder="age max" name="age" required>
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
	</nav>
	<br><br>
	<div class="container">
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">nom</th>
		      <th scope="col">prenom</th>
		      <th scope="col">aniv</th>
		      <th scope="col">taille(cm)</th>
		      <th scope="col">poids(kg)</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php foreach ($result as $entry) {
					if (Age($entry['aniv'])<= $age){ ?>
		    <tr>
		      <th> <?php echo $entry['nom']; ?> </th>
		      <td> <?php echo $entry['prenom'] ?> </td>
		      <td> <?php echo $entry['aniv'] ?> </td>
		      <td> <?php echo $entry['taille'] ?> </td>
		      <td> <?php echo $entry['poids'] ?> </td>
		    </tr>
		<?php }} ?>
		  </tbody>
		</table>
	</div>


<!-- Footer -->
<footer class="page-footer  " >

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3 text-info">© 2018 Copyright:
    <a href="https://fr.linkedin.com/in/yassine-birouk-299567139"> <i class="fa fa-linkedin" aria-hidden="true"></i></a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
</html>
