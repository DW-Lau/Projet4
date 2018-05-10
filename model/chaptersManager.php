<?php
require_once("manager.php");

class ChaptersManager extends Manager
{
	public function chapterCall(){//Chapter on the first page.
		$bdd=$this->dbConnect();
		$chapters= $bdd->query('SELECT id,titre,textchap,date_format(date_edition,"%d.%m.%y")as date_fr FROM chapitres ORDER BY date_edition  DESC LIMIT 0,3');	
		return $chapters;
	}

	public function oneChap(){
		$bdd=$this->dbConnect();
		$selectOne=$bdd->prepare('SELECT id,titre,textchap FROM chapitres WHERE id=:idPage ');
		 $selectOne->execute(array(
			'idPage'=>$_GET['id']
		 	 ));
		return $selectOne;
	
	}
	public function listChap(){	
		$bdd=$this->dbConnect();
		$allchap= $bdd->query('SELECT id,titre,SUBSTR(textchap, 1, 100)as textchap,date_format(date_edition,"%d.%m.%y")as date_fr FROM chapitres  ');//Selection of the first 100 characters 
		return $allchap;
	}

	public function AdminChapRecap(){
		$bdd=$this->dbConnect();
		$lastchap= $bdd->query('SELECT id,titre FROM chapitres ORDER BY date_edition DESC LIMIT 0,1');
		return $lastchap;
	}
	public function showAllChap(){
		$bdd=$this->dbConnect();
		$allchapters= $bdd->query('SELECT id,titre FROM chapitres ORDER BY DESC date_edition ');
		return $allchapters;
	}
	public function postChapter($titleChap,$textChap){
		$bdd=$this->dbConnect();
		$newChap=$bdd->prepare('INSERT INTO chapitres ( pseudo_member,titre,textchap, date_edition) VALUES(:pseudo_member,:titre,:textchap, NOW() )' );
		$newChap->execute(array(
			'pseudo_member'=>$_SESSION['pseudo'],
			'titre'=>$titleChap,
			'textchap'=>$textChap
			
		));
		header("Location:home.php?action=admin");
	}

	public function reditChapter($idEdit,$titleEdit,$textEdit){
		$bdd=$this->dbConnect();
		$editChap=$bdd->prepare('UPDATE chapitres SET pseudo_member=:pseudo_member, titre=:titre, textchap=:textchap WHERE id=:id');
		$editChap->execute(array(
			'pseudo_member'=>$_SESSION['pseudo'],
			'titre'=>$titleEdit,
			'textchap'=>$textEdit,
			'id'=>$idEdit
		));
		header("Location:home.php?action=admin");
	}
	public function eraseChapter($idChapter){
		$bdd=$this->dbConnect();
		$dltAChap=$bdd->prepare('DELETE FROM chapitres WHERE id=?');
		$eraseComms=$dltAChap->execute(array($idChapter));
		header("Location:./home.php?action=admin");
	}
}