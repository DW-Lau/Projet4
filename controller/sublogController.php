<?php

require_once("connectBDDController.php");
function getInfoNewUser($lastname,$firstname,$pseudo,$mdp,$mail){
		$infoUser=getNewUser($lastname,$firstname,$pseudo,$mdp,$mail);
		return $infoUser;
}
var_dump($lastname);
var_dump($firstname);
var_dump($pseudo);
var_dump($mail);
echo "existe déjà";
require_once("../model/sublogModel.php");
echo "ouaip";
//var_dump(getNewUser($_POST['lastname'],$_POST['firstname'],$_POST['pseudo'],$_POST['mdp'],$_POST['mail']));
//$infoUser=getNewUser($lastname,$firstname,$pseudo,$mdp,$mail);

$infosMembre=$infoUser;

//var_dump(getNewUser($lastname));
//getNewUser($lastname,$firstname,$pseudo,$mdp,$mail);
require("../view/pages/inscription.php");

