<?php
require("connectBDDController.php");
require("../model/sublogModel.php");

function getInfoNewUser($lastname,$firstname,$pseudo,$mdp,$mail){
	$infoUser=getNewUser($lastname,$firstname,$pseudo,$mdp,$mail);
	return $infoUser;
	var_dump($infoUser);
}
//var_dump(getNewUser($lastname));
//getNewUser($lastname,$firstname,$pseudo,$mdp,$mail);
require("../view/pages/inscription.php");

