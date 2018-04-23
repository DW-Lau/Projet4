<?php
require_once("./model/adminManager.php");

function checkInfo($checkPseudo,$checkmdp){
	$checkUser= new membersManager();
	$userLogin= $checkUser->checkInfo($checkPseudo,$checkmdp);

	require("./view/pages/homepage.php");
}
function formulaire(){
	require ("./view/pages/inscription.php");
}
function subscribe($lastname,$firstname,$pseudo,$mdp,$mail){
	$newMember= new membersManager();
	$subMember= $newMember->getNewUser($lastname,$firstname,$pseudo,$mdp,$mail);
}
/*TEST RECUPERATION DES DONNEES*/
// function sessionBegin($infoUser){
// 	$sessionBeg=new membersManager();
// 	$infoUser= $sessionBeg->getNewUser($lastname,$firstname,$pseudo,$mdp,$mail);
// 	return $infoUser;
// }