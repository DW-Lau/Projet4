<?php

require_once("manager.php");

class CommentsManager extends Manager
{
	public function getComments(){
		$bdd=$this->dbConnect();
		$idPage=$_GET['id'];
		$comments=$bdd->prepare('SELECT id_comm,id_chap,membre,contenu,warning_comm,date_format(date_poste,"%d.%m.%y")as date_poste_fr FROM commentaires WHERE id_chap=:id_chap ');
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
		$warning_comm=0;
		$newComm=$bdd->prepare('INSERT INTO commentaires (id_chap, membre, contenu,warning_comm, date_poste) VALUES(:id_chap,:membre,:contenu, NOW() )' );
		$newComm->execute(array(
			'id_chap'=>$idChap,
			'membre'=>$pseudoComment,
			'contenu'=>$textComment,
			'warning_comm'=>$warning_comm
			
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
	 public function signalComm($warningComm){
		$bdd=$this->dbConnect();
		$warningComm;
		var_dump($warningComm);
		$pbComm=$bdd->prepare('UPDATE commentaires SET warning_comm=1 WHERE id_comm=:id_comm');
		$pbComm->execute(array(
			'id_comm'=> $warningComm
		));
		return $pbComm;

	 }
	public function getReportingComments(){
		$bdd=$this->dbConnect();
		$reportedComm=$bdd->query('SELECT id_comm, id_chap, membre, contenu, warning_comm, date_format(date_poste,"%d.%m.%y")as date_poste_fr FROM commentaires WHERE warning_comm=1 ORDER BY date_poste_fr');
		return $reportedComm;
	}
	public function lastComment(){
		$bdd=$this->dbConnect();
		$lastComm=$bdd->query('SELECT id_comm, commentaires.id_chap, membre,contenu,date_format(date_poste,"%d.%m.%y")as date_poste_fr, chapitres.id,id_chap,titre FROM commentaires LEFT JOIN chapitres ON commentaires.id_chap=chapitres.id ORDER BY date_poste_fr LIMIT 0,1');
		return $lastComm;
	}
}