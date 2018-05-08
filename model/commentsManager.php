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
		// var_dump($pseudoComment);
		// var_dump($textComment);
		// var_dump($idChap);
		//$warning_comm=0;
		$newComm=$bdd->prepare('INSERT INTO commentaires (id_chap, membre, contenu, date_poste) VALUES(:id_chap,:membre,:contenu, NOW() )' );
		$newComm->execute(array(
			'id_chap'=>$idChap,
			'membre'=>$pseudoComment,
			'contenu'=>$textComment,
			//'warning_comm'=>$warning_comm
			
		));
		//return $newComm;
		header("Location:./home.php?action=selectionchapitre&id=$idChap");
		
	}

	// $newComm=$bdd->prepare('INSERT INTO commentaires (id_chap, commentaires.membre, contenu,warning_comm, date_poste,membres.pseudo)
	// 							FROM commentaires 
	// 							LEFT JOIN membres 
	// 							ON commentaires.membre=membres.pseudo 
	// 							VALUES(:id_chap,:membre,:contenu, NOW() )' );
	// 							$newComm->execute(array(
	// 								'id_chap'=>$idChap,
	// 								'membre'=>$pseudoComment,
	// 								'contenu'=>$textComment
	// 								//'warning_comm'=>$warning_comm
									
	// 							));
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
		// $warningComm;
		// var_dump($warningComm);
		$pbComm=$bdd->prepare('UPDATE commentaires SET warning_comm=1 WHERE id_comm=:id_comm');
		$pbComm->execute(array(
			'id_comm'=> $warningComm
		));
		// $recupIdChap= $bdd->prepare('SELECT id_comm, commentaires.id_chap,chapitres.id FROM commentaires LEFT JOIN chapitres ON commentaires.id_chap=chapitres.id WHERE id_comm=:id_comm');
		// $idChap=$recupIdChap->execute(array(
		// 	'id_comm'=> $warningComm
		// ));
		//$idChap['id_chap'];
		//var_dump($idChap['id']);
		//return $pbComm;
		header("Location:./home.php?action=chapitres");

	 }
	public function getReportingComments(){
		$bdd=$this->dbConnect();
		$reportedComm=$bdd->query('SELECT id_comm, id_chap, commentaires.membre, contenu, warning_comm, date_format(date_poste,"%d.%m.%y")as date_poste_fr, membres.id FROM commentaires LEFT JOIN membres ON commentaires.membre= membres.id WHERE warning_comm=1 ORDER BY date_poste_fr');
		return $reportedComm;
	}
	public function lastComment(){
		$bdd=$this->dbConnect();
		$lastComm=$bdd->query('SELECT id_comm, commentaires.id_chap, membre,contenu,date_format(date_poste,"%d.%m.%y")as date_poste_fr, chapitres.id,id_chap,titre FROM commentaires LEFT JOIN chapitres ON commentaires.id_chap=chapitres.id ORDER BY date_poste_fr DESC LIMIT 0,1');
		return $lastComm;
	}
	public function deleteComment($id_comm){
		$bdd=$this->dbConnect();
		$dltComm=$bdd->prepare('DELETE FROM commentaires WHERE id_comm=?');
		$eraseComm=$dltComm->execute(array($id_comm));
		header("Location:./home.php?action=admin");
	}
	public function commentValidation($id_comm){
		$bdd=$this->dbConnect();
		$pbComm=$bdd->prepare('UPDATE commentaires SET warning_comm=0 WHERE id_comm=:id_comm');
		$pbComm->execute(array(
			'id_comm'=> $id_comm
		));
		header("Location:./home.php?action=admin");
	}
	public function deleteAllComments($idChapter){
		$bdd=$this->dbConnect();
		$dltAllComms=$bdd->prepare('DELETE FROM commentaires WHERE id_chap=?');
		$eraseComms=$dltAllComms->execute(array($idChapter));
		header("Location:./home.php?action=admin");
	}
}