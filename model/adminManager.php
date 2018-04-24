<?php
require_once("manager.php");

class membersManager extends Manager
{
	public function checkInfo($checkPseudo,$checkmdp){
		$bdd=$this->dbConnect();
		$req= $bdd->prepare('SELECT id,mdp FROM membres WHERE pseudo=:pseudo');
		$req->execute(array(
	   			    'pseudo' => $checkPseudo
	   			));
	
		$resultat = $req->fetch();
		//return $resultat;
		$isPasswordCorrect = password_verify($checkmdp, $resultat['mdp']);

		if (!$resultat){
	  		echo 'Mauvais identifiant ou mot de passe !';
		}
		else{
	    	if ($isPasswordCorrect) {
	        	session_start();
	        	$_SESSION['id'] = $resultat['id'];
	       		$_SESSION['pseudo'] = $checkPseudo;
	        	echo 'Content de vous revoir '. $_SESSION['pseudo'];
	   		}
	   		else{
	        echo 'Mauvais identifiant ou mot de passe !';
	    	}
		}
		return $isPasswordCorrect; 
	}

	public function getNewUser($lastname,$firstname,$pseudo,$mdp,$mail){
		$bdd=$this->dbConnect();
			var_dump($lastname);
		$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

		$user = $bdd->prepare('INSERT INTO membres(id,lastname,firstname,pseudo,mail,mdp) VALUES(id,:lastname,:firstname,:pseudo,:mail,:mdp )');
		$infoUser=$user->execute(array(
				'lastname'=>$lastname,
				'firstname'=>$firstname,
				'pseudo'=>$pseudo,
				'mail'=>$mail,
				'mdp'=>$pass_hache
			));
		$_SESSION['id']=$infoUser.'id';
		$_SESSION["pseudo"]=$infoUser.'pseudo';
		var_dump($_SESSION["pseudo"]);
	return $infoUser;
	}

	public function AdminCheckInfo($AdminPseudo,$AdminPwd){
		$bdd=$this->dbConnect();
		$idAdmin="115";
	//	var_dump($idAdmin);
		$req= $bdd->prepare('SELECT * FROM membres WHERE id=:id AND pseudo=:pseudo');
		$req->execute(array(
					'id'=>$idAdmin,
	   			    'pseudo'=>$AdminPseudo
	   			));

		$resultat = $req->fetch();
		//var_dump($resultat);
		//var_dump($resultat['id']);
		$isPasswordCorrect = password_verify($AdminPwd, $resultat['mdp']);
		
		if($isPasswordCorrect){
				if($resultat['id']=="115"){
					//var_dump($resultat['id']);
					//session_start();
					$_SESSION['id']=$resultat['id'];
					//var_dump($_SESSION['id']);
					$_SESSION['pseudo'] = $AdminPseudo;
				//	echo "Bienvenu". $_SESSION['pseudo'] ;
					//header("Location:home.php?action=adminOnly");
				}
				else{
					echo "Vous n'avez pas accès à cette partie du blog, redirection en cours";
					header("Location: ./home.php");
				}
		}else{
			echo"Votre mot de passe ou votre pseudo est incorrecte";
			header("Location:./home.php?action=admin");
		}
	}//end function AdminCheckInfo();
}//end class membersManager();