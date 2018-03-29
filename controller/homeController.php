<?php
	require("connectBDDController.php");
	require("../model/homeModel.php");
	$chapters=chaptersCall();
	$rep=billsCall();
	require("../view/pages/homepage.php");