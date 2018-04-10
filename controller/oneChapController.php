<?php
	require('../model/oneChapModel.php');
	require("connectBDDController.php");
	$donnees=oneChap();
	$allcomms=getComments();
	//$removeComm=deletComm();
	require('../view/pages/chapitre.php');
