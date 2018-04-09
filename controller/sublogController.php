<?php

require_once("connectBDDController.php");
function getInfoNewUser($lastname,$firstname,$pseudo,$mdp,$mail){
		$infoUser=getNewUser($lastname,$firstname,$pseudo,$mdp,$mail);
		return $infoUser;
}
// echo "existe déjà";
//$infosMembre=$infoUser;

require_once("../model/sublogModel.php");//changer le once ?




require("../view/pages/inscription.php");

