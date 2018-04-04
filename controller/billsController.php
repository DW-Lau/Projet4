<?php
	require("connectBDDController.php");
	require("../model/billsModel.php");
	 $rep=getBills();
	// $rep=getLastBills();
	require("../view/pages/billets.php");