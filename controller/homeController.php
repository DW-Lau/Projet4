<?php
	require_once("connectBDDController.php");
	require("../model/homeModel.php");
	$chapters=chapterCall();
	$rep=billsCall();
	require("../view/pages/homepage.php");
