<?php
	require_once("connectBDDController.php");
	
	require("../controller/loginController.php");
require("../model/footerModel.php");
	$billet=footerBill();
	require("../view/portions/mentionsLeg.php");