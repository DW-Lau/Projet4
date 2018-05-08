<?php
require_once("./model/adminManager.php");
/*----------------REQUIRE TO ADMINPAGE----------------*/
require_once("./model/chaptersManager.php");
require_once("./model/billetsManager.php");
require_once("./model/commentsManager.php");

function adminPage(){
	require("./view/pages/connexionAdmin.php");
}
function checkInfo($checkPseudo,$checkmdp){
	$checkUser= new membersManager();
	$userLogin= $checkUser->checkInfo($checkPseudo,$checkmdp);

	//require("./index.html");
}
function formulaire(){
	require ("./view/pages/inscription.php");
}

function subscribe($lastname,$firstname,$pseudo,$mdp,$mail){
	$newMember= new membersManager();
	$subMember= $newMember->getNewUser($lastname,$firstname,$pseudo,$mdp,$mail);
	//require("./index.html");
}
function adminConnexion($AdminPseudo,$AdminPwd){
	$adminlog= new membersManager();
	$infoAdmin= $adminlog->AdminCheckInfo($AdminPseudo,$AdminPwd);

	require("./view/pages/adminPage.php");

}
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
function updateWarningComm($warningComm){
	$signalement= new CommentsManager();
	$warningComment=$signalement->signalComm($warningComm);
	
}
function postChap($titleChap,$textChap){
	$postNewChap=new chaptersManager();
	$newChapter= $postNewChap->postChapter($titleChap,$textChap);
	//require("./view/pages/adminPage.php?action=adminOnly");
}
function editChapter(){
	$callChapters= new ChaptersManager();
	$pickOneChap=$callChapters->oneChap();
	require("./view/pages/editChapter.php");
}
function reEditChap($idEdit,$titleEdit,$textEdit){
	$editChapter= new ChaptersManager();
	$reEditChapter=$editChapter->reditChapter($idEdit,$titleEdit,$textEdit);
	//require("./view/pages/adminPage.php");
}

function deletedComment($id_comm){
	$eraseComment= new CommentsManager();
	$erase=$eraseComment->deleteComment($id_comm);
}
function validationComment($id_comm){
	$checkingComm= new CommentsManager();
	$commentOk= $checkingComm-> commentValidation($id_comm);
}
function deletedChapAndComments($idChapter){
	$deletedChapter= new ChaptersManager();
	$dltOneChapter= $deletedChapter->eraseChapter($idChapter);

	$deletedAllComments= new CommentsManager();
	$dltAllCommments= $deletedAllComments-> deleteAllComments($idChapter);

}