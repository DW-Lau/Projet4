<?php
 
		
require('../model/selecChapModel.php');
// $donnees=listChap();
// $_GET['id']=$donnees['id'];
	require('../model/oneChapModel.php');
	$idPage=$_GET['id'];
	$donnees=oneChap();
	$allcomms=getComments();
	require('../view/pages/chapitre.php');
