<?php
require_once("manager.php");

class membersManager extends Manager
{
	protected function checkInfo($checkPseudo,$checkmdp){
		$bdd=$this->dbConnect();
			var_dump($checkPseudo);

		$req= $bdd->prepare('SELECT id,mdp FROM membres WHERE pseudo=:pseudo');
		$req->execute(array(
	   			    'pseudo' => $checkPseudo
	   			));
	var_dump($checkUser['pseudo']);
		$resultat = $req->fetch();
		return $resultat;
//$isPasswordCorrect = password_verify($checkmdp, $resultat['mdp']);
// 	if (!$resultat){
//   		echo 'Mauvais identifiant ou mot de passe !';
// 	}else{
//     	if ($isPasswordCorrect) {
//         	session_start();
//         	$_SESSION['id'] = $resultat['id'];
//        		$_SESSION['pseudo'] = $pseudo;
//         echo 'Vous êtes connecté !';
//     }
//     else {
//         echo 'Mauvais identifiant ou mot de passe !';
//     }
// }
	//return $isPasswordCorrect; 
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
		
		var_dump($pseudo);
	return $infoUser;
	}
}