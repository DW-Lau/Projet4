<?php

require_once("manager.php");

class CommentsManager extends Manager
{
	public function getComments(){
		$bdd=$this->dbConnect();
		$idPage=$_GET['id'];
		$comments=$bdd->prepare('SELECT id,id_chap,membre,contenu,date_format(date_poste,"%d.%m.%y")as date_poste_fr FROM commentaires WHERE id_chap=:id_chap ');
		$comments->execute(array(
						'id_chap'=>$idPage
					));
		return $comments;
	}
	public function addComment($pseudoComment,$textComment,$idChap){
		$bdd=$this->dbConnect();
		var_dump($pseudoComment);
		var_dump($textComment);
		var_dump($idChap);

		$newComm=$bdd->prepare('INSERT INTO commentaires (id_chap, membre, contenu, date_poste) VALUES(:id_chap,:membre,:contenu, NOW()' );
		$newComm->execute(array(
			'id_chap'=>$idChap,
			'membre'=>$pseudoComment,
			'contenu'=>$textComment
			
		));
		//return $newComm;
	}
	// public function deletComm(){
	// 	$bdd=$this->dbConnect();
	// 	$deletCommId=$_GET['id'];
	// 	var_dump($deletCommId);
	// 	$dlt=$bdd->prepare('DELETE id_chap,membre,contenu,date_poste FROM commentaires WHERE id_chap: id');
	// 		$dlt->execute(array(
	// 			'id'=>$deletCommId
	// 		));
	// 		return $dlt;
	// }
	// public function signalComm(){
	// 	$bdd=$this->dbConnect();
	// 	$pbComm=$bdd->prepare('UPDATE ');

	// }
}