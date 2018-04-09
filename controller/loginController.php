<?php

require_once("connectBDDController.php");
require_once("../model/sublogModel.php");
function checkOldInfo($checkpseudo,$checkmdp){
	$resultat=checkInfo($_POST['checkPseudo'],$_POST['checkmdp']);
	return $resultat;
}
//require("../view/pages/inscription.php");
