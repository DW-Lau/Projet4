<?php
//$idPage=$_GET['id'];

//$reponse=listChap();
//$_GET['id']=listChap($list['id']);
function oneChap(){
$bdd=dbConnect();
	$reponse=$bdd->prepare('SELECT id,titre,textchap FROM chapitres WHERE id=:idPage ');
	 $reponse->execute(array(
		'idPage'=>$_GET['id']
	 	 ));
	return $reponse;
	
}

function getComments(){
	$bdd=dbConnect();
	$idPage=$_GET['id'];
	$comments=$bdd->prepare('SELECT id,id_chap,membre,contenu,date_format(date_poste,"%d.%m.%y")as date_poste_fr FROM commentaires WHERE id_chap=:id_chap ');
	$comments->execute(array(
					'id_chap'=>$idPage
				));
	return $comments;
}
// function deletComm(){
// 	$bdd=dbConnect();
// 	$deletCommId=$_GET['id'];
// 	$dlt=$bdd->prepare('DELETE id,id_chap,membre,contenu,date_format FROM commentaires WHERE id: id');
// 		$dlt->execute(array(
// 			'id'=>$deletCommId
// 		));
// 		return $dlt;
// }

