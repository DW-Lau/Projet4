<?php

require_once("connectBDDController.php");
function getInfoNewUser($lastname,$firstname,$pseudo,$mdp,$mail){
		$infoUser=getNewUser($lastname,$firstname,$pseudo,$mdp,$mail);
		return $infoUser;
}
echo "existe déjà";
$infosMembre=$infoUser;

require_once("../model/sublogModel.php");//changer le once ?

function checkOldInfo($checkpseudo,$checkmdp){
	$checkUser=checkInfoUser($_POST['checkPseudo'],$_POST['checkmdp']);
	return $checkUser;
}
echo "ouaip";



require("../view/pages/inscription.php");

