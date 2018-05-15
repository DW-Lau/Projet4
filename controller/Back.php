<?php
/*----------------REQUIRE TO ADMINPAGE----------------*/
require_once("./model/adminManager.php");
require_once("./model/chaptersManager.php");
require_once("./model/billetsManager.php");
require_once("./model/commentsManager.php");

function adminPage(){
	require("./view/pages/connexionAdmin.php");
}

function formulaire(){
	require ("./view/pages/inscription.php");
}

function sessionOut(){
	require('./home.php');
}

/*--------------------------------CONNEXION----------------------------------------*/
function checkInfo($checkPseudo,$checkmdp){
	$checkUser= new membersManager();
	$userLogin= $checkUser->checkInfo($checkPseudo,$checkmdp);
}

function subscribe($lastname,$firstname,$pseudo,$mdp,$mail,$pseudoPresent){
	$newMember= new membersManager();
	$subMember= $newMember->getNewUser($lastname,$firstname,$pseudo,$mdp,$mail,$pseudoPresent);
}

function adminConnexion($AdminPseudo,$AdminPwd){
	$adminlog= new membersManager();
	$infoAdmin= $adminlog->AdminCheckInfo($AdminPseudo,$AdminPwd);
	require("./view/pages/adminPage.php");
}

/*--------------------------------MESSAGE LOGIN----------------------------------------*/
function msgPWD($message){
	$message;

	require('./view/pages/inscription.php');
}

function infoIssues($infoIssues){

	require('./view/pages/inscription.php');
}
function noNickName($noNickName){

	$noNickName;
}
function NoMatch($NoMatch){
	$NoMatch;

	require('./view/pages/inscription.php');
}
/*--------------------------------END MESSAGES----------------------------------------*/

/*--------------------------------END CONNEXION----------------------------------------*/

function updateWarningComm($warningComm,$idChap){
	$signalement= new CommentsManager();
	$warningComment=$signalement->signalComm($warningComm,$idChap);
}
/*--------------------------------ADMIN----------------------------------------*/
function lastUpdate(){
	$lastChaptPost= new ChaptersManager ();
	$lastChapterPost= $lastChaptPost->AdminChapRecap();

	$callChapters= new ChaptersManager();
	$listChapters=$callChapters-> listChap();

	$lastCommPost= new CommentsManager ();
	$lastCommentPost= $lastCommPost -> lastComment();

	$repotedComm= new CommentsManager();
	$reportedComments= $repotedComm->getReportingComments();

	require("./view/pages/adminPage.php");
}
/*--------------------------------CHAPTERS----------------------------------------*/
function postChap($titleChap,$textChap){
	$postNewChap=new chaptersManager();
	$newChapter= $postNewChap->postChapter($titleChap,$textChap);
}

function editChapter(){
	$callChapters= new ChaptersManager();
	$pickOneChap=$callChapters->oneChap();

	require("./view/pages/editChapter.php");
}

function reEditChap($idEdit,$titleEdit,$textEdit){
	$editChapter= new ChaptersManager();
	$reEditChapter=$editChapter->reditChapter($idEdit,$titleEdit,$textEdit);
}

function deletedChapAndComments($idChapter){
	$deletedChapter= new ChaptersManager();
	$dltOneChapter= $deletedChapter->eraseChapter($idChapter);

	$deletedAllComments= new CommentsManager();
	$dltAllCommments= $deletedAllComments-> deleteAllComments($idChapter);
}
/*--------------------------------END CHAPTERS----------------------------------------*/

/*--------------------------------COMMENTS----------------------------------------*/
function deletedComment($id_comm){
	$eraseComment= new CommentsManager();
	$erase=$eraseComment->deleteComment($id_comm);
}

function validationComment($id_comm){
	$checkingComm= new CommentsManager();
	$commentOk= $checkingComm-> commentValidation($id_comm);
}
/*--------------------------------END COMMENTS----------------------------------------*/

/*--------------------------------END ADMIN----------------------------------------*/