<?php
	// require("connectBDDController.php");//will call the function to BDD's connexion.
	// $bdd=dbConnect();
	require('../model/selecChapModel.php');
		$reponse=listChap();
	require('../view/pages/chapitres.php');