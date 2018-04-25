<?php
require_once("./model/adminManager.php");
/*----------------REQUIRE TO ADMINPAGE----------------*/
require_once("./model/chaptersManager.php");
require_once("./model/billetsManager.php");
require_once("./model/commentsManager.php");


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
function adminConnexion($AdminPseudo,$AdminPwd){
	$adminlog= new membersManager();
	$infoAdmin= $adminlog->AdminCheckInfo($AdminPseudo,$AdminPwd);

	require("./view/pages/adminPage.php");

}
function lastUpdate(){
	$lastChaptPost= new ChaptersManager ();
	$lastChapterPost= $lastChaptPost->AdminChapRecap();

	$lastCommPost= new CommentsManager ();
	$lastCommentPost= $lastCommPost -> lastComment();

	require("./view/pages/adminPage.php");
}
function updateWarningComm($warningComm){
	$signalement= new CommentsManager();
	$warningComment=$signalement->signalComm($warningComm);
	//require(".view/pages/chapitres.php");
}