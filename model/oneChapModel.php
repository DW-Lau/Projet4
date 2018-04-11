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
// 	var_dump($deletCommId);
// 	$dlt=$bdd->prepare('DELETE id_chap,membre,contenu,date_poste FROM commentaires WHERE id_chap: id');
// 		$dlt->execute(array(
// 			'id'=>$deletCommId
// 		));
// 		return $dlt;
// }

function addComment($pseudoComment,$textComment,$idChap){
	$bdd=dbConnect();
	$idPage=$_GET['id'];
	$newComm=$bdd->prepare('INSERT INTO commentaires (id_chap, membre, contenu, date_poste) VALUES(:id_chap,:membre,:contenu, NOW()' );
	$newComm->execute(array(
		'id_chap'=>$idPage,
		'membre'=>$pseudoComment,
		'contenu'=>$textComment
		
	));
	//return $newComm;
}
//:id, :id_chap,:membre, :contenu, NOW() 
// function addComment($pseudoComment,$textComment,$idChap){
// 	$bdd=dbConnect();

// 	$newComm=$bdd->prepare('INSERT INTO commentaires ( membre,contenu,date_poste)VALUES( :membre, :contenu, NOW() ) WHERE id_chap=:id_chap' );
// 	$newComm->execute(array(
// 		'membre'=>$pseudoComment,
// 		'contenu'=>$textComment,
// 		'id_chap'=>$_GET['id']
// 	));
// 	//return $newComm;
// }

