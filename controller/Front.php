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

		$billFooter= new billsCaller();
		$lastBill=$billFooter->footerBill();
	require("./view/pages/homepage.php");
	require("./view/portions/mentionsLeg.php");

}
