<?php

	require("connectBDDController.php");
	require('../model/oneChapModel.php');
	function addNewComment($pseudoComment,$textComment,$idChap){
	var_dump($pseudoComment);
	$newComm= addComment($_POST['nickname'],$_POST['tinymce'],$_GET['id']);
	return $newComm;
}
// var_dump($pseudoComment);
// $newComm=addNewComment($pseudoComment,$textComment,$idChap);
	$donnees=oneChap();
	$allcomms=getComments();
//	$removeComm=deletComm();
	echo "hellooooo";


	require('../view/pages/chapitre.php');
//addNewComment($pseudoComment,$textComment,$idChap);