<?php
	require('../model/oneChapModel.php');
	
	$donnees=oneChap();
	$allcomms=getComments();
	require('../view/pages/chapitre.php');
