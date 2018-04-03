<?php
	// require("connectBDDController.php");//will call the function to BDD's connexion.
	// $bdd=dbConnect();
// if($_GET['action']=='chapitre'){
// 			require("../controller/oneChapController.php");
// 		}
	require('../model/selecChapModel.php');
		$reponse=listChap();
	require('../view/pages/chapitres.php');