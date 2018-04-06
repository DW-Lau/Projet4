<?php

	require("connectBDDController.php");
	require('../model/selecChapModel.php');
		$reponse=listChap();
	require('../view/pages/chapitres.php');