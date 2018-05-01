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
	        	//session_start();
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
		/*This part will check if the new member had write a pseudo already taken.*/
		$verif=$bdd->prepare('SELECT pseudo FROM membres WHERE pseudo=:pseudo LIMIT 0,1');
		$verif->execute(array(
	   			    'pseudo'=>$pseudo
	   			));
		$resultat=$verif->fetch();
		var_dump($resultat['pseudo']);
		if($resultat['pseudo']==$pseudo){
				echo "Pseudo déjà utilisé. Veuillez en séléctionner un nouveau";
				header("Location:./home.php?action=inscription");
			}//end of the verification.
		else{//If all conditions are true, subscribe
				var_dump($pseudo);
				$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

				$user = $bdd->prepare('INSERT INTO membres(id,lastname,firstname,pseudo,mail,mdp) VALUES(id,:lastname,:firstname,:pseudo,:mail,:mdp )');
				var_dump($pseudo);
				$infoUser=$user->execute(array(
						'lastname'=>$lastname,
						'firstname'=>$firstname,
						'pseudo'=>$pseudo,
						'mail'=>$mail,
						'mdp'=>$pass_hache
					));
				var_dump($infoUser.'pseudo');
				
				session_start();
				var_dump($_SESSION["pseudo"]);
				var_dump($_SESSION);
				$_SESSION['id']=$infoUser.'id';
				$_SESSION["pseudo"]=$infoUser.'pseudo';
				var_dump($_SESSION["pseudo"]);
			return $infoUser;
			}
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
			//header("Location:./home.php?");
		}
	}//end function AdminCheckInfo();


}//end class membersManager();