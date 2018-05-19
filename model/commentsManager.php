<?php

require_once("manager.php");

class CommentsManager extends Manager
{
	public function getComments(){
		$bdd=$this->dbConnect();
		$idPage=$_GET['id'];
		$comments=$bdd->prepare('SELECT id_comm,id_chap,commentaires.id_membre,contenu,warning_comm,date_format(date_poste,"%d.%m.%y")as date_poste_fr, membres.id, membres.pseudo FROM commentaires LEFT JOIN membres ON commentaires.id_membre=membres.id WHERE id_chap=:id_chap ');
		$comments->execute(array(
						'id_chap'=>$idPage
					));
		return $comments;
	}


	public function addComment($idPseudo,$textComment,$idChap){
		$bdd=$this->dbConnect();
		
		$newComm=$bdd->prepare('INSERT INTO commentaires (id_chap, id_membre, contenu, date_poste) VALUES(:id_chap,:id_membre,:contenu, NOW() )' );

		$newComm->execute(array(
			'id_chap'=>$idChap,
			'id_membre'=>$idPseudo,
			'contenu'=>$textComment,
		));

		$newComm=$bdd->query('SELECT commentaires.id_membre, membres.id FROM commentaires LEFT JOIN membres ON commentaires.id_membre=membres.id');
		
		header("Location:./home.php?action=selectionchapitre&id=$idChap");
	}

	 public function signalComm($warningComm,$idChap){
		$bdd=$this->dbConnect();
		$pbComm=$bdd->prepare('UPDATE commentaires SET warning_comm=1 WHERE id_comm=:id_comm');
		$pbComm->execute(array(
			'id_comm'=> $warningComm
		));
		$recupIdChap= $bdd->prepare('SELECT id_chap FROM commentaires WHERE id_comm=:id_comm');
		$recupIdChap->execute(array(
			'id_comm'=> $warningComm
		));
		
		header("Location:./home.php?action=selectionchapitre&id=$idChap");
	 }


	public function getReportingComments(){
		$bdd=$this->dbConnect();
		$reportedComm=$bdd->query('SELECT id_comm, id_chap, commentaires.id_membre, contenu, warning_comm, date_format(date_poste,"%d.%m.%y")as date_poste_fr, membres.id,membres.pseudo FROM commentaires LEFT JOIN membres ON commentaires.id_membre= membres.id WHERE warning_comm=1 ORDER BY date_poste_fr');
		return $reportedComm;
	}

	public function lastComment(){
		$bdd=$this->dbConnect();
		$lastComm=$bdd->query('SELECT id_comm, commentaires.id_chap, id_membre,contenu,date_format(date_poste,"%d.%m.%y")as date_poste_fr, chapitres.id,id_chap,titre FROM commentaires LEFT JOIN chapitres ON commentaires.id_chap=chapitres.id ORDER BY date_poste_fr   DESC LIMIT 0,1');
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