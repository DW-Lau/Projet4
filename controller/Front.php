<?php
/*Controller to the first page*/
require_once("./model/chaptersManager.php");
require_once("./model/billetsManager.php");
require_once("./model/commentsManager.php");

function firstPage(){
	
		$callChapters= new ChaptersManager();
		$chapters= $callChapters->chapterCall();

	
		$billetsCall= new billsCaller();
		$bills= $billetsCall-> billsCall();


	require("./view/pages/homepage.php");

}
function footerPage(){
	$billFooter= new billsCaller();
	$lastBill=$billFooter->footerBill();
		require("./view/portions/mentionsLeg.php");
}
function getAllChaps(){

	$callChapters= new ChaptersManager();
	$listChapters=$callChapters-> listChap();
	require("./view/pages/chapitres.php");

}
