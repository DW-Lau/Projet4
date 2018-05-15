<?php
require_once("./model/chaptersManager.php");
require_once("./model/commentsManager.php");

function  headBand(){
	require ("./view/portions/header.php");
}
function firstPage(){
	$callChapters= new ChaptersManager();
	$chapters= $callChapters->chapterCall();

	$billetsCall= new billsCaller();
	$bills= $billetsCall-> billsCall();
	require("./view/pages/homepage.php");
}
/*------------------CHAPTERS-----------------------*/
function getAllChaps(){
	$callChapters= new ChaptersManager();
	$listChapters=$callChapters-> listChap();
	require("./view/pages/chapitres.php");
}

function getOneChap(){
	$callChapters= new ChaptersManager();
	$pickOneChap=$callChapters->oneChap();

	$getallComms= new CommentsManager();
	$commByChap=$getallComms->getComments();

	require("./view/pages/chapitre.php");
}
/*------------------END CHAPTERS-----------------------*/

/*------------------COMMENTS-----------------------*/
function addComments($pseudoComment,$textComment,$idChap){
	$addComm= new CommentsManager();
	$newComment=$addComm->addComment($pseudoComment,$textComment,$idChap);

	$getallComms= new CommentsManager();
	$commByChap=$getallComms->getComments();
}