<script src='script_add_player_team.js' ></script>
<form id='form_add_player_team' class='col'>
		 	<div class='row'>
		    <div class='col'>
		      <input id='recherche' type='text' class='form-control form-control-sm' placeholder='player name' name='player'>
		    </div>
		    <input type='hidden' name='id_team' value=" . $result->getInsertedId() . ">

		    <button id='add_player_team'>go</button>
		    </div>
	</form>
	<span id='res_add_player_team'></span>"


	<!-- <?php 
$list = array('name' , 'Hinterland', 'brewery' , 'BrewDog','name' , 'Hinterland', 'brewery' , 'BrewDog','name' , 'Hinterland', 'brewery' , 'BrewDog');	
echo json_encode($list);
?> -->



background-image: linear-gradient(rgba(0, 0, 255, 0.5), rgba(255, 255, 0, 0.5)),
                  url("../../media/examples/lizard.png");